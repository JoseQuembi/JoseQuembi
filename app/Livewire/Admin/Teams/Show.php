<?php

namespace App\Livewire\Admin\Teams;

use App\Models\Team;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    #[Layout('layouts.dashboard')]
    public Team $team;

    public function mount(Team $team)
    {
        $this->team = $team;
    }

    public function render()
    {
        return view('livewire.admin.teams.show');
    }
}
