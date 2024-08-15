<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\Project;
use Livewire\Attributes\Layout;

class Show extends Component
{
    #[Layout('layouts.dashboard')]
    public Project $project;

    public function mount($slug)
    {
        $this->project = Project::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.admin.projects.show');
    }
}
