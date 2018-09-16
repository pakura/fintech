@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="{{$iconCurrent = icon_type('galleries')}}"></i>
            {{ $parent->title }}
        </h1>
        <p class="description">{{ $parent->description }}</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{ cms_route('collections.index') }}"><i class="{{$iconParent = icon_type('collections')}}"></i>Collections</a>
            </li>
            <li class="active">
                <i class="{{$iconCurrent}}"></i>
                <strong>{{ $parent->title }}</strong>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-9 pull-right has-sidebar">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Albums</h2>
                <div class="panel-options">
                    <a href="{{cms_route('collections.edit', [$parent->id])}}">
                        <i class="fa fa-gear"></i>
                    </a>
                    <a href="#" data-toggle="panel">
                        <span class="collapse-icon">&ndash;</span>
                        <span class="expand-icon">+</span>
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <a href="{{ cms_route('galleries.create', [$parent->id]) }}" class="btn btn-secondary btn-icon-standalone">
                    <i class="{{$iconCurrent}}"></i>
                    <span>{{ trans('general.create') }}</span>
                </a>
                <button id="save-tree" data-token="{{csrf_token()}}" class="btn btn-secondary btn-icon-standalone dn" disabled>
                    <i><b class="icon-var fa-save"></b></i>
                    <span>{{ trans('general.save') }}</span>
                </button>
                <div id="items">
                    <ul id="nestable-list" class="uk-nestable" data-uk-nestable="{maxDepth:1}">
                    @foreach ($items as $item)
                        <li id="item{{ $item->id }}" class="item" data-id="{{ $item->id }}" data-pos="{{$item->position}}">
                            <div class="uk-nestable-item clearfix">
                                <div class="row">
                                    <div class="col-sm-7 col-xs-10">
                                    @if ($parent->admin_order_by == 'position')
                                        <div class="uk-nestable-handle pull-left"></div>
                                    @endif
                                        <div class="list-label"><a href="{{ $editUrl = cms_route('galleries.edit', [$parent->id, $item->id]) }}">{{ $item->title }}</a></div>
                                    </div>
                                    <div class="col-sm-5 col-xs-2">
                                        <div class="btn-action togglable pull-right">
                                            <div class="btn btn-gray item-id disabled">#{{$item->id}}</div>
                                            <a href="#" class="movable btn btn-white" title="Move to collection" data-id="{{$item->id}}">
                                                <span class="{{$iconParent}}"></span>
                                            </a>
                                            {!! Form::open(['method' => 'post', 'url' => cms_route('galleries.visibility', [$item->id]), 'class' => 'visibility', 'id' => 'visibility' . $item->id]) !!}
                                                <button type="submit" class="btn btn-{{$item->visible ? 'white' : 'gray'}}" title="{{trans('general.visibility')}}">
                                                    <span class="fa fa-eye{{$item->visible ? '' : '-slash'}}"></span>
                                                </button>
                                            {!! Form::close() !!}
                                            <a href="{{ cms_route($item->type . '.index', [$item->id]) }}" class="btn btn-info" title="{{trans('general.galleries')}}">
                                                <span class="{{icon_type($item->type)}}"></span>
                                            </a>
                                            <a href="{{ $editUrl }}" class="btn btn-orange" title="{{trans('general.edit')}}">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            {!! Form::open(['method' => 'delete', 'url' => cms_route('galleries.destroy', [$parent->id, $item->id]), 'class' => 'form-delete']) !!}
                                                <button type="submit" class="btn btn-danger" title="{{trans('general.delete')}}">
                                                    <span class="fa fa-trash"></span>
                                                </button>
                                            {!! Form::close() !!}
                                        </div>
                                        <a href="#" class="btn btn-primary btn-toggle pull-right">
                                            <span class="fa fa-toggle-left"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                    {!! $items->links() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 content-sidebar pull-left">
        <a href="{{cms_route('collections.create', ['type' => $parent->type])}}" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right">
            <i class="{{$iconParent}}"></i>
            <span>კოლექციის დამატება</span>
        </a>
        <ul class="list-unstyled bg">
        @foreach ($parentSimilar as $item)
            <li{!!$item->id != $parent->id ? '' : ' class="active"'!!}>
                <a href="{{ cms_route($item->type . '.index', $item->id) }}">
                    <i class="fa fa-folder{{$item->id != $parent->id ? '' : '-open'}}-o"></i>
                    <span>{{$item->title}}</span>
                </a>
            </li>
        @endforeach
        </ul>
    </div>
</div>
@push('body.bottom')
@include('admin._scripts.move', ['route' => cms_route('galleries.move', [$parent->id]), 'column' => 'collection_id', 'list' => $parentSimilar, 'parentId' => $parent->id])
<script type="text/javascript">
$(function() {
@if ($parent->admin_order_by == 'position')
    positionable('{{ cms_route('galleries.updatePosition') }}', '{{$parent->admin_sort}}', '{{request('page', 1)}}', '{{$items->hasMorePages()}}');
@endif
});
</script>
<script src="{{ asset('assets/js/uikit/js/uikit.min.js') }}"></script>
<script src="{{ asset('assets/js/uikit/js/addons/nestable.min.js') }}"></script>
@endpush
@endsection
