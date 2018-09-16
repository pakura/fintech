@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="{{$icon = icon_type('menus')}}"></i>
            Menus
        </h1>
        <p class="description">List of all menus</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="{{$icon}}"></i>
                <strong>Menus</strong>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">List of all menus</h2>
        <div class="panel-options">
            <a href="#" data-toggle="panel">
                <span class="collapse-icon">&ndash;</span>
                <span class="expand-icon">+</span>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <a href="{{ cms_route('menus.create') }}" class="btn btn-secondary btn-icon-standalone">
            <i class="{{$icon}}"></i>
            <span>{{ trans('general.create') }}</span>
        </a>
        <table id="items" class="table stacktable table-bordered table-striped">
            <thead>
                <tr>
                    <th>Main</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($menus as $item)
                <tr id="item{{$item->id}}" class="item">
                    <td>
                        <input type="radio" name="main" data-id="{{$item->id}}" class="cbr cbr-success"{{$item->main ? ' checked' : ''}}>
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->id }}</td>
                    <td>
                        <div class="btn-action">
                            <a href="{{ cms_route('pages.index', [$item->id]) }}" class="btn btn-info" title="{{trans('general.pages')}}">
                                <span class="{{icon_type('pages')}}"></span>
                            </a>
                            <a href="{{ cms_route('menus.edit', [$item->id]) }}" class="btn btn-orange" title="{{trans('general.edit')}}">
                                <span class="fa fa-edit"></span>
                            </a>
                            {!! Form::open(['method' => 'delete', 'url' => cms_route('menus.destroy', [$item->id]), 'class' => 'form-delete']) !!}
                            <button type="submit" class="btn btn-danger" title="{{trans('general.delete')}}">
                                <span class="fa fa-trash"></span>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('body.bottom')
<script type="text/javascript">
$('#items').on('click', '.cbr-radio', function() {
    var id = $(this).find('input').data('id');
    var data = {'id':id, '_token':"{{csrf_token()}}"};
    $.post('{{cms_route('menus.setMain')}}', data, function() {
    }, 'json').fail(function(xhr) {
        alert(xhr.responseText);
    });
});
</script>
@endpush
@endsection
