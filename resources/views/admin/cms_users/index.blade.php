@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="{{$icon = icon_type('cmsUsers')}}"></i>
            CMS Users
        </h1>
        <p class="description">List of all CMS users</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="{{$icon}}"></i>
                <strong>CMS Users</strong>
            </li>
        </ol>
    </div>
</div>
<ul class="nav nav-tabs">
    <li{!!($role = request()->get('role')) ? '' : ' class="active"'!!}>
        <a href="{{cms_route('cmsUsers.index', $params = request()->except('role'))}}">All CMS Users</a>
    </li>
@foreach (user_roles() as $key => $value)
    <li{!!$role == $key ? ' class="active"' : ''!!}>
        <a href="{{cms_route('cmsUsers.index', $params + ['role' => $key])}}">{{$value}}</a>
    </li>
@endforeach
</ul>
<div class="tab-content clearfix">
    <div class="dib padr">
        <a href="{{ cms_route('cmsUsers.create') }}" class="btn btn-secondary btn-icon-standalone">
            <i class="fa fa-user-plus"></i>
            <span>{{ trans('general.create') }}</span>
        </a>
    </div>
    <div class="dib vam">
        <form action="{{cms_route('cmsUsers.index')}}" method="GET">
        @if ($role)
            <input type="hidden" name="role" value="{{$role}}">
        @endif
            <div class="dib vam padr mrgb">
                <input type="text" name="name" class="form-control" placeholder="სახელი ან/და გვარი" value="{{request('name')}}">
            </div>
            <div class="dib vam padr mrgb">
                <input type="text" name="email" class="form-control" placeholder="ელ.ფოსტა" value="{{request('email')}}">
            </div>
            <div class="dib vam padr mrgb">
                {!! Form::select('active', [
                    '' => '-- Active --',
                    '1' => 'Active',
                    '0' => 'Non Active'
                ], request('active'), [
                    'class' => 'form-control',
                ]) !!}
            </div>
            <button type="submit" class="btn btn-secondary vat">Search</button>
            <a href="{{cms_route('cmsUsers.index', request()->only(['role']))}}" class="btn btn-black vat">Reset</a>
        </form>
    </div>
    @if (Auth::guard('cms')->user()->isAdmin())
        <a href="{{cms_route('permissions.index')}}" class="btn btn-orange pull-right">Permissions</a>
    @endif
    <table class="table stacktable table-hover members-table middle-align">
        <thead>
            <tr>
                <th></th>
                <th>Name and Role</th>
                <th>E-Mail</th>
                <th>ID</th>
                <th>Settings</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr id="item{{$item->id}}" class="item">
                <td class="user-image">
                @if ($item->photo)
                    <img src="{{$item->photo}}" width="40" height="40" class="img-circle" alt="{{$item->firstname}} {{$item->lastname}}" />
                @endif
                </td>
                <td class="user-name">
                    <a href="{{cms_route('cmsUsers.edit', [$item->id])}}" class="name{{Auth::guard('cms')->id() == $item->id ? ' active' : ''}}">{{$item->firstname}} {{$item->lastname}}</a>
                    <span>{{$item->role_text}}</span>
                </td>
                <td>
                    <span class="email">{{$item->email}}</span>
                </td>
                <td class="user-id">
                    {{$item->id}}
                </td>
                <td class="action-links">
                    <a href="{{cms_route('cmsUsers.show', [$item->id])}}" class="show">
                        <i class="fa fa-user"></i>
                        Profile
                    </a>
                @if (Auth::guard('cms')->user()->isAdmin() || Auth::guard('cms')->id() == $item->id)
                    <a href="{{cms_route('cmsUsers.edit', [$item->id])}}" class="edit">
                        <i class="fa fa-pencil"></i>
                        Edit Profile
                    </a>
                @endif
                @if (Auth::guard('cms')->user()->isAdmin() && Auth::guard('cms')->id() != $item->id)
                    {!! Form::open(['method' => 'delete', 'url' => cms_route('cmsUsers.destroy', [$item->id]), 'class' => 'form-delete', 'data-id' => $item->id]) !!}
                        <a href="#" class="delete">
                            <i class="fa fa-user-times"></i>
                            Delete
                        </a>
                    {!! Form::close() !!}
                @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="dib">
        <a href="{{ cms_route('cmsUsers.create') }}" class="btn btn-secondary btn-icon-standalone">
            <i class="fa fa-user-plus"></i>
            <span>{{ trans('general.create') }}</span>
        </a>
    </div>
    <div class="pull-right">
        {!! $items->appends(request()->all())->links() !!}
    </div>
</div>
@push('body.bottom')
<script type="text/javascript">
$(function() {
    $('.members-table a.delete').on('click', function(e) {
        e.preventDefault();
        $(this).closest('.form-delete').submit();
    });
});
</script>
@endpush
@endsection
