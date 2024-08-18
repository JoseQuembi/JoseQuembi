<?php

namespace App\Livewire\Admin\Issues;

use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    #[Layout('layouts.dashboard')]
    public $title;
    public $description;
    public $status;
    public $priority;
    public $due_date;
    public $project_id;
    public $assigned_to;

    public function create()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'priority' => 'required|string',
            'due_date' => 'required|date',
            'project_id' => 'required|exists:projects,id',
            'assigned_to' => 'required|exists:users,id',
        ]);

        Issue::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
            'project_id' => $this->project_id,
            'assigned_to' => $this->assigned_to,
        ]);
        $this->showAlert('Novo problema registrado', 'success');
        return redirect()->route('admin.issues.index');
    }

    public function render()
    {
        $projects = Project::all();
        $users = User::all();

        return view('livewire.admin.issues.create', compact('projects', 'users'));
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
