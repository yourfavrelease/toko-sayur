<div class="col-lg-5 col-md-6 col-sm-9 py-3" id="bodykeranjang" style="background-color: rgb(216, 216, 216);">

    <span id="btntutupkeranjang" class="btn btn-danger">X</span>
    <!-- title keranjang -->
    <div class="row mb-3">
        <div class="col text-center">
            <p class="h3"><strong>Keranjang Belanja</strong></p>
        </div>
    </div>

    @if ($CART == null)
        <h1>EMPTY</h1>
    @endif

    <!-- barang satuan -->
    <div class="row mb-3 barangsatuan" >
        <div class="col-4">
            <img src="https://source.unsplash.com/random/600x600" alt="..." class="img-thumbnail gambarsatuan img-fluid">
        </div>
        <div class="col pt-3">
            <p><strong>Barang 1</strong></p>
            <p>Rp 30.000 x 2</p>
            <p><strong>Rp 60.000</strong></p>
        </div>
        <div class="col pt-3">

            <button type="button" class="btn btn-danger">Hapus</button>
        </div>
    </div>

    <!-- barang satuan -->
    <div class="row mb-3 barangsatuan" style="border-bottom: 1px solid black;">
        <div class="col-4">
            <img src="https://source.unsplash.com/random/600x600" alt="..." class="img-thumbnail gambarsatuan img-fluid">
        </div>
        <div class="col pt-3">
            <p><strong>Barang 1</strong></p>
            <p>Rp 30.000 x 2</p>
            <p><strong>Rp 60.000</strong></p>
        </div>
        <div class="col pt-3">

            <button type="button" class="btn btn-danger">Hapus</button>
        </div>
    </div>

    <!-- total harga -->
    <div class="row my-3">
        <div class="col text-right">
            <p class="h3">Total Pembelian <br><strong>Rp 130.000</strong></p>
        </div>
    </div>

    <!-- identitas -->
    <div class="row mb-3">
        <div class="col">
            <div class="form-group">
                <label for="inputname">Nama Pembeli</label>
                <input type="text" class="form-control" id="inputname">
            </div>
            <div class="form-group">
                <label for="inputalamat">Alamat Pembeli</label>
                <textarea class="form-control" id="inputalamat" rows="3"></textarea>
            </div>

            <!-- pilih metode pembayaran -->
            <div class="form-group">
                <label for="inputpembayaran">Metode Pembayaran</label>
                <select class="form-control" id="inputpembayaran">
                    <option>OVO</option>
                    <option>Go-Pay</option>
                </select>
            </div>
        </div>
    </div>

    <!-- tombol checkout -->

</div>
