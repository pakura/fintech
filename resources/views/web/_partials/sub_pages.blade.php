@if (isset($item) && has_model_tree($item))
<ul class="dropdown-menu">
    @foreach ($item->subItems as $item)
    <li{!!$current->slug == $item->slug ? ' class="active"' : ''!!}>
        <a href="{{web_url($item->slug)}}">{{$item->short_title}}</a>
        @include('web._partials.sub_pages')
    </li>
    @endforeach
</ul>
@endif
