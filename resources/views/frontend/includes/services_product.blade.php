@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/services_product.css')}}">
@endpush
@php
$items_services= App\Models\Menu::where('parent_id', '=', '73')->where('status', '=', '1')->orderBy('order')->get();
$items_inovation= App\Models\Menu::where('parent_id', '=', '74')->where('status', '=', '1')->orderBy('order')->get();
$items_staffing= App\Models\Menu::where('parent_id', '=', '75')->where('status', '=', '1')->orderBy('order')->get();
@endphp
<section class="section_block sevices_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="section_page--subtitle text-center block_spacing_md subtitle_color">{{trans('frontend.whatwedo')}} </p>
                <h2 class="font_weight_700 page_title text-center text-dark">{{trans('frontend.Services&Products')}}</h2>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sevices_product_image_background">
                <div class="sevices_product_opacity">
                    <span class="sevices_product_title font_weight_700">
                        {{trans('frontend.Outsourcing Services')}}
                    </span>
                    <ul>
                        @foreach($items_services as $item)
                        <li>
                            <a class="sevices_product_link" href="/{{$item->slug}}">{{trans('frontend.' . $item->name)}}</a>
                        </li>
                        @endforeach
                    </ul>
                    <a href="/services/outsourcing-services" class="btn sevices_product_button font_weight_500">{{trans('frontend.show_more')}}</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sevices_product_image_background">
                <div class="sevices_product_opacity">
                    <span class="sevices_product_title font_weight_700">
                        {{trans('frontend.Innovation Technologies')}}
                    </span>
                    <ul>
                        <li>
                            <a href="https://datascience.tso.vn/" class="sevices_product_link" target="_blank" rel='noreferrer'>{{trans('frontend.Data Science')}}</a>
                        </li>
                        <li>
                            <a href="https://blockchain.tso.vn/" class="sevices_product_link" target="_blank" rel='noreferrer'>{{trans('frontend.Blockchain')}}</a>
                        </li>
                    </ul>
                    <a href="/services/innovation-technologies" class="btn sevices_product_button font_weight_500">{{trans('frontend.show_more')}}</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sevices_product_image_background">
                <div class="sevices_product_opacity">
                    <span class="sevices_product_title font_weight_700">
                        {{trans('frontend.Staffing Augmentation')}}
                    </span>
                    <ul>
                        @foreach($items_staffing as $item)
                        <li>
                            <a class="sevices_product_link" href="{{ url(app()->getLocale()) }}/{{$item->slug}}">{{trans('frontend.' . $item->name)}}</a>
                        </li>
                        @endforeach
                    </ul>
                    <a href="/services/staffing-augmentation" class="btn sevices_product_button font_weight_500">{{trans('frontend.show_more')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>