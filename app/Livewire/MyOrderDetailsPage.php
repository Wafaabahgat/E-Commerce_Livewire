<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('MyOrderDetails Page - Story')]

class MyOrderDetailsPage extends Component
{
    public function render()
    {
        return view('livewire.my-order-details-page');
    }
}