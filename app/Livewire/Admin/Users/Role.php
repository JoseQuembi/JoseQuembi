<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Role as Model;
use Livewire\Attributes\Layout;

class Role extends Component
{
    #[Layout('layouts.dashboard')]
    public $user;
    public $roles;

    public function mount($username)
    {
        $this->user = User::where('username', $username)->firstOrFail();
        $this->roles = Model::all();
    }

    public function render()
    {
        return view('livewire.admin.users.role');
    }

}
