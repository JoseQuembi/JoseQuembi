<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $passwordStrength = 0;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ];
    }

    public function updatedPassword($value)
    {
        $this->passwordStrength = $this->calculatePasswordStrength($value);
    }

    protected function calculatePasswordStrength($password)
    {
        $strength = 0;

        if (strlen($password) >= 8) {
            $strength++;
        }
        if (preg_match('/[A-Z]/', $password)) {
            $strength++;
        }
        if (preg_match('/[a-z]/', $password)) {
            $strength++;
        }
        if (preg_match('/[0-9]/', $password)) {
            $strength++;
        }
        if (preg_match('/[\W]/', $password)) {
            $strength++;
        }

        return $strength;
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        if (in_array($this->email, ['josequembi@gmail.com', 'huilaplace@gmail.com'])) {
            $adminRole = Role::where('name', 'admin')->first();
            if ($adminRole) {
                $user->roles()->attach($adminRole);
            }
        } else {
            $defaultRole = Role::where('name', 'user')->first();
            if ($defaultRole) {
                $user->roles()->attach($defaultRole);
            }
        }

        auth()->login($user);

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
