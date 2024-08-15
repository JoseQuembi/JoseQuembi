<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\SystemSetting;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

class Configure extends Component
{
    use WithFileUploads;
    #[Layout('layouts.dashboard')]

    public $system_name;
    public $tagline;
    public $description;
    public $email;
    public $phone;
    public $address;
    public $logo;
    public $favicon;
    public $social_facebook;
    public $social_twitter;
    public $social_linkedin;
    public $social_instagram;
    public $footer_text;

    public function mount()
    {
        $settings = SystemSetting::first();
        if ($settings) {
            $this->fill($settings->toArray());
        }
    }

    public function save()
    {
        $this->validate([
            'system_name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|max:1024',
            'favicon' => 'nullable|image|max:1024',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'footer_text' => 'nullable|string',
        ]);

        $settings = SystemSetting::firstOrNew();
        $settings->fill($this->except(['logo', 'favicon']));

        if ($this->logo) {
            $settings->logo = $this->logo->store('logos', 'public');
        }

        if ($this->favicon) {
            $settings->favicon = $this->favicon->store('favicons', 'public');
        }

        $settings->save();

        session()->flash('message', 'Configurações salvas com sucesso!');
        return redirect()->route('admin.settings.index');
    }

    public function render()
    {
        return view('livewire.admin.settings.configure');
    }
}
