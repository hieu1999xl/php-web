<!-- @if (Route::is('frontend.technology') || Route::is('frontend.foldio')|| Route::is('frontend.clever') || Route::is('frontend.services_legacy') || Route::is('frontend.dedicated_team')|| Route::is('frontend.services_product')|| Route::is('frontend.services_testing') || Route::is('frontend.services_maintain') || Route::is('frontend.services_enterprise') || Route::is('frontend.index') || Route::is('frontend.success_stories'))
<section class="big_mid_services" style="padding-top: 120px;">
    @elseif (Route::is('frontend.services') || Route::is('frontend.mobile_app_development')|| Route::is('frontend.talent_detail'))
    <section class="big_mid_services " style="padding-top: 120px;">
        @endif
        @if (Route::is('frontend.technology') ||Route::is('frontend.talent_detail') || Route::is('frontend.foldio')|| Route::is('frontend.clever') || Route::is('frontend.services_legacy') || Route::is('frontend.dedicated_team')|| Route::is('frontend.services_product')|| Route::is('frontend.services_testing')|| Route::is('frontend.services_maintain')|| Route::is('frontend.services_enterprise') || Route::is('frontend.index') || Route::is('frontend.success_stories'))
        <div class="container tech nodots">
            @elseif (Route::is('frontend.services'))
            <div class="container tech nodots">
                @endif
                <div class="row">
                    <div class="col-12">
                        @if (Route::is('frontend.technology') || Route::is('frontend.foldio') || Route::is('frontend.clever')|| Route::is('frontend.services_legacy') || Route::is('frontend.dedicated_team')|| Route::is('frontend.services_product')|| Route::is('frontend.services_testing')|| Route::is('frontend.services_maintain')|| Route::is('frontend.services_enterprise') || Route::is('frontend.index') || Route::is('frontend.success_stories'))
                    
                        <h1 class="translation ourPart font_weight_700" key="our_partner">Our Partners</h1>
        
                        @elseif (Route::is('frontend.services') || Route::is('frontend.mobile_app_development') || Route::is('frontend.talent_detail'))
                       
                        <h1 class="translation ourPart font_weight_700" key="our_partner">Our partners</h1>
                        @endif
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="#"> <img src="{{ asset('frontend/assets/images/tech_screen/brand1.svg')}}" alt="" />
                            </a>
                        </div>
                        <div class="col">
                            <a href="#"> <img src="{{ asset('frontend/assets/images/tech_screen/brand2.svg')}}" alt="" />
                            </a>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <a href="#"> <img src="{{ asset('frontend/assets/images/tech_screen/brand3.svg')}}" alt="" />
                            </a>
                        </div>
                        <div class="col">
                            <a href="#"> <img src="{{ asset('frontend/assets/images/tech_screen/brand4.svg')}}" alt="" />
                            </a>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <a href="#"> <img style="background-color: #004e96;" src="{{ asset('frontend/assets/images/tech_screen/brand5.png')}}" alt="" />
                            </a>
                        </div>
                        <div class="col">
                            <a href="#"> <img src="{{ asset('frontend/assets/images/tech_screen/brand6.png')}}" alt="" />
                            </a>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <a href="#"> <img src="{{ asset('frontend/assets/images/tech_screen/brand7.svg')}}" alt="" />
                            </a>
                        </div>
                        <div class="col">
                            <a href="#"> <img src="{{ asset('frontend/assets/images/tech_screen/brand8.svg')}}" alt="" />
                            </a>
                        </div>
                    </div>
                </div>

    </section> -->