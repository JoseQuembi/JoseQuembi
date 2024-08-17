<?php

namespace App\Livewire\Admin\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;

class Security extends Component
{
    #[Layout('layouts.profile')]
    public $current_password;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',
    ];

    public function updatePassword()
    {
        $this->validate();

        $user = User::find(Auth::user()->id);

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
