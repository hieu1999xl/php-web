@extends('frontend.layouts.app')

@section('content')

<section class="section-header bg-primary text-white pb-7 pb-lg-11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h1 class="display-2 mb-4">
                    The Contact CVs
                </h1>
                <p class="lead">
                    We publish articles on a number of topics. We encourage you to read our posts and let us know your feedback. It would be really help us to move forward.
                </p>

                @include('frontend.includes.messages')
            </div>
        </div>
    </div>
    <div class="pattern bottom"></div>
</section>

<section class="section section-lg line-bottom-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{route('frontend.cvs.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" name="username_candidate" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email_candidate" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone_candidate" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label">Vị trí apply</label>
                        <select class="form-control" required name ="position">
                            <option value="Marketing">Marketing</option>
                            <option value="Develop">Develop</option>
                            <option value="HR">HR</option>
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="exampleFormControlTextarea1">Mô tả bản thân</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description_candidate" rows="3"></textarea>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="start-job">Ngày bắt đầu làm việc</label>
                        <input id="datepicker" name="times_start_job"/>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="exampleFormControlFile1">Resume/CV</label>
                        <input type="file" class="form-control-file" name="fileCvs" required>
                    </div>
                    <!-- <div class="mb-3 form-group">
                        <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                        <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                    </div> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="pattern bottom"></div>
</section>
@endsection

@push('after-styles')
<!-- File Manager -->
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('after-scripts')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
    $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

        function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('reCAPTCHA_site_key', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
</script>
@endpush