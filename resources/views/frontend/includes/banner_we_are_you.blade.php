@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/section_we_serve_you.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/banner_launch_your_product.css')}}">
@endpush
<section class=" section_we_serve_you">
    <picture>
    <source srcset="{{ asset('frontend/assets/images/section_5/laptop_serve.webp')}}"
        media="(min-width: 480px)">
    <img class="section_we_serve_you_img" src="{{ asset('frontend/assets/images/section_5/laptop_serve_mobile.webp')}}" alt="health care" />
    </picture>
    <div class="container section_we_serve_you_container">
        <div class="row">
            <div class="col-12">
                <p class="block_spacing_md text-center title_we_serve_you section_page--subtitle" >{{trans('frontend.weserveyou')}}</p>
                <h2 class="desc page_title text-center font_weight_700 title_banner" >
                    {{trans('frontend.doyouwant')}}
                </h2>
                <p class="info ">
                    {{trans('frontend.withthecommon')}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 serve-more">
                <label class="btn-special btn_rounded--circle btn_special--gradient">
                    <span class="text-white"><a href="{{ route('frontend.contact_us') }}">{{trans('frontend.contacus')}}</a>+</span>
                </label>
            </div>
        </div>
    </div>
</section>