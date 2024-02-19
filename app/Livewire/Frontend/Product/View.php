<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $productSelectedQuantity, $quantityCount = 1, $productColorId;
    public function addToWishList($productId)
    {
        // dd($productId);
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already Added to Wishlist');
                $this->dispatch('message', [
                    'text' => 'Already Added to Wishlist',
                    'type' => 'warning',
                    'status' => 200
                ]);
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->dispatch('wishlistAddedUpdated');
                session()->flash('message', 'Wishlist Added Successfully');
                $this->dispatch('message', [
                    'text' => 'Wishlist Added Successfully',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            session()->flash('message', 'Please Login to Continue');
            $this->dispatch('message', [
                'text' => 'Please Login to Continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productSelectedQuantity = $productColor->quantity;
        if ($this->productSelectedQuantity == 0) {
            $this->productSelectedQuantity = 'outOfStock';
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            // dd('im in');
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                //check for product color qunatity
                if ($this->product->productColors()->count() > 1) {
                    // dd('im product color inside');
                    if ($this->productSelectedQuantity != NULL) {
                        if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()
                        ) {
                            session()->flash('message', 'Product Already Added');
                            $this->dispatch('message', [
                                'text' => 'Product Already Added',
                                'type' => 'warning',
                                'status' => 200
                            ]);
                        } else {

                            // dd('color sectect');
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity > $this->quantityCount) {
                                    // dd('add to cart with colour');
                                    //insert product on with color
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount,
                                    ]);
                                    session()->flash('message', 'Product Added to Cart Successfully');
                                    $this->dispatch('message', [
                                        'text' => 'Product Added to Cart Successfully',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                } else {
                                    session()->flash('message', 'Only' . $productColor->quantity . 'Quantity Available');
                                    $this->dispatch('message', [
                                        'text' => 'Only' . $productColor->quantity . 'Quantity Available',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            } else {
                                session()->flash('message', 'Out Of Stock');
                                $this->dispatch('message', [
                                    'text' => 'Out of stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    } else {
                        session()->flash('message', 'Select Your Product Color');
                        $this->dispatch('message', [
                            'text' => 'Select Your Product Color',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        session()->flash('message', 'Product Already Added');
                        $this->dispatch('message', [
                            'text' => 'Product Already Added',
                            'type' => 'warning',
                            'status' => 200
                        ]);
                    } else {

                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity > $this->quantityCount) {
                                // dd('iam add  to without');
                                //insert product on cart in without color
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount,
                                ]);
                                session()->flash('message', 'Product Added to Cart Successfully');
                                $this->dispatch('message', [
                                    'text' => 'Product Added to Cart Successfully',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            } else {
                                session()->flash('message', 'Only' . $this->product->quantity . 'Quantity Available');
                                $this->dispatch('message', [
                                    'text' => 'Only' . $this->product->quantity . 'Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        } else {
                            session()->flash('message', 'Out of Stock');
                            $this->dispatch('message', [
                                'text' => 'Out of Stock',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            } else {
                session()->flash('message', 'Product Does not exists');
                $this->dispatch('message', [
                    'text' => 'Product Does not exists',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        } else {
            session()->flash('message', 'Please Login to Add to cart');
            $this->dispatch('message', [
                'text' => 'Please Login to Add to cart',
                'type' => 'info',
                'status' => 401
            ]);
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
