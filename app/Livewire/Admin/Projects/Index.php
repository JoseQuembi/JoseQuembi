<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;
use Livewire\Attributes\Layout;

class Index extends Component
{
    use WithPagination;
    #[Layout('layouts.dashboard')]

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id){
        $projeto = Project::findOrFail($id);
        $projeto->delete();
        $this->showAlert('Projeto Eliminado com exito', 'success');
    }

    public function render()
    {
        $projects = Project::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.projects.index', [
            'projects' => $projects,
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
