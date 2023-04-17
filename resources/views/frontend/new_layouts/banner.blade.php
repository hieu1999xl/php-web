@php
$id = $banner['id'] ?? $globalBanner['id'];
$class = $banner['class'] ?? $globalBanner['class'];
$classTitle = $banner['classTitle'] ?? $globalBanner['classTitle'];
$classDecription = $banner['classDecription'] ?? $globalBanner['classDecription'];
$description = $banner['description'] ?? $globalBanner['description'];
$title = $banner['title'] ?? $globalBanner['title'];
$display = $banner['display'] ?? $globalBanner['display'];
$displayDecription = $banner['displayDecription'] ?? $globalBanner['displayDecription'];
$displayButton = $banner['displayButton'] ?? $globalBanner['displayButton'];
$classButton = $banner['classButton'] ?? $globalBanner['classButton'];
$button = $banner['button'] ?? $globalBanner['button'];
$image = $banner['image'] ?? $globalBanner['image'];
$altImage = $banner['altImage'] ?? $globalBanner['altImage'];
$imageMobile = $banner['imageMobile'] ?? $globalBanner['imageMobile'];
$buttonCase = $banner['buttonCase'] ?? $globalBanner['buttonCase'];
$displaySearch = $banner['displaySearch'] ?? $globalBanner['displaySearch'];
@endphp

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/banner_top.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/banner.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/talent.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/talent.css')}}">
@if($display)
<section id="{{ $id }}" class="{{ $class }}">
    <picture>
        <source srcset="{{ $image}}" media="(min-width: 480px)">
        <img class="bg_img" src="{{ $imageMobile}}" alt="{{$altImage}}">
    </picture>
    <div class="container ">
        <div class="row">
            <div class="col-12 content_banner">
                @if(Route::is('frontend.news_detail') || Route::is('frontend.case_study_detail'))
                    <h2 class="{{ $classTitle }}">{{ $title }}</h2>
                @else
                    <h1 class="{{ $classTitle }}">{{ $title }}</h1>
                @endif
                @if($displayDecription)
                <p class="{{ $classDecription }}">{{ $description }}</p>
                @endif
                @if($buttonCase)
                <a href="{{ route('frontend.contact_us') }}" id="btn" class="banner_btn btn-round-lg btn-white spacing_button">
                    {{$button}}
                </a>
                @endif
            </div>
        </div>
    </div>
</section>
@endif
@if ($displayButton)
<section class="{{$class}} ">
    <picture>
        <source srcset="{{ $image}}" media="(min-width: 480px)">
        <img class="bg_img" src="{{ $imageMobile}}" alt="{{$altImage}}">
    </picture>
    <div class="container">
        <div class="row">
            <div class="col-12 outsourcing_banner">
                <h1 class="{{$classTitle}}">{{$title}}</h1>
                <div class="col-12 service-ousourcing--col">
                    <p class="{{$classDecription}}">{{$description}}</p>
                </div>
                <a href="{{ route('frontend.contact_us') }}" id="btn" class="banner_btn btn-round-lg btn-white">
                    {{$button}}
                </a>
            </div>
        </div>
    </div>
</section>
@endif

@if($displaySearch)
<section class="section_banner_top">
    <picture>
        <source srcset="{{ $image}}" media="(min-width: 480px)">
        <img class="bg_img" src="{{ $imageMobile}}" alt="">
    </picture>
    <div class="container component_search_talent">
        <div class="row">
            <div class="col-12">
                <form class="form-search" action="{{ route('frontend.search_result') }}" method="GET">
                    <input type="text" id="searchKey" value="" name="querySearchKey" placeholder="{{trans('frontend.searchheader')}}">
                    <select class="btn-round btn-purple padding-search_page"  id="search" name="querySearchSelect">
                        <option value="news">News</option>
                        <option value="jobs">Jobs</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</section>
@endif
@push('after-scripts')
<script>
    var select = document.querySelector(".btn-round");
    var selectOption = select && select.options[select.selectedIndex];
    var lastSelected = localStorage.getItem('select');
    if (lastSelected) {
        select.value = lastSelected;
    }
    if (select) {
        select.onchange = function() {
            lastSelected = select.options[select.selectedIndex].value;
            localStorage.setItem('select', lastSelected);
        }
    }
</script>
@endpush