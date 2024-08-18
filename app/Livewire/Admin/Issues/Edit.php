<?php

namespace App\Livewire\Admin\Issues;

use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    #[Layout('layouts.dashboard')]
    public Issue $issue;

    public function mount(Issue $issue)
    {
        $this->issue = $issue;
    }

    public function update()
    {
        $this->validate([
            'issue.title' => 'required|string|max:255',
            'issue.description' => 'required|string',
            'issue.status' => 'required|string',
            'issue.priority' => 'required|string',
            'issue.due_date' => 'required|date',
            'issue.project_id' => 'required|exists:projects,id',
            'issue.assigned_to' => 'required|exists:users,id',
        ]);

        $this->issue->save();
        $this->showAlert('Problema atualizado', 'success');
        return redirect()->route('admin.issues.index');
    }

    public function render()
    {
        $projects = Project::all();
        $users = User::all();

        return view('livewire.admin.issues.edit', compact('projects', 'users'));
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
