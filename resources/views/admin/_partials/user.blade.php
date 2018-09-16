<nav class="navbar user-info-navbar"  role="navigation"><!-- User Info, Notifications and Menu Bar -->
  <!-- Left links for user info navbar -->
  <ul class="user-info-menu left-links list-inline list-unstyled">
    <li class="hidden-sm hidden-xs">
      <a href="#" data-toggle="sidebar">
        <i class="fa fa-bars"></i>
      </a>
    </li>
    <li class="dropdown hover-line">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Sitemap">
        <i class="fa fa-sitemap"></i>
      </a>
      <ul class="dropdown-menu notifications">
        <li class="top">
          <p class="small">
            Update the sitemap once a day, only when you change or add some data.
          </p>
        </li>
        <li>
          <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
            <li class="active">
              <a href="{{asset('sitemap.xml')}}" target="_blank">
                <i class="fa fa-sitemap icon-color-green"></i>
                <span class="line">
                  <strong>Last update</strong>
                </span>
                <span class="line small time">
                  Date: <span class="sm-date">{{$sitemapXmlTime ? date('d F Y', $sitemapXmlTime) : 'N/A'}}</span>
                </span>
                <span class="line small time">
                  Time: <span class="sm-time">{{$sitemapXmlTime ? date('H:i', $sitemapXmlTime) : 'N/A'}}</span>
                </span>
              </a>
            </li>
          </ul>
        </li>
        <li class="external">
          <a href="{{cms_route('sitemap.xml.store')}}">
            <span class="fa fa-sitemap padr"></span>
            <span class="sm-status">{{$sitemapXmlTime ? 'Update' : 'Create'}} now!</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="dropdown hover-line">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-calendar"></i>
      @if ($countCalendarEvents = count($calendarEvents))
        <span class="badge badge-orange">{{$countCalendarEvents}}</span>
      @endif
      </a>
    @if ($countCalendarEvents)
      <ul class="dropdown-menu notifications">
        <li class="top">
          <p class="small">
            You have <strong>{{$countCalendarEvents}}</strong> upcoming event{{$countCalendarEvents > 1 ? 's' : ''}}.
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
            <i class="fa fa-external-link"></i>
          </a>
        </li>
      </ul>
    @endif
    </li>
    @if (count($languages = languages()) > 1)
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
  </ul>
  <!-- Right links for user info navbar -->
  <ul class="user-info-menu right-links list-inline list-unstyled">
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
      <a href="{{web_url('/')}}" target="_blank" title="საიტზე გადასვლა"><i class="fa fa-desktop"></i></a>
    </li>
    <li class="dropdown user-profile">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
</nav>
