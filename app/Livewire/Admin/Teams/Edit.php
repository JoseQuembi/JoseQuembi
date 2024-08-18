<?php

namespace App\Livewire\Admin\Teams;

use App\Models\Team;
use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    #[Layout('layouts.dashboard')]
    public Team $team;
    public $name;
    public $project_id;
    public $selectedMembers = [];

    public function mount(Team $team)
    {
        $this->team = $team;
        $this->name = $team->name;
        $this->project_id = $team->project_id;
        $this->selectedMembers = $team->members->pluck('user_id')->toArray();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'selectedMembers' => 'required|array|min:1',
            'selectedMembers.*' => 'exists:users,id',
        ]);

        $this->team->update([
            'name' => $this->name,
            'project_id' => $this->project_id,
        ]);

        $this->team->members()->delete();

        foreach ($this->selectedMembers as $memberId) {
            $this->team->members()->create([
                'user_id' => $memberId,
                'role' => 'member', // You might want to add a role selection in the form
            ]);
        }
        $this->showAlert('grupo atualizado com sucesso', 'success');
        return redirect()->route('admin.teams.index');
    }

    public function render()
    {
        $projects = Project::all();
        $users = User::all();

        return view('livewire.admin.teams.edit', compact('projects', 'users'));
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
