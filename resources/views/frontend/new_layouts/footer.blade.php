@php
    $items_menu= App\Models\Menu::where('parent_id', '=', '0')->where('status', '=', '1')->where('order', '>', '0')->orderBy('order')->get();
@endphp
<footer>
    <div class="container">
        <div class="row footer_pc">
            <div class="col-3 space">
                <h3 class="font_weight_700" key="headoff">{{trans('frontend.headoff')}}</h3>
                <p class="translation" key="headadd">{{trans('frontend.headadd')}}</p>
                <p><a href="tel:+842462852502" class="translation " key="telhead1">{{trans('frontend.telhead1')}}</a></p>
                <p><a href="mailto:tso@tinhvan.vn">tso@tinhvan.vn</a></p>
            </div>
            <div class="col-3 space">
                <h3 class="font_weight_700" key="hcnoff">{{trans('frontend.hcnoff')}}</h3>
                <p class="translation" key="hcnadd">{{trans('frontend.hcnadd')}}</p>
                <p><a href="tel:+842838680888" class="translation" key="telhcn1">{{trans('frontend.telhcn1')}}</a></p>
                <p><a href="mailto:hcm@tinhvan.com">hcm@tinhvan.vn</a></p>
            </div>
            <div class="col-3 space">
                <h3 class="font_weight_700" key="tvjapan">{{trans('frontend.tvjapan')}} </h3>
                <p class="translation" key="japanoff">{{trans('frontend.japanoff')}}</p>
                <p><a href="tel:+81364170843" class="translation" key="japantel">{{trans('frontend.japantel')}}</a></p>
                <p><a href="mailto:tso@tinhvan.vn">tso@tinhvan.vn</a></p>
            </div>
            <div class="col-3 right_footer">
                <h3 class="font_weight_700" key="quicklink">{{trans('frontend.quicklink')}}</h3>
                <div class="row">
                    @foreach ($items_menu as $item)
                        @php
                            $url = ($item->name == 'Industries' || $item->name == 'Services' || $item->name == 'About Us') ? '#' :'/'.$item->slug;
                        @endphp
                        <div class="col-6">
                            <span><a href="{{ $url }} " class="translation" key="technologies">{{trans('frontend.' . $item->name)}}</a></span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row footer_mobile">
            <div class="col-12">
                <h3 class="font_weight_700 bold" key="headoff">{{trans('frontend.headoff')}}</h3>
                <p class="translation" key="headadd">{{trans('frontend.headadd')}}</p>
                <p><a class="translation" key="telhead1" href="tel:+842462852502">{{trans('frontend.telhead1')}}</a></p>
                <p><a href="mailto:tso@tinhvan.vn">tso@tinhvan.vn</a></p>
            </div>
            <div class="col-12">
                <h3 class="font_weight_700 bold" key="hcnoff">{{trans('frontend.hcnoff')}}</h3>
                <p class="translation" key="hcnadd">{{trans('frontend.hcnadd')}}</p>
                <p><a href="tel:+842838680888" class="translation" key="telhcn1">{{trans('frontend.telhcn1')}}</a></p>
                <p><a href="mailto:hcm@tinhvan.com">hcm@tinhvan.vn</a></p>
            </div>
            <div class="col-12">
                <h3 class="font_weight_700 bold" key="tvjapan">{{trans('frontend.tvjapan')}} </h3>
                <p class="translation" key="japanoff"> {{trans('frontend.japanoff')}}.</p>
                <p><a href="tel:+81364170843" class="translation" key="japantel">{{trans('frontend.japantel')}}</a></p>
                <p><a href="mailto:tso@tinhvan.vn">tso@tinhvan.vn</a></p>
            </div>
            <div class="col-12 quicklink">
                <h3 class="font_weight_700 bold" key="quicklink">{{trans('frontend.quicklink')}}</h3>
                <div class="row">
                    @foreach ($items_menu as $item)
                        @php
                            $url = ($item->name == 'Industries' || $item->name == 'Services' || $item->name == 'About Us') ? '#' : '/'.$item->slug;
                        @endphp
                        <div class="col-6">
                            <span><a href="{{ $url }} " class="translation" key="technologies">{{trans('frontend.' . $item->name)}}</a></span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row footer_tablet">
            <div class="col-6">
                <h3 class="font_weight_700" key="headoff">{{trans('frontend.headoff')}}</h3>
                <p class="translation" key="headadd">{{trans('frontend.headadd')}}</p>
                <p><a href="tel:+842462852502" class="translation" key="telhead1">{{trans('frontend.telhead1')}}</a></p>
                <p><a href="mailto:tso@tinhvan.vn">tso@tinhvan.vn</a></p>
            </div>
            <div class="col-6">
                <h3 class="font_weight_700" key="hcnoff">{{trans('frontend.hcnoff')}}</h3>
                <p class="translation" key="hcnadd">{{trans('frontend.hcnadd')}}</p>
                <p><a href="tel:+842838680888" class="translation" key="telhcn1">{{trans('frontend.telhcn1')}}</a></p>
                <p><a href="mailto:hcm@tinhvan.com">hcm@tinhvan.vn</a></p>
            </div>
            <div class="col-6">
                <h3 class="font_weight_700" key="tvjapan">{{trans('frontend.tvjapan')}}</h3>
                <p class="translation" key="japanoff">{{trans('frontend.japanoff')}}</p>
                <p><a href="tel:+81364170843" class="translation" key="japantel">{{trans('frontend.japantel')}}</a></p>
                <p><a href="mailto:tso@tinhvan.vn">tso@tinhvan.vn</a></p>
            </div>
            <div class="col-6">
                <h3 class="font_weight_700" key="quicklink">{{trans('frontend.quicklink')}}</h3>
                <div class="row">
                    @foreach ($items_menu as $item)
                        @php
                            $url = ($item->name == 'Industries' || $item->name == 'Services' || $item->name == 'About Us') ? '#' : '/'.$item->slug;
                        @endphp
                        <div class="col-6">
                            <span><a href="{{ $url }} " class="translation" key="technologies">{{trans('frontend.' . $item->name)}}</a></span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <div class="row copyright_pc">
            <div class="col-6">
                <div class="left translation copyright_footer" key="copyright">
                    {{trans('frontend.copyright')}}
                </div>
            </div>
            <div class="col-6">
                <ul class="right">
                    <li><a href="{{ route('frontend.privacy') }}" class="translation" key="privacy">{{trans('frontend.privacy')}}</a></li>
                    <li><a href="{{ route('frontend.contact_us') }}" class="translation" key="contacus">{{trans('frontend.Contact Us')}}</a></li>
                    <li><a href="https://www.google.com/maps/place/C%C3%B4ng+Ty+C%C3%B4ng+Ngh%E1%BB%87+Tinh+V%C3%A2n/@21.001377,105.8028872,18z/data=!3m1!4b1!4m5!3m4!1s0x3135aca328555555:0x742248695acdf0d4!8m2!3d21.001377!4d105.8028872?hl=vi-VN" target="_blank" class="translation" key="sitemap">{{trans('frontend.sitemap')}}</a></li>
                </ul>
            </div>
        </div>
        <div class="row copyright_mobile">
            <div class="col-12">
                <ul class="right">
                    <li><a href="{{ route('frontend.privacy') }}" class="translation" key="privacy">{{trans('frontend.privacy')}}</a></li>
                    <li><a href="{{ route('frontend.contact_us') }}" class="translation" key="contacus">{{trans('frontend.Contact Us')}}</a></li>
                    <li><a href="https://www.google.com/maps/place/C%C3%B4ng+Ty+C%C3%B4ng+Ngh%E1%BB%87+Tinh+V%C3%A2n/@21.001377,105.8028872,18z/data=!3m1!4b1!4m5!3m4!1s0x3135aca328555555:0x742248695acdf0d4!8m2!3d21.001377!4d105.8028872?hl=vi-VN" target="_blank" class="translation" key="sitemap">{{trans('frontend.sitemap')}}</a></li>
                </ul>
            </div>
            <div class="col-12">
                <h3 class="translation copyright_footer" key="copyright">{{trans('frontend.copyright')}}</h3>
            </div>
        </div>
    </div>
</div>
