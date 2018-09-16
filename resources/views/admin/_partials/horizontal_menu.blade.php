<nav class="navbar horizontal-menu{{$cmsSettings->get('layout_boxed') ? '' : ' navbar-fixed-top'}} {{$cmsSettings->get('horizontal_menu_minimal')}}"><!-- set fixed position by adding class "navbar-fixed-top" -->
  <div class="navbar-inner">
    <!-- Navbar Brand -->
    <div class="navbar-brand">
      <a href="{{ cms_url('/') }}" class="logo">
        <span class="name">CMS</span>
      </a>
      <a href="#" data-toggle="settings-pane" data-animate="true">
        <i class="fa fa-gear"></i>
      </a>
    </div>
    <!-- Mobile Toggles Links -->
    <div class="nav navbar-mobile">
      <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
      <div class="mobile-menu-toggle">
        <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
        <a href="#" data-toggle="settings-pane" data-animate="true">
          <i class="fa fa-gear"></i>
        </a>
        <!-- data-toggle="mobile-menu-horizontal" will show horizontal menu links only -->
        <!-- data-toggle="mobile-menu" will show sidebar menu links only -->
        <!-- data-toggle="mobile-menu-both" will show sidebar and horizontal menu links -->
        <a href="#" data-toggle="mobile-menu-horizontal">
          <i class="fa fa-bars"></i>
        </a>
      </div>
    </div>
    <div class="navbar-mobile-clear"></div>
    <!-- main menu -->
    <ul class="navbar-nav {{$cmsSettings->get('horizontal_menu_click')}}">
      <li>
        <a href="{{ cms_url('/') }}">
          <i class="{{icon_type('dashboard')}}" title="Dashboard"></i>
          <span class="title">Home</span>
        </a>
      </li>
      <li>
        <a href="{{ $menusUrl = cms_route('menus.index') }}">
          <i class="fa fa-sitemap" title="Site Map"></i>
          <span class="title">Site Map</span>
        </a>
        <ul>
          @if (! empty($menus))
            @foreach ($menus as $item)
              <li>
                <a href="{{ cms_route('pages.index', [$item->id]) }}">
                  <i class="{{icon_type('pages')}}" title="Pages"></i>
                  <span class="title">{{ $item->title }}</span>
                </a>
              </li>
            @endforeach
          @endif
          <li>
            <a href="{{ $menusUrl }}">
              <i class="{{icon_type('menus')}}" title="Menus"></i>
              <span class="title">Menu Management</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="{{ cms_route('collections.index') }}">
          <i class="{{icon_type('collections')}}" title="Collections"></i>
          <span class="title">Collections</span>
        </a>
      </li>
      <li>
        <a href="{{ cms_route('filemanager') }}">
          <i class="fa fa-files-o" title="File Manager"></i>
          <span class="title">File Manager</span>
        </a>
      </li>
      <li>
        <a href="{{ $cmsUsersUrl = cms_route('cmsUsers.index') }}">
          <i class="fa fa-users" title="User Groups"></i>
          <span class="title">User Groups</span>
        </a>
        <ul>
          <li>
            <a href="{{ $cmsUsersUrl }}">
              <i class="{{icon_type('cmsUsers')}}" title="CMS Users"></i>
              <span class="title">CMS Users</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="{{ $settingsUrl = cms_route('settings.index') }}">
          <i class="fa fa-gears" title="Settings"></i>
          <span class="title">Settings</span>
        </a>
        <ul>
          <li>
            <a href="{{ $settingsUrl }}">
              <i class="fa fa-gear" title="Admin Settings"></i>
              <span class="title">CMS Settings</span>
            </a>
          </li>
          <li>
            <a href="{{ cms_route('webSettings.index') }}">
              <i class="fa fa-gear" title="Web Settings"></i>
              <span class="title">Web Settings</span>
            </a>
          </li>
          <li>
            <a href="{{ cms_route('translations.index') }}">
              <i class="{{icon_type('translations')}}" title="Translations"></i>
              <span class="title">Translations</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="{{ $calendarUrl = cms_route('calendar.index') }}">
          <i class="fa fa-flask" title="Extra"></i>
          <span class="title">Extra</span>
        </a>
        <ul>
          <li>
            <a href="{{ cms_route('slider.index') }}">
              <i class="fa fa-photo" title="Slider"></i>
              <span class="title">Homepage Slider</span>
            </a>
          </li>
          <li>
            <a href="{{ $calendarUrl }}">
              <i class="fa fa-calendar" title="Calendar"></i>
              <span class="title">Calendar</span>
            </a>
          </li>
          <li>
            <a href="{{ cms_route('notes.index') }}">
              <i class="fa fa-file-text-o" title="notes"></i>
              <span class="title">Notes</span>
            </a>
          </li>
          <li>
            <a href="{{cms_route('bugReport.index')}}">
              <i class="fa fa-bug" title="Bug report"></i>
              <span class="title">Bug Report</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <!-- notifications and other links -->
    <ul class="nav nav-userinfo navbar-right">
      @if (count($languages = languages()) > 1)
      <!-- Added in v1.2 -->
      <li class="dropdown hover-line language-switcher">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{ asset('assets/images/flags/flag-'.language().'.png') }}" alt="flag-{{language()}}" />
        </a>
        <ul class="dropdown-menu languages">
          @foreach ($languages as $key => $value)
          <li>
            <a href="{{$value['url']}}">
              <img src="{{ asset('assets/images/flags/flag-'.$key.'.png') }}" alt="flag-{{$key}}" />
              {{ $value['full_name'] }}
            </a>
          </li>
          @endforeach
        </ul>
      </li>
      @endif
      <li class="dropdown xs-left">
        <a href="#" data-toggle="dropdown" class="notification-icon notification-icon-messages">
          <i class="fa fa-calendar"></i>
        @if (($calendarEventsCount = count($calendarEvents)) > 0)
          <span class="badge badge-orange">{{$calendarEventsCount}}</span>
        @endif
        </a>
      @if ($calendarEventsCount)
        <ul class="dropdown-menu notifications">
          <li class="top">
            <p class="small">
              You have <strong>{{$calendarEventsCount}}</strong> upcoming event{{$calendarEventsCount > 1 ? 's' : ''}}.
            </p>
          </li>
          <li>
            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
            @foreach ($calendarEvents as $item)
              <li {!!($date = date('d F Y', strtotime($item->start))) == date('d F Y') ? ' class="active"' : ''!!}>
                <a href="{{cms_route('calendar.index', ['gotoDate' => $item->start])}}">
                  <i class="fa fa-calendar-o icon-color-{{$item->color}}"></i>
                  <span class="line">
                    <strong>{{$item->title}}</strong>
                  </span>
                  <span class="line small time">
                    Date: {{$date}}
                  </span>
                @if ($item->time_start)
                  <span class="line small time">
                    Time: {{date('H:i', strtotime($date))}}
                  </span>
                @endif
                </a>
              </li>
            @endforeach
            </ul>
          </li>
          <li class="external">
            <a href="{{cms_route('calendar.index')}}">
              <span>View calendar</span>
              <i class="fa fa-link-ext"></i>
            </a>
          </li>
        </ul>
      @endif
      </li>
      <li>
        <form method="post" action="{{cms_route('lockscreen')}}" id="set-lockscreen">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="put">
          <button type="submit" class="btn btn-link" title="Lockscreen">
            <i class="fa fa-lock"></i>
          </button>
        </form>
      </li>
      <li>
        <a href="{{web_url('/')}}" target="_blank"><i class="fa fa-desktop"></i></a>
      </li>
      <li class="dropdown user-profile">
        <a href="#" data-toggle="dropdown">
          <img src="{{ Auth::guard('cms')->user()->photo }}" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
          <span>
            {{Auth::guard('cms')->user()->firstname}} {{Auth::guard('cms')->user()->lastname}}
            <i class="fa fa-angle-down"></i>
          </span>
        </a>
        <ul class="dropdown-menu user-profile-menu list-unstyled">
          <li>
            <a href="{{cms_route('cmsUsers.show', [$userId = Auth::guard('cms')->id()])}}">
              <i class="{{icon_type('cmsUsers')}}"></i>
              Profile
            </a>
          </li>
          <li>
            <a href="{{cms_route('cmsUsers.edit', [$userId])}}">
              <i class="fa fa-edit"></i>
              Edit
            </a>
          </li>
          <li>
            <a href="#help">
              <i class="fa fa-info"></i>
              Help
            </a>
          </li>
          <li class="last">
            <form action="{{cms_route('logout')}}" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <button>
                <i class="fa fa-sign-out"></i>
                Logout
              </button>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
