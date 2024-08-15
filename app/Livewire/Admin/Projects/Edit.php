<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    #[Layout('layouts.dashboard')]
    public Project $project;
    public $name;
    public $description;
    public $start_date;
    public $end_date;
    public $status;
    public $user_id;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'status' => 'required|in:planejamento,em_andamento,concluido,cancelado',
        'user_id' => 'required|exists:users,id',
    ];

    public function mount($slug)
    {
        $this->project = Project::where('slug', $slug )->first();
        $this->name = $this->project->name;
        $this->description = $this->project->description;
        $this->start_date = $this->project->start_date->format('Y-m-d');
        $this->end_date = $this->project->end_date->format('Y-m-d');
        $this->status = $this->project->status;
        $this->user_id = $this->project->user_id;
    }

    public function updateProject()
    {
        $this->validate();

        $this->project->update([
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'user_id' => $this->user_id,
        ]);

        session()->flash('message', 'Projeto atualizado com sucesso!');

        return redirect()->route('admin.projects.show', $this->project->slug);
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.admin.projects.edit', compact('users'));
    }

}
