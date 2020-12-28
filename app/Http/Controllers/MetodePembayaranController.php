<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\metodepembayaran as ModelMetode;

class MetodePembayaranController extends Controller
{
    /**
     * 
     * method view list metodebayar
     */
    public function index()
    {
        return view('admin.metode_list');
    }

    /**
     * 
     * method view form metodebayar
     */
    public function create()
    {
        return view('admin.metode_form');
    }

    /**
     * 
     * create new item
     * method post form metodebayar
     */
    public function store(Request $request)
    {
        $data = new ModelMetode();

        $data->nama_metode = $request->nama_metode;
        $data->no_rekening = $request->no_rekening;

        try{
            $data->save();
        }catch(Exception $e){
            redirect()->back();
        }

        index();
    }

    /**
     * 
     * method view detail metodbayar
     * keknya ini ga kepake deh
     */
    public function show($id)
    {
        $data = ModelMetode::where('id',$id)->first();

        return view('admin.metode_detail',[
            'data' => $data
        ]);
    }

    /**
     * 
     * method view form edit
     */
    public function edit($id)
    {
        $data = ModelMetode::where('id',$id)->first();

        return view('admin.metode_form_edit',[
            'data' => $data
        ]);
    }

    /**
     *
     * method post form edit
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = ModelMetode::where('id',$id)->first();

        $data->nama_metode = $request->nama_metode;
        $data->no_rekening = $request->no_rekening;

        try{
            $data->save();
        }catch(Exception $e){
            redirect()->back();
        }

        index();
    }

    /**
     * 
     * method hapus metode bayar
     */
    public function destroy($id)
    {
        $data = ModelMetode::where('id',$id)->first();

        try{
            $data->delete();
        }catch (Exception $e){
            redirect()->back();
        }

        index();
    }
}
