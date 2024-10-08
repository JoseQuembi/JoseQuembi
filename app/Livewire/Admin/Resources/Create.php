<?php

namespace App\Livewire\Admin\Resources;

use App\Models\Project;
use Livewire\Component;
use App\Models\Resource;
use Livewire\Attributes\Layout;

class Create extends Component
{
    #[Layout('layouts.dashboard')]
    public $name;
    public $type;
    public $quantity;
    public $unit_cost;
    public $project_id;

    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|in:humano,material,financeiro',
        'quantity' => 'required|numeric|min:0',
        'unit_cost' => 'required|numeric|min:0',
        'project_id' => 'required|numeric',
    ];

    public function save()
    {
        $this->validate();

        Resource::create([
            'name' => $this->name,
            'type' => $this->type,
            'quantity' => $this->quantity,
            'unit_cost' => $this->unit_cost,
            'project_id' => $this->project_id
        ]);
        $this->showAlert('Recurso criado com sucesso.', 'success');
        $this->reset();
    }

    public function render()
    {
        $projetos = Project::orderBy('name', 'asc')->get();
        return view('livewire.admin.resources.create', ['projetos' => $projetos]);
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
