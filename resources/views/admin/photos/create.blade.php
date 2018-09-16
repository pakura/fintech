@if (! empty($current))
<div class="modal fade" id="form-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-gallery-image">
                <img src="{{$current->file ?: $current->file_default}}" class="img-responsive" />
            </div>
            {!! Form::model($current, [
                'url'   => cms_route('photos.store', [$current->gallery_id]),
                'class' => 'form-create form-horizontal'
            ]) !!}
            <div class="modal-body">
                <div class="row">
                    @include('admin.photos.form')
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<script type="text/javascript">
    var sort = '{{request('sort', 'desc')}}';
    var currentPage = '{{request('page', 1)}}';
    var creationPage = sort === 'desc' ? 1 : '{{request('lastPage', 1)}}';
    var formSelector = $('#form-modal').find('.form-create');

    formSelector.on('submit', function(e) {
        e.preventDefault();

        var form = $(this);
        $('.form-group', form).find('.text-danger').remove();
        var url = form.attr('action');
        var input = form.serialize();
        $.post(url, input, function(data) {
            // alert toastr message
            toastr[data.result](data.message);

            var imageContainer = '.gallery-env .album-images';
            var insert = $(imageContainer).data('insert');
            insert = Function("$('"+imageContainer+"')."+insert+"('"+data.view+"');");
            insert();

            cbr_replace();

            if (currentPage !== creationPage) {
                window.location.href = '{{cms_route('photos.index', [$current->gallery_id])}}?page=' + creationPage;
            } else {
                $('#form-modal').find('[data-dismiss]').trigger('click');
            }
        }, 'json').fail(function(xhr) {
            if (xhr.status === 422) {
                var data = xhr.responseJSON;

                $.each(data, function(index, element) {
                    var input = $('#' + index, form);
                    input.closest('.form-group').addClass('validate-has-error');
                    input.after('<span class="text-danger">'+element+'</span>');
                });
            } else {
                alert(xhr.responseText);
            }
        });
    });

    $('#file', formSelector).on('fileSet', function() {
        $('.modal-gallery-image img').attr('src', $(this).val());
    });
</script>
@endif