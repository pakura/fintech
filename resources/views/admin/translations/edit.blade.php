@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="fa fa-language"></i>
            Translations
        </h1>
        <p class="description">Edit translations</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-language"></i>
                <strong>Translations</strong>
            </li>
        </ol>
    </div>
</div>
<div class="clearfix">
    <ul class="nav nav-tabs col-xs-8">
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
</div>
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h2 class="panel-title">Edit translation</h2>
        <a href="{{cms_route('translations.create')}}" class="pull-right">Add more</a>
    </div>
    <div class="panel-body">
        <div class="tab-content">
        @foreach ($items as $current)
            <div class="tab-pane{{language() != $current->language ? '' : ' active'}}" id="item-{{$current->language}}">
            {!! Form::model($current, [
                'method'    => 'put',
                'url'       => cms_route('translations.update', [$current->id], is_multilanguage() ? $current->language : null),
                'class'     => 'form-horizontal '.$cmsSettings->get('ajax_form'),
                'data-lang' => $current->language
            ]) !!}
                @include('admin.translations.form', [
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
@endsection
