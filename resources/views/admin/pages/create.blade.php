@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="{{$icon = icon_type('pages')}}"></i>
            Pages
        </h1>
        <p class="description">Creation of the page</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{ cms_route('menus.index') }}"><i class="{{icon_type('menus')}}"></i>Menus</a>
            </li>
            <li class="active">
                <i class="{{$icon}}"></i>
                <strong>Pages</strong>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Create a page</h2>
    </div>
    <div class="panel-body">
        {!! Form::model($current, [
            'method' => 'post',
            'url'    => cms_route('pages.index', [$current->menu_id]),
            'class'  => 'form-horizontal'
        ]) !!}
            {!! Form::hidden('parent_id', null) !!}
            @include('admin.pages.form', [
                'submit'        => trans('general.create'),
                'submitAndBack' => trans('general.create_n_close'),
                'icon'          => 'save'
            ])
        {!! Form::close() !!}
    </div>
</div>
@include('admin.pages.scripts')
@endsection
