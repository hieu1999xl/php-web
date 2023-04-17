<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Article\Constants\MenuConstants;
use Modules\Tag\Entities\Tag;

class ServiceController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function services()
    {
        $body_class = '';

        return view('frontend.services.services', compact('body_class'));
    }

    public function services_detail(Request $request)
    {
        $module_name = $this->module_name;
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        
        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $dataNews = $module_model::where('type', 'News')->with(['tags', 'comments', 'language'])->orderBy('created_at', 'DESC')->limit(3)->get();
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbServicesChildLevel3($slug);        
        $styles = $this->getStylesView(trans('frontend.Mobile Application'), 'pMobile');
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);

        //xử lý meta
        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => setting('title'),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.ogDescription'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.Mobile Application Development keyword'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),

        ];


        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.Mobile Solution'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>false,
            'displayButonContactUs'=>false,
            'image'=>asset('frontend/assets/images/server/mobile_image.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/mobile_image_mobile.webp'),
            'altImage'=>trans('frontend.Mobile Solution'),

        ];

        $bannerBottom=[
            'display'=>true,
            'class'=>'section_launch_your_product',
            'classTitle'=>'page_title text-center text-white font_weight_700',
            'title'=>trans('frontend.Launch Your Product With Us'),
            'description'=>trans('frontend.launchuwithus'),
            'buttonContactUs'=>trans('frontend.contacus'),
            'image'=>asset('frontend/assets/images/news/bnbot.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/bnbot_mobile.webp'),
            'classImage'=>'section_launch_your_product_img'
        ];
        return view('frontend.services.services_detail', compact(
            'body_class',
            'dataNews',
            "module_name_singular",
            "dataStudiesCase",
            'breadcrumbs',
            'slug',
            'styles',
            'meta',
            'banner',
            'filterIndustries',
            'filterTechnologies',
            'filterServices',
            'bannerBottom'
        ));
    }

    public function services_maintain()
    {
        $body_class = '';
        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $breadcrumbs = $this->getBreadcrumbServicesChildLevel3($slug);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => trans('frontend.TSOOffshore'),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.ogDescription'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.metaKeywordOffshore'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];

        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.Offshore Dedicated Team'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>false,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.Mobile Solution'),
            'displayButon'=>false,
            'image'=>asset('frontend/assets/images/banners/hero_maintain.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/hero_maintain_mobile.webp'),
            'altImage'=>trans('frontend.Offshore Dedicated Team'),
        ];

        $bannerBottom=[
            'display'=>true,
            'class'=>'section_launch_your_product',
            'classTitle'=>'page_title text-center text-white font_weight_700',
            'title'=>trans('frontend.Launch Your Product With Us'),
            'description'=>trans('frontend.launchuwithus'),
            'buttonContactUs'=>trans('frontend.contacus'),
            'image'=>asset('frontend/assets/images/news/bnbot.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/bnbot_mobile.webp'),
            'classImage'=>'section_launch_your_product_img'
        ];

        return view('frontend.services.maintain', compact('body_class', 'breadcrumbs', 'dataStudiesCase', 'slug','meta','banner','bannerBottom','filterTechnologies','filterServices','filterIndustries'));
    }

    public function services_onsite()
    {
        $body_class = '';
        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $breadcrumbs = $this->getBreadcrumbServicesChildLevel3($slug);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        //xử lý meta
        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => trans('frontend.On-site Resources'),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.ogDescription'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.metaKeywordOnsite'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.On-site Resources'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>false,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.Mobile Solution'),
            'displayButon'=>false,
            'image'=>asset('frontend/assets/images/banners/hero_maintain.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/hero_maintain_mobile.webp'),
            'altImage'=>trans('frontend.On-site Resources'),
        ];
        $bannerBottom=[
            'display'=>true,
            'class'=>'section_launch_your_product',
            'classTitle'=>'page_title text-center text-white font_weight_700',
            'title'=>trans('frontend.Launch Your Product With Us'),
            'description'=>trans('frontend.launchuwithus'),
            'buttonContactUs'=>trans('frontend.contacus'),
            'image'=>asset('frontend/assets/images/news/bnbot.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/bnbot_mobile.webp'),
            'classImage'=>'section_launch_your_product_img'
        ];

        return view('frontend.services.onsite', compact('body_class', 'breadcrumbs', 'slug', 'dataStudiesCase','meta','banner','bannerBottom','filterIndustries', 'filterServices' ,'filterTechnologies'));
    }

    public function outsourcing_services()
    {
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $sub_service = $_SERVER['REQUEST_URI'];
        switch ($sub_service) {
            case str_contains($sub_service, "outsourcing-services"):
                $parent_id = MenuConstants::MENU_OUTSOURCING_SERVICES;
                $content = 'outsourcing services content box';
                $breadcrumbs = $this->getBreadcrumbServicesChildLevel2(MenuConstants::MENU_OUTSOURCING_SERVICES_SLUG);
                //xử lý meta
                $meta = [
                    'pType' => 'website',
                    'nDescription' => trans('frontend.ogDescription'),
                    'pTitle' => setting('title'),
                    'pUrl' => url()->current(),
                    'pDescription' => trans('frontend.ogDescription'),
                    'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
                    'nKeywords' => trans('frontend.metaKeywordoutsoucing'),
                    'nAnalytics' => setting('google_analytics'),
                    'linkRel' => url()->full(),
                ];

                $banner = [
                    'display' => false,
                    'class' => 'section_banner_top',
                    'title' => trans('frontend.Outsourcing Services'),
                    'classTitle' => 'service-ousourcing-title font_weight_700 ',
                    'displayDecription'=>false,
                    'classDecription' => 'service-ousourcing-content block_spacing',
                    'description' => trans('frontend.outsourcingServicesContent'),
                    'displayButton'=>true,
                    'classButton'=>'service-ousourcing-button',
                    'button'=>trans('frontend.Contact'),
                    'image'=>asset('frontend/assets/images/banners/invest-investment.webp'),
                    'imageMobile'=>asset('frontend/assets/images/banners/invest-investment_mobile.webp'),
                    'altImage'=>trans('frontend.Outsourcing Services'),
                ];
                $bannerBottom=[
                    'display'=>false,
                    'class'=>'banner_bottom--index bTech section_block',
                    'classTitle'=>'page_title text-center font_weight_700',
                    'title'=>trans('frontend.GotaProjectinmind?'),
                    'description'=>trans('frontend.donthesitate'),
                    'button'=>trans('frontend.contacus'),
                    'image'=>asset('frontend/assets/images/tech_screen/bgmid2.webp'),
                    'imageMobile'=>asset('frontend/assets/images/tech_screen/bgmid2_mobile.webp'),
                    'classImage'=>'bg_tech--img',
                    'display_got'=>true,
                ];
                break;
            case str_contains($sub_service, "innovation-technologies"):
                $parent_id = MenuConstants::MENU_INNOVATION_TECHNOLOGIES;
                $content = 'inovation technologies content box';
                $breadcrumbs = $this->getBreadcrumbServicesChildLevel2(MenuConstants::MENU_INNOVATION_TECHNOLOGIES_SLUG);
                //xử lý meta
                $meta = [
                    'pType' => 'website',
                    'nDescription' => trans('frontend.ogDescription'),
                    'pTitle' => setting('title'),
                    'pUrl' => url()->current(),
                    'pDescription' => trans('frontend.ogDescription'),
                    'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
                    'nKeywords' => trans('frontend.metaKeywordInnovation'),
                    'nAnalytics' => setting('google_analytics'),
                    'linkRel' => url()->full(),
                ];
                $banner = [
                    'display' => false,
                    'class' => 'section_banner_top',
                    'title' => trans('frontend.Innovation Technologies'),
                    'classTitle' => 'service-ousourcing-title font_weight_700 ',
                    'displayDecription'=>false,
                    'classDecription' => 'service-ousourcing-content block_spacing',
                    'description' => trans('frontend.InnovationTechnologiesContent'),
                    'displayButton'=>true,
                    'classButton'=>'service-ousourcing-button',
                    'button'=>trans('frontend.Contact'),
                    'image'=>asset('frontend/assets/images/banners/invest-investment.webp'),
                    'imageMobile'=>asset('frontend/assets/images/banners/invest-investment_mobile.webp'),
                    'altImage'=>trans('frontend.Innovation Technologies'),
                ];
                $bannerBottom=[
                    'display'=>false,
                    'class'=>'banner_bottom--index bTech section_block',
                    'classTitle'=>'page_title text-center font_weight_700',
                    'title'=>trans('frontend.GotaProjectinmind?'),
                    'description'=>trans('frontend.donthesitate'),
                    'button'=>trans('frontend.contacus'),
                    'image'=>asset('frontend/assets/images/tech_screen/bgmid2.webp'),
                    'imageMobile'=>asset('frontend/assets/images/tech_screen/bgmid2_mobile.webp'),
                    'classImage'=>'bg_tech--img',
                    'display_got'=>true,
                ];
                break;

            case str_contains($sub_service, "staffing-augmentation"):
                $parent_id = MenuConstants::MENU_STAFFING_AUGMENTATION;
                $content = 'staffing augmenttation content box';
                $breadcrumbs = $this->getBreadcrumbServicesChildLevel2(MenuConstants::MENU_STAFFING_AUGMENTATION_SLUG);
                //xử lý meta
                $meta = [
                    'pType' => 'website',
                    'nDescription' => trans('frontend.ogDescription'),
                    'pTitle' => setting('title'),
                    'pUrl' => url()->current(),
                    'pDescription' => trans('frontend.ogDescription'),
                    'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
                    'nKeywords' => trans('frontend.metaKeywordStaff'),
                    'nAnalytics' => setting('google_analytics'),
                    'linkRel' => url()->full(),
                ];
                $banner = [
                    'display' => false,
                    'class' => 'section_banner_top',
                    'title' => trans('frontend.Staffing Augmentation'),
                    'classTitle' => 'service-ousourcing-title font_weight_700',
                    'displayDecription'=>false,
                    'classDecription' => 'service-ousourcing-content block_spacing',
                    'description' => trans('frontend.StaffingAugmentationContent'),
                    'displayButton'=>true,
                    'classButton'=>'service-ousourcing-button',
                    'button'=>trans('frontend.Contact'),
                    'image'=>asset('frontend/assets/images/banners/invest-investment.webp'),
                    'imageMobile'=>asset('frontend/assets/images/banners/invest-investment_mobile.webp'),
                    'altImage'=>trans('frontend.Staffing Augmentation'),
                ];
                $bannerBottom=[
                    'display'=>false,
                    'class'=>'banner_bottom--index bTech section_block',
                    'classTitle'=>'page_title text-center font_weight_700',
                    'title'=>trans('frontend.GotaProjectinmind?'),
                    'description'=>trans('frontend.donthesitate'),
                    'button'=>trans('frontend.contacus'),
                    'image'=>asset('frontend/assets/images/tech_screen/bgmid2.webp'),
                    'imageMobile'=>asset('frontend/assets/images/tech_screen/bgmid2_mobile.webp'),
                    'classImage'=>'bg_tech--img',
                    'display_got'=>true,
                ];
                break;
            default:
                $parent_id = MenuConstants::MENU_OUTSOURCING_SERVICES;
        }
        $menuIds = Menu::where('parent_id', $parent_id)->where('status', 1)->pluck('id');
        $tags = Tag::whereIn('menu_id', $menuIds)->where('status', 1)->get();
        $tagIds = $tags->pluck('id');
        $dataStudiesCase = $this->getCaseStudiesWhenClickDetail($tagIds);
        $inovation = array("datascience", "blockchain");
        $staffing = array("offshore-dedicated-team", "on-site-resources");
        $child_services = Menu::where('parent_id', $parent_id)->get();

        $item_url_child = DB::table('menus')->where('parent_id', '=', $parent_id)->where('status', '=', '1')->orderBy('order')->get();

        $items_services = DB::table('menus')->where('parent_id', '=', '73')->where('status', '=', '1')->orderBy('order')->get();
        $items_inovation = DB::table('menus')->where('parent_id', '=', '74')->where('status', '=', '1')->orderBy('order')->get();
        $items_staffing = DB::table('menus')->where('parent_id', '=', '75')->where('status', '=', '1')->orderBy('order')->get();
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);

        $body_class = '';

        return view('frontend.services.outsourcing_services',
            compact('body_class',
                'items_services',
                'items_inovation',
                'items_staffing',
                'child_services',
                'content',
                'item_url_child',
                'inovation',
                'staffing',
                'breadcrumbs',
                'parent_id',
                'dataStudiesCase',
                'tagIds',
                'meta',
                'banner',
                'filterServices',
                'filterTechnologies',
                'filterIndustries',
                'bannerBottom'
            ));
    }
    public function services_product()
    {
        $body_class = '';

        return view('frontend.services.services_product', compact('body_class'));
    }

    public function services_legacy()
    {
        $module_name = $this->module_name;
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);

        $body_class = '';
        $nameLegacy = 'Legacy System Migration';

        
        $body_class = '';
        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $breadcrumbs = $this->getBreadcrumbServicesChildLevel3($slug);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);

        // xử lý meta
        $styles = $this->getStylesView(trans('frontend.' . $nameLegacy), 'pLegacy');
        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => setting('title'),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.ogDescription'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.Legacy System Migration keyword'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.Legacy System Migration'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>false,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.Mobile Solution'),
            'displayButon'=>false,
            'image'=>asset('frontend/assets/images/banners/lagacy_image.webp'),
            'imageMobile'=>asset('frontend/assets/banners/lagacy_image_mobile.webp'),
            'altImage'=>trans('frontend.Legacy System Migration'),
        ];
        $bannerBottom=[
            'display'=>true,
            'class'=>'section_launch_your_product',
            'classTitle'=>'page_title text-center text-white font_weight_700',
            'title'=>trans('frontend.Launch Your Product With Us'),
            'description'=>trans('frontend.launchuwithus'),
            'buttonContactUs'=>trans('frontend.contacus'),
            'image'=>asset('frontend/assets/images/news/bnbot.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/bnbot_mobile.webp'),
            'classImage'=>'section_launch_your_product_img'
        ];
        return view('frontend.services.legacy', compact('body_class',            
            "module_name_singular",
            "dataStudiesCase",
            'breadcrumbs',
            'slug',
            'styles',
            'meta',
            'banner',
            'filterIndustries',
            'filterTechnologies',
            'filterServices',
            'bannerBottom'
        ));
    }

    public function services_enterprise()
    {
        $module_name = $this->module_name;
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);

        $body_class = '';       

        $body_class = '';
        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $breadcrumbs = $this->getBreadcrumbServicesChildLevel3($slug);
        $styles = $this->getStylesView(trans('frontend.Custom Software Development'), 'pEnterprise');
        $flagMeta=false;
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);

        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => setting('title'),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.ogDescription'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.Custom Software Development keyword'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];

        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.Custom Software Development'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>false,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.Mobile Solution'),
            'displayButon'=>false,
            'image'=>asset('frontend/assets/images/banners/hero_enterprise.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/hero_enterprise_mobile.webp'),
            'altImage'=>trans('frontend.Custom Software Development'),
        ];
        $bannerBottom=[
            'display'=>true,
            'class'=>'section_launch_your_product',
            'classTitle'=>'page_title text-center text-white font_weight_700',
            'title'=>trans('frontend.Launch Your Product With Us'),
            'description'=>trans('frontend.launchuwithus'),
            'buttonContactUs'=>trans('frontend.contacus'),
            'image'=>asset('frontend/assets/images/news/bnbot.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/bnbot_mobile.webp'),
            'classImage'=>'section_launch_your_product_img'
        ];
        return view('frontend.services.enterprise', compact(
            'body_class',
            "module_name_singular",
            "dataStudiesCase",
            'breadcrumbs',
            'slug',
            'styles',
            'meta',
            'banner',
            'filterTechnologies',
            'filterServices',
            'filterIndustries',
            'bannerBottom'
        ));
    }

    public function services_testing()
    {
        $module_name = $this->module_name;
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);

        $body_class = '';
        $body_class = '';
        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $breadcrumbs = $this->getBreadcrumbServicesChildLevel3($slug);
        $styles = $this->getStylesView(trans('frontend.Testing Services'), 'pTesting');
        $flagMeta=false;
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        //xử lý meta
        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => setting('title'),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.ogDescription'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.Software Testing keyword'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];
        $banner = [
            'display' => true,
            'id' => 'hero',
            'class' => 'section_banner_top',
            'title' => trans('frontend.Testing Services'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>false,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.Mobile Solution'),
            'displayButonContactUs'=>false,
            'image'=>asset('frontend/assets/images/banners/hero_testing.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/hero_testing_mobile.webp'),
            'altImage'=>trans('frontend.Testing Services'),
        ];
        $bannerBottom=[
            'display'=>true,
            'class'=>'section_launch_your_product',
            'classTitle'=>'page_title text-center text-white font_weight_700',
            'title'=>trans('frontend.Launch Your Product With Us'),
            'description'=>trans('frontend.launchuwithus'),
            'buttonContactUs'=>trans('frontend.contacus'),
            'image'=>asset('frontend/assets/images/news/bnbot.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/bnbot_mobile.webp'),
            'classImage'=>'section_launch_your_product_img'
        ];
        return view('frontend.services.testing', compact('body_class',
            "module_name_singular",
            "dataStudiesCase",
            'breadcrumbs',
            'slug',
            'styles',
            'meta',
            'banner',
            'filterIndustries',
            'filterTechnologies',
            'filterServices',
            'bannerBottom'
        ));
    }

    public function clever()
    {
        $body_class = '';

        return view('frontend.services.clever', compact('body_class'));
    }

    public function foldio()
    {
        $body_class = '';

        return view('frontend.services.foldio', compact('body_class'));
    }
}
