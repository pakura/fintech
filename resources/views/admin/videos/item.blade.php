@if (! empty($item) || ! empty($itemInput))
<li id="item{{$item->id}}" data-id="{{$item->id}}" data-pos="{{$item->position}}" data-url="{{cms_route('videos.edit', [$item->gallery_id, $item->id])}}" class="item col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="album-image">
        <a href="#" class="thumb embed-responsive embed-responsive-16by9" data-modal="edit">
            <iframe src="{{get_youtube_embed($itemInput['file'])}}" frameborder="0" allowfullscreen class="embed-responsive-item"></iframe>
        </a>
        <a href="#" class="name">
            <span class="title">{{$itemInput['title']}}</span>
            <em>{{$item->created_at->format('d F Y')}}</em>
        </a>
        <div class="image-options">
            <div class="select-item dib">
                <input type="checkbox" data-id="{{$item->id}}" class="cbr" />
            </div>
            <a href="#" data-url="{{cms_route('videos.visibility', [$item->id])}}" class="visibility">
                <i class="fa fa-eye{{$item->visible ? '' : '-slash'}}"></i>
            </a>
            <a href="#" data-modal="edit"><i class="fa fa-pencil"></i></a>
            <a href="#" data-delete="this" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
        </div>
        <div class="image-checkbox select-item">
            <input type="checkbox" data-id="{{$item->id}}" class="cbr" />
        </div>
    </div>
</li>
@endif