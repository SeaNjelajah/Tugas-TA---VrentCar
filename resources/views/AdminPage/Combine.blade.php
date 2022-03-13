@extends('AdminPage.Ztemplate.0index')

@section('sidebar')
    @if (!empty($sidebar))
        @include($sidebar)
    @else
        @include('AdminPage.Ztemplate.sidebar')
    @endif 
@endsection

@section('topnavbar')
    @if (!empty($topnavbar))
        @include($topnavbar)
    @else
        @include('AdminPage.Ztemplate.topnavbar')
    @endif    
@endsection

@section('header')
    @if (!empty($header))
        @include($header)
    @else
        @include('AdminPage.Ztemplate.header')
    @endif
@endsection

@section('content')
    @if (!empty($content))
        @include($content)
    @else
        @include('AdminPage.Ztemplate.content')
    @endif
@endsection

