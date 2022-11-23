@extends('template.user')

@section('title')
    Dahsboard
@endsection

@section('content')


    <div class="container mt-4" style="width: 700px;">

        <!-- jumbotron -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" style="border: 0; opacity: 0.5;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" style="border: 0; opacity: 0.5;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" style="border: 0; opacity: 0.5;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://cdn-2.tstatic.net/belitung/foto/bank/images/manfaat-tersembunyi-buah-alpukat-yang-bagus-untuk-perawatan-rambut.jpg"  class="d-block" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR83opDiWqLiPHqz6weA5hmtuhvwW_HoRS9Bw5N2HfuFh3785DRC0Q4TdRuQED5l-vu90Q&usqp=CAU" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://p0.piqsels.com/preview/409/5/304/food-fruit-cooking-health.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="border: 0; opacity: 0;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="border: 0; opacity: 0;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
     

        <!-- product -->
        <div class="container" style="margin-top: 20px;">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach ($data as $item)
            <div class="col" style="margin-top: 30px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$item->nama_sayuran}}</h5>
                    <p class="card-text">{{$item->harga_sayuran}}</p>
                    <a href="/details/{{$item->id}}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
            </div>
            @endforeach


        </div>
        </div>

    </div>

@endsection
