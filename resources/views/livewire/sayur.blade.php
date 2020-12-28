<div class="container-fluid my-4">

    <div class="row">
        <!-- table daftar pesanan -->
        <div class="col px-5">
            <button wire:click="add" type="button" class="btnshowdetil btn btn-success float-right">Add</button>

            <div class="container">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah Stok</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>

                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $item->nama_sayuran }}</td>
                                <td>{{ $item->harga_sayuran }}</td>
                                <td>{{ $item->jumlah_sayuran }}</td>
                                <td>
                                    <button wire:click="show({{ $item->id }})" type="button"
                                        class="btnshowdetil btn btn-primary">Edit {{ $item->id }}</button>
                                    <button wire:click="destroy({{ $item->id }})" type="button"
                                        class="btnshowdetil btn btn-danger">Hapus {{ $item->id }}</button>

                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>

            
        </div>

        @if ($form == 'aktif')
            <!-- detail pesanan -->
            <div class="col-12 col-lg-4" id="details"
                style="border-left: 1px solid rgb(184, 184, 184); display: block;">

                <div class="container">

                    <div class="row">
                        <div class="col">
                            <p class="h2 text-center"><strong>Detail Pesanan</strong></p>
                        </div>
                        <div class="col-2 text-right">
                            <button wire:click="closeform" type="button" class="btn btn-outline-danger"
                                id="btnclosedetails">Tutup</button>
                        </div>
                    </div>

                    <div class="row my-4 justify-content-md-center">
                        <div class="col-6">

                            <div class="form-group">
                                <label for="inputname"><strong>Nama Barang</strong></label>
                                <input type="text" class="form-control" id="inputname" wire:model="data_nama" required>
                            </div>


                            <div class="form-group">
                                <label for="inputharga"><strong>Harga</strong></label>
                                <input type="number" class="form-control" id="inputharga" wire:model="data_harga"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="inputharga"><strong>Stok</strong></label>
                                <input type="number" class="form-control" id="inputharga" wire:model="data_stok"
                                    required>
                            </div>

                            @if ($form_type == 'edit')
                                <button wire:click="submitedit({{ $data_id }})" type="button"
                                    class="btn btn-success">Submit Edit</button>
                            @else
                                <button wire:click="submitadd" type="button" class="btn btn-success">Submit New
                                    Item</button>
                            @endif
                            @if ($error_message != 'kosong')
                                <div class="alert alert-danger" role="alert">
                                    {{ $error_message }}
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        @endif




    </div>
</div>
