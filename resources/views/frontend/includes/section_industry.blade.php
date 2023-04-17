@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/refactor/industries.css')}}">
@endpush
<section class="section_industry margin_industry">
    <div class="row">
        <div class="col-12">
            <h2 class="page_title text-center font_weight_700 text-dark">{{trans('frontend.Industries')}}</h2>
        </div>
    </div>
    <div class="row section_industry_content">
        <div class="col-md-6 col-sm-12  large_industry">
            <a href="{{Route::currentRouteName() == 'frontend.industry_detail' ? 'ecommerce-retail' : 'industries/ecommerce-retail'}}">
                <picture>
                        <source srcset="{{ asset('frontend/assets/images/Industry/ecommerce.webp')}}"
                                media="(min-width: 480px)">
                        <img class="large_industry--img" src="{{ asset('frontend/assets/images/Industry/ecommerce_mobile.webp')}}" alt="Ecommerce" />
                    </picture>
                <div class="container_industry">
                    <div class="opacity_industry large">
                        
                        <h4 class="title_industry large font_weight_700">{{trans('frontend.Ecommerce & Retail')}}</h4>
                        <p class="description_industry large">{{trans('frontend.Ecommerce & Retail des')}} </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-sm-12 large_industry">
            <a href="{{Route::currentRouteName() == 'frontend.industry_detail' ? 'enterprise-management' : 'industries/enterprise-management'}} ">
                    <picture>
                        <source srcset="{{ asset('frontend/assets/images/Industry/enterprise.webp')}}"
                                media="(min-width: 480px)">
                        <img class="large_industry--img" src="{{ asset('frontend/assets/images/Industry/enterprise_mobile.webp')}}" alt="enterprise management" />
                    </picture>
                <div class="container_industry">
                    <div class="opacity_industry large">
                        <h4 class="title_industry large font_weight_700">{{trans('frontend.Enterprise Management')}}</h4>
                        <p class="description_industry large">{{trans('frontend.Enterprise Management des')}}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-sm-12 large_industry have_child">
            <div class="row">
                <div class="col-sm-12 small_industry">
                    <a href="{{Route::currentRouteName() == 'frontend.industry_detail' ? 'banking-finance' : 'industries/banking-finance'}}">
                    <picture>
                        <source srcset="{{ asset('frontend/assets/images/Industry/banking.webp')}}"
                                media="(min-width: 480px)">
                        <img class="small_industry--img" src="{{ asset('frontend/assets/images/Industry/banking_mobile.webp')}}" alt="banking finance" />
                    </picture>
                        <div class="container_industry">
                            <div class="opacity_industry small">
                                <h4 class="title_industry small font_weight_700">{{trans('frontend.Banking & Finance')}}</h4>
                                <p class="description_industry small">{{trans('frontend.Banking & Finance des')}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-12 small_industry">
                    <a  href="{{Route::currentRouteName() == 'frontend.industry_detail' ? 'logistics' : 'industries/logistics'}}" >
                    <picture>
                        <source srcset="{{ asset('frontend/assets/images/Industry/logistic.webp')}}"
                                media="(min-width: 480px)">
                        <img class="small_industry--img" src="{{ asset('frontend/assets/images/Industry/logistic_mobile.webp')}}" alt="logistics" />
                    </picture>
                        <div class="container_industry">
                            <div class="opacity_industry small bot">
                                <h4 class="title_industry small font_weight_700">{{trans('frontend.Logistics')}}</h4>
                                <p class="description_industry small">{{trans('frontend.Logistics des' )}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-12 small_industry">
                    <a href="{{Route::currentRouteName() == 'frontend.industry_detail' ? 'healthcare' : 'industries/healthcare'}}">
                    <picture>
                        <source srcset="{{ asset('frontend/assets/images/Industry/health.webp')}}"
                                media="(min-width: 480px)">
                        <img class="small_industry--img" src="{{ asset('frontend/assets/images/Industry/health_mobile.webp')}}" alt="health care" />
                    </picture>
                        <div class="container_industry">
                            <div class="opacity_industry small bot">
                                <h4 class="title_industry small font_weight_700">{{trans('frontend.Healthcare')}}</h4>
                                <p class="description_industry small">{{trans('frontend.Healthcare des')}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 large_industry">
            <a href="{{Route::currentRouteName() == 'frontend.industry_detail' ? 'education' : 'industries/education'}}">
                    <picture>
                        <source srcset="{{ asset('frontend/assets/images/Industry/education.webp')}}"
                                media="(min-width: 480px)">
                        <img class="large_industry--img" src="{{ asset('frontend/assets/images/Industry/education_mobile.webp')}}" alt="education" />
                    </picture>
                <div class="container_industry">
                    <div class="opacity_industry large">
                        <h4 class="title_industry large font_weight_700">{{trans('frontend.Education')}}</h4>
                        <p class="description_industry large">{{trans('frontend.Education des')}}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>