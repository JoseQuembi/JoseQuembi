<?php

namespace App\Livewire\Admin\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    use WithFileUploads;
    #[Layout('layouts.profile')]

    public $user;
    public $name;
    public $email;
    public $bio;
    public $website;
    public $address;
    public $phone;
    public $newProfileImage;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'bio' => 'nullable|string|max:1000',
        'website' => 'nullable|url',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'newProfileImage' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->bio = $this->user->userProfile->bio ?? '';
        $this->website = $this->user->userProfile->website ?? '';
        $this->address = $this->user->address;
        $this->phone = $this->user->phone;
    }

    public function updateProfile()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
        ]);

        $this->user->userProfile()->updateOrCreate(
            ['user_id' => $this->user->id],
            [
                'bio' => $this->bio,
                'website' => $this->website,
            ]
        );

        if ($this->newProfileImage) {
            $imagePath = $this->newProfileImage->store('profile-images', 'public');
            $this->user->update(['profile_image' => $imagePath]);
        }
        $this->showAlert('Seu perfil foi atualizado', 'success');
    }

    public function render()
    {
        return view('livewire.admin.profile.edit');
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
