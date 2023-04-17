@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOContactus')}} @endsection
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/contact_us.css')}}">
@endpush
@section('content')
    <section class="section_block" id="contact_us">
    <div class="container">
        <div class="row contactus_container">
            <div class="col-sm-12 col-xl-8" id="offset">
                <h2 class="page_title font_weight_700" >{{trans('frontend.contacus')}}</h2>
                <p class="contact-decs ">
                {{trans('frontend.contacus_thank')}}</p>
                @if(Session::has('msg'))
                <div id="alert_contact" class="alert alert-success">
                    {{ Session::get('msg') }}
                </div>
                @endif
                <form action="{{route('frontend.sendMail')}}" method="POST" role="form" class="needs-validation contact_form" novalidate>
                    {{ csrf_field()}}
                    <div class="mb-3 form-group emailadd">
                        <label for="name_contact" class="form-label  font_weight_500" >{{trans('frontend.fullname')}} <span>*</span></label>
                        <input id="name_contact" type="text" class="form-control" name="fullName" placeholder="{{trans('frontend.fullnamePlaceholder')}}" required>
                        <div class="invalid-feedback ">
                        {{trans('frontend.Please enter your full name')}}
                        </div>
                        <div id="text_special--contact" class="text_special--contact " >
                        {{trans('frontend.validatename')}}
                        </div>
                    </div>
                    <div class="form-group emailadd">
                        <label for="email" class="form-label  font_weight_500">{{trans('frontend.youremail')}} <span>*</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="invalid-feedback ">
                        {{trans('frontend.Please enter your email')}}
                        </div>
                    </div>
                    <div class="mb-3 form-group emailadd">
                        <label class=" ">{{trans('frontend.organization')}}</label>
                        <input type="text" name="description_Organization" class="form-control" placeholder="{{trans('frontend.organizationInput')}}">
                    </div>
                    <div class="form-group emailadd">
                        <label for="description" class="form-label  font_weight_500">{{trans('frontend.yourmessage')}} <span>*</span></label>
                        <textarea name="description" ></textarea>
                        <div class="invalid-feedback ">
                        {{trans('frontend.Please enter your message')}}
                        </div>
                    </div>
                    <div class="g-recaptcha" id="g-recaptcha-response" data-sitekey="6LeJsMQgAAAAAGmSP0DAmQul3idwuw2JHxWOfm1j"></div>
                    <div style="text-align: center; padding-top: 40px;">
                        <button type="submit" class="button-submit btn_apply_contact " >{{trans('frontend.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
@push('after-scripts')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">

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
                    const specialFormat = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]+/;
                    const nameContact = document.getElementById("name_contact").value;

                    if (specialFormat.test(nameContact)) {
                        document.getElementById("text_special--contact").style.visibility = "visible";
                        event.preventDefault()
                        event.stopPropagation()
                    } else {
                        document.getElementById("text_special--contact").style.visibility = "hidden";
                        form.classList.add('was-validated')
                    }
                }, false)
                setInterval(() => {
                    document.getElementById("alert_contact").style.display = "none"
                }, 3000);
            })
    })()
    $("form").submit(function(event) {
        var recaptcha = $("#g-recaptcha-response").val();
        if (recaptcha === "") {
            event.preventDefault();
            alert("Please check the recaptcha");
        }
    });
</script>
@endpush
