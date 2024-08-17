<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class Show extends Component
{
    #[Layout('layouts.profile')]
    public $user;
    public $recentProjects;
    public $recentTasks;
    public $activityLog;

    public function mount()
    {
        $this->user = User::find(Auth::user()->id);
        $this->recentProjects = $this->user->projects()->latest()->take(5)->get();
        $this->recentTasks = $this->user->tasks()->latest()->take(5)->get();
        $this->activityLog = $this->getActivityLog();
    }

    public function render()
    {
        return view('livewire.admin.profile.show');
    }

    private function getActivityLog()
    {
        // Simulação de log de atividades
        return collect([
            ['type' => 'project_created', 'description' => 'Criou o projeto X', 'date' => now()->subDays(2)],
            ['type' => 'task_completed', 'description' => 'Completou a tarefa Y', 'date' => now()->subDays(1)],
            // Adicione mais itens conforme necessário
        ]);
    }
}
