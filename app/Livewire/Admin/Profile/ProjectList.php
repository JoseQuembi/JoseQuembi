<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\Project;

class ProjectList extends Component
{

    public $projects;

    public function mount()
    {
        $this->projects = auth()->user()->projects()->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.profile.project-list');
    }
}
