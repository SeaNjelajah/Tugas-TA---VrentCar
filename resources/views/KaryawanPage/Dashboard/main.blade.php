@extends('KaryawanPage.ALayout.master')

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Karyawan</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Display</li>
    </ol>
    </nav>
@endsection

@section('header')
    @include('KaryawanPage.Dashboard.header')
@endsection

@section('content')
    @include('KaryawanPage.Dashboard.content')
@endsection