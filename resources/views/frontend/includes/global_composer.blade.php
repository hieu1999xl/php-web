@extends('frontend.layouts.app')
@section('title') {{app_name()}} @endsection

@section('content')
<section id="our-read-more" class="section section_new_room big_mid">
    <div class="container our-read-more">
        <div class="row">

            <div class="col-12" id="count_result">
                <h5>{{ empty($title) ? $globalList['default_title'] : $title }}</h5>
                <img class="loading_post_services" src="{{ empty($banner) ? $globalList['default_banner'] : $banner }}" />
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
