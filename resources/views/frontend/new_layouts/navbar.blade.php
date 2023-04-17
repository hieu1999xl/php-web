<header class="header-top">
    @php
    $items_about= App\Models\Menu::where('parent_id', '=', '70')->where('status', '=', '1')->orderBy('order')->get();
    $items_industries= App\Models\Menu::where('parent_id', '=', '72')->where('status', '=', '1')->orderBy('order')->get();
    $items_menu= App\Models\Menu::where('parent_id', '=', '0')->where('status', '=', '1')->where('order', '>', '0')->orderBy('order')->get();
    $items_services = App\Models\Menu::where('parent_id', '=', '65')->where('status', '=', '1')->where('order', '>', '0')->orderBy('order')->get();
    @endphp
    <div class="container">
        <div class="overlay_menu_glass"></div>
        <div class="row ">
            <div class="col-md-2 col-4 nav_header">
                <a href="{{ route('frontend.index') }}">
                    <img class="logo_header" src="{{ asset('frontend/assets/images/section_1/logo.svg')}}" alt="logo" />
                </a>
            </div>
            <div class="col-md-8 col-6">
                <ul class="nav-lists nav_header">
                    @foreach($items_menu as $item)
                    @php $url = $item->name == 'Industries' || $item->name == 'Services' ? '#' : '/'.$item->slug; @endphp
                    <li data-id="{{$item->slug}}">
                        <a href="{{ url($url)  }}" class="font_weight_500 header_link">{{trans('frontend.'. $item->name)}}</a>
                        <div></div>
                    </li>
                    @endforeach
                </ul>
                <div class="nav-lists-mobile">
                    <form id="form_search" class="mobile-search" action="{{ route('frontend.search_result', app()->getLocale()) }}" method="GET">
                        <input id="searchKey" value="" name="querySearchKey" type="search" placeholder="{{ trans('frontend.searchheader') }}">
                        <select id="searchSelect" name="querySearchSelect">
                            <option value="news">News</option>
                            <option value="jobs">Jobs</option>
                        </select>
                    </form>
                    <ul id="accordion" class="accordion menu-mobile">
                        @foreach($items_menu as $menu)
                        @php
                        $items_child_lv1= App\Models\Menu::where('parent_id', '=', $menu->id)->where('status', '=', '1')->orderBy('order')->get();
                        if ($menu->id == 66 || $menu->id == 68 || $menu->id == 71) {
                        $items_child_lv1 = [];
                        }
                        @endphp
                        <li class="link_mobile">
                            <div class="link">
                                <a href="{{count($items_child_lv1) > 0 && $menu->id != 70 ? '#' : '/'.$menu->slug}}" class="">{{trans('frontend.'.$menu->name)}}</a>
                                @if (count($items_child_lv1) > 0)
                                <span class="chevron right"></span>
                                @endif
                            </div>
                            @if (count($items_child_lv1) > 0)
                            <ul class="submenu">
                                @foreach($items_child_lv1 as $item)
                                @php
                                $items_child= App\Models\Menu::where('parent_id', '=', $item->id)->where('status', '=', '1')->orderBy('order')->get();
                                @endphp
                                <li class="{{count($items_child) > 0 ? 'submenu--text' : 'submenulv3'}}">
                                    <a href="{{'/'.$item->slug}}" class="">{{trans('frontend.' . $item->name)}}</a>
                                </li>
                                @foreach($items_child as $item_child)
                                @php
                                $url = str_contains($item_child->slug, 'https') ? $item_child->slug : '/'.$item_child->slug;
                                $target = str_contains($item_child->slug, 'https') ? '_blank': '_self';
                                $rel = str_contains($item_child->slug, 'https') ? 'noopener noreferrer': '';
                                @endphp
                                <li>
                                    <a href="{{$url}}" target="{{$target}}" rel="{{ $rel }}">{{trans('frontend.' . $item_child->name)}}</a>
                                </li>
                                @endforeach
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-2 tool nav_header">
                <div class="language" id="idLang">
                    <p class="lang">{{LaravelLocalization::getCurrentLocaleNative()}}</p>
                    <div class="sort-down">
                        <span class="chevron bottom"></span>
                        <ul class="lang-table" id="lang-table">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <p class="lang-sub"> {{ $properties['name'] }}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="search">
                    <img src="{{ asset('frontend/assets/images/about/search.svg')}}" alt="javascript:;">
                </div>
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger"></div>
                </div>
            </div>
            <div class="col-10 box-search-pc">
                <img class="close_search" src="{{ asset('frontend/assets/images/icon_close.svg')}}" alt="javascript:;">
                <form id="form_search" class="info" action="{{ route('frontend.search_result') }}" method="GET">
                    <input id="searchKey" value="" name="querySearchKey" type="search" placeholder="{{trans('frontend.searchheader')}}">
                    <select id="searchSelect" name="querySearchSelect">
                        <option value="news">News</option>
                        <option value="jobs">Jobs</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</header>
