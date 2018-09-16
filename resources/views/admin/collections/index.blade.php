@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="{{$icon = icon_type('collections')}}"></i>
            Collections
        </h1>
        <p class="description">List of all collections</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="{{$icon}}"></i>
                <strong>Collections</strong>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">List of all collections</h2>
        <div class="panel-options">
            <a href="#">
                <i class="fa fa-gear"></i>
            </a>
            <a href="#" data-toggle="panel">
                <span class="collapse-icon">&ndash;</span>
                <span class="expand-icon">+</span>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <a href="{{ cms_route('collections.create') }}" class="btn btn-secondary btn-icon-standalone">
            <i class="{{$icon}}"></i>
            <span>{{ trans('general.create') }}</span>
        </a>
        <table id="items" class="table stacktable table-striped table-bordered">
            <thead>
                <tr class="replace-inputs">
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($items as $item)
                <tr id="item{{$item->id}}" class="item">
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->id }}</td>
                    <td>
                        <div class="btn-action">
                            <a href="{{ cms_route($item->type . '.index', [$item->id]) }}" class="btn btn-info" title="{{trans('general.'.$item->type)}}">
                                <span class="{{icon_type($item->type)}}"></span>
                            </a>
                            <a href="{{ cms_route('collections.edit', [$item->id]) }}" class="btn btn-orange" title="{{trans('general.edit')}}">
                                <span class="fa fa-edit"></span>
                            </a>
                            {!! Form::open(['method' => 'delete', 'url' => cms_route('collections.destroy', $item->id), 'class' => 'form-delete']) !!}
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
$(function() {
    var table = $('#items');
    table.dataTable({
        pageLength: 50,
        // 'order': [0, 'desc']
    }).yadcf([
        {column_number : 0, filter_type: 'text', filter_default_label : 'Type a name'},
        {column_number : 1, filter_type: 'text', filter_default_label : 'Type a description'},
        {column_number : 2, filter_default_label : 'All types'},
        {column_number : 3, filter_type: 'text', filter_default_label : 'ID'}
    ]);

@if ($type = request('type'))
    yadcf.exFilterColumn(table, [
        [2, '{{$type}}']
    ]);
@endif
});
</script>
<script src="{{ asset('assets/js/datatables/yadcf/jquery.dataTables.yadcf.js') }}"></script>
@endpush
@endsection
