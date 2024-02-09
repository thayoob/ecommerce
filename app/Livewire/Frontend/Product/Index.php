<?php

namespace App\Livewire\Frontend\Product;

use Livewire\Component;

class Index extends Component
{
    public $products, $category;
    public function mount($products, $category)
    {
        $this->products = $products;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
