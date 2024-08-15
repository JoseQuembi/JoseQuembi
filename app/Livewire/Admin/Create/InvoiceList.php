<?php

namespace App\Livewire\Admin\Create;

use Livewire\Component;
use App\Models\Invoice;
use Livewire\Attributes\Layout;

class InvoiceList extends Component
{
    #[Layout('layouts.dashboard')]
    public $invoices;

    public function mount()
    {
        $this->invoices = Invoice::with('client', 'project')->orderBy('issue_date', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.admin.create.invoice-list');
    }

    public function deleteInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        session()->flash('message', 'Fatura excluída com sucesso.');
        $this->mount(); // Recarrega a lista de faturas
    }
}
