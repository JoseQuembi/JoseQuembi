<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;

class Works extends Component
{
    public $works = [];

    public function mount()
    {
        $this->works = $this->getDummyWorks();
    }

    private function getDummyWorks()
    {
        return [
            [
                'title' => 'Desenvolvimento de Aplicativo Móvel',
                'description' => 'Desenvolvimento de um aplicativo móvel para gerenciamento de tarefas.',
                'status' => 'Em Andamento',
                'date' => '2024-08-01',
            ],
            [
                'title' => 'Website para Restaurante',
                'description' => 'Criação de um site moderno e responsivo para um restaurante local.',
                'status' => 'Concluído',
                'date' => '2024-07-20',
            ],
            [
                'title' => 'Integração de API para E-commerce',
                'description' => 'Implementação de APIs de pagamento e envio para plataforma de e-commerce.',
                'status' => 'Em Andamento',
                'date' => '2024-08-10',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.home.works');
    }
}
