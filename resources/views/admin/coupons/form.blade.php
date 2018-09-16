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

<div class="form-group{{($error = $errors->first('price')) ? ' validate-has-error' : '' }}">
    <label class="col-sm-2 control-label required">Price:</label>
    <div class="col-sm-10">
        {!! Form::text('price',  null, [
            'id' => 'price' . $current->language,
            'class' => 'form-control',
        ]) !!}
        @if ($error)
            <span>{{$error}}</span>
        @endif
    </div>
</div>

<div class="form-group{{($error = $errors->first('total_count')) ? ' validate-has-error' : '' }}">
    <label class="col-sm-2 control-label required">Count of coupons:</label>
    <div class="col-sm-10">
        {!! Form::text('total_count',  null, [
            'id' => 'total_count' . $current->language,
            'class' => 'form-control',
        ]) !!}
        @if ($error)
            <span>{{$error}}</span>
        @endif
    </div>
</div>

<div class="form-group-separator"></div>


<div class="form-group{{($error = $errors->first('company_id')) ? ' validate-has-error' : '' }}">
    <label class="col-sm-2 control-label required">Company:</label>
    <div class="col-sm-10">
        {!! Form::select('company_id', $companies,null, [
            'id' => 'company_id' . $current->language,
            'class' => 'form-control',
        ]) !!}
        @if ($error)
            <span>{{$error}}</span>
        @endif
    </div>
</div>

<div class="form-group-separator"></div>

<div class="form-group">
    <label class="col-sm-2 control-label">Created at:</label>
    <div class="col-lg-6 col-sm-10">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </span>
            {!! Form::text('created_at', null, [
                'id' => 'created_at' . $current->language,
                'class' => 'form-control datetimepicker',
                'data-format' => 'yyyy-mm-dd',
            ]) !!}
        </div>
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
        <a href="{{ cms_route('articles.index', [$current->collection_id]) }}" class="btn btn-blue" title="{{ trans('general.back') }}">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
</div>
