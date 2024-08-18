<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    #[Layout('layouts.dashboard')]

    public User $user;
    public $name;
    public $email;
    public $address;
    public $phone;
    public $profile_image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'profile_image' => 'nullable|image|max:1024',
    ];

    public function mount($username)
    {
        $this->user = User::where('username', $username)->firstOrFail();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->address = $this->user->address;
        $this->phone = $this->user->phone;
    }

    public function updateUser()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
        ]);

        if ($this->profile_image) {
            $imagePath = $this->profile_image->store('profile-images', 'public');
            $this->user->update(['profile_image' => $imagePath]);
        }
        $this->showAlert('Usuário atualizado com sucesso.', 'success');

    }

    public function render()
    {
        return view('livewire.admin.users.edit');
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
