<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Layout;

class Show extends Component
{
    #[Layout('layouts.dashboard')]
    public User $user;

    public function mount($username)
    {
        $this->user = User::where('username', $username)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.admin.users.show', [
            'user' => $this->user,
            'roles' => $this->user->roles,
            'projects' => $this->user->projects,
            'tasks' => $this->user->tasks,
        ]);
    }
}
