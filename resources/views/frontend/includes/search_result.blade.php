@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOSearch')}} @endsection
@push('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/search-result.css')}}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/notfound.css')}}" />
@endpush

@section('content')
@include('frontend.new_layouts.banner')
@include('partials.breadcrumbs')
<section class="section section_block">
    <div class="container our-read-more">
        <div class="row row_loading d-flex justify-content-center">
            <div class="planetcircle " id="loading">
                <div class="planetcircle__a"></div>
                <div class="planetcircle__b"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="count_result">

            </div>
        </div>
        <div class="row row-list" id="search_result">
        </div>
        <div class="row">
            <div class="col-12 text-center" id="view_more_search">
                <label class="btn-special btn_rounded--circle">
                    <span class="text-green"><a>view more</a>+</span>
                </label>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
@push ('after-scripts')
<script type="text/javascript">
    function getResultSearch(querySearchKey, querySearchSelect, lang) {
        $('.see-more').hide();
        $('#loading').show();
        $.ajax({
            type: "POST",
            url: `search-api`,
            data: {
                "_token": "{{ csrf_token() }}",
                querySearchKey,
                querySearchSelect
            }
        }).then(res => {
            if (res) {
                const data = res.result;
                const count = res.count;
                let details_url = "";
                let countComponent = ''
                if (res.count === 0) {
                    if (lang === 'vi') {
                        countComponent = `
                        <h3 class="text-center font_weight_700 page_title">Không tìm thấy kết quả cho ${querySearchKey}</h3>
                        <div class="col-12 justify-content-center d-flex">
                            <a href="{{ route('frontend.index') }}">
                                <button class="btnhome">TRANG CHỦ</button>
                            </a>
                            <a href="{{ route('frontend.contact_us') }}">
                                <button class="btncontact">LIÊN HỆ</button>
                            </a>
                        </div>
                    `
                    } else if (lang === 'en') {
                        countComponent = `
                        <h3 class="text-center font_weight_700 page_title">No results found for ${querySearchKey}</h3>
                        <div class="col-12 justify-content-center d-flex">
                            <a href="{{ route('frontend.index') }}">
                                <button class="btnhome">HOME PAGE</button>
                            </a>
                            <a href="{{ route('frontend.contact_us') }}">
                                <button class="btncontact">CONTACT US</button>
                            </a>
                        </div>
                    `
                    } else {
                        countComponent = `
                        <h3 class="text-center font_weight_700 page_title">の結果が見つかりません ${querySearchKey}</h3>
                        <div class="col-12 justify-content-center d-flex">
                            <a href="{{ route('frontend.index') }}">
                                <button class="btnhome">ホームページ</button>
                            </a>
                            <a href="{{ route('frontend.contact_us') }}">
                                <button class="btncontact">お問い合わせ</button>
                            </a>
                        </div>
                    `
                    }

                    $('#count_result').append(countComponent);
                } else {
                    if (lang === 'vi') {
                        countComponent = `
                        <h3 class="text-center font_weight_700 page_title">Tìm thấy ${count} kết quả</h3>
                    `
                    } else if (lang === 'en') {
                        countComponent = `
                        <h3 class="text-center font_weight_700 page_title">Founded ${count} results</h3>
                    `
                    } else {
                        countComponent = `
                        <h3 class="text-center font_weight_700 page_title">設立 ${count} 件</h3>
                    `
                    }

                    $('#count_result').append(countComponent);
                }

                data.forEach((item, index) => {
                    if (item.job_title) {
                        details_url = `/talent-acquisition${item.id}/${item.slug}`;
                        let componentJob = `
                        <div class="top_content_news_box block_spacing_md col-md-4 ${index > 5 ? "hide" : ""}">
                            <div class="box_image_news">
                                <a class="news-page-link" href="${details_url}">
                                    <img src="${item.featured_image}" alt="">
                                </a>
                            </div>
                            <a class="news-page-link" href="${details_url}">
                                <div class="box_title text_margin">
                                    <h3 class="title_news " class="font_weight_500">
                                    ${item.job_name}
                                    </h3>
                                </div>
                            </a>
                        </div>
                                `
                        $('#search_result').append(componentJob);
                    } else {
                        details_url = `news/${item.id}/${item.slug}`;
                        let component = `<div class="top_content_news_box block_spacing_md col-md-4 ${index > 5 ? "hide" : ""}">
                            <div class="box_image_news">
                                <a class="news-page-link" href="${details_url}">
                                    <img src="${item.featured_image}" alt="">
                                </a>
                            </div>
                            <a class="news-page-link" href="${details_url}">
                                <div class="box_title text_margin">
                                    <h3 class="title_news " class="font_weight_500">
                                    ${item.title}
                                    </h3>
                                </div>
                                <div class="box_desc">
                                    <p class="description_news">${item.descrition}</p>
                                </div>
                            </a>
                        </div>`;

                        $('#search_result').append(component);
                    }
                })
                $('.hide').hide();
                if (count > 6)
                    $('#view_more_search').show();
                $('#loading').hide();
            }
        }).catch(err => {
            console.log('err', err)
        })
    }
    $(document).ready(function() {
        $('#view_more_search').click(function() {
            $('.hide').show(400);
            $('#view_more_search').hide();
        });

        let url = new URL(window.location.href);
        let querySearchKey = url.searchParams.get("querySearchKey");
        let querySearchSelect = url.searchParams.get("querySearchSelect");
        let lang = 'en';
        if (url.pathname.indexOf('vi') !== -1) {
            lang = 'vi';
        } else if (url.pathname.indexOf('en') !== -1) {
            lang = 'en';
        } else {
            lang = 'jp';
        }
        getResultSearch(querySearchKey, querySearchSelect, lang);
    })
</script>
@endpush
