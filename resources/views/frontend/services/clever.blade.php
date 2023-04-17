@extends('frontend.layouts.app')
@section('title') {{app_name()}} @endsection

@section('content')

@include('frontend.includes.banner')

<section id="clever">
    <div class="container ">
        <div class="row ">
            <div class="col-6 offset-3">
                <h3 class="translation" key="Clever">Clever</h3>
                <h6 class="translation" key="CleverRealt1">
                {{trans('CleverRealt1')}}
                </h6>
                <h5 class="translation" key="CleverReali11"> </h5>
                <h5 class="translation" key="CleverReali12"> </h5>
                <h5 class="translation" key="CleverReali13"> </h5>

                <h6 class="translation" key="CleverRealt2">
     
                </h6>
                <h5 class="translation" key="CleverReali21"> </h5>
                <h5 class="translation" key="CleverReali22"> </h5>
                <h5 class="translation" key="CleverReali23"> </h5>
                <h5 class="translation" key="CleverReali24"> </h5>
                <img style="height: inherit; margin-top:20px;"
                    src="{{ asset('frontend/assets/images/service-detail/clever1.png')}}" alt="a">

                <h6 class="translation" key="CleverRealt3">
        
                </h6>
                <h5 class="translation" key="CleverReali31"> </h5>
                <h5 class="translation" key="CleverReali32"> </h5>

                <h6 class="translation" key="CleverRealt4">
      
                </h6>
                <h5 class="translation" key="CleverReali41"> </h5>

                <h6 class="translation" key="CleverRealt5">
    
                </h6>
                <h5 class="translation" key="CleverReali51"> </h5>
                <h5 class="translation" key="CleverReali52"> </h5>
                <h5 class="translation" key="CleverReali53"> </h5>

                <img style="height: inherit; margin-top:20px;"
                    src="{{ asset('frontend/assets/images/service-detail/clever2.png')}}" alt="a">

                <h6 class="translation" key="CleverRealt6">
         
                </h6>
                <h5 class="translation" key="CleverReali61"> </h5>
                <h5 class="translation" key="CleverReali62"> </h5>
                <h5 class="translation" key="CleverReali63"> </h5>
                <h5 class="translation" key="CleverReali64"> </h5>
                <h5 class="translation" key="CleverReali65"> </h5>
                <h5 class="translation" key="CleverReali66"> </h5>
                <h5 class="translation" key="CleverReali67"> </h5>
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.partner')
@include('frontend.includes.partner-mobile')

@include('frontend.includes.banner-bottom')

@endsection