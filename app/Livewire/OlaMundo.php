<?php

namespace App\Livewire;

use Livewire\Component;

class OlaMundo extends Component
{
    public $message = 'Este é um conteúdo de exemplo para o modal.';
    public function render()
    {
        return view('livewire.ola-mundo');
    }
}
