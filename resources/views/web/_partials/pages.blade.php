<ul class="nav navbar-nav">
    <li>
        <a href="{{web_url('/')}}">{{trans('general.home')}}</a>
    </li>
@if (($pages = app_instance('pagesTree')) instanceof \Illuminate\Support\Collection)
    @foreach ($pages as $item)
    <li{!!$current->slug == $item->slug ? ' class="active"' : ''!!}>
        <a href="{{web_url($item->slug)}}">{{$item->short_title}}</a>
        @include('web._partials.sub_pages')
    </li>
    @endforeach
@endif
</ul>