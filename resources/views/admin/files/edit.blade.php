@if (! empty($items))
    <div class="modal fade" id="form-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="tab-content">
                    @foreach ($items as $current)
                        <div class="tab-pane{{language() != $current->language ? '' : ' active'}}" id="modal-item-{{$current->language}}">
                            <div class="modal-gallery-image">
                                @if (in_array($ext = pathinfo($current->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{$current->file}}" class="file{{$current->language}} img-responsive" />
                                @elseif( ! empty($ext))
                                    <img src="{{asset('assets/images/file-ext-icons/'.$ext.'.png')}}" class="file{{$current->language}} not-photo img-responsive" alt="{{$current->title}}" />
                                @else
                                    <img src="{{asset('assets/images/file-ext-icons/www.png')}}" class="file{{$current->language}} not-photo img-responsive" alt="{{$current->title}}" />
                                @endif
                            </div>
                            {!! Form::model($current, [
                                'method' => 'put',
                                'url' => cms_route('files.update', [$current->table_name, $current->table_id, $current->id], is_multilanguage() ? $current->language : null),
                                'class' => 'form-horizontal '.$cmsSettings->get('ajax_form'),
                                'data-lang' => $current->language
                            ]) !!}
                            <div class="modal-body">
                                <div class="row">
                                    @include('admin.files.form')
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>
                    @endforeach
                </div>
                @if (is_multilanguage())
                    <ul class="modal-footer modal-gallery-top-controls nav nav-tabs">
                        @foreach ($items as $current)
                            <li{!!language() != $current->language ? '' : ' class="active"'!!}>
                                <a href="#modal-item-{{$current->language}}" data-toggle="tab">
                                    <span class="visible-xs">{{$current->language}}</span>
                                    <span class="hidden-xs">{{language($current->language)}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var currentLang = '{{language()}}';
        var formSelector = '#form-modal .ajax-form';
        $(formSelector).on('ajaxFormSuccess', function() {
            var lang = $(this).data('lang');
            if (lang === currentLang) {
                var item = $(formSelector + '[data-lang="'+lang+'"]');

                var title = $('[name="title"]', item).val();
                var file = $('[name="file"]', item).val();
                var visible = $('[name="visible"]', item).prop('checked');

                item = $('.gallery-env #item{{$current->id}}');
                $('.title', item).text(title);
                $('.thumb img', item).attr('src', getFileImage(file).file);

                var icon = visible ? 'fa-eye' : 'fa-eye-slash';
                $('.visibility i', item).attr('class', icon);
            }
        });

        $(formSelector + ' [name="file"]').on('fileSet', function() {
            var fileId = $(this).attr('id');
            var fileValue = $(this).val();
            var result = getFileImage(fileValue);

            var photoSelector = $('#form-modal .' + fileId);
            photoSelector.removeClass('not-photo');
            if (! result.isPhoto) {
                photoSelector.addClass('not-photo');
            }
            photoSelector.attr('src', result.file);
        });
    </script>
    @include('admin.files.scripts')
@endif