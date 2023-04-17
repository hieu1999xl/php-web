@php
    $pType = $meta['pType'] ?? $globalMeta['pType'];
    $nDescription = $meta['nDescription'] ?? $globalMeta['nDescription'];
    $pTitle = $meta['pTitle'] ?? $globalMeta['pTitle'];
    $pUrl = $meta['pUrl'] ?? $globalMeta['pUrl'];
    $pDescription = $meta['pDescription'] ?? $globalMeta['pDescription'];
    $pImage = $meta['pImage'] ?? $globalMeta['pImage'];
    $nKeywords = $meta['nKeywords'] ?? $globalMeta['nKeywords'];
    $nAnalytics = $meta['nAnalytics'] ?? $globalMeta['nAnalytics'];
    $linkRel = $meta['linkRel'] ?? $globalMeta['linkRel'];
@endphp
<meta property="og:type" content="{{$pType}}"/>
<meta name="author" content="Tinhvan Software">
<meta name="description" content="{{$nDescription}}">
<meta property="og:title" content="{{ $pTitle }}"/>
<meta property="og:url" content="{{$pUrl}}">
<meta property="og:description" content="{{$pDescription}}">
<meta property="og:image" content="{{$pImage}}">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta name="analytics" content="{{ $nAnalytics }} ">
<meta name="keywords" content="{{ $nKeywords }}">
<meta http-equiv="content-language" content="{{App::getLocale()}}" />
<link type="text/plain" rel="author" href="{{asset('humans.txt')}}"/>
<link rel="canonical" href="{{$pUrl}}">
