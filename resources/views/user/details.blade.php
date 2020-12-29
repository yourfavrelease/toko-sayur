@extends('template.user')

@section('title')
    Details
@endsection

@section('content')
    <div class="row">

        <div class="container">
            <div class="row my-4">
                <div class="col-1"></div>
                <div class="col-5">
                    {{-- TODO
                    i need to delete this image later
                    --}}
                    <img src="https://source.unsplash.com/random/600x600" class="img-fluid rounded float-left" alt="...">

                </div>
                <div class="col-1"></div>
                <div class="col-5">
                    <div class="row mt-4">
                        <div class="col">
                            <!-- nama sayur -->
                            <p class="h2"><strong>{{ $item->nama_sayuran }}</strong></p>

                            <!-- harga sayur -->
                            <p class="h4">Rp {{ $item->harga_sayuran }}</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">


                            <!-- jumlah tersedia -->
                            <p class="h4">Terisa <strong>{{ $item->jumlah_sayuran }} {{$item->satuan}}</strong></p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <form action="/addtocart" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div class="col">

                                <nav aria-label="Page navigation example my-2">
                                    <ul class="pagination rounded">
                                        <li class="page-item page-link" id="btnqtyminus">-</li>
                                        <li class="page-item page-link"><input type="number" name="qty" id="qtyfield"></li>
                                        <li class="page-item page-link" id="btnqtyplus">+</li>
                                    </ul>
                                </nav>
                                <button type="submit" class="btn btn-success">Tambahkan ke Keranjang</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row" style="min-height: 50px;"></div>
    <!-- item yang dipromokan dibawah -->
    {{-- <div class="row justify-content-md-center">
        <div class="card col-2">
            <div class="card-body">
                <h5 class="card-title">{{ $item->nama_sayuran }}</h5>
                <p class="card-text">{{ $item->harga_sayuran }}</p>
                <a href="/details/{{ $item->id }}" class="btn btn-primary">Details</a>
            </div>
        </div>

    </div> --}}
    <div class="row justify-content-md-center">
        @foreach ($data as $item)
            <div class="card col-2">

                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_sayuran }}</h5>
                    <p class="card-text">
                        {{ $item->harga_sayuran }}
                    </p>
                    <a href="/details/{{ $item->id }}" class="btn btn-primary">Details</a>
                </div>
            </div>
        @endforeach


    </div>

@endsection

@section('js')
    <script>
        const btnminus = document.querySelector('#btnqtyminus');
        const btnplus = document.querySelector('#btnqtyplus');
        const qtyfield = document.querySelector('#qtyfield');

        qtyfield.style.maxWidth = "100px";
        qtyfield.value = 0;

        btnminus.addEventListener('click', () => {
            if (qtyfield.value >= 0) {
                qtyfield.value--;
            }
        })

        btnplus.addEventListener('click', () => {
            qtyfield.value++;
        })

    </script>
@endsection
