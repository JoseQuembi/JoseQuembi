<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;

class Overview extends Component
{
    public $statistics = [];
    public $highlights = [];

    public function mount()
    {
        $this->statistics = $this->getStatistics();
        $this->highlights = $this->getHighlights();
    }

    private function getStatistics()
    {
        return [
            'users' => 1500,
            'projects' => 120,
            'tasks_completed' => 3500,
            'active_projects' => 75,
        ];
    }

    private function getHighlights()
    {
        return [
            [
                'title' => 'Novo Lançamento de Produto',
                'description' => 'Nosso novo produto já está disponível! Confira as novidades.',
                'date' => '2024-08-01',
            ],
            [
                'title' => 'Conferência Anual',
                'description' => 'Participe da nossa conferência anual para conhecer as últimas tendências.',
                'date' => '2024-09-15',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.home.overview');
    }
}
