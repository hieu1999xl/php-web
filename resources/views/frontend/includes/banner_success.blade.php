@if (Route::is('frontend.case_studies') || Route::is('frontend.more_project') || Route::is('frontend.case_study_detail') || Route::is('frontend.searchCaseStudies'))
<section id="hero" class="pSuccess">
    <div class="container">
        <div class="row">
            <div class="col-12 hero">
                @if (Route::is('frontend.case_studies') || Route::is('frontend.case_study_detail') || Route::is('frontend.searchCaseStudies'))
                <h2 class="font_weight_700">{{trans('frontend.case_studies')}}</h2>
                <p class="translation">{{trans('frontend.banner success content')}}</p>
                <div style="padding-top:40px" class="row justify-content-center">
                    <a href="/about-us/contact-us" id="btn" class="link-inter">
                        <label style="font-size: 12px;" class="translation">{{trans('frontend.talktous')}}</label>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif
