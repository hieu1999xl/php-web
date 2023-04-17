@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOPriacy')}} @endsection

@section('content')
<section id="privacy" class="section section_block">
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 privacy_pc">
                <h1 class="text-center font_weight_700 page_title">Privacy</h1>

                <div class="privacy-decs">
                    <h2 class="text_margin">{{trans('frontend.PrivacyContentOne')}}</h2>
                    <h2 class="text_margin">{{trans('frontend.PrivacyContentTwo')}}</h2>
                    <h2 class="text_margin">{{trans('frontend.PrivacyContentThree')}}</h2>
                    <h2 class="text_margin">{{trans('frontend.PrivacyContentFour')}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection