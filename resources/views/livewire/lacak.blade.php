<div class="container my-4">
    <div class="row my-4">
        <div class="col text-center">
                <input wire:model="FORM" type="text" name="" id="">
                <button wire:click="getData" class="btn btn-success">Cek Pesanan</button>
        </div>

    </div>
    @if ($ERROR_MSG != null)
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-6 col-md-6">
            <div class="alert alert-danger" role="alert">
                {{$ERROR_MSG}}
              </div>
        </div>
    </div>
    @endif

    @if ($LACAK)
        
    <div class="row my-1">
        <div class="col-3 text-right">
            <ul class="list-group">
                <li class="list-group-item"><strong> Kode Pemesan </strong></li>
            </ul>
        </div>
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item">{{$DATA->kode}}</li>
            </ul>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-3 text-right">
            <ul class="list-group">
                <li class="list-group-item"><strong> Nama Pemesan </strong></li>

            </ul>
        </div>
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item">{{$DATA->nama_pemesan}}</li>

            </ul>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-3 text-right">
            <ul class="list-group">
                <li class="list-group-item"><strong> Alamat Pemesan </strong></li>

            </ul>
        </div>
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item">{{$DATA->alamat_pemesan}}</li>

            </ul>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-3 text-right">
            <ul class="list-group">
                <li class="list-group-item"><strong> Total Barang </strong></li>
            </ul>
        </div>
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item">{{$DATA->total_barang}} item</li>

            </ul>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-3 text-right">
            <ul class="list-group">
                <li class="list-group-item"><strong> Total Pembelian </strong></li>

            </ul>
        </div>
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item">Rp {{$DATA->total}}</li>

            </ul>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-3 text-right">
            <ul class="list-group">
                <li class="list-group-item"><strong> Status Pesanan </strong></li>

            </ul>
        </div>
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item">{{$DATA->status}}</li>

            </ul>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-3 text-right">
            <ul class="list-group">
                <li class="list-group-item"><strong> Metode Pembayaran </strong></li>

            </ul>
        </div>
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item">{{$DATA->metode_bayar}}</li>

            </ul>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-3 text-right">
            <ul class="list-group">
                <li class="list-group-item"><strong> Pengiriman </strong></li>
            </ul>
        </div>
        <div class="col">
            <ul class="list-group">
                <li class="list-group-item">{{$DATA->jenis_pengiriman}} - Rp {{$DATA->biaya_pengiriman}}</li>

            </ul>
        </div>
    </div>

    <div class="row my-4 justify-content-md-center">
        <div class="col-12 col-lg-10 text-center">

            <table class="table table-dark table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Barang</th>
                        <th scope="col">Jumlah Pembelian</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1;?>
                    @foreach ($ITEMS as $item)
                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$item->nama_barang}}</td>
                        <td>Rp {{$item->harga_barang}}</td>
                        <td>{{$item->jumlah_beli}} {{$item->satuan}}</td>
                        <td>Rp {{$item->subtotal}}</td>
                    </tr>
                    <?php $count++;?>
                    @endforeach
                    
                </tbody>
            </table>

        </div>
    </div>
    @endif

</div>
