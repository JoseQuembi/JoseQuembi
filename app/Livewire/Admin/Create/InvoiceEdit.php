<?php

namespace App\Livewire\Admin\Create;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\Client;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

class InvoiceEdit extends Component
{
    #[Layout('layouts.dashboard')]
    public $invoice;
    public $project_id;
    public $client_id;
    public $invoice_number;
    public $issue_date;
    public $due_date;
    public $total_amount;
    public $items = [];
    public $notes;

    protected $rules = [
        'project_id' => 'required|exists:projects,id',
        'client_id' => 'required|exists:clients,id',
        'invoice_number' => 'required|unique:invoices,invoice_number,{{invoice.id}}',
        'issue_date' => 'required|date',
        'due_date' => 'required|date|after_or_equal:issue_date',
        'total_amount' => 'required|numeric|min:0',
        'items' => 'required|array|min:1',
        'items.*.description' => 'required|string',
        'items.*.quantity' => 'required|numeric|min:1',
        'items.*.unit_price' => 'required|numeric|min:0',
        'notes' => 'nullable|string',
    ];

    public function mount($slug)
    {
        $this->invoice = Invoice::where('slug', $slug)->first();
        $this->project_id = $this->invoice->project_id;
        $this->client_id = $this->invoice->client_id;
        $this->invoice_number = $this->invoice->invoice_number;
        $this->issue_date = Carbon::parse($this->invoice->issue_date)->format('Y-m-d');
        $this->due_date = Carbon::parse($this->invoice->due_date)->format('Y-m-d');
        $this->total_amount = $this->invoice->total_amount;
        $this->items = $this->invoice->items->toArray();
        $this->notes = $this->invoice->notes;
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

    public function updateInvoice()
    {
        $this->validate();

        $this->invoice->save([
            'project_id' => $this->project_id,
            'client_id' => $this->client_id,
            'invoice_number' => $this->invoice_number,
            'issue_date' => $this->issue_date,
            'due_date' => $this->due_date,
            'total_amount' => $this->total_amount,
            'notes' => $this->notes,
            'status' => 'pending',
        ]);

        $this->invoice->items()->delete();

        foreach ($this->items as $item) {
            $this->invoice->items()->create([
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
            ]);
        }

        session()->flash('message', 'Fatura atualizada com sucesso.');
        return redirect()->route('admin.invoices.show', $this->invoice->slug);
    }

    public function render()
    {
        $projects = Project::orderBy('name', 'asc')->get();
        $clients = Client::orderBy('name', 'asc')->get();

        return view('livewire.admin.create.invoice-edit', compact('projects', 'clients'));
    }
}
