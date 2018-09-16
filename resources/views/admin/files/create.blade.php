@if (! empty($current))
    <div class="modal fade" id="form-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-gallery-image">
                    <img src="{{$current->file ?: $current->file_default}}" class="img-responsive" />
                </div>
                {!! Form::model($current, [
                    'url' => cms_route('files.store', [$current->table_name, $current->table_id]),
                    'class' => 'form-create form-horizontal'
                ]) !!}
                @include('admin.files.form')
                {!!Form::close()!!}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var sort = '{{request('sort', 'desc')}}';
        var currentPage = '{{request('page', 1)}}';
        var creationPage = sort === 'desc' ? '1' : '{{request('lastPage', 1)}}';
        var formSelector = '#form-modal .form-create';

        $(formSelector).on('submit', function(e) {
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
                    window.location.href = '{{cms_route('files.index', [$current->table_name, $current->table_id])}}?page=' + creationPage;
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

                setTimeout(function() {
                    $('input[type="submit"], button[type="submit"]', form).prop('disabled', false);
                }, 800);
            });
        });

        $(formSelector + ' [name="file"]').on('fileSet', function() {
            var fileValue = $(this).val();
            var result = getFileImage(fileValue);

            var photoSelector = $('.modal-gallery-image img');
            photoSelector.removeClass('not-photo');
            if (! result.isPhoto) {
                photoSelector.addClass('not-photo');
            }
            photoSelector.attr('src', result.file);
        });
    </script>
    @include('admin.files.scripts')
@endif