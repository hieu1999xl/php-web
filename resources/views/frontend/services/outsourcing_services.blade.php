@extends('frontend.new_layouts.app') @section('title')

@if(Request::getPathInfo()=='/en/services/outsourcing-services'|| Request::getPathInfo()=='/ja/services/outsourcing-services'|| Request::getPathInfo()=='/vi/services/outsourcing-services')
{{trans('frontend.titleOutsourcing')}}
@endif

@if(Request::getPathInfo()=='/en/services/innovation-technologies'|| Request::getPathInfo()=='/ja/services/innovation-technologies'|| Request::getPathInfo()=='/vi/services/innovation-technologies')
{{trans('frontend.titleInnovation')}}
@endif

@if(Request::getPathInfo()=='/en/services/staffing-augmentation'|| Request::getPathInfo()=='/ja/services/staffing-augmentation'|| Request::getPathInfo()=='/vi/services/staffing-augmentation')
{{trans('frontend.TSOStaffingResource')}}
@endif
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/services_outsourcing.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/banner_launch_your_product.css')}}">
@endpush
@endsection @section('content')
@include('frontend.new_layouts.banner')
@include('partials.breadcrumbs')
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/banner.css')}}">
@endpush
<section class="section_block section_outsourcing">
	<div class="container">
		<div class="row section_outsourcing--row block_spacing">
			<div class="col-lg-6 col-md-6 col-xs-12 text-center">
				@if(Request::getPathInfo()=='/en/services/outsourcing-services'|| Request::getPathInfo()=='/ja/services/outsourcing-services'|| Request::getPathInfo()=='/vi/services/outsourcing-services')
				<img src="{{ asset('frontend/assets/images/outsourcing_services/Frame.webp')}}" alt="outsourcing-services" class="img_section--outsourcing" />
				@elseif(Request::getPathInfo()=='/en/services/innovation-technologies'|| Request::getPathInfo()=='/ja/services/innovation-technologies'|| Request::getPathInfo()=='/vi/services/innovation-technologies')
				<img src="{{ asset('frontend/assets/images/outsourcing_services/LayerInnovation.webp')}}" alt="innovation-technologies" class="img_section--outsourcing" />
				@elseif(Request::getPathInfo()=='/en/services/staffing-augmentation'|| Request::getPathInfo()=='/ja/services/staffing-augmentation'|| Request::getPathInfo()=='/vi/services/staffing-augmentation')
				<img src="{{ asset('frontend/assets/images/outsourcing_services/LayerStaff.webp')}}" alt="staffing-augmentation" class="img_section--outsourcing" />
				@endif
				
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12">
				<p class="section_outsourcing--content font_weight_600">
					{{trans('frontend.' . $content)}}
				</p>
			</div>
		</div>
		<php echo $body_class ?>
			<div class="row">
				<div class="col-12">
					<h2 class="font_weight_700 page_title page_title_services text-center">{{trans('frontend.Service Offerings')}}</h2>
				</div>
			</div>
			<div class="options_outsourcing container">
				@foreach($item_url_child as $item)
				@php
				$addClass = count($item_url_child) > 2 ? 'service_many' : 'service_two';
				$url = str_contains($item->slug, 'https://') ? $item->slug : url(app()->getLocale()).'/'.$item->slug;
				@endphp
				<a href="{{$url}}" class="option option_service {{$addClass}} serviceID_{{$parent_id}}">
					<div class="label">
						<h3 class="font_weight_700">{{trans('frontend.' . $item->name)}}</h3>
					</div>
				</a>
				@endforeach
			</div>
		</php>
	</div>
</section>
<!-- end section -->
@include('frontend.includes.services_product')
<!-- include services -->
<script>
	if (window.innerWidth > 912) {
		$('.option.service_many').hover(function() {
			$('.option.service_many').css('width', 'calc(50% / 3)');
			$(this).css('width', 'calc(100% / 2)');
		})
	}
</script>
@include('frontend.new_layouts.bannerBottom')
@include('frontend.includes.partner')
@include('frontend.includes.partner-mobile')
@include('frontend.case-studies.case_study',['display' => count($dataStudiesCase) > 0, 'dataStudiesCase' => $dataStudiesCase, 'classSection' => 'section_study1', 'type_case_studies' => \App\Constants\CaseStudyConstants::VIEW_SERVICES])
@endsection
</php>