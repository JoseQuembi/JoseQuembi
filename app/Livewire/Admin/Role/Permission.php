<?php

namespace App\Livewire\Admin\Role;

use Livewire\Component;
use App\Models\Permission as PermissionModel;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class Permission extends Component
{
    use WithPagination;
    #[Layout('layouts.dashboard')]

    public $name;
    public $description;
    public $editingPermissionId;

    protected $rules = [
        'name' => 'required|string|max:255|unique:permissions,name',
        'description' => 'nullable|string|max:255',
    ];

    public function render()
    {
        $permissions = PermissionModel::paginate(10);
        return view('livewire.admin.role.permission', compact('permissions'));
    }

    public function createPermission()
    {
        $this->validate();

        PermissionModel::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset(['name', 'description']);
        $this->showAlert('Permissão criada com sucesso.', 'success');
    }

    public function editPermission($id)
    {
        $permission = PermissionModel::findOrFail($id);
        $this->editingPermissionId = $id;
        $this->name = $permission->name;
        $this->description = $permission->description;
    }

    public function updatePermission()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $this->editingPermissionId,
            'description' => 'nullable|string|max:255',
        ]);

        $permission = PermissionModel::findOrFail($this->editingPermissionId);
        $permission->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset(['editingPermissionId', 'name', 'description']);
        $this->showAlert('Permissão atualizada com sucesso.', 'success');
    }

    public function deletePermission($id)
    {
        $permission = PermissionModel::findOrFail($id);
        $permission->delete();
        $this->showAlert('Permissão excluída com sucesso', 'success');
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
