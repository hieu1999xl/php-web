@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOTvj')}} @endsection
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/tvj.css')}}">
@endpush

@section('content')

<section class="section_block" id="tvj">
   <div class="container">
      <div class="row fact_sheet_pc">
         <div class="col-lg-5 col-md-12">
            <div class="mt-40">
               <h2 class="page_title font_weight_700 ">{{trans('frontend.tvjt')}}</h2>
               <img src="{{ asset('frontend/assets/images/about/our_story_banner.png')}}" alt="{{trans('frontend.tvjt')}}">
            </div>
         </div>
         <div class="col-lg-7 col-md-12">
            <div class="box_content">
               <table>
               <caption>{{trans('frontend.factsheet')}}</caption>
                  <tr>
                     <td colspan="2" class="title ">{{trans('frontend.tvjName')}}
                     </td>
                  </tr>
                   <tr>
                     <td class="sub_title  font_weight_700">{{trans('frontend.tvjAddress')}}</td>
                     <td>
                        <ul>
                           <li  >{{trans('frontend.tvjAddress1')}}</li>
                           <li  >{{trans('frontend.tvjAddress2')}}</li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700">
                        {{trans('frontend.tvjCeo')}}
                     </td>
                     <td >
                        {{trans('frontend.tvjCeo1')}}
                     </td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700">{{trans('frontend.tvjDate')}}</td>
                     <td >{{trans('frontend.tvjDate1')}}</td>
                  </tr>
                  <tr>
                     <td class="sub_title font_weight_700">{{trans('frontend.tvjStaff')}}</td>
                     <td >{{trans('frontend.tvjStaff1')}}</td>
                  </tr>
                  <tr>
                     <td class="sub_title   font_weight_700">{{trans('frontend.tvjBusiness')}}</td>
                     <td > 
                     <ul>
                           <li  >{{trans('frontend.tvjBusiness1')}}</li>
                           <li  >{{trans('frontend.tvjBusiness2')}}</li>
                           <li  >{{trans('frontend.tvjBusiness3')}}</li>
                           <li  >{{trans('frontend.tvjBusiness4')}}</li>
                           <li  >{{trans('frontend.tvjBusiness5')}}</li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700" >{{trans('frontend.tvjCompany')}}</td>
                     <td colspan="2" class="sub_title " > 
                        <ul>
                           <li  >{{trans('frontend.tvjCompany1')}}</li>
                           <li  >{{trans('frontend.tvjCompany2')}}</li>
                           <li  >{{trans('frontend.tvjCompany3')}}</li>
                           <li  >{{trans('frontend.tvjCompany4')}}</li>
                           <li  >{{trans('frontend.tvjCompany5')}}</li>
                        </ul>
                    </td>
                  </tr>
                  <tr>
                     <td class="sub_title font_weight_700">{{trans('frontend.tvjLink')}}</td>
                     <td>
                     <ul>
                           <li  >{{trans('frontend.tvjLink1')}}</li>
                           <li  >{{trans('frontend.tvjLink2')}}</li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td class="sub_title font_weight_700">URL</td>
                     <td><a href="https://tso.vn/ja/about-us/tvj" target="_blank">https://tso.vn/ja/about-us/tvj </a> <br> </td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700" >{{trans('frontend.facesheetleft8')}}</td>
                     <td><a href="mailto:mkt_tvo@tinhvan.com" >tso@tinhvan.vn</a>
                     </td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700" >{{trans('frontend.tvjPhone')}}</td>
                     <td>
                     (+81) 3 6417 0843
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
@include('frontend.case-studies.case_study',['display' => count($dataStudiesCase) > 0, 'dataStudiesCase' => $dataStudiesCase, 'classSection' => 'section_study1','type_case_studies' =>\App\Constants\CaseStudyConstants::VIEW_TVJ])

@endsection
