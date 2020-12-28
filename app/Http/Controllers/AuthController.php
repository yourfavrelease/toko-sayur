<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{


    /**
     * 
     * method view form login
     */
    public function login(){
        return view('admin.login');
    }

    /**
     * 
     * method post form login
     */
    public function postlogin(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/admin/transaksi');
        }
        return redirect()->back();
    }
}
