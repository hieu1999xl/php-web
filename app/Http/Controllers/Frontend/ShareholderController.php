<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShareholderController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function shareholderPage(Request $request)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_icon = "fas fa-file-alt";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $module_action = 'List';
        $body_class = '';
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $shareholderInfor = 'Information Disclosure';
        $shareholderDocument = 'Shareholder Documents';
        $dataInformationDis = $this->getPostsTag($shareholderInfor);
        $dataShareholderDocuments = $this->getPostsTag($shareholderDocument);
        $breadcrumbs = $this->getBreadcrumbShareholders();
        $styles = $this->getStylesView(trans('frontend.shareholder'), 'pNews');
        $styles['description'] = trans('frontend.shareholder title');
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.Shareholders'),
            'classTitle' => 'title_banner font_weight_700',
            'displayDecription'=>true,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.shareholder title'),
            'displayButonContactUs'=>false,
            'imageMobile'=>asset('frontend/assets/images/banners/bannernews_mobile.webp'),
            'image'=>asset('frontend/assets/images/banners/bannernews.webp')
        ];
        $bannerBottom=[
            'display'=>true,
            'class'=>'section_launch_your_product',
            'classTitle'=>'spacing_text page_title text-center text-white font_weight_700 title_banner',
            'title'=>trans('frontend.Launch Your Product With Us'),
            'description'=>trans('frontend.launchuwithus'),
            'button'=>trans('frontend.contacus'),
            'image'=>asset('frontend/assets/images/news/bnbot.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/bnbot_mobile.webp'),
            'classImage'=>'section_launch_your_product_img'
        ];
        return view('frontend.news.shareholder_page', compact(
            'body_class',
            'module_name',
            'module_title',
            'module_icon',
            'module_action',
            'module_name_singular',
            'dataInformationDis',
            'dataShareholderDocuments',
            'breadcrumbs',
            'styles',
            'banner',
            'bannerBottom'
        ));
    }

    public function shareholder_detail($id)
    {
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $$module_name_singular = $module_model::findOrFail($id);
        $detail = $module_model::with(['dataLocale', 'tags'])->findOrFail($id);
        $detail->name = $detail->dataLocale ? $detail->dataLocale->title : $detail->title;
        $detail->content = $detail->dataLocale ? $detail->dataLocale->body : $detail->content;
        $title_breadcrumb = $$module_name_singular->dataLocale->title;
        $breadcrumbs = $this->getBreadcrumbShareholderDetail($title_breadcrumb);
        $styles = $this->getStylesView(trans('frontend.shareholder'), 'pNews', false, false);
        return view('frontend.news.shareholder_detail', compact('detail', 'module_name_singular', "$module_name_singular", 'breadcrumbs', 'styles'));
    }
}
