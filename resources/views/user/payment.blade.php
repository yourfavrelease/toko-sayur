@extends('template.user')

@section('title')
    Payment Details
@endsection

@section('content')
<div class="container-fluid">
    <div class="row my-4">

        <div class="container">
            @if ($error_msg != null)
                <div class="row">
                    <div class="col">
                        <p class="display-3">{{$error_msg}}</p>
                    </div>
                </div>
            @else
            <div class="row">
                <div class="col">
                    <p>Catat kode ini untuk melacak dan mengetahui
                        segala tentang pesanan anda
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="h3">Kode Transaksi</p>  
                    <p class="display-3">{{$kode}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="h3">segera lakukan pembayaran di <br> <strong>{{$kode_payment}} </strong></p>
                </div>
            </div>
            @endif
            
        </div>

    </div>
</div>

@endsection