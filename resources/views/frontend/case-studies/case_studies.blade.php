@extends('frontend.new_layouts.app')
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/pagination.min.css')}}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/case_studies.css')}}" />
@endpush
@php
$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
$nameTitle = '';
if (isset($parts['query'])) {
    parse_str($parts['query'], $query);
    if (isset($query['history'])) {
        $nameTitle = ' - from '.$query['history'];
    }
    if (isset($query['tagId'])) {
        $getNameTag = Illuminate\Support\Facades\DB::table('tags')->where('id', '=', (int)$query['tagId'])->where('status', '=', '1')->get();
        $nameTitle = $nameTitle .' - filter: '.$getNameTag[0]->name;
    }
} else {
    $nameTitle = '';
}
@endphp
@section('title'){{trans('frontend.TSOCaseStudies').$nameTitle}}@endsection
@section('content')
<section class="section_block">
    <div class="container">
        <div class="row block_spacing">
            <div class="col-12">
                <h2 class="font_weight_700 case_studies_title page_title">
                    {{trans('frontend.Feature projects')}}
                </h2>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <p class="case_studies_intro">{{trans('frontend.wedevelopsth')}}</p>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <p class="case_studies_intro">{{trans('frontend.webdevlop content')}}</p>
            </div>
        </div>
        <div>
            <div class="row case_studies_filter block_spacing">
                <div class="col-xl-3 col-lg-12">
                    <label for="services">{{trans('frontend.services')}}</label>
                    <select name='services' class="form-control select2-menu_services"></select>
                </div>
                <div class="col-xl-3 col-lg-12">
                    <label for="Industries">{{trans('frontend.Industries')}}</label>
                    <select name='industries' class="form-control select2-menu_industries"></select>
                </div>
                <div class="col-xl-3 col-lg-12">
                    <label for="technologies">{{trans('frontend.technologies')}}</label>
                    <select name='technologies' class="form-control select2-menu_technologies"></select>
                </div>

                <div class="col-xl-3 col-lg-12 block_button_case_studies">
                    <button id='case_studies_search_button'>{{trans('frontend.search')}}</button>
                </div>
            </div>
        </div>
        <div class="row block_spacing" id="case_studies_result">
        </div>
        <div id="pagination-container"></div>
    </div>
</section>
<x-library.select2 />
@endsection

