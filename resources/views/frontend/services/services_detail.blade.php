@extends('frontend.new_layouts.app')
@section('title')
{{trans('frontend.TSOMobileSolution')}}
@endsection
@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/services_detail.css')}}">
@endpush
@section('content')
<section class="section_block">
    <div class="container block_spacing">
        <div class="row ">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <p class="font_weight_700 page_title text-dark">
                    {{trans('frontend.Mobile Application')}}
                </p>

            </div>
            <p class="col-md-12 col-sm-12 col-lg-12 text_margin">
                {{trans('frontend.Mobile Application info1')}}
            </p>
            <p class=" col-md-12 col-sm-12 col-lg-12 text_margin">
                {{trans('frontend.Mobile Application info2')}}
            </p>
        </div>
    </div>
    <div class="container block_spacing">
        <div class="row">
            <h2 class="col-12 font_weight_700 page_title text-dark">
                {{trans('frontend.Mobile_procress')}}
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.mobile_span_1')}} </p>
                <p class="text_margin">{{trans('frontend.Mobile_procress_mini1')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.mobile_span_2')}}</p>
                <p class="text_margin">{{trans('frontend.Mobile_procress_2')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.mobile_span_3')}}</p>
                <p>{{trans('frontend.Mobile_procress_3')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.mobile_span_4')}}</p>
                <p class="text_margin">{{trans('frontend.Mobile_procress_4')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.mobile_span_5')}}</p>
                <p class="text_margin">{{trans('frontend.Mobile_procress_5')}}</p>
            </div>
        </div>
        <div class="img_process text-center">
            <img class="process-img" src="{{ asset('frontend/assets/images/service-detail/mobilesolutions.jpg')}}" alt="{{trans('frontend.Mobile_procress')}}">
        </div>
    </div>
    <div class="container">
        <h2 class="font_weight_700 page_title text-dark">
            {{trans('frontend.whychoosemb')}}
        </h2>
        <div class="services-lists">
            <div class="row block_spacing">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box text-center">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service/Rectangle 126_4_11zon.webp')}}" alt="{{trans('frontend.Dedicated Software Team')}}">
                        <h3 class="list-box-title font_weight_700">{{trans('frontend.Dedicated Software Team')}}</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box text-center">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service/Rectangle 123_1_11zon.webp')}}" alt="{{trans('frontend.Reliability')}}">
                        <h3 class="list-box-title font_weight_700">{{trans('frontend.Reliability')}}</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box text-center">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service/Rectangle 130_8_11zon.webp')}}" alt="{{trans('frontend.High speed')}}">
                        <h3 class="list-box-title font_weight_700">{{trans('frontend.High speed')}}</h3>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box text-center">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service/Rectangle 129_7_11zon.webp')}}" alt="{{trans('frontend.Cost competitiveness')}}">
                        <h3 class="list-box-title font_weight_700">{{trans('frontend.Cost competitiveness')}}</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box text-center">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service/Rectangle 127_5_11zon.webp')}}" alt="{{trans('frontend.Customer satisfy')}}">
                        <h3 class="list-box-title font_weight_700" key="Customer satisfy">{{trans('frontend.Customer satisfy')}}</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="list-box text-center">
                        <img class="list-box-icon" src="{{ asset('frontend/assets/images/service/Rectangle 125_3_11zon.webp')}}" alt="{{trans('frontend.Creative')}}">
                        <h3 class="list-box-title font_weight_700" key="Creative">{{trans('frontend.Creative')}}</h3>
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