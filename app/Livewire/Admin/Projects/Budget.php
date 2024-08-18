<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use Livewire\Attributes\Layout;

class Budget extends Component
{
    #[Layout('layouts.dashboard')]
    public $amount;
    public $description;
    public $project;

    protected $rules = [
        'amount' => 'required|numeric|min:0',
        'description' => 'required|string|max:255',
    ];

    public function mount($slug)
    {
        $this->project = Project::where('slug', $slug)->first();
    }

    public function addBudgetItem()
    {
        $this->validate();

        $this->project->budget()->create([
            'amount' => $this->amount,
            'description' => $this->description,
        ]);

        $this->reset(['amount', 'description']);
        $this->project->refresh();
        $this->showAlert('Item de orçamento adicionado com sucesso', 'success');

    }

    public function deleteBudgetItem($budgetId)
    {
        $budgetItem = $this->project->budget()->findOrFail($budgetId);
        $budgetItem->delete();

        $this->project->refresh();
        $this->showAlert('Item de orçamento removido com sucesso.', 'success');
    }

    public function render()
    {
        return view('livewire.admin.projects.budget', [
            'budgetItems' => $this->project->budget()->latest()->get(),
            'totalBudget' => $this->project->budget()->sum('amount'),
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
