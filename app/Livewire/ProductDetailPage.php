<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('ProductDetail Page - Story')]

class ProductDetailPage extends Component
{
    public function render()
    {
        return view('livewire.product-detail-page');
    }
}