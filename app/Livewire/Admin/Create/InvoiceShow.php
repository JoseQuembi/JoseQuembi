<?php

namespace App\Livewire\Admin\Create;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\SystemSetting;
use Livewire\Attributes\Layout;

class InvoiceShow extends Component
{
    #[Layout('layouts.dashboard')]
    public $invoice;
    public $systemSettings;
    public $total = 0;

    public function mount($slug)
    {
        $this->invoice = Invoice::where('slug', $slug)->firstOrFail();
        $this->systemSettings = SystemSetting::first();
    }

    public function render()
    {
        return view('livewire.admin.create.invoice-show');
    }

    public function print()
    {
        $this->dispatch('print-invoice');
    }
}
