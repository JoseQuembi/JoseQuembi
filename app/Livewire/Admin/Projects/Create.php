<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Client;
use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class Create extends Component
{
    #[Layout('layouts.dashboard')]
    public $name = '';
    public $description = '';
    public $start_date = '';
    public $end_date = '';
    public $client_id = '';

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'client_id' => 'required|integer',
    ];

    public function createProject()
    {
        $this->validate();

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'client_id' => $this->client_id,
            'user_id' => Auth::user()->id, // Assumindo que o usuário logado é o criador do projeto
        ]);

        session()->flash('message', 'Projeto criado com sucesso!');

        return redirect()->route('admin.projects.index');
    }

    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.projects.create',['clients'=> $clients]);
    }
}
