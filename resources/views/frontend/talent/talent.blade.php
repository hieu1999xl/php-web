@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOTalent')}} @endsection
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/pagination.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/talent.css')}}">
@endpush
@section('content')
@section('banner')
@include('frontend.includes.banner_talent')
@endsection
@include('partials.breadcrumbs')
<section class="section_block talent_page">
    <div class="container talent_filter_desktop">
        <div class="row">
            <div class="col-4">
                <div class="block_spacing select_location">
                    <h1 class="talent_title_location block_spacing_sm">{{trans('frontend.Seclect location')}}</h1>
                    <div class="list_checkbox">
                        <input type="checkbox" value="Ha Noi Office" id="cb-hn">
                        <label class="font_weight_600">{{trans('frontend.Ha Noi Office')}}</label>
                    </div>
                    <div class="list_checkbox">
                        <input type="checkbox" value="Ho Chi Minh Office" id="cb-hcm">
                        <label class="font_weight_600">{{trans('frontend.Ho Chi Minh Office')}}</label>
                    </div>
                    <div class="list_checkbox">
                        <input type="checkbox" value="Japan Office" id="cb-jp">
                        <label class="font_weight_600">{{trans('frontend.Japan Office')}}</label>
                    </div>
                </div>
                <div class="select_position">
                    @php
                    $countAll = 0;
                    foreach($jobList as $job)
                    {
                    $countAll += $job->position_quantity;
                    $talent_detail = route("frontend.talent_detail",[($job->id),
                    $job->slug]);
                    }
                    @endphp
                    <p class="talent_title_position block_spacing_sm">{{trans('frontend.Seclect Position')}}</p>
                    <ul>
                        <li class="active text_margin"><a class="talent_title_filter font_weight_600" href="#">{{trans('frontend.all')}} </a><a href="#">({{$countAll}})</a></li>
                        @foreach($jobList as $job)
                        @php
                        $jobName = $job->dataLocale->job_name ?? $job->job_name;
                        @endphp
                        <li id="myTable" class="text_margin"><a class="talent_title_filter font_weight_600" href="{{ route('frontend.talent') }}/{{$job->id}}/{{$job->slug}}">{{$jobName}} ({{$job->position_quantity}})</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-8 loading-box">
                <div class="planetcircle" id="loading">
                    <div class="planetcircle__a"></div>
                    <div class="planetcircle__b"></div>
                </div>
            </div>
            <div class="col-8" id="list-data">
            </div>
        </div>
    </div>
    <div class="container talent_filter_mobile">
        <div class="row block_spacing">
            <div class="offset-2 col-8 talent_form-group text_margin">
                <select name="location" id="select-location">
                    <option value="">{{trans('frontend.Seclect location')}}</option>
                    <option value="Ha Noi Office">{{trans('frontend.Ha Noi Office')}}</option>
                    <option value="Ho Chi Minh Office">{{trans('frontend.Ho Chi Minh Office')}}</option>
                    <option value="Japan Office">{{trans('frontend.Japan Office')}}</option>
                </select>
            </div>
            <div class="offset-2 col-8 talent_form-group text_margin">
                <select onchange="window.location.href=this.value;" id="select-job">
                    <option value="/talent-acquisition">{{trans('frontend.Seclect Position')}}</option>
                    @foreach($jobList as $job)
                    <option value="{{route('frontend.talent_detail', [ $job->id, $job->slug])}}" slug="{{$job->slug}}">
                        <a href="{{route('frontend.talent_detail', [ $job->id, $job->slug])}}">{{$job->job_name}} ({{$job->position_quantity}})</a>
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="list-data-mobile">
            </div>
            <div class="col-12 loading-box">
                <div class="planetcircle" id="loading">
                    <div class="planetcircle__a"></div>
                    <div class="planetcircle__b"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section New Room Begin -->
