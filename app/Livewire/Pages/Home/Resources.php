<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;

class Resources extends Component
{
    public $resources = [];

    public function mount()
    {
        $this->resources = $this->getDummyResources();
    }

    private function getDummyResources()
    {
        return [
            [
                'title' => 'Guia Completo do Laravel',
                'description' => 'Aprenda como usar o Laravel com este guia abrangente.',
                'date' => '2024-07-25',
                'link' => '#'
            ],
            [
                'title' => 'Introdução ao Desenvolvimento Web',
                'description' => 'Um tutorial para iniciantes sobre os fundamentos do desenvolvimento web.',
                'date' => '2024-08-05',
                'link' => '#'
            ],
            [
                'title' => 'Documentação da API RESTful',
                'description' => 'Explore as funcionalidades de nossa API com esta documentação detalhada.',
                'date' => '2024-06-30',
                'link' => '#'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.home.resources');
    }
}
