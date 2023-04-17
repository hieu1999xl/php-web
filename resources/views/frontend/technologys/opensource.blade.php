@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
<div class="menu_on_hover2" id="menu_on_hover2">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-5" id="services_active">
                    <ul>
                        <li>
                            <img src="{{ asset('frontend/assets/images/tech_screen/rect.png')}}" alt="point">
                            <a href="#">Mobile apps Development</a>
                        </li>
                        <li>
                            <img src="{{ asset('frontend/assets/images/tech_screen/rect.png')}}" alt="point">
                            <a href="#">Product Consultantcy & Development</a>
                        </li>
                        <li>
                            <img src="{{ asset('frontend/assets/images/tech_screen/rect.png')}}" alt="point">
                            <a href="dedicated_team.html">Dedicated Team</a>
                        </li>
                        <li>
                            <img src="{{ asset('frontend/assets/images/tech_screen/rect.png')}}" alt="point">
                            <a href="maintenance.html">Maintenance /Operation/Managed Services</a>
                        </li>
                    </ul>
                </div>
                <div class="col-5">
                    <ul>
                        <li>
                            <img src="{{ asset('frontend/assets/images/tech_screen/rect.png')}}" alt="point">
                            <a href="legacy_system.html">Legacy System Migration</a>
                        </li>
                        <li>
                            <img src="{{ asset('frontend/assets/images/tech_screen/rect.png')}}" alt="point">
                            <a href="enterprise.html">Enterprise Custom Softeware Development</a>
                        </li>
                        <li>
                            <img src="{{ asset('frontend/assets/images/tech_screen/rect.png')}}" alt="point">
                            <a href="#">Testing Services</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.includes.banner_technology')
    <section>
    <div class="container top_content">
        <div class="row">
            <div class="col-md-5 col-sm-12 top">
                <h1>We developement with
                    +200 projects used
                    Java Script language.</h1>

            </div>
            <div class="col-md-7 col-sm-12 top">
                <p>TSO mobility solution enables enterprises to have their current web application run on smartphone
                    platforms through private app-store operation. With only one smartphone device in...</p>
                <p>Otherwise, mobile applications and games can be a great bridge between providers and their
                    customers because of the velocity, simplicity and effectiveness.</p>
            </div>
        </div>
        <div class="row how_we_work_pc">
            <div class="col-5 mid">
                <h1>How we work?</h1>
                <p>Mobile application development is a term used to denote the act or process by which application
                    software is developed for handheld devices, such as personal digital assistants, enterprise
                    digital assistants or mobile phones. </p>
                <p>Mobile application development is a term used to denote the act or process by which application
                    software is developed for handheld devices, such as personal digital assistants, enterprise
                    digital assistants or mobile phones. </p>
            </div>
            <div class="col-7 mid">
                <img src="{{ asset('frontend/assets/images/tech_screen/demid.png')}}" alt="">
            </div>
        </div>
        <div class="row how_we_work_mb">
            <div class="col-sm-12">
                <h1>How we work?</h1>
                <img src="{{ asset('frontend/assets/images/tech_screen/demid.png')}}" alt="">
            </div>
            <div class="col-sm-12">
                <p>Mobile application development is a term used to denote the act or process by which application
                    software is developed for handheld devices, such as personal digital assistants, enterprise
                    digital assistants or mobile phones. </p>
                <p>Mobile application development is a term used to denote the act or process by which application
                    software is developed for handheld devices, such as personal digital assistants, enterprise
                    digital assistants or mobile phones. </p>
            </div>
        </div>
        <div class="row list_app_pc">
            <div class="col-5  mid">
                <h1>What our strength points</h1>
                <p>With a big pool of human resources, who have experienced working on a variety of platforms and
                    technologies, we have complete control of all comprehensive solutions to customers’ issues.</p>
                <div class="more">
                    <label class="btn rounded">
                        <span class="text-green">more detail
                            +
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-7 bot">
                <ul>
                    <li>
                        <img src="{{ asset('frontend/assets/images/tech_screen/iconanroid.svg')}}" alt="">
                        <h1>Android</h1>
                        <p>Develop top-quality iOS apps with cutting edge technology.</p>
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/images/tech_screen/apple.svg')}}" alt="">
                        <h1>IOS</h1>
                        <p>Develop top-quality iOS apps with cutting edge technology.</p>
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/images/tech_screen/iconanroid.svg')}}" alt="">
                        <h1>Android</h1>
                        <p>Develop top-quality iOS apps with cutting edge technology.</p>
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/images/tech_screen/apple.svg')}}" alt="">
                        <h1>IOS</h1>
                        <p>Develop top-quality iOS apps with cutting edge technology.</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row list_app_mb">
            <div class="col-12">
                <h1>What our strength points</h1>
                <p>With a big pool of human resources, who have experienced working on a variety of platforms and
                    technologies, we have complete control of all comprehensive solutions to customers’ issues.</p>
            </div>
            <div class="col-12">
                <ul>
                    <li>
                        <img src="{{ asset('frontend/assets/images/tech_screen/iconanroid.svg')}}" alt="">
                        <h1>Android</h1>
                        <p>Develop top-quality iOS apps with cutting edge technology.</p>
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/images/tech_screen/apple.svg')}}" alt="">
                        <h1>IOS</h1>
                        <p>Develop top-quality iOS apps with cutting edge technology.</p>
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/images/tech_screen/iconanroid.svg')}}" alt="">
                        <h1>Android</h1>
                        <p>Develop top-quality iOS apps with cutting edge technology.</p>
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/images/tech_screen/apple.svg')}}" alt="">
                        <h1>IOS</h1>
                        <p>Develop top-quality iOS apps with cutting edge technology.</p>
                    </li>
                </ul>
            </div>
            <div class="col-12">
                <div class="more">
                    <label class="btn rounded">
                        <span class="text-green">more detail
                            +
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="big_mid tech_mid_mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('frontend/assets/images/image2.png')}}" alt="">
            </div>
            <div class="col-12">
                <h1 class="inven">Inventory Managerment Apps </h1>
                <div class="mini">
                    <a href="#">Logistics</a>
                    <a href="#">Mobile Development</a>
                </div>
                <p>This mobile app has significantly altered the way of keeping track of stock list.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <img src="{{ asset('frontend/assets/images/image1.png')}}" alt="">
            </div>
            <div class="col-12">
                <h1 class="inven">Electronic Health Record</h1>
                <div class="mini">
                    <a href="#">Healthcare</a>
                    <a href="#">Software Developmen</a>
                </div>
                <p>Inventory Management is mobile support tool to manage warehouse professionally and effectively.
                    This mobile app has significantly altered the way of keeping track of stock list.</p>
            </div>
        </div>
    </div>
