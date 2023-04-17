@php
if(!isset($meta_page_type)){
$meta_page_type = 'website';
}
@endphp
@switch($meta_page_type)
@case('website')
<meta property="og:type" content="website" />
@break
@default

@endswitch

<meta property="description" content="@php if($slugUrl=='industries/banking-finance'){
        echo trans('frontend.Banking & Finance des');
    }

    if($slugUrl=='industries/education'){
        echo trans('frontend.Education des');
    }

    if($slugUrl=='industries/enterprise-management'){
        echo trans('frontend.Enterprise Management des');
    }

    if($slugUrl=='industries/healthcare'){
        echo trans('frontend.Healthcare des');
    }
    if($slugUrl=='industries/logistics'){
        echo trans('frontend.Logistics des');
    }
    if($slugUrl=='industries/ecommerce-retail'){
        echo trans('frontend.Ecommerce & Retail des');
    }
    @endphp" />
<meta name="author" content="Tinhvan Software">

<meta property="og:title" content="@php if($slugUrl=='industries/banking-finance'){
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
        @endphp"/>
<meta property="og:url" content="{{$$module_name_singular->meta_og_url ? $$module_name_singular->meta_og_url: url()->current()}}" />
<meta property="og:description" content="{{$$module_name_singular->meta_description}}" />
<meta property="og:image" content="{{ $$module_name_singular->meta_og_image ? $$module_name_singular->meta_og_image : asset('frontend/assets/images/section_1/logo.webp') }}" />
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta name="analytics" content="{{ setting('google_analytics') }}">
<meta name="keywords" content="@php if($slugUrl=='industries/banking-finance'){
        echo trans('frontend.metaKeywordBank');
    }

    if($slugUrl=='industries/education'){
        echo trans('frontend.metaKeywordEducation');
    }

    if($slugUrl=='industries/enterprise-management'){
        echo trans('frontend.metaKeywordEnterprise');
    }

    if($slugUrl=='industries/healthcare'){
        echo trans('frontend.metaKeywordHealthCare');
    }
    if($slugUrl=='industries/logistics'){
        echo trans('frontend.metaKeywordLogictis');
    }
    if($slugUrl=='industries/education'){
        echo trans('frontend.metaKeywordEducation');
    }
    if($slugUrl=='industries/ecommerce-retail'){
        echo trans('frontend.metaKeywordEcommerce');
    }
    @endphp">
<!--canonical link-->
<link type="text/plain" rel="author" href="{{asset('humans.txt')}}" />
<link rel="canonical" href="{{url()->full()}}">
