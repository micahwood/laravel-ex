@extends('layout')

@section('content')
  <div class="col-md-5">
    @include('images.create')
  </div>

  @if($images)
    @include('images.edit')
  @endif
@stop