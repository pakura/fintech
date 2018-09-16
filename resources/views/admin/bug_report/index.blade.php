@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="fa fa-bug"></i>
            Bug Report
        </h1>
        <p class="description">Send a bug report to the developer</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-bug"></i>
                <strong>Bug report</strong>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Bug report form</h2>
    </div>
    {!! Form::open([
        'url'    => cms_route('bugReport.send'),
        'class'  => 'form-horizontal'
    ]) !!}
        <div class="panel-body">
            <div class="form-group{{($error = $errors->first('title')) ? ' validate-has-error' : '' }}">
                <label class="col-sm-3 control-label required">Title:</label>
                <div class="col-sm-5">
                    @if ($error)
                    <span class="text-danger">{{$error}}</span>
                    @endif
                    {!! Form::text('title', null, [
                        'class' => 'form-control',
                    ]) !!}
                    <div class="desc">A title of a bug should describe the issue clearly and a reader can tell what the bug is by just the title alone; this helps with triaging the bug.</div>
                </div>
            </div>
            <div class="form-group{{($error = $errors->first('description')) ? ' validate-has-error' : '' }}">
                <label class="col-sm-3 control-label required">Description:</label>
                <div class="col-sm-5">
                    @if ($error)
                    <span class="text-danger">{{$error}}</span>
                    @endif
                    {!! Form::textarea('description', null, [
                        'class' => 'form-control',
                        'rows' => '8'
                    ]) !!}
                    <div class="desc">A detailed description of the bug. Make sure your description is reflecting what the problem is and where it is.</div>
                </div>
            </div>
        </div>

        <div class="form-group-separator"></div>

        <div class="form-group">
            <div class="col-sm-10 btn-action pull-right">
                <button type="submit" class="btn btn-secondary" title="{{ trans('general.update') }}">
                    <i class="fa fa-save"></i>
                </button>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection
