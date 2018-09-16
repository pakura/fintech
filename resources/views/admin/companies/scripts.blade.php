@push('head')
<link rel="stylesheet" href="{{ asset('assets/js/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endpush
@push('body.bottom')
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
            'format': 'YYYY-MM-DD HH:mm:ss'
        });
    });
</script>
@endpush