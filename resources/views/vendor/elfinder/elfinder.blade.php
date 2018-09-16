<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>elFinder 2.1</title>
    <link rel="stylesheet" href="{{ asset('assets/js/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset($dir.'/css/elfinder.min.css') }}">
    <link rel="stylesheet" href="{{ asset($dir.'/css/theme.css') }}">
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset($dir.'/js/elfinder.min.js') }}"></script>
    <script type="text/javascript">
        // Documentation for client options:
        // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
        $(function() {
            // Initialize elFinder
            $('#elfinder').elfinder({
                customData: {
                    _token: '{{ csrf_token() }}'
                },
                url: '{{ cms_route("filemanager.connector") }}',  // connector URL
                height: 600,
                getFileCallback: function(file, instance) {
                    if (file.mime.indexOf('image/')) {
                        instance.exec('open');
                    } else {
                        instance.exec('quicklook');
                    }
                }
            });
        });
    </script>
    <style type="text/css">
        #elfinder {border:0;overflow:hidden;}
        .elfinder-workzone {border-left:1px solid #aaaaaa;border-right:1px solid #aaaaaa;}
        .elfinder-buttonset {padding-bottom:2px;}
        .elfinder .elfinder-button-search {margin-top:3px;}
        .elfinder-toolbar-button-separator {height:22px;}
        .ui-widget-header {border:1px solid #aaaaaa;background:#cccccc;}
        .ui-widget-content {border:1px solid #aaaaaa;}
        .ui-widget-header .ui-icon.ui-icon-search {background-image: url("{{ asset('assets/js/jquery-ui') }}/images/ui-icons_222222_256x240.png")}
        .ui-widget-header .ui-icon.ui-icon-close {background-image: url("{{ asset('assets/js/jquery-ui') }}/images/ui-icons_222222_256x240.png")}
    </style>
</head>
<body>
<div id="elfinder"></div>
</body>
</html>
