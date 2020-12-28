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
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>

                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $item->nama_metode }}</td>
                                <td>{{ $item->no_rekening }}</td>
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

            <div class="row align-items-center justify-content-md-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{-- custom pagination dan hasilnya buruk --}}
                        @if ($data->hasPages())
                            @if (!$data->onFirstPage())
                                @if ($data->currentPage() != 2)
                                    <li class="page-item btn" wire:click="gotoPage(1)">
                                        <a class="page-link">
                                            First Page
                                        </a>
                                    </li>
                                @endif

                                @if ($data->currentPage() == $data->lastPage())
                                    <li class="page-item btn" wire:click="previousPage">
                                        <a class="page-link">
                                            Previous Page
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item btn" wire:click="previousPage">
                                        <a class="page-link">
                                            {{ $data->currentPage() - 1 }}
                                        </a>
                                    </li>
                                @endif
                            @endif
                            <li class="page-item btn active">
                                <a class="page-link">
                                    {{ $data->currentPage() }}
                                </a>
                            </li>
                            @if ($data->hasMorePages())
                                @if ($data->lastPage() - $data->currentPage() >= 2)
                                    <li class="page-item btn" wire:click="nextPage">
                                        <a class="page-link">
                                            {{ $data->currentPage() + 1 }}
                                        </a>
                                    </li>
                                @endif
                                <li class="page-item btn" wire:click="gotoPage({{ $data->lastPage() }})">
                                    <a class="page-link">
                                        LastPage
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </nav>
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
                                <label for="inputname"><strong>Nama Metode</strong></label>
                                <input type="text" class="form-control" id="inputname" wire:model="data_nama_metode" required>
                            </div>

                            <div class="form-group">
                                <label for="inputharga"><strong>No Rekening</strong></label>
                                <input type="text" class="form-control" id="inputharga" wire:model="data_no_rekening"
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
