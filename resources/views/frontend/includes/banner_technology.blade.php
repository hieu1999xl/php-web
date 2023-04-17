@if (Route::is('frontend.technology_detail'))
<section  class="tDetail">
@elseif (Route::is('frontend.technology_micro'))
<section id="hero" class="tMicro">
@elseif (Route::is('frontend.technology_opensource'))
<section id="hero" class="tOpenSource">
@elseif (Route::is('frontend.technology_mobile'))
<section id="hero" class="tMobile">
@elseif (Route::is('frontend.technology_QA'))
<section id="hero" class="tQA">
@elseif (Route::is('frontend.technology_frontend'))
<section id="hero" class="tFrontEnd">
@endif
    <div class="container">
        <div class="row">
            <div class="col-12 hero">
                @if (Route::is('frontend.technology_detail'))
                <h2>JavaScript</h2>
                <p>Development. Consultancy. Maintenance</p>
                @elseif (Route::is('frontend.technology_micro'))
                <h2> Microsoft Platform</h2>
                <p>Development. Consultancy. Maintenance</p>
                @elseif (Route::is('frontend.technology_opensource'))
                <h2> Opensource</h2>
                <p>Development. Consultancy. Maintenance</p>
                @elseif (Route::is('frontend.technology_mobile'))
                <h2> Mobile Technologies</h2>
                <p>Development. Consultancy. Maintenance</p>
                @elseif (Route::is('frontend.technology_QA'))
                <h2> Software Testing/ Quality Control</h2>
                <p>Development. Consultancy. Maintenance</p>
                @elseif (Route::is('frontend.technology_frontend'))
                <h2> Front-end Development</h2>
                <p>Development. Consultancy. Maintenance</p>
                @endif
            </div>
        </div>
    </div>
</section>
