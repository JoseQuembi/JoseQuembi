<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Layout;

class Create extends Component
{
    #[Layout('layouts.dashboard')]
    public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ];

    public function submit()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'Usuário criado com sucesso.');

        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.admin.users.create');
    }
}
