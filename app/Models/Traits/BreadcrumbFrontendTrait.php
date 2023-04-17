<?php

namespace App\Models\Traits;

use App\Models\Menu;
use Modules\Article\Constants\MenuConstants;

trait BreadcrumbFrontendTrait
{
    public function getBreadCrumbHome()
    {
        return [
            'title' => trans('frontend.Home'),
            'url' => route('frontend.index'),
        ];
    }

    public function setBreadCrumb($title, $url)
    {
        return ['title' => $title, 'url' => $url];
    }

    public function getMenuServicesLevel2()
    {
        return Menu::select('slug', 'name', 'id', 'parent_id')->where('parent_id', MenuConstants::MENU_SERVICES)->where('status', 1)->get();
    }

    public function getMenuServicesLevel3()
    {
        $menuLevel2 = $this->getMenuServicesLevel2()->pluck('id');
        return Menu::select('slug', 'name', 'id', 'parent_id')->whereIn('parent_id', $menuLevel2)->where('status', 1)->get();
    }

    public function getBreadcrumbServicesChildLevel2($slug)
    {
        $breadcrumb = [];
        $menuChildOfServices = $this->getMenuServicesLevel2();
        if ($slug) {
            foreach ($menuChildOfServices as $menu) {
                $breadcrumb[$menu->slug] = [$this->getBreadCrumbHome(),
                    $this->setBreadCrumb(trans('frontend.' . $menu->name), url($menu->slug))
                ];
            }
        }
        return isset($breadcrumb[$slug]) ? $breadcrumb[$slug] : [];
    }

    public function getBreadcrumbServicesChildLevel3($slug)
    {
        $menuChildOfServices = $this->getMenuServicesLevel3();
        $breadcrumbLevel2 = [];
        if ($slug) {
            foreach ($menuChildOfServices as $menu) {
                if ($menu->parent_id == MenuConstants::MENU_OUTSOURCING_SERVICES) {
                    $breadcrumbLevel2[$menu->slug] = $this->getBreadcrumbServicesChildLevel2(MenuConstants::MENU_OUTSOURCING_SERVICES_SLUG);
                }
                if ($menu->parent_id == MenuConstants::MENU_INNOVATION_TECHNOLOGIES) {
                    $breadcrumbLevel2[$menu->slug] = $this->getBreadcrumbServicesChildLevel2(MenuConstants::MENU_INNOVATION_TECHNOLOGIES_SLUG);
                }
                if ($menu->parent_id == MenuConstants::MENU_STAFFING_AUGMENTATION) {
                    $breadcrumbLevel2[$menu->slug] = $this->getBreadcrumbServicesChildLevel2(MenuConstants::MENU_STAFFING_AUGMENTATION_SLUG);
                }
                $breadcrumbLevel2[$menu->slug][] = $this->setBreadCrumb(trans('frontend.' . $menu->name), url($menu->slug));
            }
        }
        return isset($breadcrumbLevel2[$slug]) ? $breadcrumbLevel2[$slug] : [];
    }

    public function getBreadcrumbServicesCaseStudyDetail($slug, $title)
    {
        $breadcrumbDetailStudy = [];
        if ($slug) {
            $breadcrumbDetailStudy = $this->getBreadcrumbServicesChildLevel3($slug);
            $breadcrumbDetailStudy[] = $this->setBreadCrumb($title, '#');
        }
        return $breadcrumbDetailStudy;
    }

    public function getBreadcrumbOutsourcingServiceCaseStudyDetail($slug, $title)
    {
        $breadcrumb = [];
        if ($slug) {
            $breadcrumb = $this->getBreadcrumbServicesChildLevel2($slug);
            $breadcrumb[] = $this->setBreadCrumb($title, '#');
        }
        return $breadcrumb;
    }

    public function getMenuIndustries()
    {
        return Menu::select('slug', 'name', 'id')->where('parent_id', MenuConstants::MENU_INDUSTRIES)->where('status', 1);
    }

    public function getBreadcrumbIndustries()
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.' . 'Industries'), '#')];
    }

    public function getBreadcrumbIndustriesCaseStudyDetail($slug, $tile)
    {
        $menu_industries = $this->getMenuIndustries()->pluck('name', 'slug')->toArray();
        $breadcrumb = $this->getBreadcrumbIndustries();
        if ($slug) {
            $breadcrumb[] = $this->setBreadCrumb(trans('frontend.' . $menu_industries[$slug]), url($slug));
            $breadcrumb[] = $this->setBreadCrumb($tile, '#');
        }
        return $breadcrumb;
    }

    public function getMenuTechnologies()
    {
        return Menu::select('slug', 'name', 'id')->where('parent_id', MenuConstants::MENU_TECHNOLOGIES)->where('status', 1);
    }

    public function getBreadcrumbTechnologies()
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.' . 'Technologies'), '#')];
    }

    public function getBreadcrumbCaseStudies($title)
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.case_studies'), route('frontend.case_studies')), $this->setBreadCrumb($title, '#')];
    }

    public function getBreadcrumbTechnologiesCaseStudyDetail($title)
    {
        $breadcrumb = $this->getBreadcrumbTechnologies();
        $breadcrumb[] = $this->setBreadCrumb($title, '#');
        return $breadcrumb;
    }

    public function getSlugByUrl($url)
    {
        $slug = null;
        if ($url) {
            $urlArray = explode('/', $url);
            if (isset($urlArray[2]) && isset($urlArray[3])) {
                $slug = $urlArray[2] . '/' . $urlArray[3];
            }
        }
        return $slug;
    }

    public function getBreadcrumbIndustriesDetail($title)
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.' . 'Industries'), '#'), $this->setBreadCrumb(trans('frontend.' . $title), '#')];
    }

    public function getBreadcrumbNews()
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.news'), route('frontend.news'))];
    }

    public function getBreadcrumbNewDetail($title)
    {
        $breadcrumb = $this->getBreadcrumbNews();
        $breadcrumb[] = $this->setBreadCrumb($title, route('frontend.news'));
        return $breadcrumb;
    }

    public function getBreadcrumbAboutUs()
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.About Us'), '#')];
    }
    public function getBreadcrumbSearch()
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.search'), '#')];
    }
    public function getBreadcrumbTvj()
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.TVJ'), '#')];
    }

    public function getBreadcrumbShareholders()
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.Shareholders'), route('frontend.shareholderPage'))];
    }

    public function getBreadcrumbShareholderDetail($title)
    {
        $breadcrumb = $this->getBreadcrumbShareholders();
        $breadcrumb[] = $this->setBreadCrumb($title, '#');
        return $breadcrumb;
    }

    public function getBreadcrumbTalent()
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.Talent Acquisition'), route('frontend.talent'))];
    }

    public function getBreadcrumbTalentDetail($title)
    {
        $breadcrumb = $this->getBreadcrumbTalent();
        $breadcrumb[] = $this->setBreadCrumb($title, '#');
        return $breadcrumb;
    }

    public function getBreadcrumbContactUs()
    {
        return [$this->getBreadCrumbHome(), $this->setBreadCrumb(trans('frontend.Contact Us'), '#')];
    }

    public function getBreadcrumbCaseStudy(){
        return [$this->setBreadCrumb('Home', route('frontend.index')), $this->setBreadCrumb(trans('frontend.case_studies'), route('frontend.case_studies'))];
    }
}
