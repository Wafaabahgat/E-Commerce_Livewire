<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Checkout Page - Story')]

class CheckPage extends Component
{
    public function render()
    {
        return view('livewire.check-page');
    }
}