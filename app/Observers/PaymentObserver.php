<?php

namespace App\Observers;

use App\Models\Payment;
use App\Models\Invoice;

class PaymentObserver
{
    public function created(Payment $payment)
    {
        Invoice::create([
            'payment_id' => $payment->id,
            'project_id' => $payment->project_id,
            'client_id' => $payment->client_id, // Deve ter um valor
            'invoice_number' => 'INV-' . str_pad($payment->id, 6, '0', STR_PAD_LEFT),
            'issue_date' => now(),
            'due_date' => $payment->due_date,
            'total_amount' => $payment->total_amount,
            'status' => 'pending',
            'notes' => null,
        ]);
    }

}
