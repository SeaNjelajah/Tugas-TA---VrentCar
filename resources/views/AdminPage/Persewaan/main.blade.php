@extends('AdminPage.ALayout.master')

@section('breadcrumb')

    <h6 class="h2 text-white d-inline-block mb-0">Persewaan</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Persewaan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Display</li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="#" id="tambahPm" class="ml-auto btn btn-primary btn-sm m-0" data-toggle="modal" data-target="#tambahPesanan">New</a>
            </li>
        </ol>
    </nav>

    

@endsection

@section('header')
    @include('AdminPage.Persewaan.header')
@endsection

@section('content')
    @include('AdminPage.Persewaan.content')
@endsection

@section('otherscript')
    <script src="{{ asset('js-vrcar/Persewaan/script1.js') }}"></script>
@endsection