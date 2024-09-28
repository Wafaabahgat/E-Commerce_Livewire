<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Categories Page - Story')]

class CategoriesPage extends Component
{
    public $categories = [];

    public function mount()
    {
        $this->categories =  Category::where(
            'is_active',
            1
        )->get();;
        // dd($this->categories);
    }
    public function render()
    {
        return view(
            'livewire.categories-page',
        );
    }
}