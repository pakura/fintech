<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{$current->meta_desc}}">
<meta name="robots" content="index, follow">
<meta property="og:url" content="{{$url = web_url($current->slug, [], true)}}">
<meta property="og:type" content="Website">
<meta property="og:site_name" content="{{$trans->get('title')}}">
<meta property="og:title" content="{{$current->title}}">
<meta property="og:description" content="{{$current->meta_desc}}"/>
<meta property="og:image" content="{{$current->image}}">
<title>{{$current->title}}</title>
<link rel="canonical" href="{{$url}}">
@if (count($languages = languages()) > 1)
@foreach ($languages as $key => $value)
<link rel="alternate" hreflang="{{$key}}" href="{{web_url($current->slug, [], $key)}}">
@endforeach
@endif
<link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }}">
<link rel="stylesheet" media="all" href="{{asset('assets/site/css/main.css')}}">
<link rel="stylesheet" media="all" href="{{asset('assets/site/css/' . language() . '.css')}}">
<script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