</section>
<section class="big_mid">
    <div class="container mid_content">
        <div class="row">
            <div class="col-6">
                <img src="{{ asset('frontend/assets/images/image2.png')}}" alt="">
            </div>
            <div class="col-6">
                <h1 class="inven">Inventory <br> Managerment Apps </h1>
                <div class="mini">
                    <a href="#">Logistics</a>
                    <a href="#">Mobile Development</a>
                </div>
                <p>This mobile app has significantly altered the way of keeping track of stock list.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h1>Electronic Health <br> Record</h1>
                <div class="mini">
                    <a href="#">Healthcare</a>
                    <a href="#">Software Development</a>
                </div>
                <p>Inventory Management is mobile support tool to manage warehouse professionally and effectively.
                    This mobile app has significantly altered the way of keeping track of stock list.</p>
            </div>
            <div class="col-6">
                <img src="{{ asset('frontend/assets/images/image1.png')}}" alt="">
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container js_content">
        <div class="row">
            <div class="col-md-6 mb_top">
                <h1 class="jsmini">Java Script: All your <br> questions answered</h1>
                <p class="jsmini1">Not sure how Java Script technology can deliver value to your business? Check out
                    some of the
                    most common questions asked by our clients.</p>
                <div class="more">
                    <label class="btn rounded">
                        <span class="text-green">contact us
                            +
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-md-6 mb_bot">
                <div class="item">
                    <div class="top">
                        <h1 class="title">What Java Script is?</h1>
                        <img class="btn1" src="{{ asset('frontend/assets/images/tech_screen/plus.svg')}}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="top">
                        <h1 class="title">What Java Script is?</h1>
                        <img class="btn1 active" src="{{ asset('frontend/assets/images/tech_screen/plus.svg')}}" alt="">
                    </div>
                    <p class="para">New limitation of business expanding is created through applied mobile
                        innovations. With just an application on your device, businessmen who are always on the move
                        can stay in touch with mass customers every time, everywhere to make all business decisions
                        in time. Otherwise, mobile applications and games can be a great bridge between providers
                        and their customers because of the velocity, simplicity and effectiveness.</p>
                </div>
                <div class="item">
                    <div class="top">
                        <h1 class="title">What Java Script is?</h1>
                        <img class="btn1" src="{{ asset('frontend/assets/images/tech_screen/plus.svg')}}" alt="">
                    </div>
                </div>
                <div class="more">
                    <label class="btn rounded">
                        <span class="text-green">contact us
                            +
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="big_mid mb_what_they_say">
    <div class="container tech">
        <div class="row">
            <div class="col-12">
                <p>Testimonials</p>
                <h1>What our clients say</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <p>“We understand that bringing true values to our customer is not all about technology, yet
                    suitability and conformity to customer’s requirements is of utmost importance.”</p>
                <div class="info">
                    <img src="{{ asset('frontend/assets/images/tech_screen/ava.png')}}" alt="">
                    <div class="miniinfo">
                        <h1>Gerardo Bonilla</h1>
                        <p>Product Manager at Moonfare</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <p>“We understand that bringing true values to our customer is not all about technology, yet
                    suitability and conformity to customer’s requirements is of utmost importance.”</p>
                <div class="info">
                    <img src="{{ asset('frontend/assets/images/tech_screen/ava.png')}}" alt="">
                    <div class="miniinfo">
                        <h1>Gerardo Bonilla</h1>
                        <p>Product Manager at Moonfare</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <p>“We understand that bringing true values to our customer is not all about technology, yet
                    suitability and conformity to customer’s requirements is of utmost importance.”</p>
                <div class="info">
                    <img src="{{ asset('frontend/assets/images/tech_screen/ava.png')}}" alt="">
                    <div class="miniinfo">
                        <h1>Gerardo Bonilla</h1>
                        <p>Product Manager at Moonfare</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.includes.banner-bottom')
@endsection
