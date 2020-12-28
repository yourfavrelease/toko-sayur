<?php

namespace App\Models;


class Cart
{

    public $items = array();
    public $qty = 0;
    public $total = 0;

    public function __construct($c)
    {
        if ($c != null) {
            $this->items = $c->items;
            $this->qty = $c->qty;
            $this->total = $c->total;
        }
    }

    public function addItem(barangterbeli $s)
    {
        array_push($this->items, $s);
        $this->qty += $s->jumlah_beli;
        $this->total += $s->subtotal;
    }

    public function removeBarang($id){
        $this->qty -= $this->items[$id]->jumlah_beli;
        $this->total -= $this->items[$id]->subtotal;
        array_splice($this->items, $id, 1);
    }
}
