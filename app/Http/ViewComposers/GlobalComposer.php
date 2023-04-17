<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class GlobalComposer
{
    public $globalMeta = [];
    public $globalBanner = [];

    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->globalMeta = [
            'pType' => 'website',
            'nDescription' => trans('frontend.ogDescription'),
            'pTitle' => setting('title'),
            'pUrl' => url()->current(),
            'pDescription' => trans('frontend.ogDescription'),
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => trans('frontend.keywordWeb'),
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];

        $this->globalBanner = [
            'display' => false,
            'id' => '',
            'class' => 'pMobile',
            'title' => trans('frontend.Mobile Solution'),
            'classTitle' => 'font_weight_700',
            'displayDecription'=>false,
            'classDecription' => 'padding_title',
            'description' => trans('frontend.Mobile Solution'),
            'buttonCase'=>false,
            'displayButton'=>false,
            'classButton'=>'',
            'button'=>'',
            'image'=>'',
            'imageMobile'=>'',
            'altImage'=>trans('frontend.Mobile Solution'),
            'displaySearch'=>false
        ];
        $this->globalBannerBottom=[
            'display'=>false,
            'class'=>'section_block',
            'classTitle'=>'section_title font_weight_700',
            'title'=>trans('frontend.Launch Your Product With Us'),
            'description'=>trans('frontend.launchuwithus'),
            'button'=>trans('frontend.contacus'),
            'image'=>'',
            'imageMobile'=>'',
            'classImage'=>'',
            'display_got'=>false
        ];
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(
            [
                'globalMeta' => $this->globalMeta,
                'globalBanner' => $this->globalBanner,
                'globalBannerBottom'=>$this->globalBannerBottom,
            ]
        );
    }


}
