<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/assets/images/favicon.ico')}}">
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @php if($slugUrl=='industries/banking-finance'){
        echo trans('frontend.titleBank');
        }

        if($slugUrl=='industries/education'){
        echo trans('frontend.titleEducation');
        }

        if($slugUrl=='industries/enterprise-management'){
        echo trans('frontend.titleEnterprise');
        }

        if($slugUrl=='industries/healthcare'){
        echo trans('frontend.titleHealthCare');
        }
        if($slugUrl=='industries/logistics'){
        echo trans('frontend.titleLogictis');
        }
        if($slugUrl=='industries/ecommerce-retail'){
        echo trans('frontend.titleEcommerce');
        }
        @endphp
    </title>

    @include('frontend.includes.detailIndustry')

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/fsavicon.ico')}}">
    <link rel="icon" type="image/ico" href="{{ asset('frontend/assets/images/favicon.ico')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('before-styles')

    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('css/breadcrumb.css') }}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" title="" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" title="" href="{{ asset('frontend/assets/css/slick.min.css')}}">
    <link rel="stylesheet" type="text/css" title="" href="{{ asset('frontend/assets/css/slick-theme.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/services.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/reset.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/styles.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/services_detail.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/news.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/talent.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/pagination.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/new-footer.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/technology.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/footer-responsive.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/technology-responsive.css')}}">
    <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/talent.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/success-store.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/about.css')}}">
    <link rel="stylesheet" type="text/css" title="" href="{{ asset('frontend/assets/css/responsive.css')}}">


    @stack('after-styles')

    <x-google-analytics config="{{ setting('google_analytics') }}" />
</head>

<body>
    <div class="overlay_menu"></div>
    <div class="container-fluid social_talk">
        <nav class="social">
            <ul>
                <li id="fb"><a href="https://www.facebook.com/tuyendung.software" target="_blank" rel="noopener noreferrer">Facebook <i class="fab fa-facebook-f"></i></a></li>
                <li id="link"><a href="https://linkedin.com/company/tinhvan-software/" target="_blank" rel="noopener noreferrer">Linkedin<i class="fab fa-linkedin-in"></i></a></li>
                <li id="email"><a href="mailto:hrtvo@tinhvan.com">E-mail <i class="fas fa-envelope"></i></a></li>
            </ul>
        </nav>
    </div>
    <!-- <div class="join-us talk">Let’s talk</div> -->
    {{-- <x-preloader />--}}
    @include('frontend.includes.header')
    <main>
        @yield('content')
    </main>

    @include('frontend.includes.new-footer')
    <a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>
    {{-- <script type="text/javascript" src="vendors/scrolloverflow.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>

<!-- Scripts -->
@stack('before-scripts')

<script src="{{ asset('js/frontend.js') }}"></script>

<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/pagination.min.js')}}"></script>
<!-- APP SCRIPT -->
<script src="{{ asset('frontend/assets/js/styles.js')}}"></script>
<script src="{{ asset('frontend/assets/js/counter.js')}}"></script>

@stack('after-scripts')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QEPCW2T2F4"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-QEPCW2T2F4');
</script>
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/21853224.js"></script>
<!-- End of HubSpot Embed Code -->

</html>
