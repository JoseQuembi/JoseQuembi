<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;

class Platforms extends Component
{
    public $platforms = [];

    public function mount()
    {
        $this->platforms = $this->getDummyPlatforms();
    }

    private function getDummyPlatforms()
    {
        return [
            [
                'name' => 'Web',
                'description' => 'Acesse nosso sistema diretamente de qualquer navegador moderno.',
                'icon' => asset('img/default/empty.png'),
            ],
            [
                'name' => 'iOS',
                'description' => 'Nosso aplicativo está disponível na App Store para dispositivos iOS.',
                'icon' => asset('img/default/empty.png'),
            ],
            [
                'name' => 'Android',
                'description' => 'Baixe nosso aplicativo para Android diretamente da Google Play.',
                'icon' => asset('img/default/empty.png'),
            ],
            [
                'name' => 'Windows',
                'description' => 'Utilize nosso sistema em desktops e laptops com Windows.',
                'icon' => asset('img/default/empty.png'),
            ],
            [
                'name' => 'macOS',
                'description' => 'Compatível com dispositivos macOS, disponível na Mac App Store.',
                'icon' => asset('img/default/empty.png'),
            ],
            [
                'name' => 'Linux',
                'description' => 'Nosso sistema é suportado em diversas distribuições Linux.',
                'icon' => asset('img/default/empty.png'),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.home.platforms');
    }
}
