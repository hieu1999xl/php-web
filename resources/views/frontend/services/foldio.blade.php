@extends('frontend.layouts.app')
@section('title') {{app_name()}} @endsection

@section('content')

@include('frontend.includes.banner')

<section id="clever">
    <div class="container ">
        <div class="row ">
            <div class="col-6 offset-3">
                <h3 class="translation" key="clevert">
                
                </h3>
                <h6 class="translation" key="clevert1">
                
                </h6>
                <h5 class="translation" key="cleverti1">                
                </h5>
                <h6 class="translation" key="clevert2">
                  
                </h6>
                <h5 class="translation" key="cleverti21">
                </h5>
                <h5 class="translation" key="cleverti22">
                </h5>
                <h5 class="translation" key="cleverti23">
                </h5>
                <h5 class="translation" key="cleverti24">
                </h5>
                <h5 class="translation" key="cleverti25">
                </h5>
                <h5 class="translation" key="cleverti26">
                </h5>
                <!-- <img style="height: inherit; margin-top:20px;" src="{{ asset('frontend/assets/images/service-detail/clever1.png')}}" alt="a"> -->
                <h6 class="translation" key="clevert3">

 
                </h6>
                <h5 class="translation" key="cleverti3">
                </h5>
                <h6 class="translation" key="clevert4">
            
                </h6>
                <h5 class="translation" key="cleverti4"> 
                </h5>
                <h6 class="translation" key="clevert5">
          
                </h6>
                <h5 class="translation" key="cleverti5">

                </h5>
                <!-- <img style="height: inherit; margin-top:20px;" src="{{ asset('frontend/assets/images/service-detail/clever2.png')}}" alt="a"> -->

                <h6 class="translation" key="clevert6">
                
                </h6>
                <h5 class="translation" key="cleverti6"> 
                </h5>
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.partner')
@include('frontend.includes.partner-mobile')

@include('frontend.includes.banner-bottom')

@endsection