<?php

namespace App\Livewire\Admin\Risks;

use App\Models\Risk;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    #[Layout('layouts.dashboard')]
    public Risk $risk;

    public function mount(Risk $risk)
    {
        $this->risk = $risk;
    }

    public function render()
    {
        return view('livewire.admin.risks.show');
    }
}
