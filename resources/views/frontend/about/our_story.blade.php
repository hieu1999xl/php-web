@extends('frontend.layouts.app')
@section('title') {{app_name()}} @endsection

@section('content')
<section id="our-us-about">
    <div class="container our-us-about">
        <div class="row text-center">
            <div class="col-6 offset-3">
                <h4>Tinhvan Technologies Jsc. has been through about 20 years of growth and development</h4>
                <p>10 Apr 2021</p>
            </div>
        </div>
    </div>
</section>

<!-- <section id="our-us-banner">
    <div class="container" >
        <div class="row">
            <img src="{{ asset('frontend/assets/images/about/our_story_banner.png')}}" alt="">
        </div>
    </div>
</section> -->

<section id="our-us-para1">
    <div class="container our-us-para1">
        <div class="row">
            <div class="col-6 offset-3">
                <h4>Officially founded on the 20th of July.</h4>
                <p>Officially founded on the 20th of July, 1997 as a Network Experimenting Laboratory (Netlab), Tinhvan Technologies Jsc. has been through about 20 years of growth and development. With the passionate and united management team, professional pool of employees, unique corporate culture, stable growth history, Tinhvan has always been recognized as one of the leading names in the IT field.</p>
                <p>With 03 founding members at its early time, Tinhvan Group has now 6 member companies and 2 branches in HCMC, with the total number of more than 500 experienced, creative, skilled and well-trained employees. With the professional and friendly business manner, Tinhvan has always been receiving the high level of recognition and satisfaction from its partners and customers.                </p>
            </div>
        </div>
    </div>
</section>

<section id="our-us-img">
    <div class="container our-us-img">
        <div class="row">
            <div class="col-6 offset-3">
                <img src="{{ asset('frontend/assets/images/about/image_blank.png')}}" alt="">
            </div>
        </div>
    </div>
</section>

<section id="our-us-para2">
    <div class="container our-us-para1">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="para-box">
                    <h4 class="para-box-title">Vision</h4>
                    <p class="para-box-decs">Tinhvan aims to become a Technology Group which develops sustainably on the basis of knowledge power and humanity, reaches global market, enriches shareholders, contributes to communities as well as enhances competency and creativeness of each Tinhvan’s member.</p>
                </div>
                <div class="para-box">
                    <h4 class="para-box-title">Tinhvan Ecosystem</h4>
                    <p class="para-box-decs" >Tinhvan Ecosystem is formed by its member companies, each has been growing steadily and offering more than 30 products and services which build their own brand recognition, market share and customer base of corporations, organizations and millions of individual users and together generate significant revenue streams.</p>
                </div>
                <div class="para-box">
                    <h4 class="para-box-title">Tinhvan’s Corporate Culture</h4>
                    <p >After 20 years of development, Tinhvan is proud to have a unique culture characterized by kindness, humanism, creativity, humor, intellectual and spiritual wealth.</p>
                    <p >Tinhvan Culture is a collection of behavioral manners based on the core principle: “Customer is the centre”</p>
                    <p class="para-box-decs">Tinhvan Culture is circulated and preserved through the intramural magazine named Mytinhvan; the chronicles “20 years of creating and sharing” , as well as many cultural activities held quarterly and annual.</p>
                </div>
                <div class="para-box">
                    <h4 class="para-box-title">Prizes</h4>
                    <p >Tinhvan have been awarded with recognized prizes for its achievements in IT field in Vietnam in many consecutive years from 2002 to 2011 such as Sao Khue, IT Golden Cup, Top 5 ICT, HCMC IT & Communications Award, Recognition by Minister of Ministry of Information and Communications, etc… Tinhvan’s products and services have always been granted with highest prizes from Vietnam Computing Association (VCA), HCMC Computing Association (HCA), and Vietnam Software Association (Vinasa).</p>
                    <p class="para-box-decs">The management team and each Tinhvaner commit to the continuous efforts, intelligence and creation utilization, united strengths to bring customers with satisfaction and outstanding values via perfect products and services, and to become the leading organization in the era of globalization and international trade.</p>
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
