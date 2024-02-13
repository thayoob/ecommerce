<?php

namespace App\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $category, $product;
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view(
            'livewire.frontend.product.view',
            [
                'category' => $this->category,
                'product' => $this->product
            ]
        );
    }
}
