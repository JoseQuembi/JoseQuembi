<?php

namespace App\Livewire\Admin\Milestones;

use Livewire\Component;
use App\Models\Milestone;
use App\Models\Project;
use App\Utils\Helper;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    #[Layout('layouts.dashboard')]
    public Milestone $milestone;
    public $name;
    public $description;
    public $due_date;
    public $status;
    public $project_id;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'required|date',
        'status' => 'required|in:pending,in_progress,completed',
        'project_id' => 'required|exists:projects,id',
    ];

    public function mount(Milestone $milestone)
    {
        $this->milestone = $milestone;
        $this->name = $milestone->name;
        $this->description = $milestone->description;
        $this->due_date = Helper::dataCurta($milestone->due_date);
        $this->status = $milestone->status;
        $this->project_id = $milestone->project_id;
    }

    public function updateMilestone()
    {
        $this->validate();

        $this->milestone->update([
            'name' => $this->name,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'status' => $this->status,
            'project_id' => $this->project_id,
        ]);
        $this->showAlert('Marco atualizado com sucesso', 'success');
    }

    public function render()
    {
        $projects = Project::all();
        return view('livewire.admin.milestones.edit', compact('projects'));
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
