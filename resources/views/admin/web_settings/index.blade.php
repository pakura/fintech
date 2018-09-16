@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="fa fa-gear"></i>
            Web Settings
        </h1>
        <p class="description">List of the web settings</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-gear"></i>
                <strong>Web Settings</strong>
            </li>
        </ol>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Web settings form</h2>
    </div>
@if (! empty($webSettings))
    {!! Form::open([
        'method' => 'put',
        'url'    => cms_route('webSettings.update'),
        'class'  => 'form-horizontal',
        'id'     => 'form-update'
    ]) !!}
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3 control-label">Email:</label>
                <div class="col-sm-5">
                    {!! Form::text('email', $webSettings->email, [
                        'class' => 'form-control',
                    ]) !!}
                    <div class="desc">Messages from users will be sent to this email address.</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Phone:</label>
                <div class="col-sm-5">
                    {!! Form::text('phone', $webSettings->phone, [
                        'class' => 'form-control',
                    ]) !!}
                    <div class="desc">Phone number that will be displayed on the website.</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Facebook page:</label>
                <div class="col-sm-5">
                    {!! Form::text('facebook', $webSettings->facebook, [
                        'class' => 'form-control',
                    ]) !!}
                    <div class="desc">Facebook page url.</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Twitter page:</label>
                <div class="col-sm-5">
                    {!! Form::text('twitter', $webSettings->twitter, [
                        'class' => 'form-control',
                    ]) !!}
                    <div class="desc">Twitter page url.</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Google Plus page:</label>
                <div class="col-sm-5">
                    {!! Form::text('google_plus', $webSettings->google_plus, [
                        'class' => 'form-control',
                    ]) !!}
                    <div class="desc">Google Plus page url.</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Map:</label>
                <div class="col-sm-5">
                    {!! Form::text('map', $webSettings->map, [
                        'class' => 'form-control',
                    ]) !!}
                    <div class="desc">Map url.</div>
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
@endif
</div>
@push('head')
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/select2/select2-bootstrap.css') }}">
@endpush
@push('body.bottom')
<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
<script type="text/javascript">
$(function() {
    $('.select').select2({
        placeholder: 'Select type...',
        allowClear: true
    }).on('select2-open', function() {
        // Adding Custom Scrollbar
        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
    });
});
</script>
@endpush
@endsection
