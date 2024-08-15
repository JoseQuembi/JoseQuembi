<?php

namespace App\Livewire\Admin\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\Attributes\Layout;

class Create extends Component
{
    #[Layout('layouts.dashboard')]
    public $name;
    public $email;
    public $phone;
    public $address;
    public $company_name;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:clients,email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'company_name' => 'nullable|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        Client::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'company_name' => $this->company_name,
        ]);

        session()->flash('message', 'Client created successfully.');
        return redirect()->route('admin.clients.index');
    }

    public function render()
    {
        return view('livewire.admin.clients.create');
    }
}
