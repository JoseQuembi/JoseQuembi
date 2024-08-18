<?php

namespace App\Livewire\Admin\Issues;

use App\Models\Issue;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    #[Layout('layouts.dashboard')]
    public Issue $issue;

    public function mount(Issue $issue)
    {
        $this->issue = $issue;
    }

    public function render()
    {
        return view('livewire.admin.issues.show');
    }
}
