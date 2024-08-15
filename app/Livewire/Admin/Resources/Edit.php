<?php

namespace App\Livewire\Admin\Resources;

use Livewire\Component;
use App\Models\Resource;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    #[Layout('layouts.dashboard')]
    public Resource $resource;
    public $name;
    public $type;
    public $quantity;
    public $unit_cost;

    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|in:humano,material,financeiro',
        'quantity' => 'required|numeric|min:0',
        'unit_cost' => 'required|numeric|min:0',
    ];

    public function mount($slug)
    {
        $this->resource = Resource::where('slug', $slug)->firstOrFail();
        $this->name = $this->resource->name;
        $this->type = $this->resource->type;
        $this->quantity = $this->resource->quantity;
        $this->unit_cost = $this->resource->unit_cost;
    }

    public function update()
    {
        $this->validate();

        $this->resource->update([
            'name' => $this->name,
            'type' => $this->type,
            'quantity' => $this->quantity,
            'unit_cost' => $this->unit_cost,
        ]);

        session()->flash('message', 'Recurso atualizado com sucesso.');

        return redirect()->route('admin.resources.show', $this->resource->slug);
    }

    public function render()
    {
        return view('livewire.admin.resources.edit');
    }
}