@push ('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script src="{{ asset('js/case_study.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var dataId = '<?= \Illuminate\Support\Facades\Session::get('menu_parent') ?>'
        if (dataId) {
            const el = $(".nav-lists").find(`[data-id='${dataId}']`)
            el.addClass('active')
        }
        const data_search_case_studies = <?= $data_search_case_studies ?>;

        const listCaseStudies = <?= $$module_name_singular ?>;
        initDataFilter(listCaseStudies, getUrlParameter('id') ? [{
            id: getUrlParameter('id')
        }] : []);
        initSelect2();
        initSelected();
        $('#case_studies_search_button').click(function() {
            $('#case_studies_result').empty();
            const dataFilter = getDataFilter();
            callAjaxAddFilter(dataFilter)
            if (dataFilter.length === 0) {
                initDataFilter(data_search_case_studies, dataFilter);
            } else {
                initDataFilter(data_search_case_studies, dataFilter);
            }
        })
    })

    function initSelected() {
        var filterServicesSelected = <?= $filterServicesSelected ?>;
        var filterIndustriesSelected = <?= $filterIndustriesSelected ?>;
        var filterTechnologiesSelected = <?= $filterTechnologiesSelected ?>;
        $('.select2-menu_services').val(filterServicesSelected).trigger('change');
        $('.select2-menu_industries').val(filterIndustriesSelected).trigger('change');
        $('.select2-menu_technologies').val(filterTechnologiesSelected).trigger('change');
    }

    function initSelect2() {
        const dataservices = <?= $filterServices; ?>;
        const dataindustries = <?= $filterIndustries; ?>;
        const datatechnologies = <?= $filterTechnologies; ?>;
        let services = [];
        let industries = [];
        let technologies = [];
        dataservices.forEach(item => {
            services.push({
                id: item.id,
                text: item.name
            });
        })
        dataindustries.forEach(item => {
            industries.push({
                id: item.id,
                text: item.name
            });
        })
        datatechnologies.forEach(item => {
            technologies.push({
                id: item.id,
                text: item.name
            });
        })
        $('.select2-menu_services').select2({
            multiple: true,
            data: services,
            theme: "bootstrap",
            placeholder: '@lang("Select an option")',
            allowClear: true,
            tags: true,
        });
        $('.select2-menu_industries').select2({
            multiple: true,
            data: industries,
            theme: "bootstrap",
            placeholder: '@lang("Select an option")',
            allowClear: true,
            tags: true,
        });
        $('.select2-menu_technologies').select2({
            multiple: true,
            data: technologies,
            theme: "bootstrap",
            placeholder: '@lang("Select an option")',
            allowClear: true,
            tags: true,
        });

    }

    function initPagination() {
        var items = $(".case_studies_background");
        var numItems = items.length;
        var perPage = 8;
        if (numItems <= perPage) {
            $('#pagination-container').hide()
        } else {
            $('#pagination-container').show()
        }
        items.slice(perPage).hide();

        $('#pagination-container').pagination({
            items: numItems,
            itemsOnPage: perPage,
            prevText: "&laquo;",
            nextText: "&raquo;",
            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide().slice(showFrom, showTo).show();
            }
        });
    }

    function getDataFilter() {
        const selectedServices = $('.select2-menu_services').select2('data');
        const selectedIndustries = $('.select2-menu_industries').select2('data');
        const selectedTechnologies = $('.select2-menu_technologies').select2('data');
        let selected = selectedServices.concat(selectedIndustries).concat(selectedTechnologies);
        return selected;
    }

    function initDataFilter(listCaseStudies, selected) {
        let dataFilter = [];
        if (selected.length === 0) {
            dataFilter = listCaseStudies;
        } else {
            listCaseStudies.forEach((item, index) => {
                item.tags.forEach(itemTag => {
                    selected.forEach(itemSelected => {
                        if (+itemTag.id === +itemSelected.id) {
                            dataFilter.push(item);
                        }
                    })
                })
            });
        }
        // remove dup
        dataFilter = dataFilter.filter((value, index, self) =>
            index === self.findIndex((t) => (
                t.id === value.id && t.name === value.name
            ))
        )
        if (dataFilter.length > 0) {
            dataFilter.forEach((item, index) => {
                const details_url = `/case-studies/${item.id}/${item.data_locale ? item.data_locale.slug : item.slug}`;
                const itemCaseStudy = `
                    <div class="col-xl-3 col-lg-6 col-md-6 case_studies_background case_studies--height">
                        <div class="box_shadow_case_studies">
                            <a href="${details_url}" class="removeSessionFilter">
                                <img src="${item.featured_image}" alt="${item.data_locale.title}">
                            </a>
                            <div class="case_studies_infomation">
                                <a class="url_detail removeSessionFilter" href="${details_url}">
                                    <h3 class="case_studies_title font_weight_700">${item.data_locale ? item.data_locale.title : item.name}</h3>
                                    <p class="case_studies_description">${item.data_locale ? item.data_locale.descrition : item.intro}</p>
                                </a>
                                <div  class="tags_technologies" >
                                    <div id="tags_${index}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                $('#case_studies_result').append(itemCaseStudy)
                let tagItemServices = '';
                let tagItemIndustries = '';
                let tagItemTech = '';
                item.tags.forEach(itemTags => {
                    let className = '';
                    if (itemTags.slug.indexOf('industries') !== -1) {
                        className = 'industries';
                        tagItemIndustries += `
                            <a href="/case-studies?tagid=${itemTags.id}" class="case_studies_technologys removeSessionFilter ${className}">${itemTags.name}<span class="dot ${className}"></span></a>
                        `;
                    } else if (itemTags.slug.indexOf('services') !== -1 || itemTags.slug.indexOf('datascience') !== -1 || itemTags.slug.indexOf('blockchain') !== -1) {
                        className = 'services';
                        tagItemServices += `
                            <a href="/case-studies?tagid=${itemTags.id}" class="case_studies_technologys removeSessionFilter ${className}">${itemTags.name}<span class="dot ${className}"></span></a>
                        `;
                    } else {
                        className = 'technologies';
                        tagItemTech += `
                            <a href="/case-studies?tagid=${itemTags.id}" class="case_studies_technologys removeSessionFilter ${className}">${itemTags.name}<span class="dot ${className}"></span></a>
                        `;
                    }

                })
                $(`#tags_${index}`).append(tagItemServices).append(tagItemIndustries).append(tagItemTech);
            })
            callAjaxRemoveSessionFilter();
        } else {
            const notfound = `
                    <h2 class="case_studies_not_found">{{trans('frontend.not found')}}</h2>
                `;
            $('#case_studies_result').append(notfound)
        }
        initPagination();
    }

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };

    function callAjaxAddFilter(dataFilter) {
        const data = [];
        for (let index = 0; index < dataFilter.length; index++) {
            data[index] = dataFilter[index].id;
        }
        $.ajax({
            url: '/case-studies/addFilterSession',
            method: 'POST',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                'filters': data,
            },
            success: function(result) {},
        })

    }

    function callAjaxRemoveSessionFilter() {
        const removeSessionFilter = $('.removeSessionFilter');
        removeSessionFilter.click(function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.ajax({
                url: '/case-studies/destroySession',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                dataType: 'json',
                success: function(result) {
                    if (result) {
                        window.location.href = url;
                    } else {
                        console.log('errors');
                    }
                },
            })
        })
    }
</script>
@endpush