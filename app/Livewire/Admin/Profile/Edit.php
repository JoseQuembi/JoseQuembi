<?php

namespace App\Livewire\Admin\Profile;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    #[Layout('layouts.dashboard')]
    public $user;
    public $profile;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $bio;
    public $website;
    public $profile_image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'bio' => 'nullable|string|max:1000',
        'website' => 'nullable|url|max:255',
        'profile_image' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $this->user = auth()->user();
        $this->profile = $this->user->userProfile;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->address = $this->user->address;
        $this->bio = $this->profile->bio ?? '';
        $this->website = $this->profile->website ?? '';
    }

    public function updateProfile()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        if ($this->profile_image) {
            $imagePath = $this->profile_image->store('profile-images', 'public');
            $path = asset(Storage::url($imagePath));
            $this->user->update(['profile_image' => $path]);
        }

        $this->user->userProfile()->updateOrCreate(
            ['user_id' => $this->user->id],
            [
                'bio' => $this->bio,
                'website' => $this->website,
            ]
        );

        session()->flash('message', 'Perfil atualizado com sucesso.');
    }

    public function render()
    {
        return view('livewire.admin.profile.edit');
    }
}
