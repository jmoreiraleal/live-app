<?php

namespace App\Livewire;

use Livewire\Component;

class MainComponent extends Component
{
    public function openModalWithExample()
    {
        $this->dispatch('openModal',componentName: 'ola-mundo');
    }
    public function render()
    {
        return view('livewire.main-component');
    }
}
