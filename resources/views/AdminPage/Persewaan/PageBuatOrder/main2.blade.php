@extends('AdminPage.ALayout.master')

@section('breadcrumb')
<h6 class="h2 text-white d-inline-block mb-0">Persewaan</h6>
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">Persewaan</a></li>
        <li class="breadcrumb-item"><a href="#">Cari Mobil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Display</li>
    </ol>
</nav>    
@endsection

@section('header')
    @include('AdminPage.Persewaan.PageBuatOrder.TemukanMobilHeader')
@endsection

@section('content')
    @include('AdminPage.Persewaan.PageBuatOrder.TemukanMobilContent')
@endsection