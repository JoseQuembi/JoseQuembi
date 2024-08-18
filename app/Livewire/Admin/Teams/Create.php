<?php

namespace App\Livewire\Admin\Teams;

use App\Models\Team;
use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    #[Layout('layouts.dashboard')]
    public $name;
    public $project_id;
    public $selectedMembers = [];

    public function create()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'selectedMembers' => 'required|array|min:1',
            'selectedMembers.*' => 'exists:users,id',
        ]);

        $team = Team::create([
            'name' => $this->name,
            'project_id' => $this->project_id,
        ]);

        foreach ($this->selectedMembers as $memberId) {
            $team->members()->create([
                'user_id' => $memberId,
                'role' => 'member', // You might want to add a role selection in the form
            ]);
        }
        $this->showAlert('Grupo criado com sucesso', 'success');
        return redirect()->route('admin.teams.index');
    }

    public function render()
    {
        $projects = Project::all();
        $users = User::all();

        return view('livewire.admin.teams.create', compact('projects', 'users'));
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
