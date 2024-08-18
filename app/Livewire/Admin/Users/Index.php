<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Layout;

class Index extends Component
{
    #[Layout('layouts.dashboard')]

    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.admin.users.index');
    }
    private function showAlert($message, $type, $actions = null, $componentMethod = null)
    {
        $this->dispatch('showAlert', [
            'message' => $message,
            'type' => $type,
            'duration' => 5000,
            'actions' => $actions,
            'component' => $actions ? $this->getId() : null,
            'componentMethod' => $componentMethod,
        ]);
    }
}