<div class="menu_on_hover services" id="services_sub">
    <div class="container">
        <div class="row">
            <div class="offset-2 col-10">
                <ul>
                    <div class="row">
                        @foreach($items_services as $key => $item)
                        <div class="col-4 {{$key > 0 ? 'border_menu' : ''}}">
                            <li>
                                <a class="sub_header--text font_weight_600" href="{{ '/'.$item->slug}}"> {{trans('frontend.' . $item->name)}} </a>
                            </li>
                            @php $items_child= App\Models\Menu::where('parent_id', '=', $item->id)->where('status', '=', '1')->orderBy('order')->get(); @endphp
                            @foreach($items_child as $item_child)
                            @php
                            $url = str_contains($item_child->slug, 'https') ? $item_child->slug : '/'.$item_child->slug;
                            $target = str_contains($item_child->slug, 'https') ? '_blank': '_self';
                            $rel = str_contains($item_child->slug, 'https') ? 'noopener noreferrer': '';
                            @endphp
                            <li class="list_menu_child_border">
                                <a href="{{ $url }}" class="sub_header_child_link" target="{{$target}}" rel="{{ $rel }}">
                                    {{trans('frontend.' . $item_child->name)}}
                                </a>
                            </li>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="menu_on_hover" id="industries_sub">
    <div class="container">
        <div class="row">
            <div class="offset-2 col-10">
                <ul>
                    @foreach($items_industries as $item)
                    <li class="list_menu_child_not_border">
                        <a href="{{ route('frontend.industry_detail', [substr($item->slug, 11)]) }}" class="sub_header_child_link">{{trans('frontend.' . $item->name)}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="menu_on_hover" id="about-us_sub">
    <div class="container">
        <div class="row">
            <div class="offset-2 col-10" id="services_active">
                <ul>
                    @foreach($items_about as $item)
                    <li class="list_menu_child_not_border">
                        <a href="{{ url(app()->getLocale()) }}/{{$item->slug}}" class="sub_header_child_link">{{trans('frontend.' . $item->name)}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;
            var links = this.el.find('.link');
            links.on('click', {
                el: this.el,
                multiple: this.multiple
            }, this.dropdown)
        }

        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el;
            $this = $(this),
                $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            };
        }

        var accordion = new Accordion($('#accordion'), false);

    });
