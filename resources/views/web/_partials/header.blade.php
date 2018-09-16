<header id="header">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- .navbar-header -->
            <div id="navbar" class="navbar-collapse collapse">
                @include('web._partials.pages')
            @if (is_multilanguage())
                <ul class="nav navbar-nav navbar-right text-uppercase">
                @php($currentLang = language())
                @foreach (languages() as $key => $value)
                    <li{!!$key == $currentLang ? ' class="active"' : ''!!}>
                        <a href="{{$value['url']}}">{{$value['short_name']}}</a>
                    </li>
                @endforeach
                </ul>
            @endif
            </div>
            <!-- #navbar -->
        </div>
        <!-- .container -->
    </nav>
    <!-- .navbar -->
</header>
<!-- #header -->