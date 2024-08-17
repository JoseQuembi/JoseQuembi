<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    #[Layout('layouts.dashboard')]
    public Project $project;
    public $name;
    public $description;
    public $type;
    public $client_id;
    public $start_date;
    public $end_date;
    public $status;
    public $progress;
    public $user_id;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'type' => 'required|in:web,mobile,outros', // Defina os tipos válidos
        'client_id' => 'required|exists:clients,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'status' => 'required|in:planejamento,em_andamento,concluido,cancelado',
        'progress' => 'required|integer|min:0|max:100', // Validação para o progresso
        'user_id' => 'required|exists:users,id',
    ];

    public function mount($slug)
    {
        $this->project = Project::where('slug', $slug)->firstOrFail();
        $this->name = $this->project->name;
        $this->description = $this->project->description;
        $this->type = $this->project->type;
        $this->client_id = $this->project->client_id;
        $this->start_date = $this->project->start_date->format('Y-m-d');
        $this->end_date = $this->project->end_date->format('Y-m-d');
        $this->status = $this->project->status;
        $this->progress = $this->project->progress;
        $this->user_id = $this->project->user_id;
    }

    public function updateProject()
    {
        $this->validate();

        $this->project->update([
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'client_id' => $this->client_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'progress' => $this->progress,
            'user_id' => $this->user_id,
        ]);

        session()->flash('message', 'Projeto atualizado com sucesso!');

        return redirect()->route('admin.projects.show', $this->project->slug);
    }

    public function render()
    {
        $users = User::all();
        $clients = Client::all();
        return view('livewire.admin.projects.edit', compact('users', 'clients'));
    }
}
