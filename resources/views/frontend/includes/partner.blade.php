@push ('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/partner.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/slick.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/slick-theme.min.css')}}">
@endpush
@php
$items_logo = App\Models\ImgUpload::where('type', '=', '2')->get();
@endphp
<section class="section_block">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="page_title text-center font_weight_700 text-dark">{{trans('frontend.our_partner')}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 listbrand2">
                @foreach($items_logo as $item)
                <div class="img-box_partner">
                    @if($item->image =='public/imgupload/brand5.png')
                    <img src="{{ url($item->image)}}" alt="{{$item->title}}" />
                    @else
                    <img class="img_partner--tech" src="{{url($item->image)}}" alt="{{$item->title}}" />
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@push ('after-scripts')
<script src="{{ asset('frontend/assets/js/slick.min.js')}}"></script>
<script>
    $('.listbrand2').slick({
        infinite: true,
        autoplay: true,
        slidesToShow: 7,
        speed: 500,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 2,
                    infinite: true,
                }
            },
            {
                breakpoint: 340,
                settings: {
                    slidesToShow: 1,
                    infinite: true,
                }
            },
        ]
    });
</script>
@endpush