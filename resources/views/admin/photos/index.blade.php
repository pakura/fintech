@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="{{$iconCurrent = icon_type('photos')}}"></i>
            {{ $parent->title }}
        </h1>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{ cms_route('collections.index') }}"><i class="{{icon_type('collections')}}"></i>Collections</a>
            </li>
            <li>
                <a href="{{ cms_route('galleries.index', [$parent->collection_id]) }}"><i class="{{icon_type('galleries')}}"></i>Galleries</a>
            </li>
            <li class="active">
                <strong>{{ $parent->title }}</strong>
            </li>
        </ol>
    </div>
</div>
<section class="gallery-env">
    <div class="row">
        <div class="col-sm-9 gallery-right">
            <div class="album-header">
                <h2>Photos</h2>
                <ul class="album-options list-unstyled list-inline">
                    <li>
                        <a href="{{cms_route('galleries.edit', [$parent->collection_id, $parent->id])}}">
                            <i class="fa fa-gear"></i>
                        </a>
                    </li>
                    <li>
                        <input type="checkbox" class="cbr" id="select-all" />
                        <label>Select all</label>
                    </li>
                    <li>
                        <a href="#" data-modal="add">
                            <i class="{{$iconCurrent}}"></i>
                            Add Image
                        </a>
                    </li>
                @if ($parent->admin_order_by == 'position')
                    <li>
                        <a href="#" data-action="sort">
                            <i class="fa fa-arrows"></i>
                            Re-order
                        </a>
                    </li>
                @endif
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
            <ul id="nestable-list" class="album-images list-unstyled row" data-insert="{{$parent->admin_sort == 'desc' ? 'prepend' : 'append'}}" data-uk-nestable="{maxDepth:1}">
            @foreach($items as $item)
                <li id="item{{$item->id}}" data-id="{{$item->id}}" data-pos="{{$item->position}}" data-url="{{cms_route('photos.edit', [$parent->id, $item->id])}}" class="item col-lg-3 col-md-4 col-sm-4 col-xs-6">
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
                            <a href="#" data-url="{{cms_route('photos.visibility', [$item->id])}}" class="visibility" title="{{trans('general.visibility')}}">
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
            {!! $items->links() !!}
        </div>
        <div class="col-sm-3 gallery-left">
            <div class="gallery-sidebar">
                <a href="{{cms_route('galleries.create', [$parent->collection_id, 'type' => $parent->type])}}" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right">
                    <i class="{{$iconCurrent}}"></i>
                    <span>ალბომის დამატება</span>
                </a>
                <ul class="list-unstyled">
                @foreach ($parentSimilar as $item)
                    <li{!!$item->id != $parent->id ? '' : ' class="active"'!!}>
                        <a href="{{ cms_route($item->type . '.index', [$item->id]) }}">
                            <i class="fa fa-folder{{$item->id != $parent->id ? '' : '-open'}}-o"></i>
                            <span>{{$item->title}}</span>
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@push('body.bottom')
<script type="text/javascript">
$(function() {
    var routeCreate = '{!!cms_route('photos.create', [$parent->id, 'sort' => $parent->admin_sort, 'page' => $items->currentPage(), 'lastPage' => $items->lastPage()])!!}';
    var routeIndex = '{{cms_route('photos.index', [$parent->id])}}';
    var routePosition = '{{cms_route('photos.updatePosition')}}';
    var sort = '{{$parent->admin_sort}}';
    var page = '{{request('page', 1)}}';
    var hasMorePages = '{{$items->hasMorePages()}}';
    @include('admin._scripts.album')
});
</script>
<script src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/uikit/js/uikit.min.js') }}"></script>
<script src="{{ asset('assets/js/uikit/js/addons/nestable.min.js') }}"></script>
@endpush
@endsection
