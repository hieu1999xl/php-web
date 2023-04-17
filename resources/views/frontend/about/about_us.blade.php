@extends('frontend.new_layouts.app')
@section('title') {{trans('frontend.TSOAboutus')}} @endsection
@push('after-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/about_us.css')}}">
@endpush
@section('content')
<section class="section_block" id="about-one">
   <div class="container">
      <div class="row about_one_pc">
         <div class="col-md-6 col-xs-12">
           
               <h2 class="page_title font_weight_700">{{trans('frontend.Business Philosophy')}}</h2>
            
         </div>
         <div class="col-md-6 col-xs-12">
            <p class="about-one-right ">
               {{trans('frontend.utilizes')}}
            </p>
         </div>
      </div>
   </div>
</section>
<section id="quote" class="quotes_bg section_block" >
   <div class="container middle_bg">
      <div class="row">
         <div class="col-12">
            <div class="quote"></div>
            <h3 class="qutes_content font_weight_500 block_spacing">
               {{trans('frontend.talkcontent')}}
            </h3>
            <p class="font_weight_700 ceo_tech text-center text_margin">{{trans('frontend.PhamThucTruongLuong')}}</p>
            <p class="text-center">{{trans('frontend.ceo')}}</p>
         </div>
      </div>
   </div>
</section>
<section class="section_block" id="core-value">
   <div class="container core-value">
      <div class="row core-value--row">
         <div class="col-lg-6 col-sm-12 core-value--order2">
            <div class="container">
               <div class="clients-list">
                  <div class="clients-box">
                     <div class="row">
                        <div class="col-12 nNP core_value--bg">
                           <p class="core-value-info " >
                              {{trans('frontend.corevaluecontent')}}
                           </p>
                           <ul class="core-value-content">
                              <li class="core-value-infor ">{{trans('frontend.corevaluecontent1')}}</li>
                              <li class="core-value-infor ">{{trans('frontend.corevaluecontent2')}}</li>
                              <li class="core-value-infor ">{{trans('frontend.corevaluecontent3')}}</li>
                              <li class="core-value-infor ">{{trans('frontend.corevaluecontent4')}}</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-sm-12 d-flex title_about justify-content-center align-items-center core-value--order1">
               <h2 class="page_title font_weight_700">{{trans('frontend.corevaluetitle')}}</h2>
         </div>
      </div>
   </div>
