<?php

namespace App\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $category, $product, $productSelectedQuantity;
    public function colorSelected($productColorId)
    {
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productSelectedQuantity = $productColor->quantity;
        if ($this->productSelectedQuantity == 0) {
            $this->productSelectedQuantity = 'outOfStock';
        }
    }
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
