@if (! empty($item) || ! empty($itemInput))
    <li id="item{{$item->id}}" data-id="{{$item->id}}" data-pos="{{$item->position}}" data-url="{{cms_route('files.edit', [$item->table_name, $item->table_id, $item->id])}}" class="item col-md-2 col-sm-4 col-xs-6">
        <div class="album-image">
            <a href="#" class="thumb" data-modal="edit">
                @if (in_array($ext = pathinfo($itemInput['file'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{$itemInput['file']}}" class="img-responsive" alt="{{$itemInput['title']}}" />
                @elseif( ! empty($ext))
                    <img src="{{asset('assets/images/file-ext-icons/'.$ext.'.png')}}" class="img-responsive" alt="{{$itemInput['title']}}" />
                @else
                    <img src="{{asset('assets/images/file-ext-icons/www.png')}}" class="img-responsive" alt="{{$itemInput['title']}}" />
                @endif
            </a>
            <a href="#" class="name">
                <span class="title">{{$itemInput['title']}}</span>
                <em>{{$item->created_at->format('d F Y')}}</em>
            </a>
            <div class="image-options">
                <div class="file-checkbox select-item dib">
                    <input type="checkbox" data-id="{{$item->id}}" class="cbr" />
                </div>
                <a href="#" data-url="{{cms_route('files.visibility', [$item->id])}}" class="visibility">
                    <i class="fa fa-eye{{$item->visible ? '' : '-slash'}}"></i>
                </a>
                <a href="#" data-modal="edit"><i class="fa fa-pencil"></i></a>
                <a href="#" data-delete="this" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </li>
@endif