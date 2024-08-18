<?php

namespace App\Livewire\Admin\Create;

use Livewire\Component;
use App\Models\Payment;
use Livewire\Attributes\Layout;

class PaymentDetails extends Component
{
    #[Layout('layouts.dashboard')]
    public Payment $payment;

    public function mount($slug)
    {
        $this->payment = Payment::where('slug', $slug)->first();
    }

    public function markInstallmentAsPaid($installmentId)
    {
        $installment = $this->payment->installments()->findOrFail($installmentId);
        $installment->update(['status' => 'paid']);
        $this->showAlert('Parcela Atualizada com sucesso', 'success');

        $this->updatePaymentStatus();
    }

    private function updatePaymentStatus()
    {
        $allPaid = $this->payment->installments()->where('status', 'pending')->doesntExist();
        $anyPaid = $this->payment->installments()->where('status', 'paid')->exists();

        if ($allPaid) {
            $this->payment->update(['status' => 'paid']);
            $this->showAlert('Registrou-se um pagamento geral da fatura', 'success');
        } elseif ($anyPaid) {
            $this->payment->update(['status' => 'partial']);
            $this->showAlert('Registrou-se um pagamento parcial da fatura', 'success');
        }

        $this->payment->refresh();
    }

    public function render()
    {
        return view('livewire.admin.create.payment-details', [
            'payment' => $this->payment->load('installments', 'invoice', 'project'),
        ]);
    }
}
