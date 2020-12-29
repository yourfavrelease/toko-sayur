<?php

namespace App\Http\Livewire;

use App\Models\pengiriman as ModelsPengiriman;
use Livewire\Component;

class Pengiriman extends Component
{

    public $EDIT;
    public $form = "pasif";
    public $form_type = "meninggoy";

    public $data_nama = "";
    public $data_harga = 0;
    public $data_stok = 0;
    public $data_satuan = "";
    public $data_id = 0;

    public $error_message = "kosong";


    public function render()
    {
        $DATA = ModelsPengiriman::orderBy('updated_at','desc')->get();
        return view('livewire.pengiriman',[
            'data' => $DATA,
        ]);
    }

    public function show($id)
    {
        $EDIT = ModelsPengiriman::where('id', $id)->first();
        $this->data_nama = $EDIT->nama;
        $this->data_harga = $EDIT->biaya;
        $this->form = "aktif";
        $this->form_type = "edit";
        $this->error_message = "kosong";
    }

    public function add()
    {
        $this->form = "aktif";
        $this->resetform();
        $this->form_type = "tambah";
        $this->error_message = "kosong";
    }

    public function closeform()
    {
        $this->form = "pasif";
    }

    public function resetform()
    {
        $this->data_nama = "";
        $this->data_harga = "";
        $this->data_stok = "";
        $this->data_satuan = "";
    }

    public function submitadd()
    {
        $data = new ModelsPengiriman();
        $data->nama = $this->data_nama;
        $data->biaya = $this->data_harga;

        try {
            $data->save();
            $this->resetform();
            $this->closeform();
        } catch (\Exception $e) {
            $this->error_message = "terjadi kesalahan";
        }
    }

    public function destroy($id){
        $EDIT = ModelsPengiriman::where('id', $id)->first();
        $EDIT->delete();
    }

    public function submitedit($id){
        $data = ModelsPengiriman::where('id', $id)->first();
        $data->nama = $this->data_nama;
        $data->biaya = $this->data_harga;

        try {
            $data->save();
            $this->resetform();
            $this->closeform();
        } catch (\Exception $e) {
            $this->error_message = "terjadi kesalahan";
        }
    }
}
