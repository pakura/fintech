<div id="movable-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{$route}}" method="post" id="movable-form" class="{{$cmsSettings->get('ajax_form')}}">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="column" value="{{$column}}">
                <input type="hidden" name="id" value="0">
            @if (isset($recursive) && $recursive)
                <input type="hidden" name="recursive" value="1">
            @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="column_value">Move to:</label>
                            <select name="column_value" id="column_value" class="form-control">
                        @if (! empty($list))
                            @foreach ($list as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-white" data-dismiss="modal">{{trans('general.close')}}</button>
                        <button type="submit" class="btn btn-secondary">{{trans('general.save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
    // Load changer modal
    var id = 0;
    var movableModal = $('#movable-modal');
    $('#items').on('click', '.movable', function(e) {
        e.preventDefault();

        id = $(this).data('id');
        movableModal.find('input[name="id"]').val(id);

        movableModal.modal();
    });

    // Remove moved item
    $('#movable-form').on('ajaxFormSuccess', function() {
        var target = $(this).find('#column_value').val();

        movableModal.modal('hide');

        if (target !== '{{isset($parentId) ? $parentId : 0}}') {
            $('#item'+id).remove();
        }
    });
});
</script>
