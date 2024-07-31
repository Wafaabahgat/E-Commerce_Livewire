<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Products Page - Story')]

class ProductsPage extends Component
{
    public function render()
    {
        $products = Product::where(
            'is_active',
            1
        )->get();
        
        return view('livewire.products-page', [
            'products' => $products
        ]);
    }
}