@extends('template.template')

@section('title')
    list transaksi
@endsection

@section('content')
    
<div class="container-fluid my-4">

    <div class="row">
        <!-- table daftar pesanan -->
        <div class="col px-5">
            <div class="container">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Order</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                                <button type="button" class="btnshowdetil btn btn-primary">Detil</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>
                                <button type="button" class="btnshowdetil btn btn-primary">Detil</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>
                                <button type="button" class="btnshowdetil btn btn-primary">Detil</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center justify-content-md-center">

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- detail pesanan -->
        <div class="col-12 col-lg-4" id="details" style="border-left: 1px solid rgb(184, 184, 184); display: none;">

            <div class="container">

                <div class="row">
                    <div class="col">
                        <p class="h2 text-center"><strong>Detail Pesanan</strong></p>
                    </div>
                    <div class="col-2 text-right">
                        <button type="button" class="btn btn-outline-danger" id="btnclosedetails">Tutup</button>
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
                        <p class="detail identitas"><strong>Status</strong></p>


                    </div>
                    <div class="col">

                        <p class="detail identitas">Sutarmin</p>
                        <p class="detail identitas">5 Des 2020</p>
                        <p class="detail identitas">5</p>
                        <p class="detail identitas">Rp 50.000</p>
                        <p class="detail identitas">OVO</p>
                        <p class="detail identitas">Menunggu Dibayar oleh pembeli</p>

                    </div>
                </div>
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
                            <tr>
                                <td>1</td>
                                <td>Sayur</td>
                                <td>4</td>
                                <td>Rp 3.000</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Sayur</td>
                                <td>4</td>
                                <td>Rp 3.000</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Sayur</td>
                                <td>4</td>
                                <td>Rp 3.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    const detail = document.querySelector('#details');
    // detail.style.display = 'none'
    const showdetail = document.querySelectorAll('.btnshowdetil');
    showdetail.forEach(e => {
        e.addEventListener('click', () => {
            detail.style.display = 'block';
        })
    });

    const closedetail = document.querySelector('#btnclosedetails');
    closedetail.addEventListener('click', () => {
        detail.style.display = 'none'
    })
</script>
@endsection