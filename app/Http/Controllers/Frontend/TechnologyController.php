<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Traits\BreadcrumbFrontendTrait;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Modules\Article\Constants\MenuConstants;
use Modules\Article\Constants\PostConstants;
use Modules\Article\Entities\Post;
use Modules\Tag\Entities\Tag;

class TechnologyController extends Controller
{
    use BreadcrumbFrontendTrait;

    public function index(Request $request)
    {
        $breadcrumbs = $this->getBreadcrumbTechnologies();
        $menuTechnologies = $this->getMenuTechnologies();
        $menuActiveDefault = isset($request->id) ? $request->id : $menuTechnologies[0]->id;
        $menuTechnologiesChild = $this->getMenuTechnologiesChild($menuActiveDefault);
        $activeMenu = $menuActiveDefault;
        $active_menu_parent = MenuConstants::MENU_TECHNOLOGIES_SLUG;
        $dataStudiesCase = $this->getDataCaseStudiesTechnologies($menuTechnologiesChild->pluck('id'));
        $styles = $this->getStylesView(trans('frontend.tech header'), "");
        $styles['description'] = trans('frontend.techTitle');

        $styles['id'] = 'hero_tech';
        $url = $_SERVER['REQUEST_URI'];
        $splitUrl = explode("/", $url);

        if (isset($splitUrl[3])) {
            $idTech = (int)$splitUrl[3];
            $dataTitle = DB::table('menus')->where('id', $idTech)->where('status', '=', '1')->get();
            $nameTitle = $dataTitle[0]->name;
        } else {
            $nameTitle = '';
        }
        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => trans('frontend.TSOTechnologies-' . $nameTitle),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.ogDescription'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.metaKeywordHomepage'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.Technologies'),
            'classTitle' => 'title_banner font_weight_700',
            'displayDecription' => true,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.techTitle'),
            'displayButonContactUs' => false,
            'imageMobile' => asset('frontend/assets/images/banners/techonology_mobile.webp'),
            'image' => asset('frontend/assets/images/banners/techonology.webp')
        ];
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        return view(
            'frontend.technologys.technology',
            [
                'breadcrumbs' => $breadcrumbs,
                'menuTechnologies' => $menuTechnologies,
                'menuTechnologiesChild' => $menuTechnologiesChild,
                'activeMenu' => $activeMenu,
                'active_menu_parent' => $active_menu_parent,
                'dataStudiesCase' => $dataStudiesCase,
                'filterServices' => $filterServices,
                'filterTechnologies' => $filterTechnologies,
                'filterIndustries' => $filterIndustries,
                'styles' => $styles,
                'banner' => $banner,
                'meta' => $meta,
            ]
        );
    }


    public function getMenuTechnologies()
    {
        return Menu::where('parent_id', MenuConstants::MENU_TECHNOLOGIES)->where('status', 1)->orderBy('order', 'asc')->get();
    }

    public function getMenuTechnologiesChild($parentId, $attribute = '*')
    {
        return Menu::select($attribute)->where('parent_id', $parentId)->where('status', 1)->where('status', 1)->orderBy('order', 'asc')->get();
    }

    public function getDataCaseStudiesTechnologies($menuIds = [])
    {
        $tagsTechnologies = $this->getTagsMenuTechnologiesByMenuIds($menuIds);
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        return Post::whereHas('tags', function ($q) use ($tagsTechnologies) {
            $q->whereIn('tag_id', $tagsTechnologies->pluck('id'));
        })->where('type', PostConstants::TYPE_CASE_STUDIES)
            ->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['dataLocale', 'tags'])
            ->limit(3)
            ->get();
    }

    public function getTagsMenuTechnologiesByMenuIds($menuIds)
    {
        return Tag::whereIn('menu_id', $menuIds)->where('status', 1)->get();
    }

    public function getCastudyTechnologies($menuId)
    {
        $menuTechnologiesChild = $this->getMenuTechnologiesChild($menuId);
        $dataStudiesCase = $this->getDataCaseStudiesTechnologies($menuTechnologiesChild->pluck('id'));
        $filterServices = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $filterTechnologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $filterIndustries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $tags = [];
        foreach ($dataStudiesCase  as $item) {
            $item->url_detail = route("frontend.case_study_detail", [($item->id), $item->dataLocale ? $item->dataLocale->slug : $item->slug]);
            if (isset($item->tags) && $item->tags) {
                foreach ($item->tags as $key => $tag) {
                    $tags[$key]['tag'] = $tag;
                    if (array_key_exists($tag->id, array_flip($filterServices->pluck('id')->toArray()))) {
                        $tags[$key]['class'] = 'services';
                    }
                    if (array_key_exists($tag->id, array_flip($filterIndustries->pluck('id')->toArray()))) {
                        $tags[$key]['class'] = 'industries';
                    }
                    if (array_key_exists($tag->id, array_flip($filterTechnologies->pluck('id')->toArray()))) {
                        $tags[$key]['class'] = 'technologies';
                    }
                }
            }
        }
        return ['caseStudies' => $dataStudiesCase, 'tags' => $tags];
    }

    public function getMenuChildTechnologiesByParentId($parentId)
    {
        $menuChild = $this->getMenuTechnologiesChild($parentId)->map(function ($menu) {
            $tag = isset($menu->tag) ? $menu->tag : null;
            if ($tag) {
                $conditionPost = $tag->posts->where('status', 1);
                $check = count($conditionPost) > 0 ? true : false;
            } else {
                $check = false;
            }
            return [
                'path' => asset($menu->image),
                'alt' => $menu->name,
                'id' => $menu->tag->id,
                'check' => $check,
            ];
        });
        return response()->json($menuChild);
    }
}
