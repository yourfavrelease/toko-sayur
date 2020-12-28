<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\metodepembayaran as ModelMetode;

class Pembayaran extends Component
{
    use WithPagination;

    public $EDIT;
    public $form = "pasif";
    public $form_type = "meninggoy";

    public $data_nama_metode = "";
    public $data_no_rekening = 0;
    public $data_id = 0;

    public $error_message = "kosong";

    public function render()
    {
        $DATA = ModelMetode::orderBy('updated_at', 'desc')->paginate(5);
        return view('livewire.pembayaran',[
            'data' => $DATA,
        ]);
    }

    public function show($id)
    {
        $EDIT = ModelMetode::where('id', $id)->first();
        $this->data_nama_metode = $EDIT->nama_metode;
        $this->data_no_rekening = $EDIT->no_rekening;
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
        $this->data_nama_metode = "";
        $this->data_no_rekening = "";
    }

    public function submitadd()
    {
        $data = new ModelMetode();
        $data->nama_metode = $this->data_nama_metode;
        $data->no_rekening = $this->data_no_rekening;

        try {
            $data->save();
            $this->resetform();
            $this->closeform();
        } catch (\Exception $e) {
            $this->error_message = "terjadi kesalahan";
        }
    }

    public function destroy($id){
        $EDIT = ModelMetode::where('id', $id)->first();
        $EDIT->delete();
    }

    public function submitedit($id){
        $data = ModelMetode::where('id', $id)->first();
        $data->nama_metode = $this->data_nama_metode;
        $data->no_rekening = $this->data_no_rekening;

        try {
            $data->save();
            $this->resetform();
            $this->closeform();
        } catch (\Exception $e) {
            $this->error_message = "terjadi kesalahan";
        }
    }
}
