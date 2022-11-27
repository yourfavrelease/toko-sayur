<?php

use App\Http\Controllers\CartController;
use App\Models\barangterbeli;
use App\Models\metodepembayaran;
use App\Models\pengiriman;
use App\Models\pesanan;
use Illuminate\Support\Facades\Route;
use App\Models\sayuran as ModelSayuran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',['']);

Route::get('/', function () {
    $DATA = ModelSayuran::orderBy('updated_at', 'desc')->get();
    $PAYMENT = metodepembayaran::get();
    $SHIPPING = pengiriman::get();
    
    $CART = null;
    if (Session::has('cart')) {
        $CART = Session::get('cart', '');
    }
    return view('user.dashboard', [
        'data' => $DATA,
        'page' => 'dashboard',
        'cart' => $CART,
        'payment' => $PAYMENT,
        'shipping' => $SHIPPING,
    ]);
});

Route::get('/details/{id}', function ($id) {

    $ITEM = ModelSayuran::where('id', $id)->first();
    $PAYMENT = metodepembayaran::get();
    $SHIPPING = pengiriman::get();

    $DATA = ModelSayuran::take(8)->get();

    $CART = null;
    if (Session::has('cart')) {
        $CART = Session::get('cart', '');
    }
    // dd($ITEM, $ITEM[0]);

    // dd is display die
    // u display data, and program is.. umm.. idont know how to say it
    // and program then die

    // yeah just display the item

    return view('user.details', [
        'data' => $DATA,
        'item' => $ITEM,
        'cart' => $CART,
        'page' => '',
        'payment' => $PAYMENT,
        'shipping' => $SHIPPING,

    ]);
});

Route::get('/removefromcart/{id}', function ($id) {
    return redirect('/');
});

Route::post('/removefromcart/{id}', function ($id) {

    $cartcontroller = new CartController();
    $cartcontroller->removeFromCart($id);

    return redirect('/');
});

Route::get('addtocart', function () {
    return redirect('/');
});

Route::post('addtocart', function (Request $request) {

    $item = ModelSayuran::where('id',$request->id)->first();
    if($item->jumlah_sayuran - $request->qty >= 0){
        $cartcontroller = new CartController();
        $cartcontroller->addToCart($request);
    }

    return redirect('/');
});

Route::get('/checkout', function () {
    return redirect('/');
});


Route::post('/checkout', function (Request $request) {

    $PAYMENT = metodepembayaran::get();
    $SHIPPING = pengiriman::get();

    $SHIP = pengiriman::where('id',$request->city)->first();
    // make sure transaction post
    $transaksi = new pesanan();
    $transaksi->nama_pemesan = $request->name;
    $transaksi->alamat_pemesan = $request->address;
    $transaksi->status = 'Menunggu Dibayar oleh pembeli';
    $transaksi->total = Session::get('cart')->total;
    $transaksi->total_barang = Session::get('cart')->qty;
    // $transaksi->dalam_kota = ($request->city == "true") ? true : false;
    $transaksi->jenis_pengiriman = $SHIP->nama;
    $transaksi->biaya_pengiriman = $SHIP->biaya;
    $P = metodepembayaran::where('nama_metode',$request->payment)->first();
    $transaksi->metode_bayar = (string)$P->nama_metode . " - " . (string)$P->no_rekening;

    // generate random string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    do {

        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

    }while(pesanan::where('kode',$randomString)->first() != null);
    // end generate random string
    
    $transaksi->kode = $randomString;

    $cart = Session::get('cart', '');

    foreach ($cart->items as $item) {
        $kurangi = ModelSayuran::where('id',$item->id)->first();
        if($kurangi->jumlah_sayuran - (int)$item->jumlah_beli < 0){
            return view('user.payment', [
                'kode' => $transaksi->kode,
                'kode_payment' => $transaksi->metode_bayar,
                'cart' => $cart,
                'page' => '',
                'payment' => $PAYMENT,
                'shipping' => $SHIPPING,
                'error_msg' => $kurangi->nama_sayuran . " SUDAH OUT OF STOCK",
            ]);
        }
    }

    $transaksi->save();


    $datastore = array(); // untuk apa ini ??

    foreach ($cart->items as $item) {
        $barang = new barangterbeli();
        $barang->id_pesanan = $transaksi->id;
        $barang->nama_barang = $item->nama_barang;
        $barang->jumlah_beli = $item->jumlah_beli;
        $barang->harga_barang = $item->harga_barang;
        $barang->satuan = $item->satuan;
        $barang->subtotal = $item->subtotal;
        $barang->save();

        $kurangi = ModelSayuran::where('id',$item->id)->first();
        $kurangi->jumlah_sayuran = (int)$kurangi->jumlah_sayuran - (int)$item->jumlah_beli;
        $kurangi->save();

        array_push($datastore, $barang); // dan ini ??
    }


    Session::forget('cart');
    $cart = Session::get('cart', '');


    return view('user.payment', [
        'kode' => $transaksi->kode,
        'kode_payment' => $transaksi->metode_bayar,
        'cart' => $cart,
        'page' => '',
        'payment' => $PAYMENT,
        'shipping' => $SHIPPING,
        'error_msg' => null,

    ]);
});

Route::get('lacak',function(){
    $cart = Session::get('cart', '');

    $PAYMENT = metodepembayaran::get();
    $SHIPPING = pengiriman::get();

    return view('user.pesanan',[
        'cart' => $cart,
        'page' => 'lacak',
        'payment' => $PAYMENT,
        'shipping' => $SHIPPING,
    ]);
});

// route ADMIN

Route::get('login', function(){
    return view('admin.login');
})->middleware('guest')->name('login');

Route::post('login', function(Request $request){
    $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/admin/transaksi/list');
        }else{
            return redirect()->back()->with(['fail' => 'Password anda salah']);
        }
});

Route::get('signin',function(){
    return view('admin.signin');
})->middleware('guest');

Route::post('signin',function(Request $request){
    $cek = User::where('email',$request->username)->first();

    if($cek){
        return redirect()->back()->with(['fail' => 'Username sudah digunakan']);
    }else{
        $data = new User();
        $data->name = $request->username;
        $data->email = $request->username;
        $data->password = Hash::make($request->password);
        $data->save();

        $credentials = $request->only('username', 'password');
        Auth::attempt($credentials);
    }

    return redirect('/admin/transaksi/list');
})->middleware('guest');

Route::get('admin',function(){
    return redirect()->to('/admin/transaksi/list');
});

Route::middleware('auth')->group(function(){

    
    Route::get('/logout', function () {
        
        Auth::logout();

        print("ANJAY");
        
        return redirect('/login');
    });

    Route::get('/admin/transaksi/list', function () {

        return view('admin.transaksi_list', [
            'page' => 'transaksi',
        ]);
    });
    
    Route::get('/admin/sayur/list', function () {
        return view('admin.barang_list', [
            'page' => 'barang',
        ]);
    });
    
    Route::get('/admin/pembayaran/list', function () {
        return view('admin.pembayaran_list', [
            'page' => 'pembayaran',
        ]);
    });

    Route::get('/admin/pengiriman/list', function(){
        return view('admin.pengiriman',[
            'page' => 'pengiriman',
        ]);
    });
    
});
