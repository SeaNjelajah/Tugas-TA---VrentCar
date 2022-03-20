@extends('AdminPage.ALayout.master')


@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Armada Mobil</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Armada Mobil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Display</li>
            <li class="breadcrumb-item active" aria-current="page">
                <a id="createMobilbtn" class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#createMobil">New</a>
            </li>
        </ol>
    </nav>
@endsection

@section('header')
    @include('AdminPage.ArmadaMobil.header')
@endsection

@section('content')
    @include('AdminPage.ArmadaMobil.content')
@endsection