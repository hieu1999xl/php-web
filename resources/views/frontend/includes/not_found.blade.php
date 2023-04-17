@extends('frontend.new_layouts.app')
@push('after-styles')
<link rel="stylesheet" href="{{ mix('frontend/assets/css/notfound.css')}}" />
@endpush
@section('content')
<div>
    <div class="error_page">
        <div class="containter">
            <div class="row">
                <div class="col-12">
                    <h2 style="text-align: center; font-size:30px">Error 404 - Page Not Found</h2>
                    <div class="col-12 box-search-body modeSearch">
                        <form id="form_search_body" class="info" action="{{ route('frontend.search_result') }}" method="GET">
                            <input id="searchKeyBody" value="" name="querySearchKey" type="search" placeholder="{{trans('frontend.searchheader')}}">
                            <select id="searchSelectBody" name="querySearchSelect">
                                <option value="news">News</option>
                                <option value="jobs">Jobs</option>
                            </select>
                            <div class="">
                                <button class="button-search">
                                    <img src="<?php echo e(asset('frontend/assets/images/about/search.svg')); ?>" alt="javascript:;">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 text-component">
                    <p class="error__subtitle">Under Construction...</p>
                    <p class="error__description">This page is currently undergoing scheduled maintenance. <br> We
                        should be back shortly. Thank you for your patience.</p>
                    <a href="{{ route('frontend.index') }}">
                        <button class="btn-home">HOME PAGE</button>
                    </a>
                    <a href="{{ route('frontend.contact_us') }}">
                        <button class="btn-contact">CONTACT US</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection