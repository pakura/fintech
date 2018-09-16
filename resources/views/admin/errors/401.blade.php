<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="cms" />
    <title>401 Unauthorized</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/admin/favicon.ico') }}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/font-awesome-4.6.3/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/xenon-core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/xenon-components.css') }}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="page-body">
    <div class="page-container">
        <div class="main-content">
            <div class="page-error centered">
                <div class="error-symbol">
                    <i class="fa fa-user-times"></i>
                </div>
                <h2>
                    401 Unauthorized
                    <small>The request requires authentication!</small>
                </h2>
                <p>The request has not been applied because it lacks valid authentication credentials for the target resource.</p>
            </div>
        @if (! request()->has('iframe'))
            <div class="page-error-search centered">
                <a href="{{redirect()->intended()->getTargetUrl()}}" class="go-back">
                    <i class="fa fa-angle-left"></i>
                    Go back
                </a>
            </div>
        @endif
        </div>
    </div>
</body>
</html>

