<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Content Management System">
<meta name="author" content="Vaja Sinauridze <vaja@mobility.ge>">
<meta name="robots" content="noindex, nofollow">
<meta name="version" content="{{config('cms.version')}}">
<title>CMS</title>
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/fancybox/jquery.fancybox.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/stacktable/stacktable.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/uikit/uikit.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/xenon-core.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/xenon-forms.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/xenon-components.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/xenon-skins.css') }}">
@stack('head')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->