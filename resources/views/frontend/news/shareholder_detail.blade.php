@extends('frontend.new_layouts.app')
@section('title') {{app_name()}} @endsection

@section('content')
<section id="our-us-about">
    <div class="our-us-about">
    @include('frontend.includes.banner')
        @include('partials.breadcrumbs')
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-sx-12  ">
                <h4 id="detail_shareholder_intro">{{$detail->name}}</h4>
                <div id="detail_shareholder_tag"></div>
            </div>
        </div>
    </div>
</section>
<section id="our-us-para1">
    <div class="container our-us-para1">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-sx-12  ">
                <div class="content-editor" id="detail_shareholder_content" style="min-height:400px">
                    {!! $detail->content !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

