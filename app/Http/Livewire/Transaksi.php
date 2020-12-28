<?php

namespace App\Http\Livewire;

use App\Models\barangterbeli;
use App\Models\pesanan;
use Livewire\Component;

class Transaksi extends Component
{

    public $CLICK = false;
    public $DETAIL_DATA = null;
    public $DETAIL_ITEMS = null;
    public $CLICK_TRANSAKSI = false;
    public $FORM_STATUS = "";
    public $FILTER = "no filter";
    

    public function render()
    {
        if($this->FILTER == "no filter"){
            $TRANSAKSI = pesanan::orderBy('updated_at', 'desc')->get();
        }else{
            $TRANSAKSI = pesanan::orderBy('updated_at', 'desc')->where('status',$this->FILTER)->get();
        }
        return view('livewire.transaksi',[
            'transaksi' => $TRANSAKSI,
        ]);
    }

    public function setDetail($id){
        $this->CLICK = true;
        $this->DETAIL_DATA = pesanan::where('id',$id)->first();
        $this->DETAIL_ITEMS = barangterbeli::where('id_pesanan',$id)->get();
    }

    public function closeDetail(){
        $this->CLICK = false;
    }

    public function doUpdate(){
        $this->CLICK_TRANSAKSI = true;
        $this->FORM_STATUS = $this->DETAIL_DATA->status;
    }

    public function finishUpdate(){
        $this->DETAIL_DATA->status = $this->FORM_STATUS;
        $this->DETAIL_DATA->save();
        $this->CLICK_TRANSAKSI = false;
    }
}
