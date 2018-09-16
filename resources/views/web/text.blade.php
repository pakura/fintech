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

        <div class="content">
            <header class="heading">
                <h1>გილოცავთ თქვენ მიიღეთ სასაჩუქრე კუპონი</h1>
            </header>
            <!-- .heading -->
            <div class="text">
                <div style="width: 100%; text-align: center">
                    <img src="https://media.giphy.com/media/WkXNTSR9DGbDy/giphy.gif" alt="" width="300px">
                </div>
                <h2>კუპონის კოდი არის: <span style="color: green">{{$coupon}}</span></h2>
                <p>
                    კუპონის გამოსაყენებლად მიბრძანდით "{{$company->title}}" ის მაღაზიაში ან ეწვიეთ ვებ გვერდს: <a href="{{$company->site}}" target="_blank">{{$company->site}}</a> და შეიძინეთ სასირველი ნივთები {{$coupons->price}} ლარამდე
                </p>
            </div>
            <!-- .text -->
        @if (! empty($files['mixed']))
            <div class="attached files">
                <ul class="list-unstyled">
                @foreach ($files['mixed'] as $item)
                    <li>
                        <a href="{{$item->file}}" target="_blank">{{$item->title}}</a>
                    </li>
                @endforeach
                </ul>
            </div>
            <!-- .files -->
        @endif
        @if (! empty($files['images']))
            <div class="attached images">
            @foreach ($files['images'] as $item)
                <div class="col-md-3 item">
                    <a href="{{$item->file}}" class="img-pop" rel="photo" title="{{$item->title}}">
                        <img src="{{$item->file}}" width="270" height="180" alt="{{$item->title}}">
                    </a>
                </div>
                <!-- .col-md-3 -->
            @endforeach
            </div>
            <!-- .images -->
        @endif
        </div>
        <!-- .content -->
    </article>
    <!-- #item -->
</div>
<!-- .container -->
@endsection
