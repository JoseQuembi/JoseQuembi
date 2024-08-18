<?php

namespace App\Livewire\Admin\Milestones;

use Livewire\Component;
use App\Models\Milestone;
use Livewire\Attributes\Layout;

class Show extends Component
{
    #[Layout('layouts.dashboard')]
    public Milestone $milestone;

    public function mount(Milestone $milestone)
    {
        $this->milestone = $milestone;
    }

    public function render()
    {
        return view('livewire.admin.milestones.show');
    }
}
