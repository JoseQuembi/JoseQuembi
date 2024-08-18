<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use App\Models\Task as TaskModel;
use App\Utils\Helper;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class ProjectSchedule extends Component
{
    #[Layout('layouts.profile')]
    public $project;
    public $tasks;
    public $milestones;
    public $teamMembers;
    public $risks;
    public $issues;
    public $resources;
    public $users;


    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'assigned_to' => 'nullable|exists:users,id',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'status' => 'required|in:pending,in_progress,completed',
        'priority' => 'required|in:low,medium,high',
    ];


    public function mount($slug)
    {
        $this->project = Project::where('slug', $slug)->firstOrFail();
        $this->authorizeProjectAccess($this->project);
        $this->loadProjectData();
    }

    public function addTask($taskData)
    {
        $this->validate($taskData, $this->rules);

        $this->project->tasks()->create($taskData);
        $this->loadProjectData();
        $this->showAlert('Nova tarefa criada co sucesso', 'success');
    }

    public function updateTask($taskData)
    {
        $this->validate($taskData, $this->rules);

        $task = $this->project->tasks()->findOrFail($taskData['id']);
        $task->update($taskData);
        $this->loadProjectData();
        $this->showAlert('Tarefa atualizada', 'success');
    }

    public function updateTaskStatus($taskId, $newStatus)
    {
        $task = $this->project->tasks()->findOrFail($taskId);
        $task->update(['status' => $newStatus]);

        $this->loadProjectData();
        $this->showAlert('O status da Tarefa foi atualizada com exito', 'success');
    }

    public function deleteTask($taskId)
    {
        $task = $this->project->tasks()->findOrFail($taskId);
        $task->delete();

        $this->loadProjectData();
        $this->showAlert('Tarefa removida', 'success');
    }

    protected function authorizeProjectAccess($project)
    {
        $user = User::findOrFail(Auth::user()->id);
        // Verifica se o usuário é o responsável pelo projeto
        if ($project->user_id === $user->id) {
            return true;
        }
        // Verifica se o usuário tem a role de admin
        if ($user->hasRole('admin')) {
            return true;
        }
        // Verifica se o usuário é membro da equipe do projeto
        if ($project->team && $project->team->members->contains($user)) {
            return true;
        }
        // Se nenhuma das condições acima for verdadeira, nega o acesso
        $this->showAlert('Você não tem permissão para acessar esta pagina', 'warning');
        abort(403, 'Você não tem permissão para acessar este projeto.');
    }

    public function loadProjectData()
    {
        $this->tasks = $this->project->tasks()->with('assignee')->orderBy('start_date')->get();
        $this->milestones = $this->project->milestones()->orderBy('due_date')->get();
        $this->teamMembers = $this->project->team ? $this->project->team->members : collect();
        $this->risks = $this->project->risks;
        $this->issues = $this->project->issues;
        $this->resources = $this->project->resources;
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.admin.profile.project-schedule', [
            'ganttData' => $this->prepareGanttData(),
            'kanbanData' => $this->prepareKanbanData(),
            'timelineData' => $this->prepareTimelineData(),
            'projectProgress' => $this->calculateProjectProgress(),
        ]);
    }

    private function prepareGanttData()
    {
        return $this->tasks->map(function ($task) {
            return [
                'id' => $task->id,
                'text' => $task->name,
                'start_date' => Helper::dataCurta($task->start_date),
                'end_date' => Helper::dataCurta($task->end_date),
                'progress' => $task->progress,
                'parent' => $task->parent_id,
            ];
        })->toArray();
    }

    private function prepareKanbanData()
    {
        $statuses = ['todo', 'in_progress', 'review', 'done'];
        $kanbanData = array_fill_keys($statuses, []);

        foreach ($this->tasks as $task) {
            $kanbanData[$task->status][] = [
                'id' => $task->id,
                'title' => $task->name,
                'description' => $task->description,
                'assignee' => $task->assignee->name ?? "Unassigned",
                'priority' => $task->priority,
                'due_date' => Helper::dataCurta($task->end_date),
            ];
        }

        return $kanbanData;
    }

    private function prepareTimelineData()
    {
        $timelineData = $this->tasks->map(function ($task) {
            return [
                'id' => $task->id,
                'content' => $task->name,
                'start' => Helper::dataCurta($task->start_date),
                'end' => Helper::dataCurta($task->end_date),
                'group' => $task->assignee_id ?? 'unassigned',
            ];
        })->toArray();

        $timelineData = array_merge($timelineData, $this->milestones->map(function ($milestone) {
            return [
                'id' => 'milestone_' . $milestone->id,
                'content' => $milestone->name,
                'start' => Helper::dataCurta($milestone->due_date),
                'type' => 'point',
                'group' => 'milestones',
            ];
        })->toArray());

        return $timelineData;
    }

    private function calculateProjectProgress()
    {
        $totalTasks = $this->tasks->count();
        if ($totalTasks === 0) {
            return 0;
        }

        $completedTasks = $this->tasks->where('status', 'done')->count();
        return ($completedTasks / $totalTasks) * 100;
    }
    private function showAlert($message, $type, $actions = null, $componentMethod = null)
    {
        $this->dispatch('showAlert', [
            'message' => $message,
            'type' => $type,
            'duration' => 5000,
            'actions' => $actions,
            'component' => $actions ? $this->getId() : null,
            'componentMethod' => $componentMethod,
        ]);
    }
}
