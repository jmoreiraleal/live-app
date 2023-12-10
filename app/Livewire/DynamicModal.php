<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class DynamicModal extends Component
{
    public $isOpen = false;
    public $componentName = null;

    #[On('openModal')]
    public function showModal($componentName)
    {

        $this->componentName = $componentName;
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->componentName = null;
    }


    public function render()
    {
        return view('livewire.dynamic-modal');
    }

}
