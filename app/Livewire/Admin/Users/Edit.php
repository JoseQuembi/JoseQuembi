<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    #[Layout('layouts.dashboard')]
    public $user;
    public $name;
    public $email;

    public function mount($username)
    {
        $this->user = User::where('username', $username)->firstOrFail();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
    ];

    public function submit()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Usuário atualizado com sucesso.');

        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.admin.users.edit');
    }
}
