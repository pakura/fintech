@if (isset($input['type']) && isset($input['type_id']))
<li class="attached">
    <a href="{{cms_route($input['type'].'.edit', [$input['type_id']])}}">
        <span class="visible-xs"><i class="{{$iconType = icon_type($input['type'])}}"></i></span>
        <div class="hidden-xs">
            <i class="{{$iconType}}"></i> {{ucfirst($input['type'])}}
        </div>
    </a>
</li>
@endif