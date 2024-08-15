<?php

namespace App\Livewire\Pages\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.pages.home.dashboard');
    }
}
