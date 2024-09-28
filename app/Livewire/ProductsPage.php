<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products Page - Story')]

class ProductsPage extends Component
{
    use WithPagination;

    public $categories = [];
    public $brands = [];

    public function mount()
    {
        $this->categories = Category::where('is_active', 1)->get(['id', 'name', 'slug']);
        $this->brands = Brand::where('is_active', 1)->get(['id', 'name', 'slug']);
    }
    public function render()
    {
        $products = Product::query()->where('is_active', 1);

        return view('livewire.products-page', [
            'products' => $products->paginate(6),
        ]);
    }
}