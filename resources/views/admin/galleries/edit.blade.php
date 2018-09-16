@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="{{$icon = icon_type('galleries')}}"></i>
            Galleries
        </h1>
        <p class="description">Edit gallery</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{ cms_route('collections.index') }}"><i class="{{icon_type('collections')}}"></i>Collections</a>
            </li>
            <li class="active">
                <i class="{{$icon}}"></i>
                <strong>Gallery</strong>
            </li>
        </ol>
    </div>
</div>
<ul class="nav nav-tabs">
@if (is_multilanguage())
    @foreach ($items as $current)
        <li{!!language() != $current->language ? '' : ' class="active"'!!}>
            <a href="#item-{{$current->language}}" data-toggle="tab">
                <span class="visible-xs">{{$current->language}}</span>
                <span class="hidden-xs">{{language($current->language)}}</span>
            </a>
        </li>
    @endforeach
@else
    @foreach ($items as $current)
        <li class="active">
            <a href="#item-{{$current->language}}" data-toggle="tab">
                <span class="visible-xs"><i class="fa fa-home"></i></span>
                <span class="hidden-xs">
                    <i class="fa fa-home"></i> General
                </span>
            </a>
        </li>
    @endforeach
@endif
</ul>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Edit gallery</h2>
        <div class="panel-options">
            <a href="#" data-toggle="panel">
                <span class="collapse-icon">&ndash;</span>
                <span class="expand-icon">+</span>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="tab-content">
        @foreach ($items as $current)
            <div class="tab-pane{{language() != $current->language ? '' : ' active'}}" id="item-{{$current->language}}">
                {!! Form::model($current, [
                    'method'    => 'put',
                    'url'       => cms_route('galleries.update', [$current->collection_id, $current->id], is_multilanguage() ? $current->language : null),
                    'class'     => 'form-horizontal '.$cmsSettings->get('ajax_form'),
                    'data-lang' => $current->language
                ]) !!}
                    {!! Form::hidden('type', null) !!}
                    @include('admin.galleries.form', [
                        'submit'        => trans('general.update'),
                        'submitAndBack' => trans('general.update_n_back'),
                        'icon'          => 'save'
                    ])
                {!! Form::close() !!}
            </div>
        @endforeach
        </div>
    </div>
</div>
@include('admin.galleries.scripts')
@endsection
