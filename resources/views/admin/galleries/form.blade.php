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

<div class="form-group{{($error = $errors->first('slug')) ? ' validate-has-error' : '' }}">
    <label class="col-sm-2 control-label required">Slug:</label>
    <div class="col-sm-10">
        {!! Form::text('slug', null, [
            'id' => 'slug' . $current->language,
            'class' => 'form-control',
            'data-lang' => 1,
        ]) !!}
        @if ($error)
        <span>{{$error}}</span>
        @endif
        <div class="desc">Slug must be as short as possible for SEO purposes.</div>
    </div>
</div>

<div class="form-group-separator"></div>

<div class="form-group{{($error = $errors->first('type')) ? ' validate-has-error' : '' }}">
    <label class="col-sm-2 control-label required">Type:</label>
    <div class="col-sm-10">
        {!! Form::select('type', inner_collection('galleries.types'), null, [
            'id' => 'type' . $current->language,
            'class' => 'form-control select',
        ] + ($current->id ? ['disabled' => 'disabled'] : [])) !!}
        @if ($error)
        <span>{{$error}}</span>
        @endif
    </div>
</div>

<div class="form-group-separator"></div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group{{($error = $errors->first('admin_order_by')) ? ' validate-has-error' : '' }}">
            <label class="col-sm-4 control-label required">Admin order by:</label>
            <div class="col-sm-8">
                {!! Form::select('admin_order_by', inner_collection('galleries.order_by'), null, [
                    'id' => 'admin_order_by',
                    'class' => 'form-control select',
                ]) !!}
                @if ($error)
                <span>{{$error}}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group{{($error = $errors->first('web_order_by')) ? ' validate-has-error' : '' }}">
            <label class="col-sm-4 control-label required">Web order by:</label>
            <div class="col-sm-8">
                {!! Form::select('web_order_by', inner_collection('galleries.order_by'), null, [
                    'id' => 'web_order_by',
                    'class' => 'form-control select',
                ]) !!}
                @if ($error)
                <span>{{$error}}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group-separator"></div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group{{($error = $errors->first('admin_sort')) ? ' validate-has-error' : '' }}">
            <label class="col-sm-4 control-label required">Admin sort:</label>
            <div class="col-sm-8">
                {!! Form::select('admin_sort', inner_collection('galleries.sort'), null, [
                    'id' => 'admin_sort' . $current->language,
                    'class' => 'form-control select',
                    'data-lang' => 1
                ]) !!}
                @if ($error)
                <span>{{$error}}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group{{($error = $errors->first('web_sort')) ? ' validate-has-error' : '' }}">
            <label class="col-sm-4 control-label required">Web sort:</label>
            <div class="col-sm-8">
                {!! Form::select('web_sort', inner_collection('galleries.sort'), null, [
                    'id' => 'web_sort' . $current->language,
                    'class' => 'form-control select',
                    'data-lang' => 1
                ]) !!}
                @if ($error)
                <span>{{$error}}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group-separator"></div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group{{($error = $errors->first('admin_per_page')) ? ' validate-has-error' : '' }}">
            <label class="col-sm-4 control-label required">Admin per page:</label>
            <div class="col-sm-8">
                <div id="admin_per_page{{$current->language}}" class="input-group spinner" data-type="general" data-step="1" data-min="1" data-max="50">
                    <div class="input-group-btn">
                        <span class="btn btn-info" data-type="decrement">-</span>
                    </div>
                    {!! Form::text('admin_per_page', null, [
                        'class' => 'admin_per_page form-control text-center',
                        'readonly' => 1,
                    ]) !!}
                    <div class="input-group-btn">
                        <span class="btn btn-info" data-type="increment">+</span>
                    </div>
                </div>
                @if ($error)
                <span class="text-danger">{{$error}}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group{{($error = $errors->first('web_per_page')) ? ' validate-has-error' : '' }}">
            <label class="col-sm-4 control-label required">Web per page:</label>
            <div class="col-sm-8">
                <div id="web_per_page{{$current->language}}" class="input-group spinner" data-type="general" data-step="1" data-min="1" data-max="50">
                    <div class="input-group-btn">
                        <span class="btn btn-info" data-type="decrement">-</span>
                    </div>
                    {!! Form::text('web_per_page', null, [
                        'class' => 'web_per_page form-control text-center',
                        'readonly' => 1
                    ]) !!}
                    <div class="input-group-btn">
                        <span class="btn btn-info" data-type="increment">+</span>
                    </div>
                </div>
                @if ($error)
                <span class="text-danger">{{$error}}</span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group-separator"></div>

<div class="form-group">
    <label class="col-sm-2 control-label">Meta description:</label>
    <div class="col-sm-10">
        {!! Form::text('meta_desc', null, [
            'id' => 'meta_desc' . $current->language,
            'class' => 'form-control',
        ]) !!}
        <div class="desc">Description for search engines. It is best to keep meta descriptions less then 150 or 160 characters.</div>
    </div>
</div>

<div class="form-group-separator"></div>

<div class="form-group">
    <label class="col-sm-2 control-label">Image:</label>
    <div class="col-sm-6">
        <div class="input-group">
            {!! Form::text('image', null, [
                'id' => 'image' . $current->language,
                'class' => 'form-control',
                'data-lang' => 1
            ]) !!}
            <div class="input-group-btn popup" data-browse="image{{$current->language}}">
                <span class="btn btn-info">Browse</span>
            </div>
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
    @if ($current->id)
        <a href="{{ cms_route($current->type . '.index', [$current->id]) }}" class="btn btn-info" title="{{ trans('general.'.$current->type) }}">
            <span class="{{icon_type($current->type)}}"></span>
        </a>
    @endif
        <a href="{{ cms_route('galleries.index', [$current->collection_id]) }}" class="btn btn-blue" title="{{ trans('general.back') }}">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
</div>
