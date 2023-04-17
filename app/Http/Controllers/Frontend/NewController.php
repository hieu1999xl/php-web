<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Article\Constants\MenuConstants;
use Illuminate\Support\Facades\DB;

class NewController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
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
        $menuChildNews = $this->getMenuChildLevel2();

        $breadcrumbs = [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.news'), '#')];
        $styles = $this->getStylesView(trans('frontend.news'), 'pNews');
        $styles['description'] = trans('frontend.news title');


        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => trans('frontend.News'),
            'classTitle' => 'title_banner font_weight_700',
            'displayDecription' => true,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.techTitle'),
            'displayButon' => false,
            'imageMobile' => asset('frontend/assets/images/banners/bannernews_mobile.webp'),
            'image' => asset('frontend/assets/images/banners/bannernews.webp')
        ];
        $bannerBottom = [
            'display' => true,
            'class' => 'section_launch_your_product',
            'classTitle' => 'spacing_text page_title text-center text-white font_weight_700 title_banner',
            'title' => trans('frontend.Launch Your Product With Us'),
            'description' => trans('frontend.launchuwithus'),
            'button' => trans('frontend.contacus'),
            'image' => asset('frontend/assets/images/news/bnbot.webp'),
            'imageMobile' => asset('frontend/assets/images/banners/bnbot_mobile.webp'),
            'classImage' => 'section_launch_your_product_img'
        ];
        return view('frontend.news.news', compact(
            'body_class',
            'lang',
            'module_name',
            'module_title',
            'module_icon',
            'module_action',
            'module_name_singular',
            'dataNewsEvent',
            'dataCuttingEdgeNews',
            'dataGioBugNews',
            'breadcrumbs',
            'styles',
            'banner',
            'bannerBottom',
            'menuChildNews',
        ));
    }

    public function getMenuChildLevel2()
    {
        return Menu::where('parent_id', MenuConstants::MENU_NEWS)->where('status', 1)->orderBy('order', 'ASC')->get();
    }

    public function viewMoreNews(Request $request, $slug)
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_icon = "fas fa-file-alt";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $module_action = 'List';
        $lang = app()->getLocale();
        $body_class = '';
        $dataNews = Menu::where('slug', $slug)->where('status', 1)->first();
        $breadcrumbs = [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.news'), route('frontend.news')), $this->setBreadCrumb(trans('frontend.' . $slug), route('frontend.news'))];
        $key = ucfirst($dataNews->name);
        $postIds = DB::table('taggables')->where('tag_id', $dataNews->tag->id)->pluck('taggable_id');
        $posts = $module_model::where('status', 1)->whereIn('id', $postIds)->with(['dataLocale'])->orderBy('published_at', 'DESC')->paginate(6);
        $styles = $this->getStylesView(trans('frontend.news'), 'pNews');
        $styles['description'] = trans('frontend.news title');

        $titleBanner = trans('frontend.' . $slug);
        $descriptionBanner = trans('frontend.description ' . $slug);
        $metaTitle = trans('frontend.TSO ' . $slug);
        $banner = [
            'display' => true,
            'class' => 'section_banner_top',
            'title' => $titleBanner,
            'classTitle' => 'title_banner font_weight_700',
            'displayDecription' => true,
            'classDecription' => 'description_banner',
            'description' => $descriptionBanner,
            'displayButon' => false,
            'imageMobile' => asset('frontend/assets/images/banners/bannernews_mobile.webp'),
            'image' => asset('frontend/assets/images/banners/bannernews.webp')
        ];
        $bannerBottom = [
            'display' => true,
            'class' => 'section_launch_your_product',
            'classTitle' => 'spacing_text page_title text-center text-white font_weight_700 title_banner',
            'title' => trans('frontend.Launch Your Product With Us'),
            'description' => trans('frontend.launchuwithus'),
            'button' => trans('frontend.contacus'),
            'image' => asset('frontend/assets/images/news/bnbot.webp'),
            'imageMobile' => asset('frontend/assets/images/banners/bnbot_mobile.webp'),
            'classImage' => 'section_launch_your_product_img'
        ];
        return view('frontend.news.viewmoreNews', compact(
            'body_class',
            'lang',
            'posts',
            'module_name',
            'module_title',
            'module_icon',
            'module_action',
            'module_name_singular',
            'dataNews',
            'breadcrumbs',
            'styles',
            'banner',
            'bannerBottom',
            'metaTitle'
        ));
    }

    public function news_detail($id)
    {
        $module_name = "posts";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $dataDetail = $module_model::where('id', '=', $id)->with(['dataLocale'])->first();
        $$module_name_singular = $dataDetail;
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $tag =  DB::table('taggables')->where('taggable_id', $dataDetail->id)->first();
        $dataRelatedIds = DB::table('taggables')->where('tag_id', $tag->tag_id)->pluck('taggable_id');
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
        $styles = $this->getStylesView(trans('frontend.news'), 'pNews');
        $styles['description'] = trans('frontend.news title');
        $meta = [
            'pType' => 'website',
            'nDescription' => $$module_name_singular->dataLocale->meta_description,
            'pTitle' => $$module_name_singular->meta_title,
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
            'title' => trans('frontend.News'),
            'classTitle' => 'title_banner font_weight_700',
            'displayDecription' => true,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.techTitle'),
            'displayButon' => false,
            'imageMobile' => asset('frontend/assets/images/banners/bannernews_mobile.webp'),
            'image' => asset('frontend/assets/images/banners/bannernews.webp')
        ];
        return view('frontend.news.detail', compact(
            'body_class',
            'module_name_singular',
            'dataRelated',
            "$module_name_singular",
            'breadcrumbs',
            'styles',
            'banner',
            'meta'
        ));
    }
}
