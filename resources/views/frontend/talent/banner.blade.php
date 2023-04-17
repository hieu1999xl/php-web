<section id="hero" class="bg_talent">
    <div class="container component_search_talent">
        <div class="row middle_search_talent">
            <div class="col-12">
                <div class="form-search">
                    <input type="text"  name="searchKey" id="input-search" placeholder="{{trans('frontend.talensearch')}}" />
                    <button class="btn-round btn-purple" id="search">{{trans('frontend.search')}}</button>
                    <img id="iconsearch" src="{{ asset('frontend/assets/images/talent/iconsearch.svg')}}" loading="lazy" alt="search talent" />
                </div>
            </div>
            <div class="col-12">
                <p>
                    @foreach($hots as $hot)
                    <a href="{{ route('frontend.talent_detail',[$hot->id, $hot->slug])}}"><span>{{$hot->job_name}}</span></a>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</section>