@extends('template.template')

@section('title')
    list pembayaran
@endsection

@section('content')
    @livewire('pembayaran')
@endsection

@section('js')
<script>
    const detail = document.querySelector('#details');
    detail.style.display = 'block';
    // const showdetail = document.querySelectorAll('.btnshowdetil');
    // showdetail.forEach(e => {
    //     e.addEventListener('click', () => {
    //         detail.style.display = 'block';
    //     })
    // });

    // const closedetail = document.querySelector('#btnclosedetails');
    // closedetail.addEventListener('click', () => {
    //     detail.style.display = 'none'
    // })
</script>
@endsection