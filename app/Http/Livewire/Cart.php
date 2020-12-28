<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Cart extends Component
{
    public $CART = null;
    
    public function render()
    {
        if (Session::has('cart')) {
            $this->CART = Session::get('cart', '');
        }
        return view('livewire.cart',[
            'CART' => $this->CART,
        ]);
    }

}
