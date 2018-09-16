@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="{{$icon = icon_type('photos')}}"></i>
            Slider
        </h1>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="{{$icon}}"></i>
                Slider
            </li>
        </ol>
    </div>
</div>
<section class="gallery-env">
    <div class="row">
        <div class="col-sm-12">
            <div class="album-header">
                <h2>Slider</h2>
                <ul class="album-options list-unstyled list-inline">
                    <li>
                        <input type="checkbox" class="cbr" id="select-all" />
                        <label>Select all</label>
                    </li>
                    <li>
                        <a href="#" data-modal="add">
                            <i class="{{$icon}}"></i>
                            Add Image
                        </a>
                    </li>
                    <li>
                        <a href="#" data-action="sort">
                            <i class="fa fa-arrows"></i>
                            Re-order
                        </a>
                    </li>
                    <li>
                        <a href="#" data-modal="multiselect">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                    </li>
                    <li>
                        <a href="#" data-delete="multiselect">
                            <i class="fa fa-trash"></i>
                            Trash
                        </a>
                    </li>
                </ul>
            </div>
            <div class="album-sorting-info">
                <div class="album-sorting-info-inner clearfix">
                    <a href="#" id="save-tree" data-token="{{csrf_token()}}" class="btn btn-secondary btn-xs btn-single btn-icon btn-icon-standalone pull-right" data-action="sort">
                        <i class="fa fa-save"></i>
                        <span>Save Current Order</span>
                    </a>
                    <i class="fa fa-arrows-alt"></i>
                    Drag images to sort them
                </div>
            </div>
            <ul id="nestable-list" class="album-images list-unstyled row" data-insert="prepend" data-uk-nestable="{maxDepth:1}">
            @foreach($items as $item)
                <li id="item{{$item->id}}" data-id="{{$item->id}}" data-pos="{{$item->position}}" data-url="{{cms_route('slider.edit', [$item->id])}}" class="item col-lg-3 col-md-4 col-sm-4 col-xs-6">
                    <div class="album-image">
                        <a href="#" class="thumb" data-modal="edit">
                            <img src="{{$item->file ?: $item->file_default}}" class="img-responsive" alt="{{$item->title}}" />
                        </a>
                        <a href="#" class="name">
                            <span class="title">{{$item->title}}</span>
                            <em>{{$item->created_at->format('d F Y')}}</em>
                        </a>
                        <div class="image-options">
                            <div class="select-item dib">
                                <input type="checkbox" data-id="{{$item->id}}" class="cbr" />
                            </div>
                            <a href="#" data-url="{{cms_route('slider.visibility', [$item->id])}}" class="visibility" title="{{trans('general.visibility')}}">
                                <i class="fa fa-eye{{$item->visible ? '' : '-slash'}}"></i>
                            </a>
                            <a href="#" data-modal="edit" title="{{trans('general.edit')}}"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-delete="this" data-id="{{$item->id}}" title="{{trans('general.delete')}}"><i class="fa fa-trash"></i></a>
                        </div>
                        <div class="btn-action"></div>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</section>
@push('body.bottom')
<script type="text/javascript">
$(function() {
    var routeCreate = '{{cms_route('slider.create')}}';
    var routeIndex = '{{cms_route('slider.index')}}';
    var routePosition = '{{cms_route('slider.updatePosition')}}';
    var sort = 'desc';
    var page = 0;
    var hasMorePages = '';
    @include('admin._scripts.album')
});
</script>
<script src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/uikit/js/uikit.min.js') }}"></script>
<script src="{{ asset('assets/js/uikit/js/addons/nestable.min.js') }}"></script>
@endpush
@endsection
