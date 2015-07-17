@extends('admin.template')
@section('content')

<div class="panel-body">
  <div class="panel-heading">
        <h1>{{$title}}</h1>
  </div>
  <div>
    {!! $form !!}
  </div>
</div>
@stop
