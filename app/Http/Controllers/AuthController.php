<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    public function register( Request $request){
        $validasi = \Validator::make($request->all(), [
            'name'=>'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validasi->fails()) {
            return view('/user/register');
        } else {
            $user = new User;
            $user->name=$request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->role = ("user");
            $user->save();
            return redirect('/');
        }
    }
}
