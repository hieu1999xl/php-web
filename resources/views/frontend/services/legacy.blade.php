@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOLegacy')}} @endsection
@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/services_detail.css')}}">
@endpush
@section('content')
<section class="section_block">
    <div class="container block_spacing">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <h2 class="font_weight_700 page_title text-dark">
                    {{trans('frontend.whychoose')}}
                </h2>
            </div>
        </div>
        <div class="row ">
            <p class="col-md-12 col-sm-12 col-lg-12 text-justify"> {{trans('frontend.whychooselegacy')}} </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div>
                    <p class="font_weight_700 title_process text_margin text-dark">{{trans('frontend.Legacy System Migration Process')}}</p>
                    <p class="translation" key="lsm1">{{trans('frontend.lsm1')}}</p>
                    <p class="translation" key="lsm2">{{trans('frontend.lsm2')}}</p>
                    <p class="translation" key="lsm3">{{trans('frontend.lsm3')}}</p>
                    <p class="translation" key="lsm4">{{trans('frontend.lsm4')}}</p>
                    <p class="translation" key="lsm5">{{trans('frontend.lsm5')}}</p>
                    <p class="translation" key="lsm6">{{trans('frontend.lsm6')}}</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <img id="imgNone" src="{{ asset('frontend/assets/images/service-detail/migration.png')}}" alt="{{trans('frontend.Legacy System Migration Process')}}">
            </div>
        </div>
    </div>
</section>
@include('frontend.case-studies.case_study',['display' => count($dataStudiesCase) > 0, 'dataStudiesCase' => $dataStudiesCase, 'classSection' => 'section_study1','type_case_studies' =>\App\Constants\CaseStudyConstants::VIEW_SERVICES_CHILD])
@include('frontend.includes.partner')
@include('frontend.includes.partner-mobile')
@include('frontend.new_layouts.bannerBottom')
@endsection