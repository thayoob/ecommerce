<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;
    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {

            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    session()->flash('message', 'Quantity updated');
                    $this->dispatch('message', [
                        'text' => 'Quantity updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    session()->flash('message', 'only' . $productColor->quantity . 'Qantity available');
                    $this->dispatch('message', [
                        'text' => 'only' . $productColor->quantity . 'Qantity available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            } else {
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    session()->flash('message', 'Quantity updated');
                    $this->dispatch('message', [
                        'text' => 'Quantity updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    session()->flash('message', 'only' . $cartData->product->quantity . 'Qantity available');
                    $this->dispatch('message', [
                        'text' => 'only' . $cartData->product->quantity . 'Qantity available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }
        } else {
            session()->flash('message', 'Somthing whet wrong');
            $this->dispatch('message', [
                'text' => 'Somthing whet wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {

            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    session()->flash('message', 'Quantity updated');
                    $this->dispatch('message', [
                        'text' => 'Quantity updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    session()->flash('message', 'only' . $productColor->quantity . 'Qantity available');
                    $this->dispatch('message', [
                        'text' => 'only' . $productColor->quantity . 'Qantity available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            } else {
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    session()->flash('message', 'Quantity updated');
                    $this->dispatch('message', [
                        'text' => 'Quantity updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    session()->flash('message', 'only' . $cartData->product->quantity . 'Qantity available');
                    $this->dispatch('message', [
                        'text' => 'only' . $cartData->product->quantity . 'Qantity available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }
        } else {
            session()->flash('message', 'Somthing whet wrong');
            $this->dispatch('message', [
                'text' => 'Somthing whet wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if ($cartRemoveData) {
            $cartRemoveData->delete();
            $this->dispatch('CartAddedUpdated'); //emit in event fire v3
            session()->flash('message', 'Cart Item Removed Successfully');
            $this->dispatch('message', [
                'text' => 'Cart Item Removed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            session()->flash('message', 'Something Went to Wrong');
            $this->dispatch('message', [
                'text' => 'Something Went to Wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }
    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view(
            'livewire.frontend.cart.cart-show',
            [
                'cart' => $this->cart,
                'totalPrice' => $this->totalPrice
            ]
        );
    }
}
