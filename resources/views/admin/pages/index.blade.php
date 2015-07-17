@extends('admin.template')
@section('content')

<div class="panel-body">
  <div class="panel-heading">
        <h1>Pages</h1>
</div>


<div class="well">
<a href="/admin/pages/add" class="btn btn-primary" role="button">Add Page</a>
</div>
<div>
 {!! $filter !!}
 {!! $grid !!}
</div>
</div>
@stop
