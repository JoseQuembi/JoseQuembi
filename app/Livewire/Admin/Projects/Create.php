<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use Livewire\Attributes\Layout;

class Create extends Component
{
    #[Layout('layouts.dashboard')]
    public $name = '';
    public $description = '';
    public $start_date = '';
    public $end_date = '';

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ];

    public function createProject()
    {
        $this->validate();

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user_id' => auth()->id(), // Assumindo que o usuário logado é o criador do projeto
        ]);

        session()->flash('message', 'Projeto criado com sucesso!');

        return redirect()->route('admin.projects.index');
    }

    public function render()
    {
        return view('livewire.admin.projects.create');
    }
}
