
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/banner_top.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/talent.css')}}">
@if (Route::is('frontend.talent_detail'))
<section id="hero" class="bg_talent">
    <div class="container">
        <div class="row">
            <div class="col-12 content_banner">
                <h1 class="title_news font_weight_700 title_banner" key="news">{{$$module_name_singular->dataLocale->job_name ?? $$module_name_singular->job_name}}</h1>
            </div>
        </div>
    </div>
</section>
@endif
