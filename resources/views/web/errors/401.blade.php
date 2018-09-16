<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="401 Unauthorized" />
    <title>401 Unauthorized</title>
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Ubuntu:400,300'>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="error">
        <div id="message" class="text-center">
            <h1>401</h1>
            <h2><span>Unauthorized</span></h2>
        </div>
        <!-- #message -->
    @if (! request()->has('iframe'))
        <div id="btn" class="text-center">
            <a href="{{redirect()->intended()->getTargetUrl()}}" class="text-uppercase">Go Back</a>
        </div>
        <!-- #btn -->
    @endif
    </div>
    <!-- #error -->
</body>
</html>