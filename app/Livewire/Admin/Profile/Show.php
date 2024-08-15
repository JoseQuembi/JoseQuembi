<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    #[Layout('layouts.dashboard')]
    public $user;
    public $profile;

    public function mount()
    {
        $this->user = auth()->user();
        $this->profile = $this->user->userProfile;
    }

    public function render()
    {
        return view('livewire.admin.profile.show');
    }
}
