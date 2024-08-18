<?php

namespace App\Livewire\Admin\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    #[Layout('layouts.dashboard')]
    public Client $client;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $company_name;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'company_name' => 'nullable|string|max:255',
    ];

    public function mount($slug)
    {
        $this->client = Client::where('username', $slug)->firstOrFail();
        $this->name = $this->client->name;
        $this->email = $this->client->email;
        $this->phone = $this->client->phone;
        $this->address = $this->client->address;
        $this->company_name = $this->client->company_name;
    }

    public function updateClient()
    {
        $this->validate();

        $this->client->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'company_name' => $this->company_name,
        ]);
        $this->showAlert('Cliente atualizado com sucesso', 'success');
    }

    public function render()
    {
        return view('livewire.admin.clients.edit');
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
