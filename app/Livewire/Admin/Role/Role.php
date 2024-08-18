<?php

namespace App\Livewire\Admin\Role;

use Livewire\Component;
use App\Models\Role as RoleModel;
use App\Models\Permission;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class Role extends Component
{
    use WithPagination;
    #[Layout('layouts.dashboard')]

    public $name;
    public $description;
    public $editingRoleId;
    public $selectedPermissions = [];

    protected $rules = [
        'name' => 'required|string|max:255|unique:roles,name',
        'description' => 'nullable|string|max:255',
    ];

    public function render()
    {
        $roles = RoleModel::with('permissions')->paginate(10);
        $permissions = Permission::all();
        return view('livewire.admin.role.role', compact('roles', 'permissions'));
    }

    public function createRole()
    {
        $this->validate();

        $role = RoleModel::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $role->permissions()->sync($this->selectedPermissions);
        $this->showAlert('Função criada com sucesso.', 'success');
        $this->reset();
    }

    public function editRole($id)
    {
        $role = RoleModel::findOrFail($id);
        $this->editingRoleId = $id;
        $this->name = $role->name;
        $this->description = $role->description;
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
    }

    public function updateRole()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $this->editingRoleId,
            'description' => 'nullable|string|max:255',
        ]);

        $role = RoleModel::findOrFail($this->editingRoleId);
        $role->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $role->permissions()->sync($this->selectedPermissions);
        $this->showAlert('Função atualizada com sucesso', 'success');
        $this->reset();
    }

    public function deleteRole($id)
    {
        $role = RoleModel::findOrFail($id);
        $role->delete();
        $this->showAlert('Função removida com exito', 'success');
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
