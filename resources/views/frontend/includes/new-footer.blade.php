@php
$MenuServices= App\Models\Menu::where('parent_id', '=', '65')->where('status', '=', '1')->orderBy('order')->get();
$MenuIndustries= App\Models\Menu::where('parent_id', '=', '72')->where('status', '=', '1')->orderBy('order')->get();
$Menus= App\Models\Menu::where('parent_id', '=', '0')->where('status', '=', '1')->orderBy('order')->get();
@endphp
<footer class="new-footer">
    <div class="container ">
        <div class="row footer-general">
            <div class="col-xl-3 col-lg-6 col-sm-12 footer-offices">
                <div class="footer-general-title">
                    <p class="title_footer font_weight_700">offices</p>
                </div>
                <div class="footer-general-body">
                    <ul class="address_footer">
                        <li class="footer-general-content"><b >{{trans('frontend.facesheetleft1')}} :</b>
                        </li>
                        <li class="footer-general-content">{{trans('frontend.headadd')}}
                        </li>
                        <li class="footer-general-phone">{{trans('frontend.telhead1')}}</li>
                    </ul>
                    <ul class="address_footer">
                    <li class="footer-general-content"><b>{{trans('frontend.facesheetleft2')}} :</b>
                        </li>
                        <li class="footer-general-content">{{trans('frontend.hcnadd')}}
                        </li>
                        <li class="footer-general-phone">{{trans('frontend.telhcn1')}}</li>
                    </ul>
                    <ul class="address_footer">
                    <li class="footer-general-content">
                    <b>{{trans('frontend.facesheetleft9')}} :</b>
                        </li>
                        <li class="footer-general-content">{{trans('frontend.japanoff')}}
                        </li>
                        <li class="footer-general-phone">{{trans('frontend.japantel')}}</li>
                    </ul>
                    <ul class="address_footer">
                        <li class="footer-general-via_email">
                            <a href="mailto:tso@tinhvan.vn" class="contact-via_email">tso@tinhvan.vn</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-12 footer-services">
                <div class="footer-general-title">
                    <p class="title_footer font_weight_700">{{trans('frontend.ServicesMenu')}}</p>
                </div>
                <ul class="list_menu_footer">
                    @foreach ($MenuServices as $itemServices)
                    <li class="menu_lv2 font_weight_600">
                        <a href="{{'/'.$itemServices->slug}}">{{trans('frontend.' .$itemServices->name)}}</a>
                    </li>
                    @php
                    $items_menu_lv3= App\Models\Menu::where('parent_id', '=', $itemServices->id)->where('status', '=', '1')->orderBy('order')->get();
                    @endphp
                    @foreach ($items_menu_lv3 as $item)
                    @php
                    if (str_contains($item->slug, 'https')) {
                    $url = $item->slug;
                    } else {
                    $url = '/'.$item->slug;
                    }
                    @endphp
                    <li class="menu_lv3">
                        <a href="{{$url}}">{{trans('frontend.'.$item->name) }}</a>
                    </li>
                    @endforeach
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-12 footer-industries">
                <div class="footer-general-title">
                    <p class="title_footer font_weight_700">{{trans('frontend.Industries')}}</p>
                </div>
                <ul class="list_menu_footer">
                    @foreach ($MenuIndustries as $itemIndustries)
                    <li class="menu_lv3">
                        <a href="{{'/'.$itemIndustries->slug}}">{{trans('frontend.'.$itemIndustries->name) }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-12 footer-quick_link">
                <div class="footer-general-title">
                    <p class="title_footer font_weight_700">{{trans('frontend.quicklink')}}</p>
                </div>
                <ul class="list_menu_footer">
                    @foreach ($Menus as $itemMenu)
                    @if ($itemMenu->id != '65' && $itemMenu->id != '72')
                    <li class="menu_lv3">
                        <a href="{{'/'.$itemMenu->slug}}">{{trans('frontend.'.$itemMenu->name) }}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright-block">
        <div class="container contain-footer-copyright">
            <div class="row row-footer-copyright">
                <div class="col-xl-3 col-lg-12 footer-copyright-logo footer-copyright">
                    <a href="{{ route('frontend.index') }}">
                        <img class="logo_header align-middle" src="{{ asset('frontend/assets/images/logo_white.png')}}" alt="logo" />
                    </a>
                </div>
                <div class="col-lg-12 mobile_visible">
                    <ul>
                        <li id="fb"><a href="https://www.facebook.com/tuyendung.software" target="_blank" rel="noopener noreferrer">
                                <img class="social_button" src="{{asset('frontend/assets/images/social-button/facebook.svg')}}" alt="facebook" />
                            </a></li>
                        <li id="link"><a href="https://linkedin.com/company/tinhvan-software/" target="_blank" rel="noopener noreferrer">
                                <img class="social_button" src="{{asset('frontend/assets/images/social-button/in.svg')}}" alt="linkedin" />
                            </a></li>
                        <li id="email"><a href="mailto:hrtvo@tinhvan.com">
                                <img class="social_button" src="{{asset('frontend/assets/images/social-button/mail.svg')}}" alt="email" />
                            </a></li>
                    </ul>
                </div>
                <div class="col-xl-6 col-lg-12 footer-copyright-content footer-copyright">
                    <p class="align-middle font_weight_300">
                        {{trans('frontend.copyright')}}
                    </p>
                </div>
                <div class="col-xl-3 col-lg-12 footer-copyright-privacy footer-copyright">
                    <ul class="align-middle">
                        <li>
                            <a class="font_weight_300" href="/privacy">
                                {{trans('frontend.privacy')}}
                            </a>
                        </li>
                        <li>
                            <a class="font_weight_300" href="/about-us/contact-us">
                                {{trans('frontend.Contact Us')}}
                            </a>
                        </li>
                        <li>
                            <a class="font_weight_300" href="https://www.google.com/maps/place/C%C3%B4ng+Ty+C%C3%B4ng+Ngh%E1%BB%87+Tinh+V%C3%A2n/@21.001377,105.8028872,18z/data=!3m1!4b1!4m5!3m4!1s0x3135aca328555555:0x742248695acdf0d4!8m2!3d21.001377!4d105.8028872?hl=vi-VN">
                                {{trans('frontend.sitemap')}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>