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
    <article id="item" class="jumbotron">
        @if($current->image)
        <div class="img">
            <img src="{{$current->image}}" class="img-responsive" alt="{{$current->title}}">
        </div>
        <!-- .img -->
        @endif
        <div class="content">
            <header class="heading">
                <h1>{{$current->title}}</h1>
            </header>
            <!-- .heading -->
            <div class="text">
                {!!$current->content!!}
            </div>
            <!-- .text -->
        </div>
        <!-- .content -->
    </article>
    <!-- #item -->
</div>
<!-- .container -->
@endsection