</script>
@push ('after-scripts')
<script>
    //add line bottom menu
    function initRouter() {
        if (PATH_NAME === '/') {
            return;
        }
        const menu = {
            'services': 'services',
            'industries': 'industries',
            'technologies': 'technologies',
            'case-studies': 'case-studies',
            'news': 'news',
            'talent': 'talent',
            'about-us': 'about-us',
            'shareholder-page': 'shareholder-page',
        }
        const pathName = PATH_NAME.split('/')[2]
        const dataId = menu[pathName] || '';
        $(document).ready(function() {
            const el = $(".nav-lists").find(`[data-id='${dataId}']`);
            var url = new URL(window.location.href);
            var history = url.searchParams.get("history");
            if (dataId === 'case-studies' && history ) {
                elHistory = $(".nav-lists").find(`[data-id='${history}']`);
                elHistory.addClass('active');
            }
            if (url.pathname == '/vi/news-category/gio-bug' ||
                url.pathname == '/en/news-category/gio-bug' ||
                url.pathname == '/ja/news-category/gio-bug' ||
                url.pathname == '/vi/news-category/events' ||
                url.pathname == '/en/news-category/events' ||
                url.pathname == '/ja/news-category/events' ||
                url.pathname == '/vi/news-category/dx-news' ||
                url.pathname == '/en/news-category/dx-news' ||
                url.pathname == '/ja/news-category/dx-news'
            ) {
                const activeHeaderNewViewMore = $(".nav-lists").find('[data-id="news"]');
                activeHeaderNewViewMore.addClass('active');
            }
            el.addClass('active');
        });
        if (dataId === '') {
            return;
        }
    }
    $('.submenu li').click(function(event) {
        const pathName = PATH_NAME.split('/')[2]
        if (pathName === 'about-us') {
            $('#hamburger-menu').toggleClass('active')
            $('.nav-lists-mobile').toggleClass('active')
            $('.overlay_menu_glass').toggleClass('active')
            if ($('.overlay_menu_glass').hasClass('active')) {
                jQuery(document.body).css('overflow', 'hidden')
            } else {
                jQuery(document.body).css('overflow', 'auto')
            }
        }
    })
    $(document).ready(function() {
        initRouter();
        $('.menu_on_hover').hover(function() {
            const showMenuSub = $('.menu_on_hover').hasClass('show');
            if (showMenuSub && !$(this).hasClass('active')) {
                // $('.nav-lists li').removeClass('active')
                $('.menu_on_hover').removeClass('show')
            } else {
                $(this).addClass('show');
                const idMenuHover = $(this).attr('id')
                const dataIdMenu = idMenuHover.split('_sub')
                $(`.nav-lists li[data-id="${dataIdMenu}"]`).addClass('active');
            }
        })
        $(".nav-lists li").hover(function() {
            const showMenuSub = $('.menu_on_hover').hasClass('show');
            if (showMenuSub && !$(this).hasClass('active')) {
                $('.nav-lists li').removeClass('active')
                $('.menu_on_hover').removeClass('show');
            }
            $(this).toggleClass('active')
            const dataIdMenu = $(this).attr('data-id');
            $(`#${dataIdMenu}_sub`).toggleClass('show')
            initRouter();
        });
        $('#idLang').click(function() {
            if ($('#lang-table').is(':visible')) {
                $('#lang-table').hide();
            } else {
                $('#lang-table').show();
            }
        });
        $(".lang-table").on("mouseleave", function() {
            $(".lang-table").removeClass("show")
        });
        $('#hamburger-menu').click(() => {
            $('#hamburger-menu').toggleClass('active')
            $('.nav-lists-mobile').toggleClass('active')
            $('.overlay_menu_glass').toggleClass('active')
            if ($('.overlay_menu_glass').hasClass('active')) {
                jQuery(document.body).css('overflow', 'hidden')
            } else {
                jQuery(document.body).css('overflow', 'auto')
            }
        });
        // hamberger mobile
        $(window).scroll(function(event) {
            if ($(window).scrollTop() > 20) {
                $('.header-top').addClass('fixed');
                $('.menu_on_hover').addClass('fixed');
                // $('.header-top').addClass('up-menu');
            } else {
                $('.header-top').removeClass('fixed');
                $('.menu_on_hover').removeClass('fixed');
                // $('.header-top').removeClass('up-menu');
            }
        })

        $('.search').on('click', function() {
            $('.box-search-pc').addClass('modeSearch')
            $('.header-top .col-md-8').addClass('modeSearch')
            $('.header-top .tool').addClass('modeSearch')
            const showMenuSub = $('.menu_on_hover').hasClass('show');
            if (showMenuSub && !$(this).hasClass('active')) {
                $('.nav-lists li').removeClass('active')
                $('.menu_on_hover').removeClass('show')
            }
        })
        $('.close_search').on('click', function() {
            $('.header-top').removeClass('modeSearch')
            $('.box-search-pc').removeClass('modeSearch')
            $('.header-top .col-md-8').removeClass('modeSearch')
            $('.header-top .tool').removeClass('modeSearch')
        })
        $(".box-search-pc form input").focus(function() {
            $('.box-search-pc form').addClass('transaction')
        });
        $(".box-search-pc form input").focusout(function() {
            $('.box-search-pc form').removeClass('transaction')
        });
        $('.language').on('click', function() {
            $('.language ul').addClass('show')
            let rmLangTb = $('.language ul').hasClass('show');
            if (rmLangTb) {}
        })
    })
</script>
@endpush