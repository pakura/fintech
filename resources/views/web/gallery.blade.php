@extends('web.app')
@section('content')
<div id="breadcrumb">
    <div class="container">
        @include('web._partials.breadcrumb')
    </div>
    <!-- .container -->
</div>
<!-- #breadcrumb -->
<div class="container">
    <header class="jumbotron">
        <h1>{{$current->title}}</h1>
        {!!$current->description!!}
    </header>
    <!-- .jumbotron -->
    <div id="items">
    @foreach ($items as $item)
        <div class="col-sm-4">
        @if ($item->image)
            <div class="img">
                <a href="{{web_url([$current->slug, $item->slug])}}">
                    <img src="{{$item->image}}" class="img-responsive" alt="{{$item->title}}">
                </a>
            </div>
            <!-- .img -->
        @endif
            <div class="title text-center">
                <h2><a href="{{web_url([$current->slug, $item->slug])}}">{{$item->title}}</a></h2>
            </div>
            <!-- .title -->
        </div>
        <!-- .col-sm-4 -->
    @endforeach
    </div>
    <!-- #items -->
@if ($items->lastPage() > 1)
    <div id="pager">
        {!! $items->links() !!}
    </div>
    <!-- #pager -->
@endif
</div>
<!-- .container -->
@endsection
