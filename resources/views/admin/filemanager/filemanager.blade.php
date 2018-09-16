@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="fa fa-files-o"></i>
            File Manager
        </h1>
        <p class="description">File Manager, which contains all the application files</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-files-o"></i>
                <strong>File Manager</strong>
            </li>
        </ol>
    </div>
</div>
<iframe src="{{ cms_route('filemanager.index') }}" width="100%" height="700" tabindex="-1"></iframe>
@endsection
