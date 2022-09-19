<aside class="main-sidebar sidebar-dark-primary">
    <a class="brand-link">
        <img src="{{ asset('img/f-logo.svg') }}" alt="uz">
        <span class="brand-text">
            {{ MessageService::tr("Emergency") }}
        </span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>{{ MessageService::tr('Dashboard') }}</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('users.*', 'holidays.*', 'experts.*', 'authorities.*', 'steps.*', 'actions.*', 'step-action.*', 'categories.*') ? 'menu-open' : '' }}">
                    <a
                        class="nav-link {{ request()->routeIs('users.*', 'experts.*', 'holidays.*', 'authorities.*', 'steps.*', 'actions.*', 'step-action.*', 'categories.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>{{ MessageService::tr('Admin Panel') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                               class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>{{ MessageService::tr('Users') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('authorities.index') }}"
                               class="nav-link {{ request()->routeIs('authorities.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>{{ MessageService::tr('Authorities') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->routeIs(['menus.*', 'menus-category.*', 'news.*', 'contacts.*', 'news-category.*', 'photos.*', 'photos-category.*', 'videos.*', 'videos-category.*', 'pages.*', 'pages-category.*', 'links.*', 'links-category.*', 'useful.*', 'messages.*', 'useful-category.*', 'managements-category.*', 'managements.*']) ? 'menu-open' : '' }}">
                    <a
                        class="nav-link {{ request()->routeIs(['menus.*', 'menus-category.*', 'news.*', 'contacts.*', 'news-category.*', 'photos.*', 'photos-category.*', 'videos.*', 'videos-category.*', 'pages.*', 'pages-category.*', 'links.*', 'links-category.*', 'useful.*', 'messages.*', 'useful-category.*', 'managements-category.*', 'managements.*']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>{{ MessageService::tr('Site Management') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li
                            class="nav-item {{ request()->routeIs('menus.*', 'menus-category.*') ? 'menu-open' : '' }}">
                            <a class="nav-link {{ request()->routeIs('menus.*', 'menus-category.*') ? 'active' : '' }}"
                               href="javascript:void(0);">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>{{ MessageService::tr('Menus') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('menus-category.*') ? 'active' : '' }}"
                                       href="{{ route('menus-category.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Menu Categories') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('menus.*') ? 'active' : '' }}"
                                       href="{{ route('menus.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Menus') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('news.*', 'news-category.*') ? 'menu-open' : '' }}">
                            <a class="nav-link {{ request()->routeIs('news.*', 'news-category.*') ? 'active' : '' }}"
                               href="javascript:void(0);">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>{{ MessageService::tr('News') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('news-category.*') ? 'active' : '' }}"
                                       href="{{ route('news-category.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('News Categories') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}"
                                       href="{{ route('news.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('News') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('pages.*', 'pages-category.*') ? 'menu-open' : '' }}">
                            <a class="nav-link {{ request()->routeIs('pages.*', 'pages-category.*') ? 'active' : '' }}"
                               href="javascript:void(0);">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>{{ MessageService::tr('Pages') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('pages-category.*') ? 'active' : '' }}"
                                       href="{{ route('pages-category.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Page Categories') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('pages.*') ? 'active' : '' }}"
                                       href="{{ route('pages.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Pages') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('useful.*', 'useful-category.*') ? 'menu-open' : '' }}">
                            <a class="nav-link {{ request()->routeIs('useful.*', 'useful-category.*') ? 'active' : '' }}"
                               href="javascript:void(0);">
                                <i class="nav-icon fas fa-tv"></i>
                                <p>{{ MessageService::tr('Useful') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('useful-category.*') ? 'active' : '' }}"
                                       href="{{ route('useful-category.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Useful Categories') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('useful.*') ? 'active' : '' }}"
                                       href="{{ route('useful.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Useful') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ request()->routeIs('photos.*', 'photos-category.*') ? 'menu-open' : '' }}">
                            <a
                                class="nav-link {{ request()->routeIs('photos.*', 'photos-category.*') ? 'active' : '' }}"
                                href="javascript:void(0);">
                                <i class="nav-icon fas fa-camera"></i>
                                <p>{{ MessageService::tr('Photos') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a
                                        class="nav-link {{ request()->routeIs('photos-category.*') ? 'active' : '' }}"
                                        href="{{ route('photos-category.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Photos Categories') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('photos.*') ? 'active' : '' }}"
                                       href="{{ route('photos.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Photos') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ request()->routeIs('videos.*', 'videos-category.*') ? 'menu-open' : '' }}">
                            <a class="nav-link {{ request()->routeIs('videos.*', 'videos-category.*') ? 'active' : '' }}"
                               href="javascript:void(0);">
                                <i class="nav-icon fas fa-photo-video"></i>
                                <p>{{ MessageService::tr('Video Gallery') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('videos-category.*') ? 'active' : '' }}"
                                       href="{{ route('videos-category.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('videos Categories') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('videos.*') ? 'active' : '' }}"
                                       href="{{ route('videos.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Videos') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->routeIs('managements.*', 'managements-category.*') ? 'menu-open' : '' }}">
                            <a class="nav-link {{ request()->routeIs('managements.*', 'managements-category.*') ? 'active' : '' }}"
                               href="javascript:void(0);">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>{{ MessageService::tr('Managements') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('managements-category.*') ? 'active' : '' }}"
                                       href="{{ route('managements-category.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Management Categories') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('managements.*') ? 'active' : '' }}"
                                       href="{{ route('managements.index') }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>{{ MessageService::tr('Managements') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('messages.*') ? 'active' : '' }}"
                               href="{{ route('messages.index') }}">
                                <i class="nav-icon fas fa-language"></i>
                                <p>{{ MessageService::tr('Messages') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contacts.*') ? 'active' : '' }}"
                               href="{{ route('contacts.index') }}">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>{{ MessageService::tr('Contacts') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('authentication-logs.*', 'logs.*') ? 'menu-open' : '' }}">
                    <a
                        class="nav-link {{ request()->routeIs(['authentication-logs.*', 'logs.*']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>{{ MessageService::tr('Logs') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('authentication-logs.index') }}"
                               class="nav-link {{ request()->routeIs('authentication-logs.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>{{ MessageService::tr('Authentification Logs') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logs.index') }}"
                               class="nav-link {{ request()->routeIs('logs.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>{{ MessageService::tr('Site Logs') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
