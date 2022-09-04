@extends('layout.nav')
@section('content')

<div class="row justify-content-center m-2 ">
  @foreach ($list as $key => $value)
      <span class="badge badge-dark text-uppercase text-white col-lg-2 p-3 m-2 rad-10 ">{{$key}} : <span class="badge badge-danger p-1"> {{$value}}</span></span>
  @endforeach
</div>

@include('layout.table')

@endsection
