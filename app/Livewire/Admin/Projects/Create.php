<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Create extends Component
{
    #[Layout('layouts.dashboard')]
    public $name = '';
    public $description = '';
    public $type = '';
    public $start_date = '';
    public $end_date = '';
    public $client_id = '';
    public $status = '';
    public $progress = 0;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'type' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'client_id' => 'required|integer|exists:clients,id',
        'status' => 'required|string',
        'progress' => 'required|integer|min:0|max:100',
    ];

    public function createProject()
    {
        $this->validate();

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'client_id' => $this->client_id,
            'user_id' => Auth::user()->id,
            'status' => $this->status,
            'progress' => $this->progress,
        ]);

        session()->flash('message', 'Projeto criado com sucesso!');

        return redirect()->route('admin.projects.index');
    }

    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.projects.create', ['clients' => $clients]);
    }
}
