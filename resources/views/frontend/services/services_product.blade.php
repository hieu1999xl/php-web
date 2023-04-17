@extends('frontend.layouts.app')
@section('title') {{app_name()}} @endsection

@section('content')
@include('frontend.includes.banner')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 about-top">
                <h3 class="translation" key="howcanhelp">
                    How Can We Help You?
                </h3>
            </div>
        </div>
        <div class="row about-bottom1">
            <p class="col-md-12 col-sm-12 col-lg-12 translation " key="help1">

            </p>
            <p class="col-md-12 col-sm-12 col-lg-12 translation" key="help2">

            </p>
        </div>
    </div>
</section>

<!-- mobile procsess -->
<!-- <section id="mobile-process">
    <div class="container">
        <div class="procress-title">
            <h3>
                Basic steps of custom software development in TSO?
            </h3>
        </div>
        <div class="process-desc">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        ※ Requirement <br>
                        ※ Analysis and Suggestion<br>
                        ※ Design and Customer's Review <br>
                        ※ Development <br>
                        ※ Testing <br>
                        ※ Deployment <br>
                        ※ Maintenance and Support <br>
                    </p>
                </div>
            </div>
        </div>
        <div class="img_process2">
            <img class="process-img" src="{{ asset('frontend/assets/images/service-detail/process2.svg')}}" alt="">
        </div>
    </div>
</section> -->

<section id="mobile-services">
    <div class="container">
        <h3 class="why-left translation" key="whychooseenter" >
            Why choose Custom Software Development in TSO? </h3>
        <div class="services-lists">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/safeguard.png')}}" alt="">
                        <h3 class="list-box-title translation" key="Safeguard your business interest"></h3>

                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/advancedtech.png')}}" alt="">
                        <h3 class="list-box-title translation"  key="Expertise in advanced technologies"></h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/focus.png')}}" alt="">
                        <h3 class="list-box-title translation"  key="Focus on core business activities"></h3>

                    </div>
                </div>
            </div>
            <div class="row-space row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/organizational.png')}}" alt="">
                        <h3 class="list-box-title translation"  key="Ensure smooth organizational changes"></h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/mitigaterisk.png')}}" alt="">
                        <h3 class="list-box-title translation"  key="Mitigate risks and vulnerabilities"></h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/businessgoals.png')}}" alt="">
                        <h3 class="list-box-title translation"  key="Attain expected business goals"></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="case-study">
    <div class="container">
        <div class="row-top row">
            <div class="col-md-6 col-sm-12 col-xs-12"><img src="{{ asset('frontend/assets/images/image2.png')}}" alt=""></div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="case-study-1">
                    <h2>Inventory Management Apps</h2>
                    <ul>
                        <li>
                            Logistics
                        </li>
                        <li>
                            Mobile Development
                        </li>
                    </ul>
                    <p>This mobile app has significantly altered the way of keeping track of stock list.</p>
                </div>
            </div>
        </div>
        <div class="row-bottom row">
            <div id="img_case_stydy_mobile" class="col-md-6 col-sm-12 col-xs-12">
                <img src="{{ asset('frontend/assets/images/image1.png')}}" alt="">
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="case-study-2">
                    <h2>Electronic Health Record</h2>
                    <ul>
                        <li>
                            Healthcare
                        </li>
                        <li>
                            Software Development
                        </li>
                    </ul>
                    <p>Inventory Management is mobile support tool to manage warehouse professionally and effectively.
                        This mobile app has significantly altered the way of keeping track of stock list.</p>
                </div>
            </div>
            <div id="img_case_stydy_pc" class="col-md-6 col-sm-12 col-xs-12">
                <img src="{{ asset('frontend/assets/images/image1.png')}}" alt="">
            </div>
        </div>
    </div>
</section>
@include('frontend.includes.partner')
@include('frontend.includes.partner-mobile')

@include('frontend.includes.banner-bottom')

@endsection
