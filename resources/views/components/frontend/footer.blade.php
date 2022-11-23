<footer>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="f-logo">
                    <a href="/">
                        <div class="f-logo-in">
                            <img src="{{ asset('img/footer-logo.png') }}" alt="logo">
                            <span>{!! tr('Republican ambulance center') !!}</span>
                        </div>
                    </a>
                </div>
                <div class="f-social">
                    <div class="f-social-title">
                        <span>{{ tr('Share') }}:</span>
                    </div>
                    <div class="f-social-link">
                        @foreach($socials as $social)
                            <a target="{{ targetType($social->link_type) }}"
                               href="{{ hrefType($social->link_type, $social->link) }}">
                                <img src="{{ $social->image ?? "" }}" alt="{{ $social->title ?? '' }}">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="row">
                    @foreach($top_menu_tree as $menu)
                        @if (!isset($menu['submenus']))
                            <div class="col-lg-6">
                                <div class="f-menu">
                                    <a href="{{ hrefType($menu['link_type'], $menu['link']) }}"
                                       target="{{ targetType($menu['link_type']) }}">
                                        {{ $menu['title'] ?? '' }}
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if (isset($menu['submenus']))
                            <div class="col-lg-6">
                                <div class="dropdown">
                                    <a class="f-menu-in" href="#" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <span>{{ $menu['title'] ?? '' }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12.711" height="7.239"
                                             viewBox="0 0 12.711 7.239">
                                            <path
                                                d="M19.013,24.454A.822.822,0,0,1,18.7,24.4a.853.853,0,0,1-.28-.2l-5.541-5.541a.77.77,0,0,1-.21-.6.861.861,0,0,1,.238-.6.7.7,0,0,1,.6-.238,1.052,1.052,0,0,1,.574.266l4.925,4.925,4.925-4.925a.914.914,0,0,1,.6-.252.662.662,0,0,1,.6.252.617.617,0,0,1,.238.588,1.09,1.09,0,0,1-.266.616L19.6,24.2a.853.853,0,0,1-.28.2.822.822,0,0,1-.308.056Z"
                                                transform="translate(-12.674 -17.215)" fill="#fff"/>
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
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="f-data">
                            <div class="f-data-left">
                                <span>{{ tr('Working time') }}:</span>
                            </div>
                            <div class="f-data-right">
                                <span>{{ $contact->working_time ?? '' }}</span>
                            </div>
                        </div>
                        <div class="f-data">
                            <div class="f-data-left">
                                <span>{{ tr('Lunch') }}:</span>
                            </div>
                            <div class="f-data-right">
                                <span>13:00 - 14:00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="f-data">
                            <div class="f-data-left">
                                <span></span>
                            </div>
                            <div class="f-data-right">
                                <a href="#">{{ $contact->phone ?? '' }}</a>
                            </div>
                        </div>
                        <div class="f-data">
                            <div class="f-data-left">
                                <span>{{ tr('Address') }}:</span>
                            </div>
                            <div class="f-data-right">
                                <span>{{ $contact->address ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="f-line"></div>
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-3">
                <div class="f-data">
                    <div class="f-data-left">
                        <span>При использовании материалов ссылка на www.103.uz</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-2 col-xl-3">
                <div class="f-data">
                    <div class="f-data-left">
                        <span>© {{ tr('All rights reserved') }} {{ now()->format('Y') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-6">
                <div class="f-data">
                    <div class="f-data-left">
                        <span>{{ tr('Attention! If you find an error in the text, highlight it and press Ctrl+Enter to notify the administration') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-12">
                <div class="uzinfocom">
                    <a href="https://uzinfocom.uz">
                        <img src="{{ asset('img/uzinfocom.png') }}" alt="uzinfocom">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
