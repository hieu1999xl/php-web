<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use DateTimeZone;
use App\Models\Traits\CaseStudiesTrait;
use Illuminate\Support\Str;

class AboutController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function about_us()
    {
        $module_title = "Posts";
        $module_name = "posts";
        $module_path = "posts";
        $module_icon = "fas fa-file-alt";
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $meta = ['title' =>  trans('frontend.searchheader') ];
        $meta['title'];
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbAboutUs();
        $styles = $this->getStylesAbout();
        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => trans('frontend.TSOAboutus'),
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
            'title' => trans('frontend.aboutustitletop'),
            'classTitle' => 'title_banner font_weight_700 ',
            'displayDecription'=>true,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.aboutustitlebottom'),
            'image'=>asset('frontend/assets/images/banners/anh_header_about.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/anh_header_about_mobile.webp'),
            'displayButon'=>false
        ];
        return view('frontend.about.about_us', compact(
            'body_class',
            'module_name',
            'module_title',
            'module_icon',
            'module_action',
            'module_name_singular',
            'breadcrumbs',
            'styles',
            'meta',
            'banner',
            'meta'
        ));
    }

    public function our_story()
    {
        $body_class = '';

        return view('frontend.about.our_story', compact('body_class'));
    }

    public function tvj()
    {
        $module_name = $this->module_name;
        $module_model = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $model_img_upload = $this->module_img_upload;

        $body_class = '';
        $slug = $this->getSlugByUrl($_SERVER['REQUEST_URI']);
        $dataStudiesCase = $this->getCaseStudiesBySlug($slug);
        $listSlide = $model_img_upload::where('type', '=', 0)->orderBy('oder', 'asc')->get();

        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));

        $breadcrumbs = $this->getBreadcrumbTvj();
        $styles = $this->getStylesAbout();
        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => trans('frontend.TSOTvj'),
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
            'title' => trans('frontend.aboutustitletop'),
            'classTitle' => 'title_banner font_weight_700',
            'displayDecription'=>true,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.aboutustitlebottom'),
            'image'=>asset('frontend/assets/images/banners/anh_header_about.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/anh_header_about_mobile.webp'),
            'displayButon'=>false
        ];
        return view('frontend.about.tvj', compact(
            'body_class',
            'module_name_singular',
            'listSlide',
            'dataStudiesCase',
            'breadcrumbs',
            'styles',
            'banner',
            'meta'
        ));
    }

    public function contact_us()
    {
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbContactUs();
        $styles = $this->getStylesAbout();
        $meta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => trans('frontend.TSOAboutus'),
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
            'title' => trans('frontend.TSOContactus'),
            'classTitle' => 'title_banner font_weight_700 ',
            'displayDecription'=>true,
            'classDecription' => 'description_banner',
            'description' => trans('frontend.aboutustitlebottom'),
            'image'=>asset('frontend/assets/images/banners/anh_header_about.webp'),
            'imageMobile'=>asset('frontend/assets/images/banners/anh_header_about_mobile.webp'),
            'displayButon'=>false
        ];
        return view('frontend.about.contact_us', compact('body_class', 'breadcrumbs','styles','banner','meta'));
    }

    public function getStylesAbout()
    {
        $styles = $this->getStylesView(trans('frontend.aboutustitletop'), '');
        $styles['id'] = 'about-header';
        $styles['description'] = trans('frontend.aboutustitlebottom');
        $styles['elementH2'] = 'about-header-title translation padding_title';
        $styles['elementP'] = 'translation langmuti padding_title';
        return $styles;
    }
}
