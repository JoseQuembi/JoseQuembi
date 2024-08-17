<?php

namespace App\Livewire;

use Livewire\Component;

class UserMenu extends Component
{
    public function render()
    {
        return view('livewire.user-menu');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
