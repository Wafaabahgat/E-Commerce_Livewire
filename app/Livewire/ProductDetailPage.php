<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Product Detail - Story')]

class ProductDetailPage extends Component
{
    public $slug;
    public $product;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->product = Product::where('slug', $this->slug)->firstOrFail();

        // فك ترميز الصور إذا كانت مشفرة كـ JSON
        if (is_string($this->product->images)) {
            $this->product->images = json_decode($this->product->images, true);
        }
    }

    public function render()
    {
        return view('livewire.product-detail-page', [
            'product' => $this->product,
        ]);
    }
}