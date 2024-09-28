<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home Page - Story')]

class HomePage extends Component
{

    public $categories = [];
    public $brands = [];
    
    public function mount()
    {
        $this->categories = Category::where(
            'is_active',
            1
        )->get();;
        $this->brands = Brand::where(
            'is_active',
            1
        )->get();
        // dd($this->categories);
    }

    public function render()
    {
        return view('livewire.home-page',);
    }
}