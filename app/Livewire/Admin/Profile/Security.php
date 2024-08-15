<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;

class Security extends Component
{
    #[Layout('layouts.dashboard')]
    public $current_password;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required'
    ];

    public function updatePassword()
    {
        $this->validate();

        $user = auth()->user();

        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'A senha atual está incorreta.');
            return;
        }

        $user->update([
            'password' => Hash::make($this->password)
        ]);

        $this->reset(['current_password', 'password', 'password_confirmation']);

        session()->flash('message', 'Senha atualizada com sucesso.');
    }

    public function render()
    {
        return view('livewire.admin.profile.security');
    }
}
