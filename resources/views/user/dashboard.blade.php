@extends('layout.default')

@section('content')
    <h1 class="text-center">Welcome {{auth()->user()->name}}</h1>
@endsection