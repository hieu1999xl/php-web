<?php

namespace App\Http\Controllers\Frontend;

use App\Constants\CaseStudyConstants;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Traits\BreadcrumbFrontendTrait;
use App\Models\Traits\CaseStudiesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Modules\Article\Constants\MenuConstants;

class CaseStudyController extends Controller
{
    use BreadcrumbFrontendTrait;
    use CaseStudiesTrait;
    protected $banner;

    public function __construct()
    {
        $this->banner =  $this->getStylesView(trans('frontend.case_studies'), 'pSuccess');
        $this->banner['description'] = trans('frontend.banner success content');
    }

    public function getCaseStudies(Request $request)
    {
        $tagIds = Session::get('tagIds');
        if ($tagIds) {
            return $this->showDataCaseStudiesByTagsWhenSearch($tagIds);
        }
        if ($request->tagid) {
            $tagId = $request->tagid;
            return $this->showDataCaseStudiesByTag($tagId);
        }
        if ($request->technologyId) {
            $tagId = $request->technologyId;
            return $this->showDataCaseStudiesTechnologyByTag($tagId);
        }
        $type = $request->type_case_studies;
        switch ($type) {
            case CaseStudyConstants::VIEW_HOME:
                return $this->showCaseStudiesHome($request);
            case CaseStudyConstants::VIEW_SERVICES:
                $moreProject = json_decode($request->tagIds);
                return $this->showCaseStudiesMoreProjectServices($moreProject);
            case CaseStudyConstants::VIEW_SERVICES_CHILD:
                $slug = $request->slug;
                return $this->showCaseStudiesMoreProjectServicesBySlug($slug);
            case CaseStudyConstants::VIEW_INDUSTRY:
                $industryName = $request->industryName;
                return $this->showCaseStudiesMoreProjectIndustryByIndustryName($industryName);
            case CaseStudyConstants::VIEW_DETAIL:
                $moreTagIdsDetail = $request->moreTagIdsDetail;
                return $this->showCaseStudiesMoreDetail($moreTagIdsDetail);
            default:
                return $this->showCaseStudiesHome($request);
        }
    }

    private function showCaseStudiesMoreDetail($moreTagIdsDetail)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $filterTechnologiesSelected = [];
        $filterIndustriesSelected = [];
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $ids = array_merge($filterServices->pluck('id')->toArray(), $filterIndustries->pluck('id')->toArray(), $filterTechnologies->pluck('id')->toArray());
        $data_search_case_studies = $this->getCaseStudiesMenuChild($ids);
        $ids = json_decode($moreTagIdsDetail);
        $data_case_studies = $this->getCaseStudiesMenuChild($ids);

        $filterServicesSelected = array_intersect($ids, $filterServices->pluck('id')->toArray());
        $filterServicesSelected = json_encode(array_values($filterServicesSelected));
        $filterTechnologiesSelected = array_intersect($ids, $filterTechnologies->pluck('id')->toArray());
        $filterTechnologiesSelected = json_encode(array_values($filterTechnologiesSelected));
        $filterIndustriesSelected = array_intersect($ids, $filterIndustries->pluck('id')->toArray());
        $filterIndustriesSelected = json_encode(array_values($filterIndustriesSelected));

