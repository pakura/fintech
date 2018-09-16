@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="{{$icon = icon_type('collections')}}"></i>
            Collections
        </h1>
        <p class="description">Edit collection</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="{{$icon}}"></i>
                <strong>Collections</strong>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Edit collection</h2>
        <div class="panel-options">
            <a href="#" data-toggle="panel">
                <span class="collapse-icon">&ndash;</span>
                <span class="expand-icon">+</span>
            </a>
        </div>
        <a href="{{cms_route('collections.create')}}" class="pull-right padr">Add more</a>
    </div>
    <div class="panel-body">
        {!! Form::model($current, [
            'method' => 'put',
            'url'  => cms_route('collections.update', [$current->id]),
            'class'  => 'form-horizontal '.$cmsSettings->get('ajax_form')
        ]) !!}
            {!! Form::hidden('type', null) !!}
            @include('admin.collections.form', [
                'submit'        => trans('general.update'),
                'submitAndBack' => trans('general.update_n_back'),
                'icon'          => 'save'
            ])
        {!! Form::close() !!}
    </div>
</div>
@endsection
