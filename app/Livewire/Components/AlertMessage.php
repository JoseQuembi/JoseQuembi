<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AlertMessage extends Component
{
    public $alerts = [];

    protected $listeners = ['showAlert', 'removeAlert'];

    public function mount()
    {
        $this->checkSessionAlert();
    }

    public function checkSessionAlert()
    {
        if (session()->has('alert')) {
            $this->showAlert(session('alert'));
            session()->forget('alert');
        }
    }

    public function showAlert($data)
    {
        $alert = [
            'id' => uniqid(),
            'message' => $data['message'],
            'type' => $data['type'] ?? 'info',
            'duration' => $data['duration'] ?? 5000,
            'actions' => $data['actions'] ?? null,
            'component' => $data['component'] ?? null,
            'componentMethod' => $data['componentMethod'] ?? null,
        ];
        $this->alerts[] = $alert;
        $this->dispatch('alert-added', $alert);
    }

    public $alertIcons = [
        'success' => 'check-circle',
        'info' => 'information-circle',
        'warning' => 'exclamation-triangle',
        'error' => 'x-circle',
    ];

    public $alertColors = [
        'success' => 'text-green-500',
        'info' => 'text-blue-500',
        'warning' => 'text-yellow-500',
        'error' => 'text-red-500',
    ];

    public function removeAlert($alertId)
    {
        $this->alerts = array_values(array_filter($this->alerts, function ($alert) use ($alertId) {
            return $alert['id'] !== $alertId;
        }));
    }

    public function handleAlertAction($alertId, $actionName)
    {
        $alert = collect($this->alerts)->firstWhere('id', $alertId);

        if ($alert && $alert['component'] && $alert['componentMethod']) {
            $this->dispatch($alert['componentMethod'], [
                'alertId' => $alertId,
                'action' => $actionName
            ])->to($alert['component']);
        } else {
            $this->dispatch('alert-action', [
                'alertId' => $alertId,
                'action' => $actionName
            ]);
        }

        $this->removeAlert($alertId);
    }

    public function render()
    {
        return view('livewire.components.alert-message');
    }
}
