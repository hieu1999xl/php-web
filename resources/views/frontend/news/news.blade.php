@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSONews')}}
@endsection
@push('after-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/news.css')}}">
@endpush
@section('content')
    <section class="section_block section_news_page">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 fixed_col_menu block_spacing">
                    <div class="sticky">
                    @foreach($menuChildNews as $menuChild)
                        <a class="menu_news_fixed" data="{{ $menuChild->slug }}">{{trans('frontend.' . $menuChild->slug)}}</a>
                    @endforeach
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col_news">
                    <!-- start giobug  -->
                    @foreach($menuChildNews as $menuChild)
                    @php  
                        $name_news=trans('frontend.'.$menuChild->name);
                        $description_news=trans('frontend.description'.$menuChild->description);
                    @endphp
                        <div class="row" id="{{$menuChild->slug}}">
                            <div class="col-md-6 col-sm-6 col-6">
                                <h2 class="font_weight_700 page_title">
                                    {{ $name_news }}
                                </h2>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6 d-flex flex-row-reverse">
                                <a href="{{ route('frontend.viewMoreNews',$menuChild->slug) }}" class="see-more-giobug ">
                                    <label class="btn-special btn_rounded--circle">
                                        <span class="text-green"><span>{{trans('frontend.viewmore')}}</span> +</span>
                                    </label>
                                </a>
                            </div>
                            <div class="col-12">
                                <p class="block_spacing">{{$description_news}}</p>
                            </div>
                        </div>
                        <div class="row block_spacing" id="dataListGioBugs">
                            @php
                                $posts = $menuChild->tag->posts->sortByDesc("published_at")->take(3) ?? [];
                            @endphp
                            @foreach ($posts as $key=> $post)
                                @php
                                    $details_url = route("frontend.news_detail", [($post->id), $post->dataLocale->slug]);
                                @endphp
                                <div class="top_content_news_box col-md-4">
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
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @include('frontend.new_layouts.bannerBottom')
@endsection
@push ('after-scripts')
    <script type="text/javascript">
        $(".menu_news_fixed").click(function() {
            const targetPosition = $(this).attr('data');
            $([document.documentElement, document.body]).animate({
                scrollTop: $(`#${targetPosition}`).offset().top - 100
            }, 1000);
        });
        $(document).ready(function() {
            const countGioBug = $('#dataListGioBugs div').length;
            const countEvent = $('#dataListEvent div').length;
            const countDx = $('#dataListDx div').length;
            $('.gio-bug-hide').hide();
            if (countGioBug <= 3) {
                $('.see-more-giobug ').hide();
            }
            // $('.see-more-giobug ').click(function() {
            //     $('.gio-bug-hide').show();
            //     $('.see-more-giobug ').hide();
            // });
            $('.event-hide').hide();
            if (countGioBug <= 3) {
                $('.see-more-event').hide();
            }
            // $('.see-more-event').click(function() {
            //     $('.event-hide').show();
            //     $('.see-more-event').hide();
            // });
            $('.cn-hide').hide();
            if (countDx <= 3) {
                $('.see-more-cn').hide();
            }
            // $('.see-more-cn').click(function() {
            //     $('.cn-hide').show();
            //     $('.see-more-cn').hide();
            // });
        });
    </script>
@endpush
