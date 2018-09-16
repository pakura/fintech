@extends('admin.app')
@section('content')
    <div class="page-title">
        <div class="title-env">
            <h1 class="title">
                <i class="{{$icon = icon_type('files')}}"></i>
                {{ str_limit($foreignModel->title, 50, '...') }}
            </h1>
            <p class="description">List of the files</p>
        </div>
        <div class="breadcrumb-env">
            <ol class="breadcrumb bc-1">
                <li>
                    <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ cms_route($routeName . '.edit', $foreignModel->routeParams) }}"><i class="{{icon_type($routeName)}}"></i>{{$type = str_singular($name = $foreignModel->getTable())}}</a>
                </li>
                <li class="active">
                    <i class="{{$icon}}"></i>
                    <strong>Files</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="clearfix">
        <ul class="nav nav-tabs col-xs-8">
            <li>
                <a href="{{ cms_route($routeName . '.edit', $foreignModel->routeParams) }}">
                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                    <span class="hidden-xs">
                        <i class="{{icon_type($name)}}"></i> Back to {{$type}}
                    </span>
                </a>
            </li>
        </ul>
        <ul class="nav nav-tabs col-xs-4 right-aligned">
            <li class="active">
                <a href="#" data-toggle="tab">
                    <span class="visible-xs"><i class="{{$icon}}"></i></span>
                    <div class="hidden-xs">
                        <i class="{{$icon}}"></i> {{trans('general.files')}}
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <section class="gallery-env files">
        <div class="row">
            <div class="col-sm-12 gallery-right">
                <div class="album-header">
                    <h2>Files</h2>
                    <ul class="album-options list-unstyled list-inline">
                        <li>
                            <input type="checkbox" class="cbr" id="select-all" />
                            <label>Select all</label>
                        </li>
                        <li>
                            <a href="#" data-modal="add">
                                <i class="{{$icon}}"></i>
                                Add File
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
                <ul id="nestable-list" class="album-images list-unstyled row" data-insert="prepend" data-uk-nestable="{maxDepth:1}" id="items">
                    @foreach($items as $item)
                        <li id="item{{$item->id}}" data-id="{{$item->id}}" data-pos="{{$item->position}}" data-url="{{cms_route('files.edit', [$routeName, $item->table_id, $item->id])}}" class="item col-md-2 col-sm-4 col-xs-6">
                            <div class="album-image">
                                <a href="#" class="thumb" data-modal="edit">
                                    @if (in_array($ext = pathinfo($item->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{$item->file}}" class="img-responsive" alt="{{$item->title}}" />
                                    @elseif( ! empty($ext))
                                        <img src="{{asset('assets/images/file-ext-icons/'.$ext.'.png')}}" class="img-responsive" alt="{{$item->title}}" />
                                    @else
                                        <img src="{{asset('assets/images/file-ext-icons/www.png')}}" class="img-responsive" alt="{{$item->title}}" />
                                    @endif
                                </a>
                                <a href="#" class="name">
                                    <span class="title">{{$item->title}}</span>
                                    <em>{{$item->created_at->format('d F Y')}}</em>
                                </a>
                                <div class="image-options">
                                    <div class="select-item dib">
                                        <input type="checkbox" data-id="{{$item->id}}" class="cbr" />
                                    </div>
                                    <a href="#" data-url="{{cms_route('files.visibility', [$item->id])}}" class="visibility" title="{{trans('general.visibility')}}">
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
        </div>
    </section>
    @push('body.bottom')
    <script type="text/javascript">
        $(function() {
            var routeCreate = '{!!cms_route('files.create', [$routeName, $foreignModel->id, 'sort' => 'desc', 'page' => $items->currentPage(), 'lastPage' => $items->lastPage()])!!}';
            var routeIndex = '{{cms_route('files.index', [$routeName, $foreignModel->id])}}';
            var routePosition = '{{cms_route('files.updatePosition')}}';
            var sort = 'desc';
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
