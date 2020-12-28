<?php

namespace App\Http\Controllers;

use App\Models\barangterbeli;
use App\Models\Cart;
use App\Models\sayuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request){

        // form include ID of Item and QTY of Item Selected

        $item = sayuran::where('id',$request->id)->first();

        $items = new barangterbeli();
        $items->nama_barang = $item->nama_sayuran;
        $items->harga_barang = $item->harga_sayuran;
        $items->jumlah_beli = (int)$request->qty;
        $items->subtotal = $items->harga_barang * $items->jumlah_beli;
        // TODO
        // change dalamkota to pesanan
        // delete dalamkota from barangterbeli

        $oldcart = $request->session()->get('cart', '');
        $cart = new Cart($oldcart);

        $cart->addItem($items);

        $request->session()->put('cart', $cart);
    }

    public function removeFromCart($id){

        $oldcart = Session::get('cart', '');
        $oldcart->removeBarang($id);

        $cart = new Cart($oldcart);

        Session::put('cart', $cart);

    }
}
