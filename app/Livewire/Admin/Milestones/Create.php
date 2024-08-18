<?php

namespace App\Livewire\Admin\Milestones;

use Livewire\Component;
use App\Models\Milestone;
use App\Models\Project;
use Livewire\Attributes\Layout;

class Create extends Component
{
    #[Layout('layouts.dashboard')]
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

    public function createMilestone()
    {
        $this->validate();

        Milestone::create([
            'name' => $this->name,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'status' => $this->status,
            'project_id' => $this->project_id,
        ]);
        $this->showAlert('um novo Marco registrado no sistema', 'success');
        $this->reset();
    }

    public function render()
    {
        $projects = Project::all();
        return view('livewire.admin.milestones.create', compact('projects'));
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
