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
    <header class="heading">
        <h1>{{$current->title}}</h1>
    </header>
    <!-- .heading -->
    <div id="items" class="row">
    @foreach ($items as $item)
        <div class="col-sm-3">
            {{$item->title}}
        </div>
        <!-- .col-sm-3 -->
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
