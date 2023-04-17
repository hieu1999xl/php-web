<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Article\Constants\MenuConstants;

class IndustryController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function industry_detail(Request $request)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $slugUrl = 'industries/' . $request->slug;
        $slug=$request->slug;
        $data = DB::table('menus')
            ->where('slug', '=', $slugUrl)
            ->orderBy('created_at', 'DESC')
            ->get();
        $$module_name_singular = $data[0];
        $$module_name_singular->meta_title = $data[0]->name;
        $$module_name_singular->meta_description = $data[0]->name;
        $$module_name_singular->meta_og_url = $data[0]->name;
        $$module_name_singular->meta_og_image = $data[0]->name;
        $dataStudiesCase = $this->getCaseStudiesBySlug($slugUrl);
        $body_class = '';
        $titleBreadcrumb = $$module_name_singular->name;
        $breadcrumbs = $this->getBreadcrumbIndustriesDetail($titleBreadcrumb);
        $styles = $this->getStylesView(trans('frontend.' . $titleBreadcrumb), "$titleBreadcrumb langmuti industry_detail_page");
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        // xử lý meta
        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => trans('frontend.metatitle' . $titleBreadcrumb),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.' . $titleBreadcrumb . ' des'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.' . $titleBreadcrumb . ' keyword'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];
        $flagMeta = false;
        $banner = [
            'display' => true,
            'class' => "section_banner_top",
            'title' => trans('frontend.' . $titleBreadcrumb),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription' => true,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.'.$titleBreadcrumb.' des'),
            'displayButon' => false,
            'image'=>asset('frontend/assets/images/banners/'.$slug.'_banner.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/'.$slug.'_mobile.webp'),
            'altImage'=>trans('frontend.' . $titleBreadcrumb)
        ];
        
    
        return view(
            'frontend.industries.industry_detail',
            compact(
                'body_class',
                'module_title',
                'data',
                'module_name',
                'module_name_singular',
                'dataStudiesCase',
                "$module_name_singular",
                'slugUrl',
                'breadcrumbs',
                'styles',
                'flagMeta',
                'meta',
                'banner',
                'filterServices',
                'filterTechnologies',
                'filterIndustries',
            )
        );
    }
}
