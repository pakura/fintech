<div class="form-group{{($error = $errors->first('name')) ? ' validate-has-error' : '' }}">
    <label class="col-sm-2 control-label required">Name:</label>
    <div class="col-sm-6">
        {!! Form::text('name', null, [
            'id' => 'name' . $current->language,
            'class' => 'form-control',
            'data-lang' => 1
        ] + ($current->name ? ['readonly'] : [])) !!}
        @if ($error)
        <span>{{$error}}</span>
        @endif
        <div class="desc">The name is the identifier for the "value" (it's not changeable after creation!)</div>
    </div>
</div>

<div class="form-group-separator"></div>

<div class="form-group{{($error = $errors->first('title')) ? ' validate-has-error' : '' }}">
    <label class="col-sm-2 control-label required">Title:</label>
    <div class="col-sm-6">
        {!! Form::text('title', null, [
            'id' => 'title' . $current->language,
            'class' => 'form-control',
            'data-lang' => 1
        ]) !!}
        @if ($error)
        <span>{{$error}}</span>
        @endif
        <div class="desc">The title for the "value". It's visible only for CMS Users</div>
    </div>
</div>

<div class="form-group-separator"></div>

<div class="form-group{{($error = $errors->first('value')) ? ' validate-has-error' : '' }}">
    <label class="col-sm-2 control-label required">Value:</label>
    <div class="col-sm-6">
        {!! Form::text('value', null, [
            'id' => 'value' . $current->language,
            'class' => 'form-control',
        ]) !!}
        @if ($error)
        <span>{{$error}}</span>
        @endif
        <div class="desc">The value contains the translated text that will be displayed on the website</div>
    </div>
</div>

<div class="form-group-separator"></div>

<div class="form-group">
    <label class="col-sm-2 control-label">Type:</label>
    <div class="col-sm-6">
        {!! Form::select('type', ['' => 'Global'] + $transTypes, null, [
            'id' => 'type' . $current->language,
            'class' => 'form-control',
            'data-lang' => 1
        ]) !!}
        <div class="desc">The type that will separate translations.</div>
    </div>
</div>

<div class="form-group-separator"></div>

<div class="form-group">
    <div class="col-sm-10 btn-action pull-right">
        <button type="submit" class="btn btn-secondary" title="{{ $submit }}">
            <i class="fa fa-{{ $icon }}"></i>
        </button>
        <a href="{{ cms_route('translations.index') }}" class="btn btn-blue" title="{{ trans('general.back') }}">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
</div>