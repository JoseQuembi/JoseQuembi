<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Models\Milestone;
use App\Models\Risk;
use App\Models\Issue;
use App\Models\Resource;

class ProjectSchedule extends Component
{
    public $project;
    public $tasks;
    public $milestones;
    public $teamMembers;
    public $risks;
    public $issues;
    public $resources;

    public function mount($projectId)
    {
        $this->project = Project::findOrFail($projectId);
        $this->loadProjectData();
    }

    public function loadProjectData()
    {
        $this->tasks = $this->project->tasks()->orderBy('start_date')->get();
        $this->milestones = $this->project->milestones()->orderBy('due_date')->get();
        $this->teamMembers = $this->project->teamMembers;
        $this->risks = $this->project->risks;
        $this->issues = $this->project->issues;
        $this->resources = $this->project->resources;
    }

    public function render()
    {
        return view('livewire.admin.profile.project-schedule', [
            'ganttData' => $this->prepareGanttData(),
            'kanbanData' => $this->prepareKanbanData(),
            'timelineData' => $this->prepareTimelineData(),
        ]);
    }

    private function prepareGanttData()
    {
        $ganttData = [];
        foreach ($this->tasks as $task) {
            $ganttData[] = [
                'id' => $task->id,
                'text' => $task->name,
                'start_date' => $task->start_date->format('Y-m-d'),
                'end_date' => $task->end_date->format('Y-m-d'),
                'progress' => $task->progress,
                'parent' => $task->parent_id,
            ];
        }
        return $ganttData;
    }

    private function prepareKanbanData()
    {
        $kanbanData = [
            'todo' => [],
            'in_progress' => [],
            'review' => [],
            'done' => [],
        ];

        foreach ($this->tasks as $task) {
            $kanbanData[$task->status][] = [
                'id' => $task->id,
                'title' => $task->name,
                'description' => $task->description,
                'assignee' => $task->assignee->name,
            ];
        }

        return $kanbanData;
    }

    private function prepareTimelineData()
    {
        $timelineData = [];
        foreach ($this->tasks as $task) {
            $timelineData[] = [
                'id' => $task->id,
                'content' => $task->name,
                'start' => $task->start_date->format('Y-m-d'),
                'end' => $task->end_date->format('Y-m-d'),
            ];
        }
        foreach ($this->milestones as $milestone) {
            $timelineData[] = [
                'id' => 'milestone_' . $milestone->id,
                'content' => $milestone->name,
                'start' => $milestone->due_date->format('Y-m-d'),
                'type' => 'point',
            ];
        }
        return $timelineData;
    }
}
