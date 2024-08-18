<?php

namespace App\Livewire\Admin\Risks;

use App\Models\Risk;
use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    #[Layout('layouts.dashboard')]
    public $name;
    public $description;
    public $probability;
    public $impact;
    public $status;
    public $mitigation_plan;
    public $project_id;
    public $owner_id;

    public function create()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'probability' => 'required|numeric|min:0|max:100',
            'impact' => 'required|numeric|min:0|max:100',
            'status' => 'required|string',
            'mitigation_plan' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'owner_id' => 'required|exists:users,id',
        ]);

        Risk::create([
            'name' => $this->name,
            'description' => $this->description,
            'probability' => $this->probability,
            'impact' => $this->impact,
            'status' => $this->status,
            'mitigation_plan' => $this->mitigation_plan,
            'project_id' => $this->project_id,
            'owner_id' => $this->owner_id,
        ]);
        $this->showAlert('Risk criado com sucesso.', 'success');
        return redirect()->route('admin.risks.index');
    }

    public function render()
    {
        $projects = Project::all();
        $users = User::all();

        return view('livewire.admin.risks.create', compact('projects', 'users'));
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
