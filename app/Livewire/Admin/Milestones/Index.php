<?php

namespace App\Livewire\Admin\Milestones;

use Livewire\Component;
use App\Models\Milestone;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    #[Layout('layouts.dashboard')]

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $milestones = Milestone::where('name', 'like', '%'.$this->search.'%')
            ->orderBy('due_date')
            ->paginate(10);

        return view('livewire.admin.milestones.index', compact('milestones'));
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
