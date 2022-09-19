<div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item">
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    {{ MessageService::tr('Watch role') }}
                </button>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                   aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            @can('authority')
                <li class="nav-item dropdown">
                    <a class="nav-link {{ $notification == 0 ? '' : 'shake' }}" data-toggle="dropdown" href="#"
                       aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">
                        @if ($notification > 1)
                                {{ $notification }}+
                            @else
                                {{ $notification }}
                            @endif
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <a href="{{ route('applications.new') }}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $notification }} {{ MessageService::tr('New application') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('applications.index') }}" class="dropdown-item dropdown-footer">
                            {{ MessageService::tr('See All Notifications') }}
                        </a>
                    </div>
                </li>
            @endcan
            @can('board-of-trustees')
                <li class="nav-item dropdown">
                    <a class="nav-link {{ $protocol == 0 ? '' : 'shake' }}" data-toggle="dropdown" href="#"
                       aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-info navbar-badge">
                        @if ($protocol > 1)
                                {{ $protocol }}+
                            @else
                                {{ $protocol }}
                            @endif
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <a href="{{ route('last-protocols.index') }}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $protocol }} {{ MessageService::tr('New Protocols') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('last-protocols.index') }}" class="dropdown-item dropdown-footer">
                            {{ MessageService::tr('See All Notifications') }}
                        </a>
                    </div>
                </li>
            @endcan
            @can('emergency-application')
                <li class="nav-item dropdown">
                    <a class="nav-link {{ $emergencyNotify == 0 ? '' : 'shake' }}" data-toggle="dropdown" href="#"
                       aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <span class="badge bg-danger navbar-badge">
                        @if ($emergencyNotify > 1)
                                {{ $emergencyNotify }}+
                            @else
                                {{ $emergencyNotify }}
                            @endif
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <a href="{{ route('emergency-applications.new') }}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $emergencyNotify }} {{ MessageService::tr('New application') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('emergency-applications.index') }}" class="dropdown-item dropdown-footer">
                            {{ MessageService::tr('See All Notifications') }}
                        </a>
                    </div>
                </li>
            @endcan
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ asset('img/dropdown.png') }}" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-right p-0" style="left: inherit; right: 0px;">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['name'] }}
                        </a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <span class="d-none d-md-inline"><b>{{ Str::ucfirst(Auth::guard('web')->user()->name) }}</b></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <li class="user-header">
                        <img
                            src="{{ auth()->user()->picture ? asset("users/images/". auth()->user()->picture) : asset('img/noImage.jpg') }}"
                            class="img-circle elevation-2" alt="User Image">
                        <p>
                            <b>{{ Str::ucfirst(auth()->user()->name) }}</b>
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="{{ route('changeRole') }}"
                           class="btn btn-primary btn-flat">{{ MessageService::tr('Change Role') }}</a>
                        <a href="#" class="btn btn-danger btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ MessageService::tr('Sign out') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ MessageService::tr('Your role') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>{{ session()->get('current_authority')->title ?? '' }}</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                            data-dismiss="modal">{{ MessageService::tr('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
