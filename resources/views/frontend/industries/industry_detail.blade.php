@extends('frontend.new_layouts.app')
@section('title'){{trans('frontend.TSOSoftware')}}{{$meta['pTitle']}}  @endsection
@section('content')
<section id="our-us-para1" class="margin-section">
    <div class="container our-us-para1 industry">
        <div class="justify-content-center">
            <div class="row">
                @php
                $slug = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[3];
                @endphp
                @if ($slug == 'banking-finance')
                <div class="col-md-6 col-sm-12">
                    <!-- <h2 class="font_weight_700 page_title">{{trans('frontend.Industries Overall')}}</h2> -->
                    <div class="content-editor">
                        <p>{{trans('frontend.Industries Overall Banking')}}</p>
                        <a href="logistics" class="twok__button">
                            <div class="button__text">
                                <p class="explore">{{trans('frontend.More Info')}}</p>
                                <span>{{trans('frontend.Logistics')}}</span>
                            </div>
                            <div class="button__icon">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.235301 8.91696L16.0384 8.91696L8.4463 1.32484L9.31965 0.451488L18.4028 9.53461L9.31842 18.619L8.44507 17.7456L16.0384 10.1523L0.235301 10.1523L0.235301 8.91696Z" fill="white"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/Banking_Services.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/Banking_Services.webp')}}" alt="health care" />
                    </picture>
                </div>
                @endif
                @if ($slug == 'education')
                <div class="col-md-6 col-sm-12">
                    <!-- <h2 class="font_weight_700 page_title">{{trans('frontend.Industries Overall')}}</h2> -->
                    <div class="content-editor">
                        <p>{{trans('frontend.Industries Overall Education')}}</p>
                        <a href="https://edu.tso.vn/" target="_blank" class="twok__button">
                            <div class="button__text">
                                <p class="explore">{{trans('frontend.More Info')}}</p>
                                <span>{{trans('frontend.Education')}}</span>
                            </div>
                            <div class="button__icon">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.235301 8.91696L16.0384 8.91696L8.4463 1.32484L9.31965 0.451488L18.4028 9.53461L9.31842 18.619L8.44507 17.7456L16.0384 10.1523L0.235301 10.1523L0.235301 8.91696Z" fill="white"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/Education_Services.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/Education_Services.webp')}}" alt="health care" />
                    </picture>
                </div>
                @endif
                @if ($slug == 'enterprise-management')
                <div class="col-md-6 col-sm-12">
                    <!-- <h2 class="font_weight_700 page_title">{{trans('frontend.Industries Overall')}}</h2> -->
                    <div class="content-editor">
                        <p>{{trans('frontend.Industries Overall Enterprise Management')}}</p>
                        <a href="banking-finance" class="twok__button">
                            <div class="button__text">
                                <p class="explore">{{trans('frontend.More Info')}}</p>
                                <span>{{trans('frontend.Banking & Finance')}}</span>
                            </div>
                            <div class="button__icon">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.235301 8.91696L16.0384 8.91696L8.4463 1.32484L9.31965 0.451488L18.4028 9.53461L9.31842 18.619L8.44507 17.7456L16.0384 10.1523L0.235301 10.1523L0.235301 8.91696Z" fill="white"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/Enterprise_Services.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/Enterprise_Services.webp')}}" alt="enterprise" />
                    </picture>
                </div>
                @endif
                @if ($slug == 'healthcare')
                <div class="col-md-6 col-sm-12">
                    <div class="content-editor">
                        <p>{{trans('frontend.Industries Overall Healthcare')}}</p>
                        <a href="enterprise-management" class="twok__button">
                            <div class="button__text">
                                <p class="explore">{{trans('frontend.More Info')}}</p>
                                <span>{{trans('frontend.Enterprise Management')}}</span>
                            </div>
                            <div class="button__icon">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.235301 8.91696L16.0384 8.91696L8.4463 1.32484L9.31965 0.451488L18.4028 9.53461L9.31842 18.619L8.44507 17.7456L16.0384 10.1523L0.235301 10.1523L0.235301 8.91696Z" fill="white"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/HeathCare_Services.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/HeathCare_Services.webp')}}" alt="heath care" />
                    </picture>
                </div>
                @endif
                @if ($slug == 'logistics')
                <div class="col-md-6 col-sm-12">
                    <!-- <h2 class="font_weight_700 page_title">{{trans('frontend.Industries Overall')}}</h2> -->
                    <div class="content-editor">
                        <p>{{trans('frontend.Industries Overall Logistics')}}</p>
                        <a href="healthcare" class="twok__button">
                            <div class="button__text">
                                <p class="explore">{{trans('frontend.More Info')}}</p>
                                <span>{{trans('frontend.Healthcare')}}</span>
                            </div>
                            <div class="button__icon">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.235301 8.91696L16.0384 8.91696L8.4463 1.32484L9.31965 0.451488L18.4028 9.53461L9.31842 18.619L8.44507 17.7456L16.0384 10.1523L0.235301 10.1523L0.235301 8.91696Z" fill="white"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/Logistic_Services.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/Logistic_Services.webp')}}" alt="logistic" />
                    </picture>
                </div>
                @endif
                @if ($slug == 'ecommerce-retail')
                <div class="col-md-6 col-sm-12">
                    <!-- <h2 class="font_weight_700 page_title">{{trans('frontend.Industries Overall')}}</h2> -->
                    <div class="content-editor">
                        <p>{{trans('frontend.Industries Overall Ecommerce & Retail')}}</p>
                        <a href="https://ecommerce.tso.vn/" target="_blank" class="twok__button">
                            <div class="button__text">
                                <p class="explore">{{trans('frontend.More Info')}}</p>
                                <span>{{trans('frontend.Ecommerce & Retail')}}</span>
                            </div>
                            <div class="button__icon">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.235301 8.91696L16.0384 8.91696L8.4463 1.32484L9.31965 0.451488L18.4028 9.53461L9.31842 18.619L8.44507 17.7456L16.0384 10.1523L0.235301 10.1523L0.235301 8.91696Z" fill="white"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/Ecommerce_Services.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/Ecommerce_Services.webp')}}" alt="logistic" />
                    </picture>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="margin-section">
    <div class="container our-us-para1 industry">
        <div class="justify-content-center">
            <div class="row">
                @php
                $slug = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[3];
                @endphp
                @if ($slug == 'banking-finance')
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/Banking_Offering.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/Banking_Offering.webp')}}" alt="banking" />
                    </picture>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <h2 class="font_weight_700 page_title text-center">{{trans('frontend.Services Offerings')}}</h2>
                    <div class="edit_content">
                        <ul>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Banking customized')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Banking decentralized')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Banking comprehensive')}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                @endif
                @if ($slug == 'education')
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/Education_Offering.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/Education_Offering.webp')}}" alt="education" />
                    </picture>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <h2 class="font_weight_700 page_title text-center">{{trans('frontend.Services Offerings')}}</h2>
                    <div class="edit_content">
                        <ul>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Education dedicated')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Education resources')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Education ELearning')}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
                @if ($slug == 'enterprise-management')
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/Enterprise_Offering.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/Enterprise_Offering.webp')}}" alt="enterprise" />
                    </picture>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <h2 class="font_weight_700 page_title text-center">{{trans('frontend.Services Offerings')}}</h2>
                    <div class="edit_content">
                        <ul>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Enterprise Management suite')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Enterprise Management Fully')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Enterprise Management Inter')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Enterprise Management Mobile')}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
                @if ($slug == 'healthcare')
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/HeathCare_Offering.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/HeathCare_Offering.webp')}}" alt="heath care" />
                    </picture>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <h2 class="font_weight_700 page_title text-center">{{trans('frontend.Services Offerings')}}</h2>
                    <div class="edit_content">
                        <ul>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Healthcare Custom')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Healthcare Comprehensive')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Healthcare Connecting')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Healthcare 360')}}</p>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                @endif
                @if ($slug == 'logistics')
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/Logistics_Offering.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/Logistics_Offering.webp')}}" alt="heath care" />
                    </picture>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <h2 class="font_weight_700 page_title text-center">{{trans('frontend.Services Offerings')}}</h2>
                    <div class="edit_content">
                        <ul>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Logistics Transportation')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Logistics Warehouse')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Logistics Tracking')}}</p>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                @endif
                @if ($slug == 'ecommerce-retail')
                <div class="col-md-6 col-sm-12">
                    <picture>
                    <source srcset="{{asset('frontend/assets/images/Industry/Ecommerce_Offering.webp')}}"
                        media="(min-width: 480px)">
                    <img src="{{asset('frontend/assets/images/Industry/Ecommerce_Offering.webp')}}" alt="heath care" />
                    </picture>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <h2 class="font_weight_700 page_title text-center">{{trans('frontend.Services Offerings')}}</h2>
                    <div class="edit_content">
                        <ul>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Ecommerce & Retail Comprehensive')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Ecommerce & Retail High')}}</p>
                                </div>
                            </li>
                            <li class="listshareholder">
                                <div class="content-editor">
                                    <p class="infor-services text_margin">{{trans('frontend.Services Offerings Ecommerce & Retail Fully')}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@include('frontend.case-studies.case_study',['display' => count($dataStudiesCase) > 0, 'dataStudiesCase' => $dataStudiesCase, 'classSection' => 'section_study1','type_case_studies' =>\App\Constants\CaseStudyConstants::VIEW_INDUSTRY])
<section class="section_block">
    <div class="container">
        <!-- Section Industry Begin  -->
        @include('frontend.includes.section_industry')
        <!-- Section Industry End  -->
    </div>
</section>

@endsection
@push('after-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var dataId = '<?= \Modules\Article\Constants\MenuConstants::MENU_INDUSTRIES_SLUG ?>'
        if (dataId) {
            const el = $(".nav-lists").find(`[data-id='${dataId}']`)
            el.addClass('active')
        }
    });
</script>
@endpush
