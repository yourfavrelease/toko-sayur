<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    /**
     * 
     * method view form login
     */
    public function login(){
        return view('admin.login');
        
    }
   public function postlogin(Request $request){
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/admin/transaksi');
        }

        return redirect()->back();
    }
}