        $$module_name_singular = $data_case_studies;
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbCaseStudy();
        $styles = $this->getStylesView("", "");
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.case_studies'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>true,
            'classDecription' => 'description_banner block_spacing',
            'description' => trans('frontend.banner success content'),
            'displayButton'=>false,
            'buttonCase'=>true,
            'button'=> trans('frontend.talktous'),
            'image'=>asset('frontend/assets/images/success/banner_image.png'),
            'imageMobile'=>asset('frontend/assets/images/success/banner_image.png'),
            'altImage'=>trans('frontend.case_studies'),
        ];
        
        return view('frontend.case-studies.case_studies', compact(
            'body_class',
            "$module_name_singular",
            'module_name_singular',
            'filterServices',
            'filterTechnologies',
            'filterIndustries',
            'breadcrumbs',
            'filterServicesSelected',
            'filterTechnologiesSelected',
            'filterIndustriesSelected',
            'data_search_case_studies',
            'banner', 
            'styles',
        ));
    }

    private function showDataCaseStudiesTechnologyByTag($tagId)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        //  Get data case studies
        $ids = array_merge($filterServices->pluck('id')->toArray(), $filterIndustries->pluck('id')->toArray(), $filterTechnologies->pluck('id')->toArray());
        $data_case_studies = $this->getDataCaseStudiesByIds([$tagId]);
        $data_search_case_studies = $this->getCaseStudiesMenuChild($ids);

        //  Get filter selected
        $filterServicesSelected = json_encode([]);
        $filterIndustriesSelected = json_encode([]);
        $filterTechnologiesSelected = json_encode([$tagId]);
        $$module_name_singular = $data_case_studies;
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbCaseStudy();
        $styles = $this->getStylesView("", "langmuti");
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.case_studies'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>true,
            'classDecription' => 'description_banner block_spacing',
            'description' => trans('frontend.banner success content'),
            'displayButton'=>false,
            'buttonCase'=>true,
            'button'=> trans('frontend.talktous'),
            'image'=>asset('frontend/assets/images/success/banner_image.png'),
            'imageMobile'=>asset('frontend/assets/images/success/banner_image.png'),
            'altImage'=>trans('frontend.case_studies'),
        ];
        
        return view('frontend.case-studies.case_studies', compact(
            'body_class',
            "$module_name_singular",
            'module_name_singular',
            'filterServices',
            'filterTechnologies',
            'filterIndustries',
            'breadcrumbs',
            'filterServicesSelected',
            'filterTechnologiesSelected',
            'filterIndustriesSelected',
            'data_search_case_studies',
            'filterServices',
            'filterIndustries',
            'filterTechnologies',
            'banner',
            'styles',
        ));
    }

    private function showCaseStudiesMoreProjectIndustryByIndustryName($industryName)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $ids = array_merge($filterServices->pluck('id')->toArray(), $filterIndustries->pluck('id')->toArray(), $filterTechnologies->pluck('id')->toArray());
        $data_search_case_studies = $this->getCaseStudiesMenuChild($ids);
        $menu = Menu::where('name', $industryName)->where('status', 1)->first();
        $ids = isset($menu->tag) ? [$menu->tag->id] : [];
        Session::forget('tagIds');
        Session::put('tagIds',$ids);
        $ids =  Session::get('tagIds');
        $data_case_studies = $this->getCaseStudiesMenuChild($ids);
        $filterServicesSelected = json_encode([]);
        $filterTechnologiesSelected = json_encode([]);
        $filterIndustriesSelected = json_encode($ids);
        $$module_name_singular = $data_case_studies;
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbCaseStudy();
        $styles = $this->getStylesView("", "langmuti");
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.case_studies'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>true,
            'classDecription' => 'description_banner block_spacing',
            'description' => trans('frontend.banner success content'),
            'displayButton'=>false,
            'buttonCase'=>true,
            'button'=> trans('frontend.talktous'),
            'image'=>asset('frontend/assets/images/success/banner_image.png'),
            'imageMobile'=>asset('frontend/assets/images/success/banner_image.png'),
            'altImage'=>trans('frontend.case_studies'),
        ];
        return view('frontend.case-studies.case_studies', compact(
            'body_class',
            "$module_name_singular",
            'module_name_singular',
            'filterServices',
            'filterTechnologies',
            'filterIndustries',
            'breadcrumbs',
            'filterServicesSelected',
            'filterTechnologiesSelected',
            'filterIndustriesSelected',
            'data_search_case_studies',
            'banner',
            'styles',
        ));
    }

    private function showCaseStudiesMoreProjectServicesBySlug($slug)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $ids = array_merge($filterServices->pluck('id')->toArray(), $filterIndustries->pluck('id')->toArray(), $filterTechnologies->pluck('id')->toArray());
        $data_search_case_studies = $this->getCaseStudiesMenuChild($ids);
        $menu = Menu::where('slug', $slug)->where('status', 1)->first();
        $ids = isset($menu->tag) ? [$menu->tag->id] : [];
        $data_case_studies = $this->getCaseStudiesMenuChild($ids);
        Session::forget('tagIds');
        Session::put('tagIds',$ids);
        $ids =  Session::get('tagIds');
        $filterServicesSelected = json_encode($ids);
        $filterTechnologiesSelected = json_encode([]);
        $filterIndustriesSelected = json_encode([]);
        $$module_name_singular = $data_case_studies;
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbCaseStudy();
        $styles = $this->getStylesView("", "langmuti");
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.case_studies'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>true,
            'classDecription' => 'description_banner block_spacing',
            'description' => trans('frontend.banner success content'),
            'displayButton'=>false,
            'buttonCase'=>true,
            'button'=> trans('frontend.talktous'),
            'image'=>asset('frontend/assets/images/success/banner_image.png'),
            'imageMobile'=>asset('frontend/assets/images/success/banner_image.png'),
            'altImage'=>trans('frontend.case_studies'),
        ];
        return view('frontend.case-studies.case_studies', compact(
            'body_class',
            "$module_name_singular",
            'module_name_singular',
            'filterServices',
            'filterTechnologies',
            'filterIndustries',
            'breadcrumbs',
            'filterServicesSelected',
            'filterTechnologiesSelected',
            'filterIndustriesSelected',
            'data_search_case_studies',
            'banner',
            'styles',
        ));
    }

    private function showCaseStudiesHome(Request $request)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $filterServicesSelected = json_encode([]);
        $filterTechnologiesSelected = json_encode([]);
        $filterIndustriesSelected = json_encode([]);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $ids = array_merge($filterServices->pluck('id')->toArray(), $filterIndustries->pluck('id')->toArray(), $filterTechnologies->pluck('id')->toArray());
        $data_search_case_studies = $this->getDataCaseStudiesByIds($ids);
        $data_case_studies = $this->getDataCaseStudiesByIds($ids);
        $$module_name_singular = $data_case_studies;
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbCaseStudy();
        $styles = $this->getStylesView("", "langmuti");
        $meta= [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' =>trans('frontend.TSOCaseStudies'),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.ogDescription'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.keywordWeb'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.case_studies'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>true,
            'classDecription' => 'description_banner block_spacing',
            'description' => trans('frontend.banner success content'),
            'displayButton'=>false,
            'buttonCase'=>true,
            'button'=> trans('frontend.talktous'),
            'image'=>asset('frontend/assets/images/success/banner_image.png'),
            'imageMobile'=>asset('frontend/assets/images/success/banner_image.png'),
            'altImage'=>trans('frontend.case_studies'),
        ];
        return view('frontend.case-studies.case_studies', compact(
            'body_class',
            "$module_name_singular",
            'module_name_singular',
            'filterServices',
            'filterTechnologies',
            'filterIndustries',
            'breadcrumbs',
            'filterServicesSelected',
            'filterTechnologiesSelected',
            'filterIndustriesSelected',
            'data_search_case_studies',
            'banner',
            'meta',
            'styles',
        ));
    }

    public function showCaseStudiesMoreProjectServices($moreProject)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $ids = array_merge($filterServices->pluck('id')->toArray(), $filterIndustries->pluck('id')->toArray(), $filterTechnologies->pluck('id')->toArray());
        $data_search_case_studies = $this->getCaseStudiesMenuChild($ids);
        $ids = $moreProject;
        $data_case_studies = $this->getCaseStudiesMenuChild($ids);
        $filterServicesSelected = json_encode($ids);
        $filterTechnologiesSelected = json_encode([]);
        $filterIndustriesSelected = json_encode([]);
        $$module_name_singular = $data_case_studies;
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbCaseStudy();
        $styles = $this->getStylesView("", "langmuti");
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.case_studies'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>true,
            'classDecription' => 'description_banner block_spacing',
            'description' => trans('frontend.banner success content'),
            'displayButton'=>false,
            'buttonCase'=>true,
            'button'=> trans('frontend.talktous'),
            'image'=>asset('frontend/assets/images/success/banner_image.png'),
            'imageMobile'=>asset('frontend/assets/images/success/banner_image.png'),
            'altImage'=>trans('frontend.case_studies'),
        ];
        return view('frontend.case-studies.case_studies', compact(
            'body_class',
            "$module_name_singular",
            'module_name_singular',
            'filterServices',
            'filterTechnologies',
            'filterIndustries',
            'breadcrumbs',
            'filterServicesSelected',
            'filterTechnologiesSelected',
            'filterIndustriesSelected',
            'data_search_case_studies',
            'banner',
            'styles',
        ));
    }

    public function showDataCaseStudiesByTag($tagId)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $ids = array_merge($filterServices->pluck('id')->toArray(), $filterIndustries->pluck('id')->toArray(), $filterTechnologies->pluck('id')->toArray());
        $data_search_case_studies = $this->getDataCaseStudiesByIds($ids);
        $data_case_studies = $this->getDataCaseStudiesByIds([$tagId]);
        $filterServicesSelected = json_encode([]);
        $filterTechnologiesSelected = json_encode([]);
        $filterIndustriesSelected = json_encode([]);
        if (array_intersect([$tagId], $filterTechnologies->pluck('id')->toArray())) {
            $filterTechnologiesSelected = json_encode([$tagId]);
        }
        if (array_intersect([$tagId], $filterServices->pluck('id')->toArray())) {
            $filterServicesSelected = json_encode([$tagId]);
        }
        if (array_intersect([$tagId], $filterIndustries->pluck('id')->toArray())) {
            $filterIndustriesSelected = json_encode([$tagId]);
        }
        $$module_name_singular = $data_case_studies;
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbCaseStudy();
        $styles = $this->getStylesView("", "langmuti");
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.case_studies'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>true,
            'classDecription' => 'description_banner block_spacing',
            'description' => trans('frontend.banner success content'),
            'displayButton'=>false,
            'buttonCase'=>true,
            'button'=> trans('frontend.talktous'),
            'image'=>asset('frontend/assets/images/success/banner_image.png'),
            'imageMobile'=>asset('frontend/assets/images/success/banner_image.png'),
            'altImage'=>trans('frontend.case_studies'),
        ];
        return view('frontend.case-studies.case_studies', compact(
            'body_class',
            "$module_name_singular",
            'module_name_singular',
            'filterServices',
            'filterTechnologies',
            'filterIndustries',
            'breadcrumbs',
            'filterServicesSelected',
            'filterTechnologiesSelected',
            'filterIndustriesSelected',
            'data_search_case_studies',
            'banner',
            'styles',
        ));
    }

    public function showDataCaseStudiesByTagsWhenSearch($tagIds)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $ids = array_merge($filterServices->pluck('id')->toArray(), $filterIndustries->pluck('id')->toArray(), $filterTechnologies->pluck('id')->toArray());
        $data_search_case_studies = $this->getDataCaseStudiesByIds($ids);
        $data_case_studies = $this->getDataCaseStudiesByIds($tagIds);;
        $filterServicesSelected = array_intersect($tagIds, $filterServices->pluck('id')->toArray());
        $filterServicesSelected = json_encode(array_values($filterServicesSelected));
        $filterTechnologiesSelected = array_intersect($tagIds, $filterTechnologies->pluck('id')->toArray());
        $filterTechnologiesSelected = json_encode(array_values($filterTechnologiesSelected));
        $filterIndustriesSelected = array_intersect($tagIds, $filterIndustries->pluck('id')->toArray());
        $filterIndustriesSelected = json_encode(array_values($filterIndustriesSelected));


        

        $$module_name_singular = $data_case_studies;
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbCaseStudy();
        $styles = $this->getStylesView("", "langmuti");

        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.case_studies'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>true,
            'classDecription' => 'description_banner block_spacing',
            'description' => trans('frontend.banner success content'),
            'displayButton'=>false,
            'buttonCase'=>true,
            'button'=> trans('frontend.talktous'),
            'image'=>asset('frontend/assets/images/success/banner_image.png'),
            'imageMobile'=>asset('frontend/assets/images/success/banner_image.png'),
            'altImage'=>trans('frontend.case_studies'),
        ];
        return view('frontend.case-studies.case_studies', compact(
            'body_class',
            "$module_name_singular",
            'module_name_singular',
            'filterServices',
            'filterTechnologies',
            'filterIndustries',
            'breadcrumbs',
            'filterServicesSelected',
            'filterTechnologiesSelected',
            'filterIndustriesSelected',
            'data_search_case_studies',
            'banner',
            'styles',
        ));
    }

    public function getCaseStudyDetail(Request $request)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_icon = "fas fa-file-alt";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $module_action = 'List';
        $dataDetail = $module_model::where('id', $request->id)->with(['dataLocale', 'tags.menu'])->where('status', 1)->first();
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $tagServices = [];
        $tagIndustries = [];
        $tagTechnologies = [];
        foreach ($dataDetail->tags->toArray() as $tag) {
            if (in_array($tag['id'], $filterServices->pluck('id')->toArray())) {
                $tagServices[] = $tag;
            }
            if (in_array($tag['id'], $filterTechnologies->pluck('id')->toArray())) {
                $tagTechnologies[] = $tag;
            }
            if (in_array($tag['id'], $filterIndustries->pluck('id')->toArray())) {
                $tagIndustries[] = $tag;
            }
        }
        
        $$module_name_singular = $dataDetail;
        $body_class = '';
        $title_breadcrumb = $$module_name_singular->dataLocale->title;
        $breadcrumbs = $this->getActiveMenuAndBreadcrumb($title_breadcrumb)['breadcrumb'];
        $styles = $this->getStylesView(trans('frontend.' . $title_breadcrumb), "$title_breadcrumb langmuti");
        $active_menu = $this->getActiveMenuAndBreadcrumb($title_breadcrumb)['active_menu'];
        $moreTagIdsDetail = $dataDetail->tags->pluck('id');
        $dataStudiesCase = $this->getCaseStudiesWhenClickDetail($moreTagIdsDetail);
        $meta= [
            'pType' => 'website',
            'nDescription' => $$module_name_singular->dataLocale->meta_description,
            'pTitle' =>$$module_name_singular->dataLocale->meta_title,
            'pUrl' => url()->current(),
            'pDescription' => $$module_name_singular->dataLocale->meta_description,
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => $$module_name_singular->dataLocale->meta_keywords,
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.case_studies'),
            'classTitle' => 'font_weight_700 title_banner',
            'displayDecription'=>true,
            'classDecription' => 'description_banner block_spacing',
            'description' => trans('frontend.banner success content'),
            'displayButton'=>false,
            'buttonCase'=>true,
            'button'=> trans('frontend.talktous'),
            'image'=>asset('frontend/assets/images/success/banner_image.png'),
            'imageMobile'=>asset('frontend/assets/images/success/banner_image.png'),
            'altImage'=>trans('frontend.case_studies'),
        ];
        return view(
            'frontend.case-studies.case_study_detail',
            compact('body_class',
                'module_title',
                'module_name',
                'tagServices',
                'tagIndustries',
                'tagTechnologies',
                'module_action',
                'module_name_singular',
                "$module_name_singular",
                'breadcrumbs',
                'active_menu',
                'dataStudiesCase',
                'moreTagIdsDetail',
                'filterTechnologies',
                'filterIndustries',
                'filterServices',
                'moreTagIdsDetail',
                'banner',
                'meta',
                'styles',
            )
        );
    }

    public function getActiveMenuAndBreadcrumb($title_breadcrumb)
    {
        $active_menu = Session::get('menu_parent');
        $menu_child = Session::get('menu_child');
        $slug = $active_menu . '/' . $menu_child;
        $menu_service_level2 = $this->getMenuServicesLevel2();
        foreach ($menu_service_level2 as $menu) {
            if ($slug == $menu->slug) {
                $breadcrumb = $this->getBreadcrumbOutsourcingServiceCaseStudyDetail($slug, $title_breadcrumb);
                return ['active_menu' => $active_menu, 'breadcrumb' => $breadcrumb];
            }
        }
        switch ($active_menu) {
            case MenuConstants::MENU_SERVICES_SLUG:
                $breadcrumb = $this->getBreadcrumbServicesCaseStudyDetail($slug, $title_breadcrumb);
                break;
            case MenuConstants::MENU_INDUSTRIES_SLUG:
                $breadcrumb = $this->getBreadcrumbIndustriesCaseStudyDetail($slug, $title_breadcrumb);
                break;
            case MenuConstants::MENU_TECHNOLOGIES_SLUG:
                $breadcrumb = $this->getBreadcrumbTechnologiesCaseStudyDetail($title_breadcrumb);
                break;
            default:
                $breadcrumb = $this->getBreadcrumbCaseStudies($title_breadcrumb);
        }
        return ['active_menu' => $active_menu, 'breadcrumb' => $breadcrumb];
    }

    public function addFilterSession(Request $request)
    {
        $dataFilters = $request->filters;
        Session::put('tagIds', $dataFilters);
        return response()->json(Session::get('tagIds'));
    }

    public function removeFilterSession()
    {
        Session::forget('tagIds');
        Session::get('tagIds');
        $flag = Session::get('tagIds');;
        return response()->json($flag);
    }
}
