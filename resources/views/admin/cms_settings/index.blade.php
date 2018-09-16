@extends('admin.app')
@section('content')
<div class="page-title">
    <div class="title-env">
        <h1 class="title">
            <i class="fa fa-gear"></i>
            CMS Settings
        </h1>
        <p class="description">List of the CMS settings</p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1">
            <li>
                <a href="{{ cms_url('/') }}"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-gear"></i>
                <strong>Admin Settings</strong>
            </li>
        </ol>
    </div>
</div>
<ul class="nav nav-tabs">
    <li{!!request('tab', 1) == 1 ? ' class="active"' : ''!!}>
        <a href="#general" data-toggle="tab" data-tab="1">
            <span class="visible-xs"><i class="fa fa-home"></i></span>
            <span class="hidden-xs">
                <i class="fa fa-home"></i> General
            </span>
        </a>
    </li>
    <li{!!request('tab') == 2 ? ' class="active"' : ''!!}>
        <a href="#skin" data-toggle="tab" data-tab="2">
            <span class="visible-xs"><i class="fa fa-paint-brush"></i></span>
            <span class="hidden-xs">Skin</span>
        </a>
    </li>
</ul>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">CMS settings form</h2>
        <div class="panel-options">
            <a href="#" data-toggle="panel">
                <span class="collapse-icon">&ndash;</span>
                <span class="expand-icon">+</span>
            </a>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open([
            'method' => 'put',
            'url'    => cms_route('settings.update'),
            'class'  => 'form-horizontal',
            'id'     => 'form-update'
        ]) !!}
            {!! Form::hidden('tab', request('tab', 1), ['id' => 'tab']) !!}
            {!! Form::hidden('skin_sidebar', $cmsSettings->get('skin_sidebar'), ['id' => 'skin_sidebar']) !!}
            {!! Form::hidden('skin_user_menu', $cmsSettings->get('skin_user_menu'), ['id' => 'skin_user_menu']) !!}
            {!! Form::hidden('skin_horizontal', $cmsSettings->get('skin_horizontal'), ['id' => 'skin_horizontal']) !!}
            {!! Form::hidden('skin_login', $cmsSettings->get('skin_login'), ['id' => 'skin_login']) !!}
            <div class="tab-content">
                <div class="tab-pane{{request('tab', 1) == 1 ? ' active' : ''}}" id="general">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Sidebar position:</label>
                                <div class="col-sm-6">
                                    {!! Form::select('sidebar_position', $sidebarPosition, $cmsSettings->get('sidebar_position'), [
                                        'class' => 'form-control select',
                                    ]) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Sidebar direction:</label>
                                <div class="col-sm-6">
                                    {!! Form::select('sidebar_direction', $sidebarDirection, $cmsSettings->get('sidebar_direction'), [
                                        'class' => 'form-control select',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-sm-8 control-label">Horizontal menu:</label>
                                <div class="col-sm-4">
                                    {!! Form::checkbox('horizontal_menu', $cmsSettings->get('horizontal_menu'), $cmsSettings->get('horizontal_menu'), [
                                        'class' => 'horizontal_menu iswitch iswitch-secondary'
                                    ]) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Horizontal menu minimal:</label>
                                <div class="col-sm-4">
                                    {!! Form::checkbox('horizontal_menu_minimal', 'navbar-minimal', $cmsSettings->get('horizontal_menu_minimal'), [
                                        'class' => 'horizontal_menu_minimal iswitch iswitch-secondary'
                                    ]) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Horizontal open on click:</label>
                                <div class="col-sm-4">
                                    {!! Form::checkbox('horizontal_menu_click', 'click-to-expand', $cmsSettings->get('horizontal_menu_click'), [
                                        'class' => 'horizontal_menu_click iswitch iswitch-secondary'
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Layout boxed:</label>
                        <div class="col-sm-10">
                            {!! Form::checkbox('layout_boxed', 'boxed-container', $cmsSettings->get('layout_boxed'), [
                                'class' => 'layout_boxed iswitch iswitch-secondary'
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alert position:</label>
                        <div class="col-sm-6">
                            {!! Form::select('alert_position', $alertPosition, $cmsSettings->get('alert_position'), [
                                'class' => 'form-control select',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Lockscreen after inactivity:</label>
                        <div class="col-sm-6">
                            {!! Form::select('lockscreen', $lockscreen, $cmsSettings->get('lockscreen'), [
                                'class' => 'form-control select',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group-separator"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ajax forms:</label>
                        <div class="col-sm-10">
                            {!! Form::checkbox('ajax_form', 'ajax-form', $cmsSettings->get('ajax_form'), [
                                'class' => 'ajax_form iswitch iswitch-secondary'
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group-separator"></div>
                </div>
                <div class="tab-pane{{request('tab') == 2 ? ' active' : ''}}" id="skin">
                    <div class="panel-body">
                        <table class="table stacktable table-hover middle-align">
                            <thead>
                                <tr>
                                    <th>Skin Name</th>
                                    <th width="400">Color Palette</th>
                                    <th width="280">Skin Activation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Default Skin</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #2c2e2f"></span>
                                            <span style="background-color: #EEE"></span>
                                            <span style="background-color: #FFFFFF"></span>
                                            <span style="background-color: #68b828"></span>
                                            <span style="background-color: #27292a"></span>
                                            <span style="background-color: #323435"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Aero</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #558C89"></span>
                                            <span style="background-color: #ECECEA"></span>
                                            <span style="background-color: #FFFFFF"></span>
                                            <span style="background-color: #5F9A97"></span>
                                            <span style="background-color: #558C89"></span>
                                            <span style="background-color: #255E5b"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-aero" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-aero" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-aero" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Navy</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #2c3e50"></span>
                                            <span style="background-color: #a7bfd6"></span>
                                            <span style="background-color: #FFFFFF"></span>
                                            <span style="background-color: #34495e"></span>
                                            <span style="background-color: #2c3e50"></span>
                                            <span style="background-color: #ff4e50"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-navy" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-navy" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-navy" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Facebook</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #3b5998"></span>
                                            <span style="background-color: #8b9dc3"></span>
                                            <span style="background-color: #FFFFFF"></span>
                                            <span style="background-color: #4160a0"></span>
                                            <span style="background-color: #3b5998"></span>
                                            <span style="background-color: #8b9dc3"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-facebook" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-facebook" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-facebook" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Turquise</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #16a085"></span>
                                            <span style="background-color: #96ead9"></span>
                                            <span style="background-color: #FFFFFF"></span>
                                            <span style="background-color: #1daf92"></span>
                                            <span style="background-color: #16a085"></span>
                                            <span style="background-color: #0f7e68"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-turquoise" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-turquoise" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-turquoise" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Lime</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #8cc657"></span>
                                            <span style="background-color: #ffffff"></span>
                                            <span style="background-color: #FFFFFF"></span>
                                            <span style="background-color: #95cd62"></span>
                                            <span style="background-color: #8cc657"></span>
                                            <span style="background-color: #70a93c"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-lime" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-lime" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-lime" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Green</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #27ae60"></span>
                                            <span style="background-color: #a2f9c7"></span>
                                            <span style="background-color: #FFFFFF"></span>
                                            <span style="background-color: #2fbd6b"></span>
                                            <span style="background-color: #27ae60"></span>
                                            <span style="background-color: #1c954f"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-green" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-green" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-green" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Purple</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #795b95"></span>
                                            <span style="background-color: #c2afd4"></span>
                                            <span style="background-color: #FFFFFF"></span>
                                            <span style="background-color: #795b95"></span>
                                            <span style="background-color: #27ae60"></span>
                                            <span style="background-color: #5f3d7e"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-purple" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-purple" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-purple" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">White</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #FFF"></span>
                                            <span style="background-color: #666"></span>
                                            <span style="background-color: #95cd62"></span>
                                            <span style="background-color: #EEE"></span>
                                            <span style="background-color: #95cd62"></span>
                                            <span style="background-color: #555"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-white" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-white" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-white" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Concrete</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #a8aba2"></span>
                                            <span style="background-color: #666"></span>
                                            <span style="background-color: #a40f37"></span>
                                            <span style="background-color: #b8bbb3"></span>
                                            <span style="background-color: #a40f37"></span>
                                            <span style="background-color: #323232"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-concrete" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-concrete" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-concrete" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Watermelon</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #b63131"></span>
                                            <span style="background-color: #f7b2b2"></span>
                                            <span style="background-color: #FFF"></span>
                                            <span style="background-color: #c03737"></span>
                                            <span style="background-color: #b63131"></span>
                                            <span style="background-color: #32932e"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-watermelon" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-watermelon" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-watermelon" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="skin-name-link">Lemonade</div>
                                    </td>
                                    <td>
                                        <div class="skin-color-palette">
                                            <span style="background-color: #f5c150"></span>
                                            <span style="background-color: #ffeec9"></span>
                                            <span style="background-color: #FFF"></span>
                                            <span style="background-color: #ffcf67"></span>
                                            <span style="background-color: #f5c150"></span>
                                            <span style="background-color: #d9a940"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" data-skin="skin-lemonade" data-type="skin_sidebar" class="btn btn-sm btn-white sidebar">Sidebar</a>
                                        <a href="#" data-skin="skin-lemonade" data-type="skin_horizontal" class="btn btn-sm btn-white horizontal">Horizontal menu</a>
                                        <a href="#" data-skin="skin-lemonade" data-type="skin_login" class="btn btn-sm btn-white login">Login</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 btn-action pull-right">
                    <button type="submit" class="btn btn-secondary" title="{{ trans('general.update') }}">
                        <i class="fa fa-save"></i>
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
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

    var isHorizontalMenu = {{$cmsSettings->get('horizontal_menu', 0)}};

    var skin_sidebar = '{{$cmsSettings->get('skin_sidebar')}}';
    var skin_horizontal = isHorizontalMenu ? '{{$cmsSettings->get('skin_horizontal')}}' : '{{$cmsSettings->get('skin_user_menu')}}';
    if (skin_horizontal) {
        skin_horizontal = skin_horizontal.substring(skin_horizontal.indexOf("skin"));
    }
    var skin_login = '{{$cmsSettings->get('skin_login')}}';

    $('#skin [data-skin]').each(function(i, el) {
        var type = $(el).data('type');
        var skin = $(el).data('skin');

        if (type == 'skin_sidebar' && skin == skin_sidebar) {
            $(el).removeClass('btn-white').addClass('btn-secondary');
        }

        if (type == 'skin_horizontal' && skin == skin_horizontal) {
            $(el).removeClass('btn-white').addClass('btn-secondary');
        }

        if (type == 'skin_login' && skin == skin_login) {
            $(el).removeClass('btn-white').addClass('btn-secondary');
        }
    });

    $('#skin [data-skin]').on('click', function(e) {
        e.preventDefault();

        var skin = $(this).data('skin');
        var type = $(this).data('type');

        $('#skin [data-type="'+type+'"]').removeClass('btn-secondary').addClass('btn-white');
        $(this).removeClass('btn-white').addClass('btn-secondary');

        var skinPrepend = '';
        if (type == 'skin_horizontal') {
            skinPrepend = isHorizontalMenu ? 'horizontal-menu-' : 'user-info-navbar-';
        }

        var skin_class = skin ? skinPrepend+skin : '';

        if (type != 'skin_login') {
            var reg_exp = new RegExp('\\s'+skinPrepend+'skin-[a-z]+', 'i');

            var body_classes = public_vars.$body.attr('class').replace(reg_exp, '');

            public_vars.$body.attr('class', body_classes).addClass(skin_class);
            
            if (skinPrepend) {
                $('[rel="go-top"]').click();
            }
        }

        if (type == 'skin_horizontal' && ! isHorizontalMenu) {
            type = 'skin_user_menu';
        }

        $('#form-update [name="'+type+'"]').val(skin_class);

        // Cookies.set('current-skin', skin);
    });
    
    $('.reset-skin').on('click', function(e) {
        e.preventDefault();
        
        var body_classes = public_vars.$body.attr('class').replace(/(\sskin-[a-z]+)/gi, '').replace(/(\shorizontal-menu-skin-[a-z]+)/gi, '').replace(/(\suser-info-navbar-skin-[a-z]+)/gi, '');
        
        public_vars.$body.attr('class', body_classes);
        
        // Cookies.set('current-skin', '');
    });
    
    $('.nav-tabs a').on('click', function() {
        var tab = $(this).data('tab');

        $('form#form-update #tab').val(tab);
    });
});
</script>
@endpush
@endsection
