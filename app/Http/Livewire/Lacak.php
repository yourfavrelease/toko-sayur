<?php

namespace App\Http\Livewire;

use App\Models\barangterbeli;
use App\Models\pesanan;
use Livewire\Component;

class Lacak extends Component
{

    public $FORM = "";
    public $LACAK = false;
    public $ERROR_MSG = "";
    public $DATA = null;
    public $ITEMS = null;

    public function render()
    {
        return view('livewire.lacak', [
            'data' => $this->DATA,
            'items' => $this->ITEMS
        ]);
    }

    public function getData()
    {
        $this->LACAK = true;
        $this->DATA = pesanan::where('kode', $this->FORM)->first();
        if ($this->DATA == null) {
            $this->ERROR_MSG = "Pesanan Tidak Ditemukan";
            $this->LACAK = false;
        } else {
            $this->ERROR_MSG = "";
            $this->ITEMS = barangterbeli::where('id_pesanan', $this->DATA->id)->get();
        }
    }
}
