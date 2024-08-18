<?php

namespace App\Livewire\Admin\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    #[Layout('layouts.dashboard')]

    public $search = '';

    public function delete($id){
        $client = Client::find($id);
        $client->delete();
        $this->showAlert('Cliente eliminado com exito', 'success');
    }

    public function render()
    {
        $clients = Client::where('name', 'like', '%'.$this->search.'%')
                         ->orWhere('email', 'like', '%'.$this->search.'%')
                         ->paginate(10);

        return view('livewire.admin.clients.index', [
            'clients' => $clients
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
