<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string|min:10',
    ];

    public function sendMessage()
    {
        $this->validate();

        // Logica de envio de email
        Mail::raw($this->message, function ($mail) {
            $mail->to('suporte@huilaplace.com')
                 ->subject('Novo contato de ' . $this->name)
                 ->from($this->email, $this->name);
        });

        session()->flash('message', 'Sua mensagem foi enviada com sucesso.');

        // Limpa o formulário
        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.pages.home.contact');
    }
}
