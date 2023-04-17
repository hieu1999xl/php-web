@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOIndependent')}} @endsection
@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/services_detail.css')}}">
@endpush
@section('content')
<section class="section_block">
    <div class="container block_spacing">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <p class="font_weight_700 page_title text-dark">
                    {{trans('frontend.Testing Services')}}
                </p>
            </div>
        </div>
        <div class="row list_box--testing">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="list-box text-center">
                    <img class="list-box-icon list-box-icon-testing" src="{{ asset('frontend/assets/images/service/Rectangle 138_10_11zon.webp')}}" alt="{{trans('frontend.Unit test')}}">
                    <h3 class="title_process text_margin font_weight_700"> {{trans('frontend.Mobile Application Testing')}}</h3>
                    <p class="text-justify"> {{trans('frontend.Mobile Application Testing Content')}}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="list-box text-center">
                    <img class="list-box-icon list-box-icon-testing" src="{{ asset('frontend/assets/images/service/Rectangle 139_11_11zon.webp')}}" alt="{{trans('frontend.Integration test')}}">
                    <h3 class="title_process text_margin font_weight_700">{{trans('frontend.Automation Testing')}}</h3>
                    <p class="text-justify"> {{trans('frontend.Automation Testing Content')}} </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="list-box text-center">
                    <img class="list-box-icon list-box-icon-testing" src="{{ asset('frontend/assets/images/service/Rectangle 140_12_11zon.webp')}}" alt="{{trans('frontend.Functional test')}}">
                    <h3 class="title_process text_margin font_weight_700">{{trans('frontend.Web Application Testing')}}</h3>
                    <p class="text-justify">{{trans('frontend.Web Application Testing Content')}}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <a href="https://qa.tso.vn/" target="_blank">
                <div class="list-box text-center">
                    <img class="list-box-icon list-box-icon-testing" src="{{ asset('frontend/assets/images/service/Rectangle 141_13_11zon.webp')}}" alt="{{trans('frontend.Acceptance test')}}">
                    <h3 class="title_process text_margin font_weight_700">{{trans('frontend.Follow-The-Sun Testing')}}</h3>
                    <p class="text-justify">{{trans('frontend.Follow-The-Sun Testing Content')}}</p>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <h2 class="font_weight_700 page_title text-dark">
                    {{trans('frontend.Software Testing Process')}}
                </h2>
            </div>
        </div>
        <div class="row block_spacing">
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.Requirements Analysis')}}</p>
                <p class="text_margin">{{trans('frontend.sti1')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.Testing Plan')}}</p>
                <p class="text_margin">{{trans('frontend.sti2')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.Testcase')}}</p>
                <p class="text_margin">{{trans('frontend.sti3')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.Testing Environment')}}</p>
                <p class="text_margin">{{trans('frontend.sti4')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.testing')}}</p>
                <p class="text_margin">{{trans('frontend.sti5')}}</p>
            </div>
            <div class="col-lg-12 col-md-12">
                <p class="font_weight_700 title_process text_margin">{{trans('frontend.Report and Review Testing Result')}}</p>
                <p class="text_margin">{{trans('frontend.sti6')}}</p>
            </div>
        </div>
        <div class="img_process row justify-content-center">
            <img class="process-img" src="{{ asset('frontend/assets/images/service-detail/process3.svg')}}" alt="{{trans('frontend.Software Testing Process')}}">
        </div>
    </div>
</section>
@include('frontend.case-studies.case_study',['display' => count($dataStudiesCase) > 0, 'dataStudiesCase' => $dataStudiesCase, 'classSection' => 'section_study1','type_case_studies' =>\App\Constants\CaseStudyConstants::VIEW_SERVICES_CHILD])
@include('frontend.includes.partner')
@include('frontend.includes.partner-mobile')
@include('frontend.new_layouts.bannerBottom')
@endsection