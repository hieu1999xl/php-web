@php
if(!isset($meta_page_type)){
    $meta_page_type = 'website';
}
@endphp

@switch($meta_page_type)
    @case('website')
        <meta property="og:type" content="website" />
    @break
@endswitch
<meta name="description" content="{{$$module_name_singular->dataLocale->meta_description==''?$$module_name_singular->dataLocale->meta_description:$$module_name_singular->dataLocale->descrition}}" />
    <meta name="author" content="Tinhvan Software">
    <meta property="og:title" content="{{$$module_name_singular->dataLocale->meta_title==''?$$module_name_singular->dataLocale->title:$$module_name_singular->dataLocale->meta_title}}" />
    <meta property="og:url" content="{{$$module_name_singular->meta_og_url ? $$module_name_singular->meta_og_url: url()->current()}}" />
    <meta property="og:description" content="{{$$module_name_singular->dataLocale->descrition}}" />
    <meta property="og:image" content="{{ $$module_name_singular->meta_og_image ? $$module_name_singular->meta_og_image : asset('frontend/assets/images/section_1/logo.webp') }}" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" >
    <meta name="analytics" content="{{ setting('google_analytics') }}">
    <meta name="keywords" content="{{ $$module_name_singular->dataLocale->meta_keywords }}">
    <!--canonical link-->
    <link type="text/plain" rel="author" href="{{asset('humans.txt')}}" />
    <link rel="canonical" href="{{url()->full()}}">
