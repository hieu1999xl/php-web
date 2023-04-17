@extends('frontend.new_layouts.app')
@php
$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
if (isset($parts['query'])) {
    parse_str($parts['query'], $query);
    $nameTitle = ' - from '.$query['history'];
} else {
    $nameTitle = '';
}
@endphp
@section('title'){{$meta['pTitle'] . $nameTitle}} @endsection
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/case_studies_detail.css')}}">
@endpush
@section('content')
<section class="section_block">
    <div class="container">
        <div class="row block_spacing">
            <div class="offset-md-0 offset-lg-1 offset-xl-2 col-xl-8 col-md-12 col-lg-10">
                    <h1 class="font_weight_700 page_title">{{$$module_name_singular->dataLocale->title}}</h1>
                <div class="case_studies_tags text_margin">
                    @if(count($tagServices) > 0)
                    <div class="tag_item text_margin">
                        <label class="label font_weight_700" for="services">{{trans('frontend.Services')}}: </label>
                        @foreach ($tagServices as $key=>$item)
                        <a class="link_item item-services" href="/case-studies?tagid={{$item['id']}}">{{$item['name']}}</a>
                        {{ count($tagServices) > $key + 1 ? ',' : '' }}
                        @endforeach
                    </div>
                    @endif
                    @if(count($tagIndustries) > 0)
                    <div class="tag_item text_margin">
                        <label class="label font_weight_700" for="industries">{{trans('frontend.Industries')}}: </label>
                        @foreach ($tagIndustries as $key=>$item)
                        <a class="link_item item-industries" href="/case-studies?tagid={{$item['id']}}">{{$item['name']}}</a>
                        {{ count($tagIndustries) > $key + 1 ? ',' : '' }}
                        @endforeach
                    </div>
                    @endif
                    @if(count($tagTechnologies) > 0)
                    <div class="tag_item text_margin">
                        <label class="label font_weight_700" for="technologies">{{trans('frontend.technologies')}}: </label>
                        @foreach ($tagTechnologies as $key=>$item)
                        <a class="link_item item-technologies" href="/case-studies?tagid={{$item['id']}}">{{$item['name']}}</a>
                        {{ count($tagTechnologies) > $key + 1 ? ',' : '' }}
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="case_studies_tags">
                    <p class="case_studies_desc">{{$$module_name_singular->dataLocale->descrition}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-0 offset-lg-1 offset-xl-2 col-xl-8 col-md-12 col-lg-10">
                <div class="content-editor">
                    {!! $$module_name_singular->dataLocale->body !!}
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.case-studies.case_study',['display' => count($dataStudiesCase) > 0, 'dataStudiesCase' => $dataStudiesCase,'classSection' => 'section_study', 'type_case_studies' => \App\Constants\CaseStudyConstants::VIEW_DETAIL])
<!-- @include('frontend.includes.banner-bottom') -->
@endsection
@push ('after-scripts')
<script>
    $(document).ready(function() {
        var dataId = '<?= \Illuminate\Support\Facades\Session::get('menu_parent') ?>'
        if (dataId) {
            const el = $(".nav-lists").find(`[data-id='${dataId}']`)
            el.addClass('active')
        }
    });
</script>
@endpush