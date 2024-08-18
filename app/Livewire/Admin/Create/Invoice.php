<?php

namespace App\Livewire\Admin\Create;

use Livewire\Component;
use App\Models\Invoice as Model;
use App\Models\Project;
use App\Models\Client;
use App\Models\Installment; // Importar o modelo de Installment
use Carbon\Carbon;
use Livewire\Attributes\Layout;

class Invoice extends Component
{
    #[Layout('layouts.dashboard')]
    public $project_id;
    public $client_id;
    public $installment_id; // Novo campo para a parcela
    public $invoice_number;
    public $issue_date;
    public $due_date;
    public $total_amount = 0;
    public $items = [];
    public $notes;

    protected $rules = [
        'project_id' => 'required|exists:projects,id',
        'client_id' => 'required|exists:clients,id',
        'installment_id' => 'nullable|exists:installments,id', // Regra para o novo campo
        'invoice_number' => 'required|unique:invoices,invoice_number',
        'issue_date' => 'required|date',
        'due_date' => 'required|date|after_or_equal:issue_date',
        'total_amount' => 'required|numeric|min:0',
        'items' => 'required|array|min:1',
        'items.*.description' => 'required|string',
        'items.*.quantity' => 'required|numeric|min:1',
        'items.*.unit_price' => 'required|numeric|min:0',
        'notes' => 'nullable|string',
    ];

    public function mount()
    {
        $this->issue_date = Carbon::now()->format('Y-m-d');
        $this->due_date = Carbon::now()->addDays(30)->format('Y-m-d');
        $this->addItem();
    }

    public function addItem()
    {
        $this->items[] = [
            'description' => '',
            'quantity' => 1,
            'unit_price' => 0,
        ];
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
        $this->calculateTotal();
        $this->showAlert('Item removido com sucesso', 'success');
    }

    public function calculateTotal()
    {
        $this->total_amount = collect($this->items)->sum(function ($item) {
            return $item['quantity'] * $item['unit_price'];
        });
    }

    public function updatedItems()
    {
        $this->calculateTotal();
    }

    public function createInvoice()
    {
        $this->validate();

        $invoice = Model::create([
            'project_id' => $this->project_id,
            'client_id' => $this->client_id,
            'installment_id' => $this->installment_id, // Associar a parcela
            'invoice_number' => $this->invoice_number,
            'issue_date' => $this->issue_date,
            'due_date' => $this->due_date,
            'total_amount' => $this->total_amount,
            'notes' => $this->notes,
            'status' => 'pending',
        ]);

        foreach ($this->items as $item) {
            $invoice->items()->create([
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
            ]);
        }
        $this->showAlert('Uma nova fatura foi adicionada ao sistema', 'success');
        return redirect()->route('admin.invoices.show', $invoice->id);
    }

    public function render()
    {
        $projects = Project::orderBy('name', 'asc')->get();
        $clients = Client::orderBy('name', 'asc')->get();
        $installments = Installment::orderBy('due_date', 'asc')->get(); // Obter as parcelas

        return view('livewire.admin.create.invoice', compact('projects', 'clients', 'installments'));
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