@include('frontend.includes.new_activities')
<!-- Section New Room End -->
@endsection
@push('after-scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        onChangeGetTalentFromServer('');
    })
    //generate hmtl in screen pc
    function generateHtmlPc(data, defaultLang) {
        $('#list-data').empty();
        const changeLangjobs = ["jobs Opening", "các vị trí tuyển dụng"]
        const titleOpen = $(`<h2 class="font_weight_700 page_title text_color_default">${data.length} ${ defaultLang === 'vi' ? changeLangjobs[1] : changeLangjobs[0]}</h2>`);
        $('#list-data').append(titleOpen)
        $('#list-data').append(`<div class="list-data"></div>`)
        const todayTalent = getToday();
        for (let i = 0; i < data.length; i++) {
            let urlDetails = `talent-acquisition/${data[i].id}/${data[i].slug}`;
            let date = '';
            let dateExpired = "";
            if (data[i].job_left_time) {
                date = datediff(parseDate(todayTalent), parseDate(data[i].job_left_time))
            } else {
                date = "";
            }
            if (date > 3) {
                dateExpired = `<p class="manyday" >${defaultLang === 'vi' ? 'Còn ' + date + ' ngày' : date + ' days left' }</p>`;
            }
            if (date <= 3 && date > 0) {
                dateExpired = `<p class="fewday" >${defaultLang === 'vi' ? 'Còn ' + date + ' ngày' : date === 1 ? date + ' day left' : date + ' days left' }</p>`;
            }
            if (date <= 0) {
                dateExpired = `<p class="fewday" >${defaultLang === 'vi' ? 'Hết hạn' : 'Expired' }</p>`;
            }
            if (!date && date !== 0) {
                dateExpired = "";
            }
            const component = `
            <div class='list_talent_item text_margin'>
                <div class="row">
                    <div class="col-8">
                        <a href='${urlDetails}'>
                            <h3 class="font_weight_600 title_jobs text_margin">${data[i].job_name}</h3>
                            <p class="tags text_margin">
                                <span>${data[i].job_title}</span>
                                <span>${data[i].job_location}</span>
                            </p>
                            <p class="budget font_weight_600">${data[i].job_salary}</p>
                        </a>
                    </div>
                    <div class="col-4 talent_desktop_apply">
                        <div>
                            <a class="btn-round btn-purple font_weight_400"  href='${urlDetails}' id="btn">
                                ${defaultLang === 'vi' ? 'Ứng tuyển' : 'Apply now'}
                            </a>
                            ${dateExpired}
                        </div>
                    </div>
                </div>
            </div>
            `;
            $('.list-data').append(component);

        }
        const today = new Date();
        const pagination = `<div id="pagination-info"></div>`;
        $('.list-data').after(pagination);
        let items = $(".list-data .list_talent_item");
        let numItems = items.length;
        let perPage = 4;
        items.slice(perPage).hide();
        $('#pagination-info').pagination({
            items: numItems,
            itemsOnPage: perPage,
            prevText: "&lsaquo;",
            nextText: "&rsaquo;",
            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide().slice(showFrom, showTo).show();
            }
        });
    }


    //generate html in scree mobile
    function generateHtmlMobile(data, defaultLang) {

        $('#list-data-mobile').empty();
        const changeLangjobs = ["jobs Opening", "các vị trí tuyển dụng"]
        const titleOpen = $(`<h2 class="font_weight_700 page_title text_color_default">${data.length} ${ defaultLang === 'vi' ? changeLangjobs[1] : changeLangjobs[0]}</h2>`);
        $('#list-data-mobile').append(titleOpen)
        $('#list-data-mobile').append(`<div class="list-data-mobile"></div>`)
        const todayTalent = getToday();

        for (let i = 0; i < data.length; i++) {
            let urlDetails = `talent-acquisition/${data[i].id}/${data[i].slug}`;
            let date = '';
            let dateExpired = "";
            if (data[i].job_left_time) {
                date = datediff(parseDate(todayTalent), parseDate(data[i].job_left_time))
            } else {
                date = "";
            }
            if (date > 3) {
                dateExpired = `<p class="manyday" >${defaultLang === 'vi' ? 'Còn ' + date + ' ngày' : date + ' days left' }</p>`;
            }
            if (date <= 3 && date >= 0) {
                dateExpired = `<p class="fewday" >${defaultLang === 'vi' ? 'Còn ' + date + ' ngày' : date === 1 ? date + ' day left' : date + ' days left' }</p>`;
            }
            if (date < 0) {
                dateExpired = `<p class="fewday" >${defaultLang === 'vi' ? 'Hết hạn' : 'Expired' }</p>`;
            }
            if (!date && date !== 0) {
                dateExpired = "";
            }
            const component = `
            <div class='list_talent_item block_spacing text_margin'>
                <div class="row">
                    <div class="col-12 block_spacing">
                        <a href='${urlDetails}'>
                            <h3 class="font_weight_600 title_jobs text_margin">${data[i].job_name}</h3>
                            <p class="tags text_margin">
                                <span>${data[i].job_title}</span>
                                <span>${data[i].job_location}</span>
                            </p>
                            <p class="budget font_weight_600">${data[i].job_salary}</p>
                        </a>
                    </div>
                    <div class="col-12 talent_mobile_apply">
                            <div>
                                <a class="btn-round btn-purple font_weight_400"  href='${urlDetails}' id="btn">
                                    ${defaultLang === 'vi' ? 'Ứng tuyển' : 'Apply now'}
                                </a>
                                ${dateExpired}
                            </div>
                    </div>
                </div>
            </div>
            `;
            $('.list-data-mobile').append(component);
        }
    }

    function parseDate(str) {
        if (str) {
            var mdy = str.split('-');
            return new Date(mdy[0], mdy[1] - 1, mdy[2]);
        }
        return 0;
    }

    function getToday() {
        const today = new Date();
        const yyyy = today.getFullYear();
        let mm = today.getMonth() + 1;
        let dd = today.getDate();

        if (dd < 10) dd = '0' + dd;
        if (mm < 10) mm = '0' + mm;

        return yyyy + '-' + mm + '-' + dd;
    }

    function datediff(first, second) {
        return Math.round((second - first) / (1000 * 60 * 60 * 24));
    }
    //function get list talent by event on change
    function onChangeGetTalentFromServer(arrLocation) {
        $('.loading-box').css('display', 'flex');
        const jobName = $('#input-search').val();
        $.ajax({
            url: `{!!route('frontend.api_search_talent')!!}`,
            type: 'GET',
            data: {
                jobName: jobName,
                location: arrLocation.toString(),
            },
            success: (data) => {
                $('.loading-box').hide();
                if ($(window).width() > 768)
                    generateHtmlPc(data.jobs, data.lang);
                else
                    generateHtmlMobile(data.jobs, data.lang);
            },
            error: (err) => {
                $('.loading-box').hide();
                console.log('err: ', err);
            }
        })
    };

    function getLocationResponseSearch(width) {
        let arrLocation = [];
        let location = $('select#select-location option:checked').val();
        if (location !== 'Select location') {
            arrLocation.push(location);
        }
        $('input[type="checkbox"]:checked').each(function() {
            arrLocation.push(this.value);
        });
        return arrLocation;
    }

    function getLocationResponse(width) {
        let arrLocation = [];
        if (width <= 768) {
            let location = $('select#select-location option:checked').val();
            if (location === 'Select location') {
                window.location.reload();
            } else {
                arrLocation.push(location);
            }

        } else {
            $('input[type="checkbox"]:checked').each(function() {
                arrLocation.push(this.value);
            });
        }
        return arrLocation;
    }
    $('input[type=checkbox]').change(function() {
        let widthWindow = $(window).width();

        let arrLocation = getLocationResponse(widthWindow);

        onChangeGetTalentFromServer(arrLocation);
    });

    $('select#select-location').change(function() {
        let widthWindow = $(window).width();

        let arrLocation = getLocationResponse(widthWindow);

        onChangeGetTalentFromServer(arrLocation);
    });

    $('#input-search').change(function() {
        let widthWindow = $(window).width();
        let arrLocation = getLocationResponseSearch(widthWindow);
        onChangeGetTalentFromServer(arrLocation);
    });
</script>
@endpush