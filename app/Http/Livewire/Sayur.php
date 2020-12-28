<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\sayuran as ModelSayuran;


class Sayur extends Component
{

    use WithPagination;

    public $EDIT;
    public $form = "pasif";
    public $form_type = "meninggoy";

    public $data_nama = "";
    public $data_harga = 0;
    public $data_stok = 0;
    public $data_id = 0;

    public $error_message = "kosong";

    public function render()
    {
        $DATA = ModelSayuran::orderBy('updated_at', 'desc')->get();
        return view('livewire.sayur', [
            'data' => $DATA,
        ]);
    }

    public function show($id)
    {
        $EDIT = ModelSayuran::where('id', $id)->first();
        $this->data_nama = $EDIT->nama_sayuran;
        $this->data_harga = $EDIT->harga_sayuran;
        $this->data_stok = $EDIT->jumlah_sayuran;
        $this->data_id = $EDIT->id;
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
    }

    public function submitadd()
    {
        $data = new ModelSayuran();
        $data->nama_sayuran = $this->data_nama;
        $data->harga_sayuran = $this->data_harga;
        $data->jumlah_sayuran = $this->data_stok;

        try {
            $data->save();
            $this->resetform();
            $this->closeform();
        } catch (\Exception $e) {
            $this->error_message = "terjadi kesalahan";
        }
    }

    public function destroy($id){
        $EDIT = ModelSayuran::where('id', $id)->first();
        $EDIT->delete();
    }

    public function submitedit($id){
        $data = ModelSayuran::where('id', $id)->first();
        $data->nama_sayuran = $this->data_nama;
        $data->harga_sayuran = $this->data_harga;
        $data->jumlah_sayuran = $this->data_stok;

        try {
            $data->save();
            $this->resetform();
            $this->closeform();
        } catch (\Exception $e) {
            $this->error_message = "terjadi kesalahan";
        }
    }
}
