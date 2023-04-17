@extends('frontend.new_layouts.app')
@section('title') {{$$module_name_singular->dataLocale->title}} @endsection
@push('after-styles') 
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/animation_block.css')}}">
@endpush
@section('content')
<section class="new_detail_content section_block">
    <div class="container">
        <div class="row">
            <div class="offset-md-0 offset-lg-1 offset-xl-2 col-xl-8 col-md-12 col-lg-10">
                <h1 class="detail_new_intro page_title font_weight_700">
                    {{$$module_name_singular->dataLocale ? $$module_name_singular->dataLocale->title : $$module_name_singular->name}}
                </h1>
            </div>
            <div class="offset-md-0 offset-lg-1 offset-xl-2 col-xl-8 col-md-12 col-lg-10">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="offset-md-0 offset-lg-1 offset-xl-2 col-xl-8 col-md-12 col-lg-10">
                <div class="content-editor" id="detail_new_content">
                    @php
                    if ($$module_name_singular->dataLocale) {
                    $body = $$module_name_singular->dataLocale->body;
                    } else {
                    $body = $$module_name_singular->content;
                    }
                    @endphp
                    {!! $body !!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section_block section_new_room big_mid detail_new_related" id="our-read-more">
    <div class="study-overlay"></div>
    <div class="container our-read-more">
        <div class="row">
            <div class="col-12">
                <h3 class="page_title font_weight_700 text-center">{{trans('frontend.Read more on our blog')}}</h3>
            </div>
        </div>
        <div class="row" id="detail_new_related">
            @foreach($dataRelated as $item)
            @php
            $details_url = route("frontend.news_detail", [($item->id), $item->dataLocale ? $item->dataLocale->slug : $item->slug]);
            @endphp
            <div class="col-lg-4 col-md-12">
                <div class="block_animation">
                    <div class="box_img">
                        <a href="{{ $details_url }}"><img src="{{ $item->featured_image }}" alt="{{$item->dataLocale ? $item->dataLocale->title : $item->name}}" /></a>
                    </div>
                    <div class="box_title">
                        <a href="{{ $details_url }}">
                            <p class="font_weight_600" key="{{$item->name}}">
                                {{$item->dataLocale ? $item->dataLocale->title : $item->name}}
                            </p>
                        </a>
                    </div>
                    <div class="box_info">
                        <ul class="category">
                            @foreach($item->tags as $tag)
                            <li><a href="#" key="{{$tag->name}}">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                        <span class="desc translation " key="{{$item->intro}}">
                            {{$item->dataLocale ? $item->dataLocale->description : $item->intro}}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @php
        @endphp
    </div>
</section>
@endsection
@push('after-scripts')
<script type="text/javascript">
</script>
@endpush
