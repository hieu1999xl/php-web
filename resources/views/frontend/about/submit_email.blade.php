@extends('frontend.layouts.app')
@section('title') {{app_name()}} @endsection

@section('content')
<section id="contact_us">
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h3 class="contact-title text-center">Thank you!</h3>
                <p class="contact-decs">Thank you for your interest in Tinhvan Software JSC. (TSO). Please provide the following information to help us serve you better. This information will enable us to route your request to the appropriate person. The personal data provided is used by TVO for inquiry response purposes only.</p>

                <form action="submit" style="width=100%" id="">
                    <h6 class="contact-name" > Your  full name (*)</h6>
                    <input type="text" placeholder="Name">
                    <h6 class="contact-name" >Your email address (*)</h6>
                    <input type="text" placeholder="Email">
                    <h6 class="contact-name" >Organization</h6>
                    <input type="text" placeholder="Email">
                    <h6 class="contact-name " >Your message (*)</h6>
                    <!-- <input type="text" placeholder="Write something here..."> -->
                    <textarea name="message" style="hight:200px" row="30">Write something here...</textarea>
                </form>
                <div class="contact-btn">
                    <!-- <a class="learn">Learn more</a> -->
                    <a href="#" id="btn" class="link-inter"><label key="startTheJourney">SUBMIT</label><span ></span></a>

                </div>
            </div>
        </div>
    </div>
</section>
<section id="our-read-more" class="section section_new_room big_mid">
    <div class="container our-read-more">
        <div class="row">
            <div class="col-12">
                <!-- <p class="title">news room</p> -->
                <h3 class="desc">Read more on our Blog </h3>
                <p id="talent">Check out the knowledge base collected and distilled by experienced professionals.</p>
            </div>
        </div>
        @php
            $posts= Modules\Article\Entities\Post::where('type', '=', 'News')->limit(3)->get();
        @endphp
        <div class="row list">
            @foreach($posts as $item)
            <div class="col-4">
                <div class="room-box">
                    <div class="room-box-img">
                        <a href="#">
                            <img src="{{ $item->featured_image }}" loading="lazy" alt="big tech" />
                        </a>
                    </div>
                    <a href="#">
                        <p class="room-box-title">
                            {{$item->name}}
                        </p>
                    </a>
                </div>
            </div>
            @endforeach
{{--            <div class="col-4">--}}
{{--                <div class="room-box">--}}
{{--                    <div class="room-box-img">--}}
{{--                        <a href="#">--}}
{{--                            <img src="{{ asset('frontend/assets/images/section_6/hand.png')}}" loading="lazy" alt="social" />--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <a href="#">--}}
{{--                        <p class="room-box-title">--}}
{{--                            At social media hearing, lawmakers circle algorithm-focused--}}
{{--                            Section 230 reform--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-4">--}}
{{--                <div class="room-box">--}}
{{--                    <div class="room-box-img">--}}
{{--                        <a href="#">--}}
{{--                            <img src="{{ asset('frontend/assets/images/section_6/laptop.png')}}" loading="lazy" alt="laptop" />--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <a href="#">--}}
{{--                        <p class="room-box-title">--}}
{{--                            Announcing the Agenda for TC Sessions: Mobility 2021--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</section>
@endsection
