@extends('template.user')

@section('title')
    Dahsboard
@endsection

@section('content')


    <div class="container mt-4">

        <!-- jumbotron -->
        <div class="row my-4">
            <div class="jumbotron">
                <h1 class="display-4">Hello, world!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                    attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.
                </p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>

        <!-- product -->
        <div class="row">

            @foreach ($data as $item)
            <div class="card col-lg-3 col-sm-6 col-6">
                <div class="card-body">
                    <h5 class="card-title">{{$item->nama_sayuran}}</h5>
                    <p class="card-text">{{$item->harga_sayuran}}</p>
                    <a href="/details/{{$item->id}}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
            @endforeach


            
        </div>

    </div>

@endsection
