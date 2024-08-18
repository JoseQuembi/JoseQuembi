<?php

namespace App\Livewire\Admin\Resources;

use Livewire\Component;
use App\Models\Resource;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    #[Layout('layouts.dashboard')]

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $resources = Resource::where('name', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.resources.index', [
            'resources' => $resources,
        ]);
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
