<?php

namespace App\Livewire\Admin\Create;

use Livewire\Component;
use App\Models\Payment;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class PaymentList extends Component
{
    use WithPagination;
    #[Layout('layouts.dashboard')]

    public $search = '';
    public $status = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id){
        $payment = Payment::find($id);
        $payment->delete();
        $this->showAlert('Factura eliminada do sistema', 'success');
    }

    public function render()
    {
        $payments = Payment::query()
            ->when($this->search, function ($query) {
                $query->whereHas('project', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(10);
        return view('livewire.admin.create.payment-list', compact('payments'));
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
