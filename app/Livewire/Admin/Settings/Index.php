<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\SystemSetting;
use Livewire\Attributes\Layout;

class Index extends Component
{
    #[Layout('layouts.dashboard')]
    public $systemSettings;

    public function mount()
    {
        $this->systemSettings = SystemSetting::first();
    }

    public function render()
    {
        return view('livewire.admin.settings.index');
    }
}
