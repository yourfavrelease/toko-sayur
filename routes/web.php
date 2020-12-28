<?php

use App\Http\Controllers\CartController;
use App\Models\barangterbeli;
use App\Models\pesanan;
use Illuminate\Support\Facades\Route;
use App\Models\sayuran as ModelSayuran;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    $DATA = ModelSayuran::orderBy('updated_at', 'desc')->get();

    $CART = null;
    if (Session::has('cart')) {
        $CART = Session::get('cart', '');
    }
    return view('user.dashboard', [
        'data' => $DATA,
        'page' => 'dashboard',
        'cart' => $CART
    ]);
});

Route::get('/details/{id}', function ($id) {

    $ITEM = ModelSayuran::where('id', $id)->first();

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
        'cart' => $CART
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

Route::get('addtocart', function () {
    return redirect('/');
});

Route::post('addtocart', function (Request $request) {

    $cartcontroller = new CartController();
    $cartcontroller->addToCart($request);

    return redirect('/');
});

Route::get('/checkout', function () {
    print('on checkout');
});


Route::post('/checkout', function (Request $request) {

    /**
     * 
     * we dont need this
     * 
     * $client = new Client();
     * $client->email = $request->email;
     * $client->name = $request->name;
     * $client->phone = $request->phone;
     * $client->addr = $request->addr;
     * $client->kecamatan = $request->kecamatan;
     * $client->kota = $request->kota;
     * $client->kodepos = $request->kodepos;
     * $client->save();
     */



    // make sure transaction post
    $transaksi = new pesanan();
    $transaksi->nama_pemesan = $request->name;
    $transaksi->alamat_pemesan = $request->address;
    $transaksi->status = 'Menunggu Pembayaran';
    $transaksi->total = Session::get('cart')->total;
    $transaksi->total_barang = Session::get('cart')->qty;
    $transaksi->dalam_kota = ($request->city == "true") ? true : false;
    $transaksi->metode_bayar = $request->payment;

    // generate random string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    do {

        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

    }while(pesanan::where('kode',$randomString)->first() != null);

    
    $transaksi->kode = $randomString;
    $transaksi->save();

    $cart = Session::get('cart', '');

    $datastore = array(); // untuk apa ini ??

    foreach ($cart->items as $item) {
        $barang = new barangterbeli();
        $barang->id_pesanan = $transaksi->id;
        $barang->nama_barang = $item->nama_barang;
        $barang->jumlah_beli = $item->jumlah_beli;
        $barang->harga_barang = $item->harga_barang;
        $barang->subtotal = $item->subtotal;
        $barang->save();

        array_push($datastore, $barang); // dan ini ??
    }
    // dd($transaksi, $datastore);


    Session::forget('cart');

    // dd($client, $transaksi, $datastore, Session::get('cart', 'kosong lur'));
    return view('user.payment', [
        'kode' => $transaksi->kode,
        'payment' => $transaksi->metode_bayar,
    ]);
});
