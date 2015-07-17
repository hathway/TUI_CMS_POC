@extends('pages.template')
@section('title')
{!!$page->title!!}
@stop

@section('content')

  <div class="section-title">
    <div class="container">
  <h1 class="main-heading">{!! $page->title !!}</h1>
    @if (trim($page->image_url) != "")
    <img src="/hero_images/{!! $page->image_url !!}" />
    <br/>
    @endif
    </div>
  </div>



  <div class="section-top">
    <div class="container">
      @if ($page->is_html)
      {!! html_entity_decode($page->body) !!}
      @else 
      <pre>
        {!! $page->body !!}
      </pre>
      @endif
    </div>
  </div>
@stop