</section>
<section class="section_block" id="vision">
   <div class="container vision">
      <div class="row">
         <div class="col-lg-6 col-sm-12 d-flex title_about justify-content-center align-items-center">
               <h2 class="page_title font_weight_700">{{trans('frontend.visiontitle')}}</h2>
         </div>
         <div class="col-lg-6 col-sm-12">
            <div class="container">
               <div class="clients-list">
                  <div class="clients-box">
                     <div class="row">
                        <div class="col-12 nNP">
                           <p class="vision-info " >{{trans('frontend.visitioncontent')}}</p>
                           <ul class="core-value-content">
                              <li class="vision-infor ">{{trans('frontend.visitioncontent1')}}</li>
                              <li class=" vision-infor">{{trans('frontend.visitioncontent2')}}</li>
                              <li class=" vision-infor">{{trans('frontend.corevaluecontent3')}}</li>
                              <li class=" vision-infor">{{trans('frontend.visitioncontent4')}}</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section_block" id="ceo_mess">
   <div class="container">
      <div class="row ceo_mess--row">
         <div class="col-lg-7 col-md-12 ceo_mess--order2">
            <div class="box_img_ceo">
               <img class="text_margin" src="{{ asset('frontend/assets/images/about/ceoimg.jpg')}}" alt="{{trans('frontend.mrceo')}}">
               <p class="text-center">{{trans('frontend.mrceo')}}</p>
            </div>
            <div class="box_content">
               <table>
               <caption>{{trans('frontend.mrceo')}}</caption>
                  <tr>
                     <td colspan="2" class="title " >{{trans('frontend.CareerPath')}}</td>
                  </tr>
                  <tr>
                     <td class=" sub_title  font_weight_700" >{{trans('frontend.time2')}}</td>
                     <td  >{{trans('frontend.work2')}}</td>
                  </tr>
                  <tr>
                     <td class=" sub_title  font_weight_700" >{{trans('frontend.time3')}}</td>
                     <td  >{{trans('frontend.work3')}}</td>
                  </tr>
                  <tr>
                     <td class=" sub_title  font_weight_700" >{{trans('frontend.time4')}}</td>
                     <td  >{{trans('frontend.work4')}}</td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700" >{{trans('frontend.time5')}}</td>
                     <td >{{trans('frontend.work5')}}</td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700" >{{trans('frontend.time6')}}</td>
                     <td >{{trans('frontend.work6')}}</td>
                  </tr>
                  <tr>
                     <td class=" sub_title  font_weight_700" >{{trans('frontend.time1')}}</td>
                     <td >{{trans('frontend.work1')}}</td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="col-lg-5 col-md-12 ceo_mess--order1">
            <div class="mt-40">
               <h2 class="page_title font_weight_700 " >{{trans('frontend.CEOMessage')}}</h2>
            </div>
            <div>
               <p >{{trans('frontend.dear')}}</p>
               <p > {{trans('frontend.deartop')}}
               </p>
               <br>
               <p > {{trans('frontend.dearbottom')}}
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section_block" id="fact_sheet">
   <div class="container">
      <div class="row fact_sheet_pc">
         <div class="col-lg-5 col-md-12">
            <div class="mt-40">
               <h2 class="page_title font_weight_700 ">{{trans('frontend.factsheet')}}</h2>
            </div>
         </div>
         <div class="col-lg-7 col-md-12">
            <div class="box_content">
               <table>
               <caption>{{trans('frontend.factsheet')}}</caption>
                  <tr>
                     <td colspan="2" class="title ">{{trans('frontend.facesheettitle')}}
                     </td>
                  </tr>
                   <tr>
                     <td class="sub_title  font_weight_700">{{trans('frontend.facesheetleft6')}}</td>
                     <td>
                        <ul>
                           <li  >{{trans('frontend.Outsourcing Services')}}</li>
                           <li  >{{trans('frontend.Innovation Technologies')}}</li>
                           <li  >{{trans('frontend.Staffing Augmentation')}}</li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700">
                        {{trans('frontend.facesheetleft3')}}
                     </td>
                     <td >
                        {{trans('frontend.facesheetright3')}}
                     </td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700">{{trans('frontend.facesheetleft4')}}</td>
                     <td >{{trans('frontend.facesheetright4')}}</td>
                  </tr>
                  <tr>
                     <td class="sub_title font_weight_700">{{trans('frontend.facesheetleftCEO')}}</td>
                     <td >{{trans('frontend.facesheetright5')}}</td>
                  </tr>
                  <tr>
                     <td class="sub_title   font_weight_700">{{trans('frontend.addresstso')}}</td>
                     <td > 
                        <b class="text_addresstso">{{trans('frontend.facesheetleft1')}} :</b>
                        {{trans('frontend.facesheetright1')}}
                        <b class="text_addresstso">{{trans('frontend.facesheetleft2')}} :</b>
                        {{trans('frontend.facesheetright2')}}
                        <b class="text_addresstso">{{trans('frontend.facesheetleft9')}} :</b>
                        {{trans('frontend.facesheetright9')}}
                     </td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700" >{{trans('frontend.facesheetleft7')}}</td>
                     <td colspan="2" class="sub_title " >{{trans('frontend.facesheetright7')}}</td>
                  </tr>
                  <tr>
                     <td class="sub_title font_weight_700">URL</td>
                     <td><a href="http://tso.vn/" target="_blank">http://tso.vn </a> <br> </td>
                  </tr>
                  <tr>
                     <td class="sub_title  font_weight_700" >{{trans('frontend.facesheetleft8')}}</td>
                     <td><a href="mailto:mkt_tvo@tinhvan.com" >tso@tinhvan.vn</a>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="got-project" class="got-project-overlay section_block">
   <div class="container">
      <div class="row ">
         <div class="col-12">
            <h2 class="page_title font_weight_700 text-center text-white">{{trans('frontend.gotprojtitle')}}</h2>
            <p class="got-project-title">{{trans('frontend.gotprojdecs')}}</p>
            <div class="more text-center">
               <label class="btn-special btn_rounded--circle">
               <span>
               <a href="{{ route('frontend.contact_us') }}"  class="text-white " >{{trans('frontend.gotprojbtn')}}</a>
               <i class="bx bx-plus">
               </i>
               </span>
               </label>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection