<header>
    <div class="h-container container">
        <div class="row align-items-xl-center">
            <div class="col-xl-3">
                <div class="logo">
                    <a href="/">
                        <div class="logo-in">
                            <div class="logo-left">
                                <img src="{{ asset('img/logo.png') }}" alt="logo">
                            </div>
                            <div class="logo-right">
                                <span>{!! tr('Republican ambulance center') !!}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="h-right">
                    <form action="{{ route('search') }}" method="get">
                        @csrf
                        <div class="h-search">
                            <label>
                                <input type="search" name="search" placeholder="{{ tr('Search') }}"/>
                            </label>
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17.236" height="17.211"
                                     viewBox="0 0 17.236 17.211">
                                    <path
                                        d="M21.921,22.942l-5.867-5.867a5.365,5.365,0,0,1-1.7.986,6.025,6.025,0,0,1-2.069.353,6.061,6.061,0,0,1-4.455-1.826A6,6,0,0,1,6,12.182,6,6,0,0,1,7.826,7.776,6.033,6.033,0,0,1,12.256,5.95a5.964,5.964,0,0,1,4.394,1.826A6.231,6.231,0,0,1,18.123,14.2,6.179,6.179,0,0,1,17.1,16.028L23.017,21.9a.638.638,0,0,1,.219.5.757.757,0,0,1-.243.548.764.764,0,0,1-1.071,0Zm-9.665-5.989a4.556,4.556,0,0,0,3.359-1.4A4.616,4.616,0,0,0,17,12.182,4.616,4.616,0,0,0,15.616,8.81a4.556,4.556,0,0,0-3.359-1.4,4.779,4.779,0,0,0-4.8,4.771,4.779,4.779,0,0,0,4.8,4.771Z"
                                        transform="translate(-6 -5.95)" fill="#1c3d81"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="eye">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25.771" height="17.855"
                             viewBox="0 0 25.771 17.855">
                            <path
                                d="M15.235,21.986a5.03,5.03,0,0,0,5.059-5.059,5.03,5.03,0,0,0-5.059-5.059,5.03,5.03,0,0,0-5.059,5.059,5.03,5.03,0,0,0,5.059,5.059Zm0-1.726A3.3,3.3,0,0,1,11.9,16.927a3.3,3.3,0,0,1,3.333-3.333,3.3,3.3,0,0,1,3.333,3.333,3.3,3.3,0,0,1-3.333,3.333Zm0,5.595a13.287,13.287,0,0,1-7.484-2.232,15.062,15.062,0,0,1-5.223-5.892,1.165,1.165,0,0,1-.134-.357,2.254,2.254,0,0,1,0-.893,1.165,1.165,0,0,1,.134-.357,15.062,15.062,0,0,1,5.223-5.892A13.287,13.287,0,0,1,15.235,8a13.287,13.287,0,0,1,7.484,2.232,15.062,15.062,0,0,1,5.223,5.892,1.165,1.165,0,0,1,.134.357,2.254,2.254,0,0,1,0,.893,1.165,1.165,0,0,1-.134.357,15.062,15.062,0,0,1-5.223,5.892A13.287,13.287,0,0,1,15.235,25.855ZM15.235,16.927Zm0,7.142a11.967,11.967,0,0,0,6.621-1.949,12.648,12.648,0,0,0,4.6-5.193,12.649,12.649,0,0,0-4.6-5.193,12.221,12.221,0,0,0-13.242,0,12.861,12.861,0,0,0-4.627,5.193A12.861,12.861,0,0,0,8.614,22.12,11.967,11.967,0,0,0,15.235,24.069Z"
                                transform="translate(-2.35 -8)" fill="#5c5c5c"/>
                        </svg>
                    </div>
                    <div class="lang">
                        <div class="dropdown">
                            <button class="lang-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>{{ LaravelLocalization::getCurrentLocaleName() }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12.711" height="7.239"
                                     viewBox="0 0 12.711 7.239">
                                    <path
                                        d="M19.013,24.454A.822.822,0,0,1,18.7,24.4a.853.853,0,0,1-.28-.2l-5.541-5.541a.77.77,0,0,1-.21-.6.861.861,0,0,1,.238-.6.7.7,0,0,1,.6-.238,1.052,1.052,0,0,1,.574.266l4.925,4.925,4.925-4.925a.914.914,0,0,1,.6-.252.662.662,0,0,1,.6.252.617.617,0,0,1,.238.588,1.09,1.09,0,0,1-.266.616L19.6,24.2a.853.853,0,0,1-.28.2.822.822,0,0,1-.308.056Z"
                                        transform="translate(-12.674 -17.215)" fill="#5c5c5c"/>
                                </svg>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="app-link d-none">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.65" height="21.169"
                                 viewBox="0 0 25.65 21.169">
                                <path
                                    d="M30.345,24.031,27.84,21.526,28.863,20.5a1.114,1.114,0,0,1,1.482,0l1.023,1.023a1.114,1.114,0,0,1,0,1.482ZM18.7,33.169V30.664l7.621-7.621,2.505,2.505-7.621,7.621ZM6,25.76V23.643H16.585V25.76Zm0-5.822V17.822H22.583v2.117Zm0-5.822V12H22.583v2.117Z"
                                    transform="translate(-6 -12)"/>
                            </svg>
                            <span>{{ tr('Virtual reception') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="menu-section">
    <div class="h-container container">
        <div class="menu">
            <nav class="navbar navbar-expand-xl">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <svg fill="rgba(207, 44, 48, 1)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"
                             width="30px" height="30px">
                            <path
                                d="M 3 7 A 1.0001 1.0001 0 1 0 3 9 L 27 9 A 1.0001 1.0001 0 1 0 27 7 L 3 7 z M 3 14 A 1.0001 1.0001 0 1 0 3 16 L 27 16 A 1.0001 1.0001 0 1 0 27 14 L 3 14 z M 3 21 A 1.0001 1.0001 0 1 0 3 23 L 27 23 A 1.0001 1.0001 0 1 0 27 21 L 3 21 z"/>
                        </svg>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            @foreach($top_menu_tree as $menu)
                                @if (!isset($menu['submenus']))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ hrefType($menu['link_type'], $menu['link']) }}"
                                           target="{{ targetType($menu['link_type']) }}">
                                            {{ $menu['title'] ?? '' }}
                                        </a>
                                    </li>
                                @endif
                                @if (isset($menu['submenus']))
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <span>{{ $menu['title'] ?? '' }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.711" height="7.239"
                                                 viewBox="0 0 12.711 7.239">
                                                <path
                                                    d="M19.013,24.454A.822.822,0,0,1,18.7,24.4a.853.853,0,0,1-.28-.2l-5.541-5.541a.77.77,0,0,1-.21-.6.861.861,0,0,1,.238-.6.7.7,0,0,1,.6-.238,1.052,1.052,0,0,1,.574.266l4.925,4.925,4.925-4.925a.914.914,0,0,1,.6-.252.662.662,0,0,1,.6.252.617.617,0,0,1,.238.588,1.09,1.09,0,0,1-.266.616L19.6,24.2a.853.853,0,0,1-.28.2.822.822,0,0,1-.308.056Z"
                                                    transform="translate(-12.674 -17.215)"/>
                                            </svg>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach ($menu['submenus'] as $item)
                                                @if (!isset($item['submenus']))
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="{{ hrefType($item['link_type'], $item['link']) }}"
                                                           target="{{ targetType($item['link_type']) }}">
                                                            {{ $item['title'] ?? '' }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="call-center">
        <a href="#">
            <div class="call-center-in">
                <svg xmlns="http://www.w3.org/2000/svg" width="19.793" height="23.119" viewBox="0 0 19.793 23.119">
                    <path
                        d="M16.776,27.069a.825.825,0,1,1,0-1.649h7.367V23.935H21.724a1.643,1.643,0,0,1-1.649-1.649V17.447A1.643,1.643,0,0,1,21.724,15.8h2.419V13.929A8.128,8.128,0,0,0,21.752,8.06a7.789,7.789,0,0,0-5.8-2.46A7.967,7.967,0,0,0,10.1,8.06a8.034,8.034,0,0,0-2.447,5.869V15.8h2.419a1.643,1.643,0,0,1,1.649,1.649v4.838a1.643,1.643,0,0,1-1.649,1.649H7.649A1.691,1.691,0,0,1,6,22.286V13.929a9.672,9.672,0,0,1,.783-3.876,10.232,10.232,0,0,1,2.13-3.175,9.95,9.95,0,0,1,3.161-2.144,9.672,9.672,0,0,1,3.876-.783,9.676,9.676,0,0,1,6.982,2.928,10.281,10.281,0,0,1,2.089,3.175,9.821,9.821,0,0,1,.77,3.876V25.42a1.691,1.691,0,0,1-1.649,1.649ZM7.649,22.286h2.419V17.447H7.649Zm14.075,0h2.419V17.447H21.724Zm-14.075,0h0Zm14.075,0h0Z"
                        transform="translate(-6 -3.95)" fill="#fff"/>
                </svg>
                <span class="clock">{{ tr('Round-the-clock phone') }} (24/7)</span>
                <span class="number">103</span>
            </div>
        </a>
    </div>
</section>
