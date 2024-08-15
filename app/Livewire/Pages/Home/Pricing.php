<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;

class Pricing extends Component
{
    public $plans = [];

    public function mount()
    {
        $this->plans = $this->getDummyPlans();
    }

    private function getDummyPlans()
    {
        return [
            [
                'name' => 'Básico',
                'price' => '29.99',
                'duration' => 'mês',
                'features' => [
                    'Acesso a recursos básicos',
                    'Suporte por email',
                    '1 projeto incluído',
                ],
                'cta' => 'Escolher Plano'
            ],
            [
                'name' => 'Profissional',
                'price' => '59.99',
                'duration' => 'mês',
                'features' => [
                    'Acesso a todos os recursos',
                    'Suporte prioritário',
                    '5 projetos incluídos',
                    'Integrações avançadas',
                ],
                'cta' => 'Escolher Plano'
            ],
            [
                'name' => 'Empresarial',
                'price' => '99.99',
                'duration' => 'mês',
                'features' => [
                    'Recursos personalizados',
                    'Suporte dedicado',
                    'Projetos ilimitados',
                    'Consultoria exclusiva',
                ],
                'cta' => 'Escolher Plano'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.pages.home.pricing');
    }
}
