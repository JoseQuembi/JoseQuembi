<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectList extends Component
{

    public $projects;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->projects = $user->projects()->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.profile.project-list');
    }
}
