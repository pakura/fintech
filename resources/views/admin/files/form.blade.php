<div class="col-md-12">
    <div class="form-group">
        <label class="control-label required">Title:</label>
        {!! Form::text('title', null, [
            'id' => 'title' . $current->language,
            'class' => 'form-control',
        ]) !!}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="control-label required">File:</label>
        <div class="input-group">
            {!! Form::text('file', null, [
                'id' => 'file' . $current->language,
                'class' => 'form-control',
            ]) !!}
            <div class="input-group-btn popup" data-browse="file{{$current->language}}">
                <span class="btn btn-info">Browse</span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label class="control-label">Visible:</label>
        {!! Form::checkbox('visible', null, null, [
            'id' => 'visible' . $current->language,
            'class' => 'iswitch iswitch-secondary'
        ]) !!}
    </div>
</div>
<button type="button" class="btn btn-md btn-white" data-dismiss="modal">{{trans('general.close')}}</button>
<button type="submit" class="btn btn-md btn-secondary">{{trans('general.save')}}</button>
