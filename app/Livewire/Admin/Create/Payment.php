<?php

namespace App\Livewire\Admin\Create;

use Livewire\Component;
use App\Models\Payment as Model;
use App\Models\Project;
use App\Models\Installment;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

class Payment extends Component
{
    #[Layout('layouts.dashboard')]
    public $project_id;
    public $total_amount;
    public $installments = 1;
    public $due_date;

    protected $rules = [
        'project_id' => 'required|exists:projects,id',
        'total_amount' => 'required|numeric|min:0',
        'installments' => 'required|integer|min:1|max:3',
        'due_date' => 'required|date|after:today',
    ];
    public function createPayment()
    {
        $this->validate();

        $payment = Model::create([
            'project_id' => $this->project_id,
            'total_amount' => $this->total_amount,
            'installments' => $this->installments,
            'status' => 'pending',
            'due_date' => $this->due_date,
        ]);

        $installmentAmount = $this->total_amount / $this->installments;
        $dueDate = Carbon::parse($this->due_date);

        for ($i = 0; $i < $this->installments; $i++) {
            Installment::create([
                'payment_id' => $payment->id,
                'amount' => $installmentAmount,
                'due_date' => $dueDate->copy()->addMonths($i),
                'status' => 'pending',
            ]);
        }

        session()->flash('message', 'Pagamento criado com sucesso.');
        return redirect()->route('admin.payments.show', $payment->id);
    }

    public function render()
    {
        $projects = Project::orderBy('name','asc')->get();
        return view('livewire.admin.create.payment', compact('projects'));
    }
}
