<?php

namespace App\Livewire\Admin\Create;

use App\Models\Client;
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
    public $installment = 1;
    public $due_date;
    public $client_id;

    protected $rules = [
        'project_id' => 'required|exists:projects,id',
        'total_amount' => 'required|numeric|min:0',
        'installment' => 'required|integer|min:1|max:3',
        'due_date' => 'required|date|after:today',
    ];

    public function mount()
    {
        $this->due_date = Carbon::tomorrow()->format('Y-m-d');
    }


    public function updatedProjectId()
    {
        $project = Project::find($this->project_id);
        if ($project) {
            $this->client_id = $project->client_id;
        }
    }

    public function createPayment()
    {
        $this->validate();

        $project = Project::findOrFail($this->project_id);
        $this->client_id = $project->client_id; // Atribuindo client_id a partir do projeto

        $payment = Model::create([
            'project_id' => $this->project_id,
            'total_amount' => $this->total_amount,
            'installment' => $this->installment,
            'status' => 'pending',
            'due_date' => $this->due_date,
            'client_id' => $this->client_id, // Definindo client_id
        ]);

        $this->generateInstallments($payment);
        $this->reset();
        session()->flash('message', 'Pagamento criado com sucesso.');
        return redirect()->route('admin.payments.show', $payment->slug);
    }


    private function generateInstallments(Model $payment)
    {
        $dueDate = Carbon::parse($payment->due_date);

        if ($payment->installment == 1) {
            $this->createInstallment($payment, $payment->total_amount, $dueDate);
        } elseif ($payment->installment == 2) {
            $this->createInstallment($payment, $payment->total_amount * 0.55, $dueDate);
            $this->createInstallment($payment, $payment->total_amount * 0.45, $dueDate->copy()->addMonth());
        } elseif ($payment->installment == 3) {
            $this->createInstallment($payment, $payment->total_amount * 0.40, $dueDate);
            $this->createInstallment($payment, $payment->total_amount * 0.30, $dueDate->copy()->addMonth());
            $this->createInstallment($payment, $payment->total_amount * 0.30, $dueDate->copy()->addMonths(2));
        }
    }

    private function createInstallment(Model $payment, $amount, $dueDate)
    {
        Installment::create([
            'payment_id' => $payment->id,
            'amount' => $amount,
            'due_date' => $dueDate,
            'status' => 'pending',
        ]);
    }

    public function render()
    {
        $clientes = Client::all();
        $projects = Project::orderBy('name', 'asc')->get();
        return view('livewire.admin.create.payment', compact('projects','clientes'));
    }
}
