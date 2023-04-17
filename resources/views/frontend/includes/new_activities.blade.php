@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/news.css')}}">
@endpush
<section class="section_block out_activities--new">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="block_spacing_md text-center section_page--subtitle text_color_default">{{trans('frontend.news')}}</p>
                <h2 class="page_title text-center font_weight_700 text-dark">{{trans('frontend.Ourdevelopmentactivities')}}</h2>
            </div>
        </div>
        <!-- load data news homepage -->
        <div class="row block_spacing">
            @foreach($dataNewsEvents as $$module_name_singular)
            @php
            $$module_name_singular->slug = $$module_name_singular->dataLocale ? $$module_name_singular->dataLocale->slug : $$module_name_singular->slug;
            $details_url = route("frontend.news_detail", [($$module_name_singular->id), $$module_name_singular->slug]);
            $$module_name_singular->name = $$module_name_singular->dataLocale ? $$module_name_singular->dataLocale->title : $$module_name_singular->name;
            @endphp
            <div class="top_content_news_box home_page col-md-4 ">
                <div class="box_image_news">
                    <a class="news-page-link" href="{{ $details_url }}">
                        <img src="{{ $$module_name_singular->featured_image}}" alt="{{$$module_name_singular->dataLocale->title}}">
                    </a>
                </div>
                <a class="news-page-link" href="{{ $details_url }}">
                    <div class="box_title text_margin">
                        <p class="title_news  font_weight_700">
                            {{$$module_name_singular->name}}
                        </p>
                    </div>
                    <div class="box_desc">
                        <p class="created_at text_margin">{{date("d-m-Y", strtotime($$module_name_singular->published_at))}}</p>
                        <p class="description_news">{{$$module_name_singular->dataLocale->descrition}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <label class="btn-special btn_rounded--circle">
                <span class="text-green"><a href="{{ route('frontend.news') }}">{{trans('frontend.startTheJourney1')}}</a>+</span>
            </label>
        </div>
    </div>
    </div>
</section>