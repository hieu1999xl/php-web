@extends('frontend.new_layouts.app')
@section('title') {{$$module_name_singular->job_title}} @endsection
@section('content')
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/talent_detail.css')}}">
@endpush
@include('frontend.includes.banner_talentdetail')
@include('partials.breadcrumbs')

@if(Session::has('msg'))
<div id="alert_contact" class="alert alert-success">
    {{ Session::get('msg') }}
</div>
@endif
<section class="talent_detail section_block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 tl_left content-editor">
                <div class="block_spacing">
                    <h2 class="font_weight_700 page_title">{{$$module_name_singular->dataLocale->job_name ?? $$module_name_singular->job_name}}</h2>
                    <p class="tags">
                        <span>{{$$module_name_singular->dataLocale->job_title ?? $$module_name_singular->job_title}}</span>
                        <span>{{$$module_name_singular->dataLocale->job_location ?? $$module_name_singular->job_location}}</span>
                        <span>{{$$module_name_singular->dataLocale->job_time ?? $$module_name_singular->job_time}}</span>
                    </p>
                    <p>{{$$module_name_singular->dataLocale->job_intro ?? $$module_name_singular->job_intro}}</p>
                </div>
                <div class="list_tick block_spacing">
                    <h2 class="title_list block_spacing_sm">{{trans('frontend.Job description:')}}</h2>
                    <div class="job-content" id="job_description_vi">{!!$$module_name_singular->dataLocale->job_description ?? $$module_name_singular->job_description!!}</div>
                </div>
                <div class="list_tick block_spacing">
                    <h2 class="title_list block_spacing_sm">{{trans('frontend.Requirement:')}}</h2>
                    <div class="job-content" id="job_requirement_vi">{!!$$module_name_singular->dataLocale->job_requirement ?? $$module_name_singular->job_requirement!!}</div>
                </div>
                <div class="list_tick block_spacing">
                    <h2 class="title_list block_spacing_sm">{{trans('frontend.Benefits:')}}</h2>
                    <div class="job-content" id="job_benefits_vi">{!!$$module_name_singular->dataLocale->job_benefits ?? $$module_name_singular->job_benefits!!}</div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 tl_right">
                <h3 class="block_spacing" id="available">{{trans('frontend.Available')}}</h3>
                <h5 class="block_spacing">{{$$module_name_singular->dataLocale->job_salary ?? $$module_name_singular->job_salary}} (Salary gross)</h5>
                <div class="form-submit-cvs">
                    <form action="{{route('frontend.cvs.store')}}" method="POST" role="form" enctype="multipart/form-data" class="needs-validation" novalidate>
                        {{ csrf_field()}}
                        <div class="block_spacing_md form-group emailadd">
                            <label for="name" class="form-label text_margin translation">{{trans('frontend.Full Name (*)')}} </label>
                            <input id="name" type="text" class="form-control" name="username_candidate" required>
                            <div class="invalid-feedback  translation">
                                {{trans('frontend.Please enter your full name.')}}
                            </div>
                        </div>
                        <div class="block_spacing_md form-group emailadd">
                            <label for="email" class="form-label text_margin translation">{{trans('frontend.Email Address (*)')}}</label>
                            <input type="email" name="email_candidate" class="form-control" id="email" required>
                            <div class="invalid-feedback translation">
                                {{trans('frontend.Please enter your email')}}
                            </div>
                        </div>
                        <div class="block_spacing_md form-group emailadd">
                            <label for="phone" class="form-label text_margin translation">{{trans('frontend.Phone number (*)')}}</label>
                            <input type="text" class="form-control" pattern="[0-9]{10}" name="phone_candidate" id="phone" required>
                            <div class="invalid-feedback translation">
                                {{trans('frontend.Please enter your phone number')}}
                            </div>
                        </div>
                        <div class="block_spacing_md form-group emailadd">
                            <label for="position" class="form-label text_margin translation">{{trans('frontend.Apply for a')}}</label>
                            <input type="text" class="form-control" name="position" id="position" required readonly value="{{$$module_name_singular->dataLocale->job_name ?? $$module_name_singular->job_name}}">
                        </div>

                        <div class="block_spacing_md form-group ">
                            <label for="datestartjob" class="form-label text_margin translation">{{trans('frontend.Available From')}}</label>
                            <input type="date" id="datestartjob" required class="form-control" name="times_start_job" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" />

                        </div>
                        <div class="block_spacing_md form-group ">
                            <label class="form-label text_margin">CV file (*)</label>
                            <!-- <input type="file" class="form-control-file" name="fileCvs" required> -->
                            <div name="fileCvs" class="chosse_file_button">
                                <label class="input-file-trigger" for="exampleFormControlFile1" for="upload"></label>
                                <input type="file" id="exampleFormControlFile1" class="form-control input-file" name="fileCvs" required hidden />
                                <p class="file-return"></p>
                                <div class="invalid-feedback translation">{{trans('frontend.Invalid file')}}</div>
                            </div>
                        </div>
                        <button type="submit" class="full_width btn-round btn-purple" id="submit_talent_form">{{trans('frontend.Apply Now')}}</button>
                    </form>
                </div>
            </div>
        </div>
</section>
<!-- include partner -->
@endsection

@push('after-styles')
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush
@push('after-scripts')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });

    console.dir(document.getElementById('exampleFormControlFile1'))

    function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('reCAPTCHA_site_key', {
                action: 'submit'
            }).then(function(token) {

                // Add your logic to submit to your backend server here.
            });
        });
    }

    document.querySelector("html").classList.add('js');

    var fileInput = document.querySelector(".input-file"),
        button = document.querySelector(".input-file-trigger"),
        the_return = document.querySelector(".file-return");

    button.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput.focus();
        }
    });
    button.addEventListener("click", function(event) {
        fileInput.focus();
        return false;
    });
    fileInput.addEventListener("change", function(event) {
        the_return.innerHTML = this.value;
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<script type="text/javascript">
    function datediff(first, second) {
        return Math.round((second - first) / (1000 * 60 * 60 * 24));
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
    const contentTalents = $('.job-content ul li');
    let check = 0;
    while (check < contentTalents.length) {
        let imgCheckTalent = $('<img>');

        imgCheckTalent.attr("src", "{{ asset('frontend/assets/images/talent/check.png')}}");
        imgCheckTalent.attr("width", "20");
        imgCheckTalent.attr("height", "20");
        imgCheckTalent.attr("alt", "a");

        // console.log('berfor')
        $('.job-content ul li')[check].append(imgCheckTalent[0]);
        // console.log('after')
        // console.log($('.job-content ul li')[check])
        check++;
    }
    $(document).ready(function() {
        const todayTalent = getToday();
        const dataTalentDetail = <?= $$module_name_singular; ?>;
        let countDate = ''
        if (dataTalentDetail.job_left_time) {
            countDate = datediff(parseDate(todayTalent), parseDate(dataTalentDetail.job_left_time));
        } else {
            countDate = false;
        }
        if (countDate < 0) {
            $('#available').empty();
            $('#available').text(dataTalentDetail.data_locale.language === 'vi' ? 'HẾT HẠN' : 'EXPIRED').css('color', '#ee5050');
            $('input').attr('disabled', 'true');
            $('#submit_talent_form').attr('disabled', 'true').css('background', 'gray');
        }
    })
</script>
@endpush