<div class="container-fluid my-4">

    <div class="row justify-content-md-center"">
                    
        <div class="col-3">
            <div class="form-group">

            <select class="form-control" wire:model="FILTER" name="" id="">
                <option value="no filter">no filter</option>
                <option value="Menunggu Dibayar oleh pembeli">Menunggu Dibayar oleh pembeli</option>
                <option value="Dalam Pengemasan">Dalam Pengemasan</option>
                <option value="Dalam Pengiriman">Dalam Pengiriman</option>
                <option value="Transaksi Selesai">Transaksi Selesai</option>
            </select>
            </div>

        </div>
    </div>
    
    <div class="row">
        <!-- table daftar pesanan -->
        <div class="col px-5">
            <div class="container">

                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Order</th>
                            <th scope="col">Kode Pesanan</th>
                            <th scope="col">Status Transaksi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;?>
                        @foreach ($transaksi as $item)
                        <tr>
                            <th scope="row">{{$count}}</th>
                            <td>{{$item->nama_pemesan}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                                <button wire:click="setDetail({{$item->id}})" type="button" class="btnshowdetil btn btn-primary">Detil</button>
                            </td>
                        </tr>
                        <?php $count++;?>

                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="row align-items-center justify-content-md-center">

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div> --}}
        </div>

        @if ($CLICK)
            
        <!-- detail pesanan -->
        <div class="col-12 col-lg-4" id="details" style="border-left: 1px solid rgb(184, 184, 184);">

            <div class="container">

                <div class="row">
                    <div class="col">
                        <p class="h2 text-center"><strong>Detail Pesanan</strong></p>
                    </div>
                    <div class="col-2 text-right">
                        <button wire:click="closeDetail" type="button" class="btn btn-outline-danger" id="btnclosedetails">Tutup</button>
                    </div>
                </div>

                <div class="row my-3"></div>
                <div class="row mx-1">
                    <div class="col-12">
                        <p class="h3"><strong>Rincian Data Pembeli</strong></p>
                    </div>
                    <div class="col-4 text-right">

                        <p class="detail identitas"><strong>Nama Pembeli</strong></p>
                        <p class="detail identitas"><strong>Tanggal Beli</strong></p>
                        <p class="detail identitas"><strong>Total Barang</strong></p>
                        <p class="detail identitas"><strong>Total Biaya</strong></p>
                        <p class="detail identitas"><strong>Metode Pembayaran</strong></p>
                        <p class="detail identitas"><strong>Pengiriman</strong></p>
                        <p class="detail identitas"><strong>Alamat</strong></p>
                        <p class="detail identitas"><strong>Status</strong></p>
                    </div>
                    <div class="col">

                        @if ($DETAIL_DATA != null)
                        <p class="detail identitas">{{$DETAIL_DATA->nama_pemesan}}</p>
                        <p class="detail identitas">{{$DETAIL_DATA->created_at}}</p>
                        <p class="detail identitas">{{$DETAIL_DATA->total_barang}} item</p>
                        <p class="detail identitas">Rp {{$DETAIL_DATA->total}}</p>
                        <p class="detail identitas">{{$DETAIL_DATA->metode_bayar}}</p>
                        <p class="detail identitas">{{$DETAIL_DATA->jenis_pengiriman}} - Rp {{$DETAIL_DATA->biaya_pengiriman}}</p>
                        <p class="detail identitas">{{$DETAIL_DATA->alamat_pemesan}}</p>
                        <p class="detail identitas">{{$DETAIL_DATA->status}} <br>
                            <span wire:click="doUpdate" class="btn badge badge-success">Update</span>
                        </p>
                        @endif
                        

                    </div>
                </div>
                @if ($CLICK_TRANSAKSI)
                <div class="row">
                    
                    <div class="col">
                        <div class="form-group">

                        <select class="form-control" wire:model="FORM_STATUS" name="" id="">
                            <option value="Menunggu Dibayar oleh pembeli">Menunggu Dibayar oleh pembeli</option>
                            <option value="Dalam Pengemasan">Dalam Pengemasan</option>
                            <option value="Dalam Pengiriman">Dalam Pengiriman</option>
                            <option value="Transaksi Selesai">Transaksi Selesai</option>
                        </select>
                    </div>

                        <button wire:click="finishUpdate" class="btn btn-primary">simpan</button>
                    </div>
                </div>
                @endif
               
                <div class="row mt-4 mx-2">
                    <div class="col-12">
                        <p class="h3"><strong>Rincian Barang Dibeli</strong></p>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ccount = 1; ?>
                            @foreach ($DETAIL_ITEMS as $item)
                                
                            <tr>
                                <td>{{$ccount}}</td>
                                <td>{{$item->nama_barang}}</td>
                                <td>{{$item->jumlah_beli}}</td>
                                <td>Rp {{$item->harga_barang}}</td>
                            </tr>
                            <?php $ccount++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        @endif

    </div>
</div>
