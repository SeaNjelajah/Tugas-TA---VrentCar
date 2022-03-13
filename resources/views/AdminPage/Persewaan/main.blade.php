@extends('AdminPage.ALayout.master')

@section('header')
    @include('AdminPage.Persewaan.header')
@endsection

@section('content')
    @include('AdminPage.Persewaan.content')
@endsection

@section('otherscript')
    <script src="{{ asset('js-vrcar/Persewaan/script1.js') }}"></script>
@endsection