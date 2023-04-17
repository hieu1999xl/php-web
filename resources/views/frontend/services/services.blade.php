@extends('frontend.layouts.app')
@section('title'){{trans('frontend.TSOServices')}} @endsection

@section('content')
<section id="hero" class="pService">
    <div class="container">
        <div class="row">
            <div class="col-12 hero">
                <div style="text-align: center;">
                <h2 style="display:inline;" class=" font_weight_700" key="Consultancy_ser">{{trans('frontend.Development')}}</h2>
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4L3.53553 0.464466L7.07107 4L5.3033 5.76777L3.53553 7.53553L0 4Z" fill="#ffffff" />
                    </svg>
                <h2 style="display:inline;" class=" font_weight_700" key="Consultancy_ser">{{trans('frontend.Consultancy_ser')}}</h2>
        <h2 style="display:inline;" class=" font_weight_700" key="development_services"></h2>
                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4L3.53553 0.464466L7.07107 4L5.3033 5.76777L3.53553 7.53553L0 4Z" fill="#ffffff" />
                    </svg>
                    <h2 style="display:inline;" class=" font_weight_700" key="maintenace">{{trans('frontend.maintenace')}}</h2>
                </div>

            </div>
        </div>
    </div>
</section>

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 about-top">
                <h3 class=" products">
                    <span id="testSP" class="font_weight_700" key="Exceptionalspan">{{trans('frontend.Exceptionalspan')}}</span>
                    <h3 class="font_weight_700" key="Exceptionalh3">{{trans('frontend.Exceptionalh3')}} </h3>
                </h3>
                <div class="about-bottom ">
                    <p class="translation" key="Playing a role">
                    {{trans('frontend.Playing a role')}}
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="content-right " id="about_img1">
                    <img src="{{ asset('frontend/assets/images/server/mobiletech.webp')}}" alt="products & services">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="mobile-apps" class="mobile-apps">
    <div class="container">
        <div class="MB">
            <h2 class="font_weight_700">01</h2>
            <h3 class="font_weight_700 title_position"> <a href="{{ route('frontend.mobile_app_development') }}"  class="font_weight_700" key="Mobile Apps Development">{{trans('frontend.mobileSolution')}}</a> </h3>
        </div>
        <div class="content">
            <div class="row ">
                <div class="col-md-6 col-sm-12 col-xs-12 order_services--bot">
                    <div class="content-left ">
                        <p class="translation" key="Mobile Apps Development content">{{trans('frontend.Mobile Apps Development content')}} </p>
                        <p class="translation" key="Mobile Apps Development content2">{{trans('frontend.Mobile Apps Development content2')}} </p>
                        <p class="translation" key="Mobile Apps Development content3">{{trans('frontend.Mobile Apps Development content3')}}</p>
                        <p class="font_weight_700" key="Mobile Apps Development content4">{{trans('frontend.Mobile Apps Development content4')}} </p>
                        <p class="translation" key="Mobile Apps Development content5">{{trans('frontend.Mobile Apps Development content5')}} </p>
                        <p class="translation" key="Mobile Apps Development content6">{{trans('frontend.Mobile Apps Development content6')}}</p>
                        <p class="translation" key="Mobile Apps Development content7">{{trans('frontend.Mobile Apps Development content7')}}</p>
                        <div class="more">
                            <label class="btn rounded">
                                <span class="text-green">
                                    <a href="{{ route('frontend.case_studies') }}?services=mobile-solution"    class="translation font_weight_500" key="viewcasestudy">{{trans('frontend.viewcasestudy')}}
                                    </a>+
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 order_services--top">
                    <div class="content-right ">
                        <img src="{{ asset('frontend/assets/images/server/mobile-app.webp')}}" alt="products & services">
                    </div>

                </div>
            </div>
        </div>
        <div class="content_mb">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-left ">

                        <img src="{{ asset('frontend/assets/images/server/mobile-app.webp')}}" alt="products & services">
                        <p>TSO always updates itself by making use of cutting – edge technologies to mobilize enterprise
                            process. Are you looking to build up or develop a professional and innovative mobile app for
                            your business or create a gaming app? Or do you have a mobile app on one platform and want
                            to extend the capabilities of existing so as to cross multi platforms? TSO’s mobile
                            application development services are exactly what you do want. For over one decade, we have
                            associated with various companies in creating several applications.

                        </p>

                        <div class="more">
                            <label class="btn rounded">
                                <!-- <span class="text-green">more details +</span> -->
                                <span class="text-green">
                                    <a href="{{ route('frontend.case_studies') }}?services=mobile-solution" data-id="1" class="translation font_weight_500" key="viewcasestudy">{{trans('frontend.viewcasestudy')}}
                                    </a> +
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="MOM" id="mobile-apps">
    <div class="container">
        <div class="MB">
            <h2 class="font_weight_700">02</h2>
            <h3 class="font_weight_700 title_position"> <a href="{{ route('frontend.services_maintain') }}"  class="font_weight_700" key="Resources Staffing">{{trans('frontend.Resources Staffing')}}</a>
            </h3>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-sm-12 order_services--bot">
                    <div class="content-left ">
                        <p class="translation" key="Resources staffing infor">
                        {{trans('frontend.Resources staffing infor')}}
                        </p>
                        <div class="more">
                            <label class="btn rounded">
                                <span class="text-green">
                                    <a href="{{ route('frontend.case_studies') }}?services=resources-staffing" onclick="onClickServicesItem('2')" class="translation font_weight_500" key="viewcasestudy">{{trans('frontend.viewcasestudy')}}
                                    </a>+
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 order_services--top">
                    <div class="content-right ">
                        <img src="{{ asset('frontend/assets/images/server/mom.webp')}}" alt="products & services">


                    </div>

                </div>
            </div>
        </div>
        <div class="content_mb">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-left ">
                        <img src="{{ asset('frontend/assets/images/server/mom.webp')}}" alt="products & services">
                        <p class="translation" key="mom-content">
                        {{trans('frontend.mom-content')}}
                        </p>
                        <div class="more">
                            <label class="btn rounded">
                                <span class="text-green">
                                    <a href="{{ route('frontend.case_studies') }}?services=resources-staffing" class="translation font_weight_500" key="viewcasestudy">{{trans('frontend.viewcasestudy')}}
                                    </a>+
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="LSM" id="mobile-apps">
    <div class="container">
        <div class="MB">
            <h2 class="font_weight_700">03</h2>
            <h3 class=" font_weight_700 title_position"> <a href="{{ route('frontend.services_legacy') }}" class="font_weight_700" key="Legacy System Migration">{{trans('frontend.Legacy System Migration')}}</a></h3>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-sm-12 order_services--bot">
                    <div class="content-left ">
                        <p class="translation" key="LSM content">{{trans('frontend.LSM content')}}
                        </p>
                        <p class="translation" key="LSM content11">{{trans('frontend.LSM content11')}}</p>
                        <p class="translation" key="LSM content1">{{trans('frontend.LSM content1')}}</p>
                        <p class="translation" key="LSM content2">{{trans('frontend.LSM content2')}}</p>
                        <p class="translation" key="LSM content3">{{trans('frontend.LSM content3')}}</p>
                        <p class="translation" key="LSM content4">{{trans('frontend.LSM content4')}}</p>
                        <p class="translation" key="LSM content5">{{trans('frontend.LSM content5')}}</p>
                        <div class="more">
                            <label class="btn rounded">
                                <span class="text-green">
                                    <a href="{{ route('frontend.case_studies') }}?services=legacy-system-migration" class="translation font_weight_500" key="viewcasestudy">{{trans('frontend.viewcasestudy')}}
                                    </a>+
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 order_services--top">
                    <div class="content-right ">
                        <img src="{{ asset('frontend/assets/images/server/LSM.webp')}}" alt="products & services">


                    </div>
                </div>
            </div>
        </div>
        <div class="content_mb">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-left ">
                        <img src="{{ asset('frontend/assets/images/server/LSM.webp')}}" alt="products & services">

                        <p class="translation" key="LSM content">{{trans('frontend.LSM content')}}
                        </p>
                        <p class="translation" key="LSM content1">{{trans('frontend.LSM content1')}}</p>
                        <p class="translation" key="LSM content2">{{trans('frontend.LSM content2')}}</p>
                        <p class="translation" key="LSM content3">{{trans('frontend.LSM content3')}}</p>
                        <p class="translation" key="LSM content4">{{trans('frontend.LSM content4')}}</p>
                        <div class="more">
                            <label class="btn rounded">
                                <span class="text-green">
                                    <a href="{{ route('frontend.case_studies') }}?services=legacy-system-migration" class="translation font_weight_500" key="viewcasestudy">{{trans('frontend.viewcasestudy')}}
                                    </a>+
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="ECSD" id="mobile-apps">
    <div class="container">
        <div class="MB">
            <h2 class="font_weight_700">04</h2>
            <h3 class="font_weight_700 title_position"> <a href="{{ route('frontend.services_enterprise') }}" class="font_weight_700" key="Enterprise Custom Software Development">{{trans('frontend.Custom Software Development')}}</a>
            </h3>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="content-left ">
                        <img src="{{ asset('frontend/assets/images/server/ecsd.webp')}}" alt="products & services">


                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="content-right ">
                        <p class="translation" key="ecsd content">{{trans('frontend.ecsd content')}}</p>
                        <p class="translation" key="ecsd content11">{{trans('frontend.ecsd content11')}}</p>
                        <!-- <p class="translation" key="ecsd content1"></p> -->
                        <p class="font_weight_700" key="ecsd our services">{{trans('frontend.ecsd our services')}}</p>
                        <p class="translation" key="ecsd content2">{{trans('frontend.ecsd content2')}}</p>
                        <p class="translation" key="ecsd content3">{{trans('frontend.ecsd content3')}}</p>
                        <p class="translation" key="ecsd content4">{{trans('frontend.ecsd content4')}}</p>
                        <p class="translation" key="ecsd content5">{{trans('frontend.ecsd content5')}}</p>
                        <p class="translation" key="ecsd content6">{{trans('frontend.ecsd content6')}}</p>
                        <p class="font_weight_700" key="ecsd content8">{{trans('frontend.ecsd content8')}}</p>
                        <p class="translation" key="ecsd content9">{{trans('frontend.ecsd content9')}}</p>
                        <p class="translation" key="ecsd content10">{{trans('frontend.ecsd content10')}}</p>
                        <!-- <p class="translation" key="ecsd content11"></p> -->

                        <div class="more">
                            <label class="btn rounded">
                                <span class="text-green">
                                    <a href="{{ route('frontend.case_studies') }}?services=enterprise-custom-software-development" class="translation font_weight_500" key="viewcasestudy">{{trans('frontend.viewcasestudy')}}
                                    </a>+
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content_mb">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-right ">
                        <img src="{{ asset('frontend/assets/images/server/ecsd.webp')}}" alt="products & services">

                        <p class="translation" key="ecsd content">{{trans('frontend.ecsd content')}}</p>
                        <p class="translation" key="ecsd content1">{{trans('frontend.ecsd content1')}}</p>
                        <p class="translation" key="ecsd content2">{{trans('frontend.ecsd content2')}}</p>
                        <p class="translation" key="ecsd content3">{{trans('frontend.ecsd content3')}}</p>
                        <p class="translation" key="ecsd content4">{{trans('frontend.ecsd content4')}}</p>
                        <p class="translation" key="ecsd content5">{{trans('frontend.ecsd content5')}}</p>
                        <p class="translation" key="ecsd content6">{{trans('frontend.ecsd content6')}}</p>
                        <p class="translation" key="ecsd content7">{{trans('frontend.ecsd content7')}}</p>
                        <p class="translation" key="ecsd content8">{{trans('frontend.ecsd content8')}}</p>
                        <p class="translation" key="ecsd content9">{{trans('frontend.ecsd content9')}}</p>
                        <p class="translation" key="ecsd content10">{{trans('frontend.ecsd content10')}}</p>
                        <p class="translation" key="ecsd content11">{{trans('frontend.ecsd content11')}}</p>
                        <div class="more">
                            <label class="btn rounded">
                                <span class="text-green">
                                    <a href="{{ route('frontend.case_studies') }}?services=enterprise-custom-software-development" class="translation font_weight_500" key="viewcasestudy">{{trans('frontend.viewcasestudy')}}
                                    </a>+
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="testing-serve" id="mobile-apps">
    <div class="container">
        <div class="MB">
            <h2 class="font_weight_700">05</h2>
            <h3 class=" font_weight_700 title_position" id="testingServices"><a href="{{ route('frontend.services_testing') }}" class="font_weight_700" key="Software Testing">{{trans('frontend.Software Testing')}}</a></h3>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="content-left ">
                        <img src="{{ asset('frontend/assets/images/server/testing_server.webp')}}" alt="products & services">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="content-right ">
                        <p class="translation" key="st content">{{trans('frontend.st content')}}</p>
                        <p class="translation" key="st content1">{{trans('frontend.st content1')}}</p>
                        <p class="translation" key="st content2">{{trans('frontend.st content2')}}</p>
                        <p class="font_weight_700" key="st content3">{{trans('frontend.st content3')}}</p>
                        <p class="translation" key="st content4">{{trans('frontend.st content4')}}</p>
                        <p class="translation" key="st content5">{{trans('frontend.st content5')}}</p>

                        <div class="more">
                            <label class="btn rounded">
                                <span class="text-green">
                                    <a href="{{ route('frontend.case_studies') }}?services=independent-testing-services" class="translation font_weight_500" key="viewcasestudy">{{trans('frontend.viewcasestudy')}}
                                    </a>+
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content_mb">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content-right ">
                        <img src="{{ asset('frontend/assets/images/server/ecsd.webp')}}" alt="products & services">
                        <p class="translation" key="st content">{{trans('frontend.st content')}}</p>
                        <p class="translation" key="st content1">{{trans('frontend.st content1')}}</p>
                        <p class="translation" key="st content2">{{trans('frontend.st content2')}}</p>
                        <p class="translation" key="st content3">{{trans('frontend.st content3')}}</p>
                        <p class="translation" key="st content4">{{trans('frontend.st content4')}}</p>
                        <p class="translation" key="st content5">{{trans('frontend.st content5')}}</p>
                        <div class="more">
                            <label class="btn rounded">
                                <span class="text-green">
                                    <a href="{{ route('frontend.case_studies') }}?services=independent-testing-services" class="translation font_weight_500" key="viewcasestudy">{{trans('frontend.viewcasestudy')}}
                                    </a>+
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="online-pj">
    <section class="e-learning" id="services_clever">
        <div class="container">
            <div class="MB">
                <h2 class="font_weight_700">06</h2>
                <h3 class="translation title_position font_weight_700" key="Clever">{{trans('frontend.serviceclever')}}</h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-12 order_services--bot">
                        <div class="content-left ">
                            <h6 class="font_weight_700" key="CleverRealt1">
                            {{trans('frontend.CleverRealt1')}}
                            </h6>
                            <h5 class="translation" key="CleverReali11">{{trans('frontend.CleverReali11')}}</h5>
                            <h5 class="translation" key="CleverReali12">{{trans('frontend.CleverReali12')}} </h5>
                            <h5 class="translation" key="CleverReali13">{{trans('frontend.CleverReali13')}} </h5>

                            <h6 class="font_weight_700" key="CleverRealt2">
                            </h6>
                            <h5 class="translation" key="CleverReali21">{{trans('frontend.CleverReali21')}} </h5>
                            <h5 class="translation" key="CleverReali22">{{trans('frontend.CleverReali22')}} </h5>
                            <h5 class="translation" key="CleverReali23">{{trans('frontend.CleverReali23')}} </h5>
                            <h5 class="translation" key="CleverReali24">{{trans('frontend.CleverReali24')}} </h5>
                            <h6 class="font_weight_700" key="CleverRealt3">
                            {{trans('frontend.CleverRealt3')}}
                            </h6>
                            <h5 class="translation" key="CleverReali31">{{trans('frontend.CleverReali31')}} </h5>
                            <h5 class="translation" key="CleverReali32">{{trans('frontend.CleverReali32')}} </h5>
                            <h6 class="font_weight_700" key="CleverRealt4">
                            {{trans('frontend.CleverRealt4')}}
                            </h6>
                            <h5 class="translation" key="CleverReali41">{{trans('frontend.CleverReali41')}} </h5>
                            <h6 class="font_weight_700" key="CleverRealt5">
                            {{trans('frontend.CleverRealt5')}}
                            </h6>
                            <h5 class="translation" key="CleverReali51">{{trans('frontend.CleverReali51')}}  </h5>
                            <h5 class="translation" key="CleverReali52">{{trans('frontend.CleverReali52')}} </h5>
                            <h5 class="translation" key="CleverReali53">{{trans('frontend.CleverReali53')}} </h5>
                            <h6 class="font_weight_700" key="CleverRealt6">
                            {{trans('frontend.CleverRealt6')}}
                            </h6>
                            <h5 class="translation" key="CleverReali61">{{trans('frontend.CleverReali61')}} </h5>
                            <h5 class="translation" key="CleverReali62">{{trans('frontend.CleverReali62')}} </h5>
                            <h5 class="translation" key="CleverReali63">{{trans('frontend.CleverReali63')}} </h5>
                            <h5 class="translation" key="CleverReali64">{{trans('frontend.CleverReali64')}} </h5>
                            <h5 class="translation" key="CleverReali65">{{trans('frontend.CleverReali65')}} </h5>
                            <h5 class="translation" key="CleverReali66">{{trans('frontend.CleverReali66')}} </h5>
                            <h5 class="translation" key="CleverReali67">{{trans('frontend.CleverReali67')}} </h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 order_services--top">
                        <div class="content-right ">
                            <img src="{{ asset('frontend/assets/images/server/e-learning.webp')}}" alt="products & services">
                        </div>

                    </div>
                </div>
            </div>
            <div class="content_mb">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content-left ">
                            <img src="{{ asset('frontend/assets/images/server/e-learning.webp')}}" alt="products & services">
                            <h6 class="font_weight_700" key="CleverRealt1">
                            </h6>
                            <h5 class="translation" key="CleverReali11">{{trans('frontend.CleverReali11')}} </h5>
                            <h5 class="translation" key="CleverReali12">{{trans('frontend.CleverReali12')}} </h5>
                            <h5 class="translation" key="CleverReali13">{{trans('frontend.CleverReali13')}} </h5>

                            <h6 class="font_weight_700" key="CleverRealt2">
                            {{trans('frontend.CleverRealt2')}}
                            </h6>
                            <h5 class="translation" key="CleverReali21">{{trans('frontend.CleverReali21')}}  </h5>
                            <h5 class="translation" key="CleverReali22">{{trans('frontend.CleverReali22')}} </h5>
                            <h5 class="translation" key="CleverReali23">{{trans('frontend.CleverReali23')}} </h5>
                            <h5 class="translation" key="CleverReali24">{{trans('frontend.CleverReali24')}} </h5>

                            <h6 class="font_weight_700" key="CleverRealt3">
                            {{trans('frontend.CleverRealt3')}}
                            </h6>
                            <h5 class="translation" key="CleverReali31">{{trans('frontend.CleverReali31')}}</h5>
                            <h5 class="translation" key="CleverReali32">{{trans('frontend.CleverReali32')}}</h5>

                            <h6 class="font_weight_700" key="CleverRealt4">
                            {{trans('frontend.CleverRealt4')}}
                            </h6>
                            <h5 class="translation" key="CleverReali41">{{trans('frontend.CleverReali41')}} </h5>

                            <h6 class="font_weight_700" key="CleverRealt5">
                            {{trans('frontend.CleverRealt5')}}
                            </h6>
                            <h5 class="translation" key="CleverReali51"> {{trans('frontend.CleverReali51')}} </h5>
                            <h5 class="translation" key="CleverReali52"> {{trans('frontend.CleverReali52')}}  </h5>
                            <h5 class="translation" key="CleverReali53">{{trans('frontend.CleverReali53')}} </h5>


                            <h6 class="font_weight_700" key="CleverRealt6">
                            {{trans('frontend.CleverRealt6')}}
                            </h6>
                            <h5 class="translation" key="CleverReali61"> {{trans('frontend.CleverRealt61')}} </h5>
                            <h5 class="translation" key="CleverReali62"> {{trans('frontend.CleverRealt62')}}</h5>
                            <h5 class="translation" key="CleverReali63"> {{trans('frontend.CleverRealt63')}}</h5>
                            <h5 class="translation" key="CleverReali64"> {{trans('frontend.CleverRealt64')}}</h5>
                            <h5 class="translation" key="CleverReali65"> {{trans('frontend.CleverRealt65')}}</h5>
                            <h5 class="translation" key="CleverReali66"> {{trans('frontend.CleverRealt66')}}</h5>
                            <h5 class="translation" key="CleverReali67"> {{trans('frontend.CleverRealt67')}}</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="e-office" id="services_foldio">
        <div class="container">
            <div class="MB">
                <h2 class="font_weight_700">07</h2>
                <h3 class="font_weight_700 title_position font_weight_700">{{trans('frontend.serviceFoldio')}}</h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="content-left ">
                            <img src="{{ asset('frontend/assets/images/server/e-office.webp')}}" alt="products & services">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="content-right ">
                            <h6 class="font_weight_700" key="clevert1">
                            {{trans('frontend.clevert1')}}
                            </h6>
                            <h5 class="translation" key="cleverti1">
                            {{trans('frontend.cleverti1')}}
                            </h5>
                            <h6 class="font_weight_700" key="clevert2">
                            {{trans('frontend.clevert2')}}
                            </h6>
                            <h5 class="translation" key="cleverti21">
                            {{trans('frontend.cleverti21')}}
                            </h5>
                            <h5 class="translation" key="cleverti22">
                            {{trans('frontend.cleverti22')}}
                            </h5>
                            <h5 class="translation" key="cleverti23">
                            {{trans('frontend.cleverti23')}}
                            </h5>
                            <h5 class="translation" key="cleverti24">
                            {{trans('frontend.cleverti24')}}
                            </h5>
                            <h5 class="translation" key="cleverti25">
                            {{trans('frontend.cleverti25')}}
                            </h5>
                            <h5 class="translation" key="cleverti26">
                            {{trans('frontend.cleverti26')}}
                            </h5>
                            <!-- <img style="height: inherit; margin-top:20px;" src="{{ asset('frontend/assets/images/service-detail/clever1.webp')}}" alt="a"> -->
                            <h6 class="font_weight_700" key="clevert3">
                            {{trans('frontend.clevert3')}}

                            </h6>
                            <h5 class="translation" key="cleverti3">
                            {{trans('frontend.cleverti3')}}
                            </h5>
                            <h6 class="font_weight_700" key="clevert4">
                            {{trans('frontend.clevert4')}}
                            </h6>
                            <h5 class="translation" key="cleverti4">
                            {{trans('frontend.cleverti4')}}
                            </h5>
                            <h6 class="font_weight_700" key="clevert5">
                            {{trans('frontend.clevert5')}}
                            </h6>
                            <h5 class="translation" key="cleverti5">
                            {{trans('frontend.cleverti5')}}
                            </h5>
                            <!-- <img style="height: inherit; margin-top:20px;" src="{{ asset('frontend/assets/images/service-detail/clever2.webp')}}" alt="a"> -->

                            <h6 class="font_weight_700" key="clevert6">
                            {{trans('frontend.clevert6')}}
                            </h6>
                            <h5 class="translation" key="cleverti6">
                            {{trans('frontend.cleverti6')}}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_mb">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content-right ">
                            <img src="{{ asset('frontend/assets/images/server/e-office.webp')}}" alt="products & services">
                            <h6 class="font_weight_700" key="clevert1"> </h6>
                            <h5 class="translation" key="cleverti1">
                            {{trans('frontend.cleverti1')}}
                            </h5>
                            <h6 class="translation" key="clevert2">
                            {{trans('frontend.cleverti2')}}
                            </h6>
                            <h5 class="translation" key="cleverti21">
                            {{trans('frontend.cleverti21')}}
                            </h5>
                            <h5 class="translation" key="cleverti22">
                            {{trans('frontend.cleverti22')}}
                            </h5>
                            <h5 class="translation" key="cleverti23">
                            {{trans('frontend.cleverti23')}}
                            </h5>
                            <h5 class="translation" key="cleverti24">
                            {{trans('frontend.cleverti24')}}
                            </h5>
                            <h5 class="translation" key="cleverti25">
                            {{trans('frontend.cleverti25')}}
                            </h5>
                            <h5 class="translation" key="cleverti26">
                            {{trans('frontend.cleverti26')}}
                            </h5>
                            <!-- <img style="height: inherit; margin-top:20px;" src="{{ asset('frontend/assets/images/service-detail/clever1.webp')}}" alt="a"> -->
                            <h6 class="font_weight_700" key="clevert3">
                            {{trans('frontend.clevert3')}}

                            </h6>
                            <h5 class="translation" key="cleverti3">
                            {{trans('frontend.cleverti3')}}
                            </h5>
                            <h6 class="font_weight_700" key="clevert4">
                            {{trans('frontend.clevert4')}}
                            </h6>
                            <h5 class="translation" key="cleverti4">
                            {{trans('frontend.clevert4')}}
                            </h5>
                            <h6 class="font_weight_700" key="clevert5">
                            {{trans('frontend.clevert5')}}
                            </h6>
                            <h5 class="translation" key="cleverti5">
                            {{trans('frontend.clevert5')}}
                            </h5>
                            <!-- <img style="height: inherit; margin-top:20px;" src="{{ asset('frontend/assets/images/service-detail/clever2.webp')}}" alt="a"> -->

                            <h6 class="font_weight_700" key="clevert6">

                            </h6>
                            <h5 class="translation" key="cleverti6">
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('frontend.includes.partner')
@include('frontend.includes.partner-mobile')
@include('frontend.includes.banner-bottom')

@endsection
