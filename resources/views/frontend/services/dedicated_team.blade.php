@extends('frontend.layouts.app')
@section('title') {{app_name()}} @endsection

@section('content')
@include('frontend.includes.banner')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 about-top">
                <h2 class="translation">
                    Model Of Dedicated Team In TSO
                </h2>
            </div>
        </div>
        <div class="row about-bottom1">
            <p class="col-md-12 col-sm-12 col-lg-12">
                The resources of TVO are young and passionate with 15 % advanced workforce and possessing more than 5 years of experiences. In TVO, we create comfortable working environment as well as condition for staff to be assembled for and dedicated entirely to the client’s projects.
                We have commitment to fulfill your needs with more than 10-year experience in outsourcing field in general.
            </p>

        </div>
    </div>
</section>
<!-- mobile services -->

<section id="mobile-services">
    <div class="container">
        <h2 class="why-left">
            Why us? </h2>
        <div class="services-lists">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/dedication.svg')}}" alt="">
                        <h3 class="list-box-title translation" key="Dedication">Dedication</h3>
                        <p class="translation" key="Pay passion">Pay passion and positive attitude toward work</p>

                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/productivity.svg')}}" alt="">
                        <h3 class="list-box-title translation" key="Productivity">Productivity</h3>
                        <p class="translation" key="Bring the best">Bring the best effective and the most effective products as well as services to the customers</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/reliability.svg')}}" alt="">
                        <h3 class="list-box-title translation" key="Reliability">Reliability</h3>
                        <p class="translation" key="Make products">Make products, systems or services operate its intended function with the least failure</p>

                    </div>
                </div>
            </div>
            <div class="row-space row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/teamwork.svg')}}" alt="">
                        <h3 class="list-box-title translation" key="Teamwork">Teamwork</h3>
                        <p class="translation" key="Cooperate effort"> Cooperate effort of each enthusiatic and experienced members to create a distinguished output</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/independence.svg')}}" alt="">
                        <h3 class="list-box-title translation" key="Independence">Independence</h3>
                        <p class="translation" key="Be independent">Be independent as well as work in an effective team smoothly</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/creative.svg')}}" alt="">
                        <h3 class="list-box-title translation" key="Creative">Creative</h3>
                        <p class="translation" key="Work hard"> Work hard and work smart </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id='case-study'>
    <div class="container">
        <div class="row-top row">
            <div class="col-md-6 col-sm-12 col-xs-12"><img src="{{ asset('frontend/assets/images/image2.svg')}}" alt=""></div>
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
                <img src="{{ asset('frontend/assets/images/image1.svg')}}" alt="">
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
                <img src="{{ asset('frontend/assets/images/image1.svg')}}" alt="">
            </div>
        </div>
    </div>
</section>
@include('frontend.includes.partner')
@include('frontend.includes.partner-mobile')

@include('frontend.includes.banner-bottom')
@endsection
