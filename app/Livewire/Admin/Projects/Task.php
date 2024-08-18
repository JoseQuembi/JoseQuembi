<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use App\Models\Task as TaskModel;
use App\Models\User;
use Livewire\Attributes\Layout;

class Task extends Component
{
    #[Layout('layouts.dashboard')]
    public $project;
    public $name;
    public $description;
    public $assigned_to;
    public $start_date;
    public $end_date;
    public $status = 'pending';
    public $priority;

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
    }

    public function addTask()
    {
        $this->validate();

        $this->project->tasks()->create([
            'name' => $this->name,
            'description' => $this->description,
            'assigned_to' => $this->assigned_to,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'priority' => $this->priority,
        ]);

        $this->reset(['name', 'description', 'assigned_to', 'start_date', 'end_date', 'status', 'priority']);
        $this->project->refresh();
        $this->dispatch('showAlert', [
            'message' => 'Tarefa adicionada com sucesso.',
            'type' => 'success', // or 'info', 'warning', 'error'
    'duration' => 5000, // optional, defaults to 5000ms
]);
    }

    public function updateTaskStatus($taskId, $newStatus)
    {
        $task = $this->project->tasks()->findOrFail($taskId);
        $task->update(['status' => $newStatus]);

        $this->project->refresh();
        $this->dispatch('showAlert', [
            'message' => 'Status da tarefa atualizado com sucesso.',
            'type' => 'success', // or 'info', 'warning', 'error'
    'duration' => 5000, // optional, defaults to 5000ms
]);
    }

    public function deleteTask($taskId)
    {
        $task = $this->project->tasks()->findOrFail($taskId);
        $task->delete();

        $this->project->refresh();
        $this->showAlert('Tarefa removida com sucesso.', 'success');

    }

    public function render()
    {
        return view('livewire.admin.projects.task', [
            'tasks' => $this->project->tasks()->latest()->get(),
            'users' => User::all(),
        ]);
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
