@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOShareholder')}} @endsection
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/refactor/shareholder.css')}}">
@endpush
@section('content')
<section class="section_block">
    <div class="container padding_container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="font_weight_700 page_title">{{trans('frontend.information disclosure')}}</h2>
            </div>
            <div class="col-md-12 block_spacing">
                <div id="list_shareholder_infomation">
                    @foreach($dataInformationDis as $record)
                    @php
                    $record->name = $record->dataLocale ? $record->dataLocale->title : $record->name;
                    $record->slug = $record->dataLocale ? $record->dataLocale->slug : $record->slug;
                    @endphp
                    @if($record)
                    <div class="shareholder-item info-item row">
                        <ul class="col-md-10">
                            <li class="listshareholder">
                                <div class="listshareholder">
                                    <h3 class="name_infor font_weight_700">{{$record->name}}</h3>
                                    <p class="time_public">{{$record->published_at}}</p>
                                </div>
                            </li>
                        </ul>
                        @if($record->file)
                        <a class="col-md-2 download_contain" href="{{$record->file? route('frontend.downloadFile',$record->id) :'#'}}">
                            <buton class="buttondownload downloadhere">
                                <p href="{{$record->file?  route('frontend.downloadFile',$record->id) :'#'}}" class="text_download">{{trans('frontend.download')}}</p>
                                </button>
                        </a>
                        @else
                        <button disabled class="buttondownload downloadhere">
                            <a class="text_download_disable">{{trans('frontend.download')}}</a>
                        </button>
                        @endif
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <h2 class="page_title font_weight_700">{{trans('frontend.shareholder documents')}}</h2>
            </div>
            <div class="col-md-12 block_spacing">
                <div id="list_shareholder_document">
                    @foreach($dataShareholderDocuments as $record)
                    @php
                    $record->name = $record->dataLocale ? $record->dataLocale->title : $record->name;
                    @endphp
                    @if($record)
                    <div class="shareholder-item info-item row">
                        <ul class="col-md-10">
                            <li class="listshareholder">
                                <div class="listshareholder">
                                    <h3 class="name_infor font_weight_700">{{$record->name}}</h3>
                                    <p class="time_public">{{$record->published_at}}</p>
                                </div>
                            </li>
                        </ul>
                        @if($record->file)
                        <a class="col-md-2 download_contain" href="{{$record->file?  route('frontend.downloadFile',$record->id) :'#'}}">
                            <buton class="buttondownload downloadhere">
                                <p href="{{$record->file?  route('frontend.downloadFile',$record->id) :'#'}}" class="text_download">{{trans('frontend.download')}}</p>
                                </button>
                        </a>
                        @else
                        <button disabled class="buttondownload downloadhere">
                            <a class="text_download_disable">{{trans('frontend.download')}}</a>
                        </button>
                        @endif
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="page_title font_weight_700">{{trans('frontend.Contact Info')}}</h2>
                <p><strong>{{trans('frontend.secretary')}}</strong></p>
                <p><strong>Email: halpv@tinhvan.com</strong></p>
            </div>
        </div>
    </div>
</section>
@include('frontend.new_layouts.bannerBottom')
@endsection