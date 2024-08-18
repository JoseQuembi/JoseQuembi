<?php

namespace App\Livewire\Admin\Clients;

use Livewire\Component;
use App\Models\Client;
use Livewire\Attributes\Layout;

class Show extends Component
{
    #[Layout('layouts.dashboard')]
    public Client $client;

    public function mount($slug)
    {
        $this->client = Client::where('username', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.admin.clients.show', [
            'projects' => $this->client->projects()->latest()->take(5)->get(),
            'invoices' => $this->client->invoices()->latest()->take(5)->get(),
        ]);
    }
}
