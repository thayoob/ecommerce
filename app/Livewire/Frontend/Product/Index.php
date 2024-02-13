<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandInputs = [];
    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
    ];

    public function mount($category)
    {
        $this->category = $category;
        $this->applyFilter(); // Apply filter when component is mounted
    }

    public function applyFilter()
    {
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brandInputs, function ($q) {
                $q->whereIn('brand', $this->brandInputs);
            })
            ->where('status', '0') // I assume this is where you apply the status filter
            ->get();
    }

    public function render()
    {
        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
