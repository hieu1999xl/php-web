@if($display)
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/case_studies_block.css')}}">
@endpush
<section class="section_block {{ $classSection }} section_study">
    <div class="study-overlay"></div>
    <div class="row">
        <div class="col-12">
            @if(Route::is('frontend.index'))
            <h2 class="page_title font_weight_700 text-center text-white"> {{trans('frontend.someofour')}}</h2>
            @elseif(!Route::is('frontend.index'))
            <p class="page_title font_weight_700 text-center text-white"> {{trans('frontend.someofour')}}</p>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row case_studies_contain block_spacing">
            @foreach ($dataStudiesCase as $item)
            @php
            $url = $_SERVER['REQUEST_URI'];
            $backHistory = explode("/",$url);
            $details_url = route("frontend.case_study_detail", [($item->id), $item->dataLocale ? $item->dataLocale->slug : $item->slug]);
            if (isset($backHistory[2])) {
            $details_url = $details_url.'?history='.$backHistory[2];
            }
            if (isset($item->dataLocale->title)) {
            $title = $item->dataLocale->title;
            $description = $item->dataLocale->descrition;
            } else {
            $title = $item->name;
            $description = $item->intro;
            }
            @endphp
            <div class="col-xl-4 col-lg-12 case_studies_background">
                <a href="{{$details_url}}" class="detailCaseStudy">
                    <img src="{{$item->featured_image}}" alt="{{$title}}">
                </a>
                <div class="case_studies_infomation">
                    <a class="url_detail detailCaseStudy" href="{{$details_url}}">
                        <p class="case_studies_title">{{$title}}</p>
                    </a>
                    @if (isset($item->tags))
                    @foreach ($item->tags as $itemTag)
                    @php
                    if (isset($itemTag->menu->slug)) {
                    if (str_contains($_SERVER['REQUEST_URI'], $itemTag->menu->slug)) {
                    $idCurrent = $itemTag->id;
                    $nameCurrent = $itemTag->name;
                    }
                    }
                    @endphp
                    @endforeach
                    @if (isset($idCurrent) && !isset($backHistory[2]))
                    <div class="current-tag tags font_weight_600">
                        <a href="/case-studies?id={{$idCurrent}}" class="case_studies_tags detailCaseStudy">{{$nameCurrent}}</a>
                    </div>
                    @elseif (isset($idCurrent) && isset($backHistory[2]))
                    <div class="current-tag tags font_weight_600">
                        <a href="/case-studies?id={{$idCurrent}}&history={{$backHistory[2]}}" class="case_studies_tags detailCaseStudy">{{$nameCurrent}}</a>
                    </div>
                    @endif
                    @endif
                    <a class="url_detail detailCaseStudy" href="{{$details_url}}">
                        <p class="case_studies_description">{{$description}}</p>
                    </a>
                    <div class="tags_technologies">
                        @foreach($item->tags as $tag)
                        @php
                        $urlTag = '/case-studies?tagid='.$tag->id;
                        if (isset($backHistory[2])) {
                        $urlTag = $urlTag.'&history='.$backHistory[2];
                        }
                        if (array_key_exists($tag->id, array_flip($filterServices->pluck('id')->toArray()))) {
                        $class = 'services';
                        @endphp
                        @if((isset($backHistory[3]) && !str_contains($tag->slug, $backHistory[3])) || !isset($backHistory[3]))
                        <a href="{{$urlTag}}" class="case_studies_technologys detailCaseStudy {{$class}} ">{{$tag->name}}
                            <span class="dot {{$class}}"></span>
                        </a>
                        @endif
                        @php
                        }
                        @endphp
                        @endforeach
                        @foreach($item->tags as $tag)
                        @php
                        $urlTag = '/case-studies?tagid='.$tag->id;
                        if (isset($backHistory[2])) {
                        $urlTag = $urlTag.'&history='.$backHistory[2];
                        }
                        if (array_key_exists($tag->id, array_flip($filterIndustries->pluck('id')->toArray()))) {
                        $class = 'industries';
                        @endphp
                        @if((isset($backHistory[3]) && !str_contains($tag->slug, $backHistory[3])) || !isset($backHistory[3]))
                        <a href="{{$urlTag}}" class="case_studies_technologys detailCaseStudy {{$class}} ">{{$tag->name}}
                            <span class="dot {{$class}}"></span>
                        </a>
                        @endif
                        @php
                        }
                        @endphp
                        @endforeach
                        @foreach($item->tags as $tag)
                        @php
                        $urlTag = '/case-studies?tagid='.$tag->id;
                        if (isset($backHistory[2])) {
                        $urlTag = $urlTag.'&history='.$backHistory[2];
                        }
                        if (array_key_exists($tag->id, array_flip($filterTechnologies->pluck('id')->toArray()))) {
                        $class = 'technologies';
                        @endphp
                        @if((isset($backHistory[3]) && !str_contains($tag->slug, $backHistory[3])) || !isset($backHistory[3]))
                        <a href="{{$urlTag}}" class="case_studies_technologys detailCaseStudy {{$class}} ">{{$tag->name}}
                            <span class="dot {{$class}}"></span>
                        </a>
                        @endif
                        @php
                        }
                        @endphp
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center" id="btndrop">
        <div class="more" id="submit-more">
            {{ html()->form('POST', route("frontend.case_studies"))->class('from-more')->open() }}
            <label class="btn-special btn_rounded--circle">
                <span class="text-white">
                    {{ html()->hidden('type_case_studies',  $type_case_studies) }}
                    {{ html()->hidden('postId', isset($postId) ? $postId : null) }}
                    {{ html()->hidden('tagIds', isset($tagIds) ? $tagIds : null) }}
                    {{ html()->hidden('slug', isset($slug) ? $slug : null) }}
                    {{ html()->hidden('industryName', isset($$module_name_singular) ? $$module_name_singular->name : null) }}
                    {{ html()->hidden('moreTagIdsDetail', isset($moreTagIdsDetail) ? $moreTagIdsDetail : null) }}
                    <a>
                        {{trans('frontend.moreProjects')}} +
                    </a>
                </span>
            </label>
            {{ html()->form()->close() }}
        </div>
    </div>
</section>
@endif
@push ('after-scripts')
<script src="{{ asset('js/case_study.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        function callAjaxRemoveSessionFilter() {
            $.ajax({
                url: '/case-studies/destroySession',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                dataType: 'json',
                success: function(result) {
                    if (result) {
                        $('.from-more').submit();
                    } else {
                        console.log('errors');
                    }
                },
            })
        }

        $('#submit-more').click(function() {
            callAjaxRemoveSessionFilter();
        })
    });
</script>

@endpush