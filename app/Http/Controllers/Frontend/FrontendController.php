<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Traits\BreadcrumbFrontendTrait;
use App\Models\Traits\CaseStudiesTrait;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Modules\Article\Constants\MenuConstants;

class FrontendController extends Controller
{
    use BreadcrumbFrontendTrait;
    use CaseStudiesTrait;

    protected $module_title;
    protected $module_name;
    protected $module_path;
    protected $module_icon;
    protected $module_model;
    protected $module_img_upload;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Posts';

        // module name
        $this->module_name = 'posts';

        // directory path of the module
        $this->module_path = 'posts';

        // module icon
        $this->module_icon = 'fas fa-file-alt';

        // module model name, path
        $this->module_model = "Modules\Article\Entities\Post";

        //uploadimg mode
        $this->module_img_upload = "App\Models\ImgUpload";
    }

    public function index()
    {
        $module_name = $this->module_name;
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $model_img_upload = $this->module_img_upload;

        $nameMobileApp = 'Mobile Application Development';
        $nameMaintenance = 'Resources Staffing';
        $nameLegacy = 'Legacy System Migration';
        $nameEnterprise = 'Custom Software Development';
        $nameTesting = 'Software Testing';

        $module_title = "Posts";
        $module_name = "posts";
        $module_icon = "fas fa-file-alt";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $module_action = 'List';
        $newEvents = 'Events news';
        $body_class = '';

        $module_model = "Modules\Article\Entities\Post";
        $module_model_subMenu = "App\Models\Menu";
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $dataStudiesCase = $this->getCaseStudiesOfHome();
        $postNewEvents = DB::table('taggables')->where('tag_id', 140)->pluck('taggable_id');
        $dataHomeNews = $module_model::whereIn('id', $postNewEvents)
            ->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['tags', 'comments', 'dataLocale'])->orderBy('published_at', 'DESC')->limit(3)->get();
        $listSlide = $model_img_upload::where('type', '=', 0)->with('dataLocale')->get();
        // use for slide in home page
        $listSlide = $model_img_upload::where('type', '=', 0)->with('dataLocale')->orderBy('oder')->get();
        $dataNewsEvents = $module_model::where('type', 'News')->with(['dataLocale'])->orderBy('published_at', 'DESC')->limit(3)->get();
        $menuTechnologies = Menu::where('parent_id', MenuConstants::MENU_TECHNOLOGIES)->where('status', 1)->orderBy('order', 'asc')->get();
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $meta= [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' =>trans('frontend.Homepage'),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.ogDescription'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.metaKeywordHomepage'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
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
        return view('frontend.index', compact(
            'body_class',
            'module_name_singular',
            'listSlide',
            'module_action',
            // 'dataHomeNews',
            'dataNewsEvents',
            'menuTechnologies',
            'dataStudiesCase',
            'filterServices',
            'filterTechnologies',
            'filterIndustries',
            'bannerBottom',
            'meta'
        ));
    }

    function vn_str_filter($str)
    {
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );

        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return $str;
    }

    public function convertSlug()
    {
        $lang = "App\Models\languages";
        $dataLang = $lang::select('id', 'title', 'slug')->get();
        foreach ($dataLang as $dl) {
            $title = $this->vn_str_filter($dl->title);
            $title = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F-\x9F]/u', '', $title);
            $dl->slug = strtolower(str_replace([' ', '  ', '   ', '.'], '-', $title));
            $dl->save();
        }
        dd($dataLang->toArray());
    }

    public function apiMutilangHomePage()
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_icon = "fas fa-file-alt";
        $module_model = "App\Models\languages";
        $model_img_upload = "App\Models\ImgUpload";


        $dataTitle = $model_img_upload::where('type', '=', 0)->with(['language' => function ($q) {
            $q->where('type', '=', 2);
        }])->get();
        return response()->json(['result' => $dataTitle]);
    }

    /**
     * Privacy Policy Page
     *
     * @return \Illuminate\Http\Response
     */
    // public function privacy()
    // {
    //     $body_class = '';

    //     return view('frontend.privacy', compact('body_class'));
    // }

    /**
     * Terms & Conditions Page
     *
     * @return \Illuminate\Http\Response
     */
    // public function terms()
    // {
    //     $body_class = '';

    //     return view('frontend.terms', compact('body_class'));
    // }

    // Services controller /

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

        $body_class = '';
        $nameMobileApp = 'Mobile Application Development';
        $nameMaintenance = 'Resources Staffing';
        $nameLegacy = 'Legacy System Migration';
        $nameEnterprise = 'Custom Software Development';
        $nameTesting = 'Software Testing';

        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbServicesChildLevel3($slug);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        return view('frontend.services.services_detail', compact(
                'body_class',
                "module_name_singular",
                "dataStudiesCase",
                'breadcrumbs',
                'slug',
                'filterServices',
                'filterIndustries',
                'filterTechnologies'
            )
        );
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
        return view('frontend.services.maintain', compact('body_class', 'breadcrumbs', 'dataStudiesCase', 'slug', 'filterServices', 'filterTechnologies', 'filterIndustries'));
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
        return view('frontend.services.onsite', compact('body_class', 'breadcrumbs', 'slug', 'dataStudiesCase', 'filterServices', 'filterTechnologies', 'filterIndustries'));
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
                break;
            case str_contains($sub_service, "innovation-technologies"):
                $parent_id = MenuConstants::MENU_INNOVATION_TECHNOLOGIES;
                $content = 'inovation technologies content box';
                $breadcrumbs = $this->getBreadcrumbServicesChildLevel2(MenuConstants::MENU_INNOVATION_TECHNOLOGIES_SLUG);
                break;
            case str_contains($sub_service, "staffing-augmentation"):
                $parent_id = MenuConstants::MENU_STAFFING_AUGMENTATION;
                $content = 'staffing augmenttation content box';
                $breadcrumbs = $this->getBreadcrumbServicesChildLevel2(MenuConstants::MENU_STAFFING_AUGMENTATION_SLUG);
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
                'filterTechnologies',
                'filterIndustries',
                'filterServices'
            ));
    }

    public function dedicated_team()
    {
        $body_class = '';

        return view('frontend.services.dedicated_team', compact('body_class'));
    }

    public function services_product()
    {
        $body_class = '';

        return view('frontend.services.services_product', compact('body_class'));
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

    public function news(Request $request)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_icon = "fas fa-file-alt";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $newEvents = 'Events';
        $newEdge = 'DX News';
        $newGioBUG = 'Gio BUG';
        $lang = app()->getLocale();

        $body_class = '';
        $dataNewsEvent = $this->getPostsTagByNew($newEvents);
        $dataCuttingEdgeNews = $this->getPostsTagByNew($newEdge);
        $dataGioBugNews = $this->getPostsTagByNew($newGioBUG);
        $breadcrumbs = [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.news'), '#')];
        return view('frontend.news.news', compact('body_class', 'lang', 'module_name', 'module_title', 'module_icon', 'module_action', 'module_name_singular', 'dataNewsEvent', 'dataCuttingEdgeNews', 'dataGioBugNews', 'breadcrumbs'));
    }

    public function news_detail($id)
    {
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $dataDetail = $module_model::where('id', '=', $id)->with(['dataLocale'])->first();
        $$module_name_singular = $dataDetail;
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $tagId = DB::table('taggables')->where('taggable_id', $dataDetail->id)->first();
        $dataRelatedIds = DB::table('taggables')->where('tag_id', $tagId->tag_id)->pluck('taggable_id');
        $dataRelated = $module_model::whereIn('id', $dataRelatedIds)
            ->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->where('id', '!=', $dataDetail->id)
            ->with(['dataLocale'])
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get();
        $body_class = '';
        $title_breadcrumb = $$module_name_singular->dataLocale->title;
        $breadcrumbs = $this->getBreadcrumbNewDetail($title_breadcrumb);
        return view('frontend.news.detail', compact('body_class', 'module_name_singular', 'dataRelated', "$module_name_singular", 'breadcrumbs'));
    }

    public function case_study_detail($id)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_icon = "fas fa-file-alt";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';
        $dataDetail = $module_model::where('id', '=', $id)->with(['dataLocale', 'tags.menu'])->first();
        $tagServices = [];
        $tagIndustries = [];
        $tagTechnologies = [];

        // filter tags
        foreach ($dataDetail->tags as $item) {
            if (str_contains($item->menu->slug, 'services') || str_contains($item->menu->slug, 'blockchain') || str_contains($item->menu->slug, 'datascience')) {
                array_push($tagServices, $item);
            }
            if (str_contains($item->menu->slug, 'industries')) {
                array_push($tagIndustries, $item);
            }
            if (str_contains($item->menu->slug, 'technologies')) {
                array_push($tagTechnologies, $item);
            }
        }
        $$module_name_singular = $dataDetail;
        $body_class = '';
        $title_breadcrumb = $$module_name_singular->dataLocale->title;
        $breadcrumbs = $this->getActiveMenuAndBreadcrumb($title_breadcrumb)['breadcrumb'];
        $active_menu = $this->getActiveMenuAndBreadcrumb($title_breadcrumb)['active_menu'];
        return view(
            'frontend.case_study_detail',
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
                'active_menu')
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

    public function industry_detail(Request $request)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $slugUrl = 'industries/' . $request->slug;
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
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        return view(
            'frontend.industry_detail',
            compact(
                'body_class',
                'module_title',
                'data',
                'module_name',
                'module_name_singular',
                'dataStudiesCase',
                "$module_name_singular",
                'slugUrl',
                'filterIndustries',
                'filterServices',
                'filterTechnologies',
                'breadcrumbs')
        );
    }

    public function services_legacy()
    {
        $module_name = $this->module_name;
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);

        $body_class = '';
        $nameMobileApp = 'Mobile Application Development';
        $nameMaintenance = 'Resources Staffing';
        $nameLegacy = 'Legacy System Migration';
        $nameEnterprise = 'Custom Software Development';
        $nameTesting = 'Software Testing';

        $body_class = '';
        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $breadcrumbs = $this->getBreadcrumbServicesChildLevel3($slug);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        return view('frontend.services.legacy', compact('body_class',
            "module_name_singular",
            "dataStudiesCase",
            'breadcrumbs',
            'filterIndustries',
            'filterServices',
            'filterTechnologies',
            'slug'
        ));
    }

    public function services_enterprise()
    {
        $module_name = $this->module_name;
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);

        $body_class = '';
        $nameMobileApp = 'Mobile Application Development';
        $nameMaintenance = 'Resources Staffing';
        $nameLegacy = 'Legacy System Migration';
        $nameEnterprise = 'Custom Software Development';
        $nameTesting = 'Software Testing';

        $body_class = '';
        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $breadcrumbs = $this->getBreadcrumbServicesChildLevel3($slug);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        return view('frontend.services.enterprise', compact('body_class',
            "module_name_singular",
            "dataStudiesCase",
            'breadcrumbs',
            'slug',
            'filterTechnologies',
            'filterServices',
            'filterIndustries'
        ));
    }

    public function services_testing()
    {
        $module_name = $this->module_name;
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);

        $body_class = '';
        $nameMobileApp = 'Mobile Application Development';
        $nameMaintenance = 'Resources Staffing';
        $nameLegacy = 'Legacy System Migration';
        $nameEnterprise = 'Custom Software Development';
        $nameTesting = 'Software Testing';

        $body_class = '';
        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $breadcrumbs = $this->getBreadcrumbServicesChildLevel3($slug);
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        return view('frontend.services.testing', compact(
            'body_class',
            "module_name_singular",
            "dataStudiesCase",
            'breadcrumbs',
            'slug',
            'filterIndustries',
            'filterServices',
            'filterTechnologies'
        ));
    }


    // Technology controller

    public function technology_detail()
    {
        $body_class = '';

        return view('frontend.technologys.technology_detail', compact('body_class'));
    }

    public function technology()
    {
        $module_model_img = $this->module_img_upload;
        $imgRandoms = $module_model_img::where('type', '=', 1)->inRandomOrder()->limit(3)->get();
        $module_name = $this->module_name;
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $model_img_upload = $this->module_img_upload;
        $nameMobileApp = 'Mobile Application Development';
        $nameMaintenance = 'Resources Staffing';
        $nameLegacy = 'Legacy System Migration';
        $nameEnterprise = 'Custom Software Development';
        $nameTesting = 'Software Testing';

        $module_model = "Modules\Article\Entities\Post";
        $module_model_subMenu = "App\Models\Menu";

        // Begin get data studies case in techology page
        $tagName = 'Technologies';
        $dataStudiesCase = $this->getDataCaseStudiesByName($tagName);
        // End get data studies case in techology page
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbTechnologies();
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        return view('frontend.technologys.technology', compact(
            'body_class',
            'imgRandoms',
            'dataStudiesCase',
            "module_name_singular",
            'breadcrumbs',
            'filterTechnologies',
            'filterServices',
            'filterIndustries'
        ));
    }

    public function technology_micro()
    {
        $body_class = '';

        return view('frontend.technologys.technology_micro', compact('body_class'));
    }

    public function technology_opensource()
    {
        $body_class = '';

        return view('frontend.technologys.opensource', compact('body_class'));
    }

    public function technology_mobile()
    {
        $body_class = '';

        return view('frontend.technologys.mobile', compact('body_class'));
    }

    public function technology_QA()
    {
        $body_class = '';

        return view('frontend.technologys.technology_QA', compact('body_class'));
    }

    public function technology_frontend()
    {
        $body_class = '';

        return view('frontend.technologys.technology_frontend', compact('body_class'));
    }

    public function not_found()
    {
        $body_class = '';
        return view('frontend.includes.not_found', compact('body_class'));
    }

    public function privacy()
    {
        $body_class = '';
        return view('frontend.includes.privacy', compact('body_class'));
    }



    public function search_result()
    {
        $body_class = '';
        return view('frontend.includes.search_result', compact('body_class'));
    }

    public function submit_email()
    {
        $body_class = '';
        return view('frontend.about.submit_email', compact('body_class'));
    }


    public function getAllSuccessApi()
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_icon = "fas fa-file-alt";
        $module_model = "Modules\Article\Entities\Post";
        $module_model_subMenu = "App\Models\Menu";
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $data = $module_model::where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['tags', 'language'])
            ->orderBy('created_at', 'DESC')
            ->get();
        return response()->json(['result' => $data]);
    }

    public function getItemSuccess($id)
    {
        # code...
        $module_title = "Posts";
        $module_name = "posts";
        $module_icon = "fas fa-file-alt";
        $module_model = "Modules\Article\Entities\Post";
        $module_model_subMenu = "App\Models\Menu";
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $data = $module_model::where('id', $id)
            ->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->orderBy('published_at', 'DESC')
            ->with(['tags', 'language'])
            ->get();
        return response()->json(['result' => $data]);
    }

    public function searchHomePage(Request $request)
    {
        $module_model_post = "Modules\Article\Entities\Post";
        $module_model_jobs = "App\Models\Job";

        $selectNews = 'news';
        $selectJobs = 'jobs';
        $selectgiobug = 'giobug';
        $giobugnew = 'Gio Bug New';
        $lang = app()->getLocale();

        $search_text = $_GET['querySearchKey'];
        $search_select = $_GET['querySearchSelect'];

        if ($search_select == $selectNews) {
            $data = DB::table('posts')
                ->where('status', 1)
                ->whereNull('deleted_at')
                ->join('languages', 'posts.id', '=', 'languages.prefer_id')
                ->where(function($q) use($lang, $search_text) {
                    $q->where('languages.language', '=', "$lang");
                })
                ->where(function($q) use($lang, $search_text) {
                    $q->where('languages.title', 'LIKE', "%{$search_text}%")
                      ->orwhere('languages.descrition', 'LIKE', "%{$search_text}%");
                })
                ->orderBy('posts.created_at', 'DESC')
                ->get();
            $count = count($data);
            $breadcrumbs = $this->getBreadcrumbSearch();
            $banner = [
                'display' => false,
                'class' => 'section_banner_top',
                'title' => trans('frontend.Mobile Solution'),
                'classTitle' => 'font_weight_700 title_banner',
                'displayDecription'=>false,
                'displayButonContactUs'=>false,
                'image'=>asset('frontend/assets/images/banners/bgtalent.webp'),
                'imageMobile'=>asset('frontend/assets/images/banners/bgtalentmb.webp'),
                'altImage'=>trans('frontend.Mobile Solution'),
                'displaySearch'=>true
            ];
            return view('frontend.includes.search_result', compact('data', 'count','breadcrumbs','banner'));
        }
        if ($search_select == $selectJobs) {
            $dataJobs = DB::table('jobs')
                ->where('jobs.status', 1)
                ->join('languages_job', 'jobs.id', '=', 'languages_job.job_id')
                ->where(function($q) use($lang, $search_text) {
                    $q->where('languages_job.language', '=', "$lang");
                })
                ->where(function($q) use($lang, $search_text) {
                    $q->where('languages_job.job_name', 'LIKE', "%{$search_text}%")
                      ->orwhere('languages_job.job_description', 'LIKE', "%{$search_text}%");
                })
                ->orderBy('jobs.created_at', 'DESC')
                ->get();
            $count = count($dataJobs);
            $breadcrumbs = $this->getBreadcrumbSearch();
            $banner = [
                'display' => false,
                'class' => 'section_banner_top',
                'title' => trans('frontend.Mobile Solution'),
                'classTitle' => 'font_weight_700 title_banner',
                'displayDecription'=>false,
                'displayButonContactUs'=>false,
                'image'=>asset('frontend/assets/images/banners/bgtalent.webp'),
                'imageMobile'=>asset('frontend/assets/images/banners/bgtalentmb.webp'),
                'altImage'=>trans('frontend.Mobile Solution'),
                'displaySearch'=>true
            ];
            return view('frontend.includes.search_result', compact('dataJobs', 'count', 'lang','breadcrumbs','banner'));
        }
    }

    public function sendMail(Request $request)
    {
        $detail = [
            'name' => $request->fullName,
            'email' => $request->email,
            'description_Organization' => $request->description_Organization,
            'description' => $request->description,
        ];
        // send mail contact us
        // Mail::to($request->email)->send(new ContactMail($detail));
        return back()->with('msg', 'You has been sent mail success');
    }

    public function indexApi()
    {
        $module_model = "Modules\Article\Entities\Post";

        $newEvents = 'Events news';
        $newEdge = 'Dx News';
        $newGioBUG = 'Gio Bug New';
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $postNewEvents = DB::table('taggables')->where('tag_id', 140)->pluck('taggable_id');
        $data = $module_model::whereIn('id', $postNewEvents)
            ->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['tags', 'comments', 'language'])->orderBy('published_at', 'DESC')->limit(3)->get();

        return response()->json(['result' => $data]);
    }

    public function searchAPI(Request $request)
    {
        $module_model_post = "Modules\Article\Entities\Post";
        $module_model_jobs = "App\Models\Job";
        $module_model = "Modules\Article\Entities\Post";
        $dataPost = $request->all();
        $lang = app()->getLocale();
        $selectNews = 'news';
        $selectJobs = 'jobs';
        $selectgiobug = 'giobug';
        $gioBug = 'Gio Bug New';

        $search_text = $dataPost['querySearchKey'];
        $search_select = $dataPost['querySearchSelect'];

        if ($search_select == $selectNews) {
            $data = DB::table('languages')
                ->leftJoin('posts', 'languages.prefer_id', '=', 'posts.id')
                ->select(
                    'languages.prefer_id as id',
                    'languages.title as title',
                    'languages.descrition as descrition',
                    'languages.language as language',
                    'languages.slug as slug',
                    'posts.featured_image as featured_image'
                )
                ->where('posts.status', 1)
                ->whereNull('posts.deleted_at')
                ->where(function ($q) use ($search_text) {
                    $q->where('languages.title', 'LIKE', "%{$search_text}%")
                      ->orwhere('languages.descrition', 'LIKE', "%{$search_text}%");
                })
                ->where('languages.language', '=', $lang)
                ->get();
            $count = count($data);
        }
        if ($search_select == $selectJobs) {
            $data = DB::table('jobs')
                ->where('jobs.status', 1)
                ->join('languages_job', 'jobs.id', '=', 'languages_job.job_id')
                ->where(function($q) use($lang, $search_text) {
                    $q->where('languages_job.language', '=', "$lang");
                })
                ->where(function($q) use($lang, $search_text) {
                    $q->where('languages_job.job_name', 'LIKE', "%{$search_text}%")
                    ->orwhere('languages_job.job_description', 'LIKE', "%{$search_text}%");
                })
                ->orderBy('jobs.created_at', 'DESC')
                ->get();
            $count = count($data);
        }
        return response()->json(['result' => $data, 'count' => $count]);
    }

    public function setBreadCrumb($title, $url)
    {
        return ['title' => $title, 'url' => $url];
    }
}
