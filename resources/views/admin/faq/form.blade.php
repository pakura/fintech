<div class="form-group{{($error = $errors->first('title')) ? ' validate-has-error' : '' }}">
    <label class="col-sm-2 control-label required">Title:</label>
    <div class="col-sm-10">
        {!! Form::text('title', null, [
            'id' => 'title' . $current->language,
            'class' => 'form-control',
        ]) !!}
        @if ($error)
        <span>{{$error}}</span>
        @endif
    </div>
</div>

<div class="form-group-separator"></div>

<div class="form-group">
    <label class="col-sm-2 control-label">Description:</label>
    <div class="col-sm-10">
        {!! Form::textarea('description', null, [
            'id' => 'description' . $current->language,
            'class' => 'form-control text-editor',
            'rows' => '10'
        ]) !!}
    </div>
</div>

<div class="form-group-separator"></div>

<div class="row">
    <div class="col-xs-4">
        <div class="form-group">
            <label class="col-sm-6 control-label">Visible:</label>
            <div class="col-sm-6">
                {!! Form::checkbox('visible', null, null, [
                    'id' => 'visible' . $current->language,
                    'class' => 'iswitch iswitch-secondary',
                    'data-lang' => 1
                ]) !!}
            </div>
        </div>
    </div>
</div>

<div class="form-group-separator"></div>

<div class="form-group">
    <div class="col-sm-10 btn-action pull-right">
        <button type="submit" class="btn btn-secondary" title="{{ $submit }}">
            <i class="fa fa-{{ $icon }}"></i>
        </button>
        <a href="{{ cms_route('faq.index', [$current->collection_id]) }}" class="btn btn-blue" title="{{ trans('general.back') }}">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
</div>
