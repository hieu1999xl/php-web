@php
$display = $bannerBottom['display'] ?? $globalBannerBottom['display'];
$class = $bannerBottom['class'] ?? $globalBannerBottom['class'];
$classTitle = $bannerBottom['classTitle'] ?? $globalBannerBottom['classTitle'];
$title = $bannerBottom['title'] ?? $globalBannerBottom['title'];
$description = $bannerBottom['description'] ?? $globalBannerBottom['description'];
$button = $bannerBottom['button'] ?? $globalBannerBottom['button'];
$image = $bannerBottom['image'] ?? $globalBannerBottom['image'];
$imageMobile = $bannerBottom['imageMobile'] ?? $globalBannerBottom['imageMobile'];
$classImage = $bannerBottom['classImage'] ?? $globalBannerBottom['classImage'];
$display_got = $bannerBottom['display_got'] ?? $globalBannerBottom['display_got'];

@endphp
<link rel="stylesheet" href="{{ asset('frontend/assets/css/section_we_serve_you.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/banner_bottom.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/banner_launch_your_product.css')}}">
@if($display)
<section class="{{$class}}">
    <picture>
        <source srcset="{{ $image}}" media="(min-width: 480px)">
        <img class="{{$classImage}}" src="{{ $imageMobile}}" alt="health care">
    </picture>
    <div class="container section_banner">
        <div class="row section_banner--row">
            <div class="col-12">
                <h2 class="{{$classTitle}}">{{$title}}</h2>
            </div>
            <div class="col-12">
                <p class="block_spacing text-white text-center spacing_text">{{$description}}</p>
            </div>
            <div class="col-12 study-more text-center">
                <label class="btn-special btn_rounded--circle">
                    <span class="text-white"><a href="{{ route('frontend.contact_us') }}">{{$button}}</a>+</span>
                </label>
            </div>
        </div>
    </div>
</section>
@endif

@if($display_got)
<section class="{{$class}}">
    <picture>
        <source srcset="{{$image}}" media="(min-width: 480px)">
        <img class="{{$classImage}}" src="{{$imageMobile}}" alt="{{$title}}">
    </picture>
    <div class="container banner_content">
        <div class="row">
            <div class="col-12">
                <p class="block_spacing_md text-center section_page--subtitle subtitle_color">{{trans('frontend.weserveyou')}}</p>
                <h3 class="{{$classTitle}}">{{$title}}</h3>
            </div>
            <div class="col-12">
                <p class="block_spacing ">{{$description}}</p>
            </div>
            <div class="col-12 study-more text-center">
                <label class="btn-special btn_rounded--circle">
                    <span class="text-white"><a href="{{ route('frontend.contact_us') }}" >{{$button}}</a>+</span>
                </label>
            </div>
        </div>
    </div>
</section>
@endif