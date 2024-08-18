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
        $this->showAlert('Fatura excluida com sucesso', 'success');
        $this->mount(); // Recarrega a lista de faturas
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
