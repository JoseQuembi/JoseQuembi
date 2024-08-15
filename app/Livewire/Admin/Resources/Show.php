<?php

namespace App\Livewire\Admin\Resources;

use Livewire\Component;
use App\Models\Resource;
use Livewire\Attributes\Layout;

class Show extends Component
{
    #[Layout('layouts.dashboard')]
    public Resource $resource;

    public function mount($slug)
    {
        $this->resource = Resource::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.admin.resources.show');
    }
}
