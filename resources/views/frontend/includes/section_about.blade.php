@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/section_about.css')}}">
@endpush
<section class="section_block section_about">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <p class="what_we_are block_spacing_md text_color_default" >{{trans('frontend.whoweare')}}</p>
                <h2 class="page_title text-center font_weight_700 text-dark">{{trans('frontend.lead')}}</h2>
            </div>
        </div>
        <div class="row about_list_pc">
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="about-list">
                    <h3 class="timer count-title count-number font_weight_700" data-to="15" data-speed="1500">0</h3>
                    <!-- <h3>22+</h3> -->
                    <p >{{trans('frontend.yearsofex')}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="about-list">
                    <h3 class="timer count-title count-number font_weight_700" data-to="250" data-speed="1500">0</h3>
                    <!-- <h3>500+</h3> -->
                    <p >{{trans('frontend.professional')}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="about-list">
                    <h3 class="timer count-title count-number font_weight_700" data-to="200" data-speed="1500">0</h3>
                    <!-- <h3>750+</h3> -->
                    <p >{{trans('frontend.happyclient')}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="about-list">
                    <h3 class="timer count-title count-number font_weight_700" data-to="500" data-speed="1500">0</h3>
                    <!-- <h3>2205+</h3> -->
                    <p >{{trans('frontend.projectsDelivered')}}</p>
                </div>
            </div>
        </div>
        <div class="row laptop_img_pc">
            <div class="col-lg-6 col-sm-6 offset-lg-3 images_know_about">
                <img class="img_laptop img-fluid" src="{{ asset('frontend/assets/images/section_2/laptop.webp')}}" alt="image" />
            </div>
            <div class="col-lg-3 col-sm-6 btn_know_about">
                <label class="btn-special btn_rounded--circle">
                    <span class="text-green"><a href="{{ route('frontend.about_us') }}" >{{trans('frontend.knowaboutus')}}</a>+</span>
                </label>

            </div>
        </div>
    </div>
</section>