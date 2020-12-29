@extends('template.template')

@section('title')
    list barang
@endsection

@section('content')
    @livewire('pengiriman')
@endsection

@section('js')
<script>
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