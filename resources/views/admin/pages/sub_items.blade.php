@if (isset($item) && has_model_tree($item))
<ul>
@foreach ($item->subItems as $item)
    <li id="item{{ $item->id }}" class="item{{$item->collapse ? ' uk-collapsed' : ''}}" data-id="{{ $item->id }}" data-parent="1">
        <div class="uk-nestable-item">        
            <div class="row">
                <div class="col-sm-7 col-xs-10">
                    <div class="uk-nestable-handle pull-left"></div>
                    <div data-nestable-action="toggle"></div>
                    <div class="list-label"><a href="{{ $editUrl = cms_route('pages.edit', [$item->menu_id, $item->id]) }}">{{ $item->short_title }}</a></div>    
                </div>
                <div class="col-sm-5 col-xs-2">
                    <div class="btn-action togglable pull-right">
                        <div class="btn btn-gray item-id disabled">#{{$item->id}}</div>
                        <a href="{{$webUrl = $url . '/' . $item->slug}}" class="link btn btn-white" title="Go to page" data-slug="{{$item->slug}}" target="_blank">
                            <span class="fa fa-link"></span>
                        </a>
                        <a href="#" class="movable btn btn-white" title="Move to menu" data-id="{{$item->id}}">
                            <span class="{{icon_type('menus')}}"></span>
                        </a>
                        {!! Form::open(['method' => 'post', 'url' => cms_route('pages.visibility', [$item->id]), 'class' => 'visibility', 'id' => 'visibility' . $item->id]) !!}
                        <button type="submit" class="btn btn-{{$item->visible ? 'white' : 'gray'}}" title="{{trans('general.visibility')}}">
                            <span class="fa fa-eye{{$item->visible ? '' : '-slash'}}"></span>
                        </button>
                        {!! Form::close() !!}
                        <a href="{{ cms_route('files.index', ['pages', $item->id]) }}" class="btn btn-{{$item->files_count ? 'turquoise' : 'white'}}" title="{{trans('general.files')}}">
                            <span class="{{icon_type('files')}}"></span>
                        </a>
                        <a href="{{$cmsUrl = ($item->collection_type ? cms_route($item->collection_type . '.index', [$item->type_id], null, true) : array_key_exists($item->type, config('cms.pages.explicit')) ? cms_route($item->type . '.'.($item->type_id ? 'edit' : 'index'), array_filter([$item->type_id]), null, true) : '#')}}" class="btn btn-{{$cmsUrl == '#' ? 'white disabled' : 'info'}}" title="{{$item->collection_title ?: ucfirst($item->type)}}">
                            <span class="{{icon_type($item->collection_type ?: $item->type, 'fa fa-file-text-o')}}"></span>
                        </a>
                        <a href="{{ cms_route('pages.create', [$item->menu_id, 'id' => $item->id]) }}" class="btn btn-secondary" title="{{trans('general.create')}}">
                            <span class="fa fa-plus"></span>
                        </a>
                        <a href="{{ $editUrl }}" class="btn btn-orange" title="{{trans('general.edit')}}">
                            <span class="fa fa-edit"></span>
                        </a>
                        {!! Form::open(['method' => 'delete', 'url' => cms_route('pages.destroy', [$menu->id, $item->id]), 'class' => 'form-delete']) !!}
                        <button type="submit" class="btn btn-danger" title="{{trans('general.delete')}}"{{has_model_tree($item) ? ' disabled' : ''}}>
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
        @include('admin.pages.sub_items', ['url' => $webUrl])
    </li>
@endforeach
</ul>
@endif
