@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/section_technologies.css')}}">
@endpush
<section class="section_block option_technologyHome">
    <div class="container">
        <div class="row block_spacing">
            <div class="col-12">
                <h2 class="work-title page_title text-center font_weight_700 titleTechnology" >
                    {{trans('frontend.TechnologiesWeServe')}}
                </h2>
                <p class="work-des work_des_pc">
                    {{trans('frontend.With24years')}}
                </p>
            </div>
        </div>
        <div class="row block_spacing">
            @foreach($menuTechnologies as $key => $menu)
            <a href="{{route('frontend.technology', $menu->id)}}" class="col-xl-3 col-lg-6 col-6 margin_imageHome tech_homepage_transition">
                <div class="content">
                    <div class="work-box" id="image_homepage">
                        <div class="work-box-img">
                            <img class="image_technology" src="{{ asset($menu->image) }}" alt="{{$menu->name}}">
                        </div>
                    </div>
                    <p class="title_image technologies-parent-{{$menu->id}}" id="title_image">{{trans('frontend.' . $menu->name)}}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="work-more" id="technology_homepage">
                    <label class="btn-special btn_rounded--circle">
                        <span class="text-green"><a href="{{ route('frontend.technology') }}">{{trans('frontend.MoreDetails')}}</a>+</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</section>