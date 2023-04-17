@extends('frontend.new_layouts.app')
@section('title'){{$metaTitle}} @endsection
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/news.css')}}">
@endpush

@section('content')
<section class="section_block section_news_page child_page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col_news">
                <div class="row block_spacing" id="child_page_news">

                    @foreach ($posts as $key => $post)
                    @php
                    $details_url = route("frontend.news_detail", [($post->id), $post->dataLocale->slug]);
                    @endphp
                    <div class="top_content_news_box text_margin col-md-4">
                        <div class="box_image_news">
                            <a class="news-page-link" href="{{ $details_url }}">
                                <img src="{{ $post->featured_image}}" alt="{{ $post->dataLocale->title}}">
                            </a>
                        </div>
                        <a class="news-page-link" href="{{ $details_url }}">
                            <div class="box_title text_margin">
                                <h3 class="title_news font_weight_700">
                                    {{$post->dataLocale->title}}
                                </h3>
                            </div>
                            <div class="box_desc">
                                <p class="created_at text_margin">{{date("d-m-Y", strtotime($post->published_at))}}</p>
                                <p class="description_news">{{$post->dataLocale->descrition}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="pagination_default">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.new_layouts.bannerBottom')
@endsection