@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOOffshore')}} @endsection
@section('content')
@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/services_detail.css')}}">
@endpush
@include('partials.breadcrumbs')
<section class="section_block">
    <div class="container block_spacing">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <h2 class="font_weight_700 page_title text-dark">
                    {{trans('frontend.Resources staffing')}}
                </h2>
            </div>
        </div>
        <div class="row">
            <p class="col-md-12 col-sm-12 col-lg-12">
                {{trans('frontend.Resources staffing infor')}}
            </p>
        </div>
    </div>
    <div class="container block_spacing">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <h2 class="font_weight_700 page_title text-dark">
                    {{trans('frontend.whyus')}}
                </h2>
            </div>
        </div>
        <div class="row block_spacing">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="list-box text-center">
                    <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/dedication.svg')}}" alt="{{trans('frontend.Dedication')}}">
                    <h3 class="list-box-title font_weight_700 text_margin ">{{trans('frontend.Dedication')}}</h3>
                    <p class=" text-justify">{{trans('frontend.Pay passion')}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="list-box text-center">
                    <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/productivity.svg')}}" alt="{{trans('frontend.Productivity')}}">
                    <h3 class="list-box-title font_weight_700 text_margin">{{trans('frontend.Productivity')}}</h3>
                    <p class=" text-justify">{{trans('frontend.Bring the best')}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="list-box text-center">
                    <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/reliability.svg')}}" alt="{{trans('frontend.Reliability')}}">
                    <h3 class="list-box-title font_weight_700 text_margin ">{{trans('frontend.Reliability')}}</h3>
                    <p class=" text-justify">{{trans('frontend.Make products')}}</p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="list-box text-center">
                    <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/teamwork.svg')}}" alt="{{trans('frontend.Teamwork')}}">
                    <h3 class="list-box-title font_weight_700 text_margin ">{{trans('frontend.Teamwork')}}</h3>
                    <p class=" text-justify"> {{trans('frontend.Cooperate effort')}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="list-box text-center">
                    <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/independence.svg')}}" alt="{{trans('frontend.Independence')}}">
                    <h3 class="list-box-title font_weight_700 text_margin ">{{trans('frontend.Independence')}}</h3>
                    <p class=" text-justify">{{trans('frontend.Be independent')}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="list-box text-center">
                    <img class="list-box-icon" src="{{ asset('frontend/assets/images/service-detail/creative.svg')}}" alt="{{trans('frontend.Creative')}}">
                    <h3 class="list-box-title font_weight_700 text_margin ">{{trans('frontend.Creative')}}</h3>
                    <p class=" text-justify"> {{trans('frontend.Work hard')}} </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-6">
                <h2 class="font_weight_700 page_title text_margin text-dark">
                    {{trans('frontend.Off-shore Fixed Costs')}}
                </h2>
                <p class="text_margin">
                    {{trans('frontend.Off-shore Fixed Costs infor1')}}
                </p>
                <p class="text_margin">
                    {{trans('frontend.Off-shore Fixed Costs infor2')}}
                </p>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-6 text-right">
                <img class="img-why-pc" src="{{ asset('frontend/assets/images/service-detail/off_shore.jpg')}}" alt="{{trans('frontend.Off-shore Fixed Costs')}}">

            </div>
        </div>
    </div>
</section>
 @include('frontend.case-studies.case_study',['display' => count($dataStudiesCase) > 0, 'dataStudiesCase' => $dataStudiesCase, 'classSection' => 'section_study1','type_case_studies' =>\App\Constants\CaseStudyConstants::VIEW_SERVICES_CHILD])
@include('frontend.includes.partner')
@include('frontend.includes.partner-mobile')
@include('frontend.new_layouts.bannerBottom')
@endsection
@push ('after-scripts')
<script type="text/javascript">
    $(document).ready(function() {

        // Optimalisation: Store the references outside the event handler:
        var $window = $(window);

        function checkWidth() {
            var windowsize = $window.width();
            if (windowsize < 768) {
                //if the window is greater than 440px wide then turn on jScrollPane..
                $('#onsiteRe').addClass("order-last")
            } else {
                $('#onsiteRe').removeClass("order-last")
            }
        }
        // Execute on load
        checkWidth();
        // Bind event listener
        $(window).resize(checkWidth);
    });
</script>
@endpush
