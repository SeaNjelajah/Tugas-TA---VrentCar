@extends('AdminPage.ALayout.master')

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Account Manager</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">Display</a></li>
        <li class="breadcrumb-item active" aria-current="page">Account Manager</li>
    </ol>
    </nav>
@endsection

@section('header')
    @include('AdminPage.AccountManage.header')
@endsection

@section('content')
    @include('AdminPage.AccountManage.content')
@endsection