<!-- Main Footer -->
<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
<!-- Or class "fixed" to  always fix the footer to the end of page -->
<footer class="main-footer sticky">
    <div class="footer-inner">
        <!-- Add your copyright text here -->
        <div class="footer-text">
            &copy; {{date('Y')}} Mobility
        </div>
        <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
        <div class="go-up">
            <a href="#" rel="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </div>
</footer>
<!-- Basic Scripts -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/js/resizeable.js') }}"></script>
<script src="{{ asset('assets/js/joinable.js') }}"></script>
<script src="{{ asset('assets/js/xenon-api.js') }}"></script>
<script src="{{ asset('assets/js/xenon-toggles.js') }}"></script>

<!-- tinymce scripts -->
<script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>

<!-- datatables scripts -->
<script src="{{ asset('assets/js/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/dataTables.bootstrap.js') }}"></script>

<!-- fancybox scripts -->
<script src="{{ asset('assets/js/fancybox/jquery.fancybox.pack.js') }}"></script>

<!-- stacktable scripts -->
<script src="{{ asset('assets/js/stacktable/stacktable.js') }}"></script>

<!-- toast notifications -->
<script src="{{ asset('assets/js/toastr/toastr.min.js') }}"></script>

<!-- custom scripts -->
<script src="{{ asset('assets/js/xenon-custom.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script type="text/javascript">
$(function() {
    // Initialize tinymce
    tinymce.init({
        selector: ".text-editor",
        theme: "modern",
        relative_urls: false,
        remove_script_host: false,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
        ],
        toolbar: "insertfile undo redo | styleselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor | fullscreen",
        fontsize_formats: '10px 12px 14px 16px 18px 20px 22px 24px 26px 30px 36px',
        image_advtab: true,

        file_browser_callback : elFinderBrowser,

        setup: function(ed) {
            ed.on("init", function() {
                $(this.contentAreaContainer.parentElement).find("div.mce-toolbar-grp").hide();
            });
            ed.on('focus blur', function(e) {
                if (e.type === 'focus') {
                    $(this.contentAreaContainer.parentElement).find("div.mce-toolbar-grp").show();
                }
                // Add "table" class to all table tags
                tinymce.activeEditor.dom.addClass(tinymce.activeEditor.dom.select('table'), 'table');
            });
            ed.on('change', function() {
                tinymce.triggerSave();
            });
        }
    });

    // elFinder callback for tinymce
    function elFinderBrowser(field_name, url, type, win) {
        tinymce.activeEditor.windowManager.open({
            file: '{{ cms_route('filemanager.tinymce4') . '?iframe=1' }}', // use an absolute path!
            title: 'elFinder 2.1',
            width: 900,
            height: 600
            // resizable: 'yes'
        }, {
            setUrl: function(url) {
                win.$('#' + field_name).val(url);
            }
        });
        return false;
    }

    // Fancybox click event handler
    $(document).on('click', '.popup', function(e){
        e.preventDefault();
        var id = $(this).data('browse');
        $.fancybox({
            width    : 900,
            height   : 600,
            type     : 'iframe',
            href     : '{{ cms_url('filemanager/popup') }}/' + id + '?iframe=1',
            autoSize : false,
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
    });

    // Initialize stacktable
    $('.stacktable').stacktable();

    // toast notification options
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-{{$cmsSettings->get('alert_position', 'top-right')}}",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "4000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    var notifications = $('.notifications');
    $('.external a', notifications).on('click', function(e) {
        e.preventDefault();
        var target = $(this);
        $.get($(this).attr('href'), {}, function() {
            $('.sm-date', notifications).html('{{date('d F Y')}}');
            $('.sm-time', notifications).html('{{date('H:i')}}');
            $('.sm-status', target).html('Update now!');
            toastr['success']('Sitemap has been saved successfully');
        }, 'json').fail(function(xhr) {
            alert(xhr.responseText);
        });
    });
@if (session()->has('alert'))

    toastr["{{session('alert.result')}}"]("{{session('alert.message')}}");
@endif
@if (! session()->has('includeLockscreen') && $cmsSettings->get('lockscreen'))

    lockscreen('{{$cmsSettings->get('lockscreen')}}', '{{cms_route('lockscreen')}}');
@endif
});
</script>
@stack('body.bottom')
