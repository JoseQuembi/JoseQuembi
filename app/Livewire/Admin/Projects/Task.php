<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use Livewire\Attributes\Layout;

class Task extends Component
{
    #[Layout('layouts.dashboard')]
    public $project;
    public $name;
    public $description;
    public $due_date;
    public $status = 'pending';

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'due_date' => 'required|date',
        'status' => 'required|in:pending,in_progress,completed',
    ];

    public function mount($slug)
    {
        $this->project = Project::where('slug', $slug)->first();
    }

    public function addTask()
    {
        $this->validate();

        $this->project->tasks()->create([
            'name' => $this->name,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'status' => $this->status,
            'user_id' => auth()->id(),
        ]);

        $this->reset(['name', 'description', 'due_date', 'status']);
        $this->project->refresh();

        session()->flash('message', 'Tarefa adicionada com sucesso.');
    }

    public function updateTaskStatus($taskId, $newStatus)
    {
        $task = $this->project->tasks()->findOrFail($taskId);
        $task->update(['status' => $newStatus]);

        $this->project->refresh();

        session()->flash('message', 'Status da tarefa atualizado com sucesso.');
    }

    public function deleteTask($taskId)
    {
        $task = $this->project->tasks()->findOrFail($taskId);
        $task->delete();

        $this->project->refresh();

        session()->flash('message', 'Tarefa removida com sucesso.');
    }

    public function render()
    {
        return view('livewire.admin.projects.task', [
            'tasks' => $this->project->tasks()->latest()->get(),
        ]);
    }
}
