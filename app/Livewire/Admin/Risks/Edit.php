<?php

namespace App\Livewire\Admin\Risks;

use App\Models\Risk;
use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    #[Layout('layouts.dashboard')]
    public Risk $risk;

    public function mount(Risk $risk)
    {
        $this->risk = $risk;
    }

    public function update()
    {
        $this->validate([
            'risk.name' => 'required|string|max:255',
            'risk.description' => 'required|string',
            'risk.probability' => 'required|numeric|min:0|max:100',
            'risk.impact' => 'required|numeric|min:0|max:100',
            'risk.status' => 'required|string',
            'risk.mitigation_plan' => 'required|string',
            'risk.project_id' => 'required|exists:projects,id',
            'risk.owner_id' => 'required|exists:users,id',
        ]);

        $this->risk->save();
        $this->showAlert('Risco atualizado com sucesso', 'success');
        return redirect()->route('admin.risks.index');
    }

    public function render()
    {
        $projects = Project::all();
        $users = User::all();

        return view('livewire.admin.risks.edit', compact('projects', 'users'));
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
