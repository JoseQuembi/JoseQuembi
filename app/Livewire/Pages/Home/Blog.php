<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;

class Blog extends Component
{
    public $posts = [];

    public function mount()
    {
        $this->posts = $this->getDummyPosts();
    }

    private function getDummyPosts()
    {
        return [
            [
                'title' => 'Explorando o Mundo do Desenvolvimento Web',
                'excerpt' => 'Descubra as últimas tendências e tecnologias no mundo do desenvolvimento web.',
                'author' => 'José Quembi',
                'date' => '2024-08-15',
            ],
            [
                'title' => 'Guia Completo para Iniciantes em Laravel',
                'excerpt' => 'Aprenda os fundamentos do Laravel e comece a construir suas próprias aplicações.',
                'author' => 'Emília Sousa',
                'date' => '2024-08-10',
            ],
            [
                'title' => 'Como Melhorar a Segurança de Suas Aplicações',
                'excerpt' => 'Dicas e truques para garantir a segurança dos seus projetos.',
                'author' => 'Lucas Almeida',
                'date' => '2024-08-08',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.home.blog');
    }
}
