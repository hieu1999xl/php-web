@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOEnterprise')}} @endsection
@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/services_detail.css')}}">
@endpush
@section('content')
<section class="section_block">
    <div class="container block_spacing">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <p class="font_weight_700 page_title text-dark">
                    {{trans('frontend.Custom Software Development')}}
                </p>
            </div>
        </div>
        <div class="row">
            <p class="col-md-12 col-sm-12 col-lg-12 text_margin">
                {{trans('frontend.Enterprise custom1')}}
            </p>
            <p class="col-md-12 col-sm-12 col-lg-12 text_margin">
                {{trans('frontend.Enterprise custom2')}}
            </p>
            <p class="col-md-12 col-sm-12 col-lg-12 text_margin">
                {{trans('frontend.Enterprise custom3')}}
            </p>
            <p class="col-md-12 col-sm-12 col-lg-12 text_margin title_process font_weight_700">
                {{trans('frontend.Our services')}}
            </p>
            <ul id="services-content">
                <li class="col-md-12 col-sm-12 col-lg-12 text_margin content_services bullet_content">{{trans('frontend.Our services1')}}</li>
                <li class="col-md-12 col-sm-12 col-lg-12 text_margin content_services bullet_content">{{trans('frontend.Our services2')}}</li>
                <li class="col-md-12 col-sm-12 col-lg-12 text_margin content_services bullet_content">{{trans('frontend.Our services3')}}</li>
                <li class="col-md-12 col-sm-12 col-lg-12 text_margin content_services bullet_content">{{trans('frontend.Our services4')}}</li>
                <li class="col-md-12 col-sm-12 col-lg-12 text_margin content_services bullet_content">{{trans('frontend.Our services5')}}</li>
            </ul>
            <p class="col-md-12 col-sm-12 col-lg-12 text_margin font_weight_700 title_process">
                {{trans('frontend.Why us')}}
            </p>
            <ul id="services-content">
                <li class="col-md-12 col-sm-12 col-lg-12 text_margin content_services bullet_content">{{trans('frontend.Why us1')}}</li>
                <li class="col-md-12 col-sm-12 col-lg-12 text_margin content_services bullet_content">{{trans('frontend.Why us2')}}</li>
            </ul>
        </div>
    </div>
    <div class="container block_spacing">
        <div class="row">
            <h2 class="col-12 font_weight_700 page_title text-dark">
                {{trans('frontend.basic steps')}}
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.Requirement')}}</p>
                <p class="text_margin">{{trans('frontend.enter1')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.analy')}}</p>
                <p class="text_margin">{{trans('frontend.enter2')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.designandcus')}}</p>
                <p class="text_margin">{{trans('frontend.enter3')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.testing')}}</p>
                <p class="text_margin">{{trans('frontend.enter5')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.deploy')}}</p>
                <p class="text_margin">{{trans('frontend.enter6')}}</p>
            </div>
        </div>
        <div class="img_process2">
            <img class="process-img" src="{{ asset('frontend/assets/images/service-detail/enterpr.svg')}}" alt="{{trans('frontend.basic steps')}}">
        </div>
    </div>
    <div class="container">
        <h2 class="col-12 font_weight_700 page_title text-dark">
            {{trans('frontend.Why choose Enterprise Custom')}}
        </h2>
        <div class="services-lists">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box text-center">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service/Rectangle 128_6_11zon.webp')}}" alt="{{trans('frontend.Efficiency')}}">
                        <h3 class="list-box-title font_weight_700 text_margin">{{trans('frontend.Efficiency')}}</h3>
                        <p class="text-justify">{{trans('frontend.EfficiencyIn')}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box text-center">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service/Rectangle 124_2_11zon.webp')}}" alt="{{trans('frontend.Profitability')}}">
                        <h3 class="list-box-title font_weight_700 text_margin">{{trans('frontend.Profitability')}}</h3>
                        <p class="text-justify">{{trans('frontend.ProfitabilityIn')}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box text-center">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service/Rectangle 131_9_11zon.webp')}}" alt="{{trans('frontend.Independence')}}">
                        <h3 class="list-box-title font_weight_700 text_margin">{{trans('frontend.Independence')}}</h3>
                        <p class="text-justify">{{trans('frontend.IndependenceIn')}}</p>
                    </div>
                </div>
            </div>
            <div class="row-space row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box text-center">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service/Rectangle 142_14_11zon.webp')}}" alt="{{trans('frontend.Scale custom software')}}">
                        <h3 class="list-box-title font_weight_700 text_margin">{{trans('frontend.Scale custom software')}}</h3>
                        <p class="text-justify">{{trans('frontend.Scale cus In')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.case-studies.case_study',['display' => count($dataStudiesCase) > 0, 'dataStudiesCase' => $dataStudiesCase, 'classSection' => 'section_study1','type_case_studies' =>\App\Constants\CaseStudyConstants::VIEW_SERVICES_CHILD])

@include('frontend.includes.partner')
@include('frontend.includes.partner-mobile')

@include('frontend.new_layouts.bannerBottom')

@endsection