<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/assets/images/tinhvan software.ico')}}">
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/tinhvan software.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    @include('frontend.new_layouts.meta')
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/tinhvan software.ico')}}">
    <link rel="icon" type="image/ico" href="{{ asset('frontend/assets/images/tinhvan software.ico')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('before-styles')
    @include('frontend.new_layouts.css')
    @stack('after-styles')
</head>
<body>
    <div class="overlay_menu"></div>
    @includeWhen($flagHome ?? true,'frontend.new_layouts.navbar')
    <main>
        @include('frontend.new_layouts.linked')
        @includeWhen($banner['display'] ?? false,'frontend.new_layouts.banner')
        @yield('banner')
        @includeWhen($styles['flagBreadcrumbs'] ?? false,'partials.breadcrumbs')
        @yield('content')
        @includeWhen($styles['displayBanner'] ?? false,'frontend.new_layouts.bannerBottom')
        @include('frontend.includes.new-footer')
    </main>
    <a href="javascript:" id="return-to-top"><span class="chevron_top top"></span></a>
</body>
@stack('before-scripts')
@include('frontend.new_layouts.script')
@stack('after-scripts')
</html>