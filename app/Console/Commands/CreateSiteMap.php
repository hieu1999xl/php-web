<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CreateSiteMap extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'sitemap:create';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $sitemap = \App::make('sitemap');
    $languages = LaravelLocalization::getSupportedLocales();
    $baseURL = URL::to('/');
    if (!str_contains($baseURL, 'https')) {
      $baseURL = str_replace('http', 'https', $baseURL);
    }

    // add home pages mặc định
    foreach ($languages as $language => $value) {
      $sitemap->add($baseURL . '/' . $language, Carbon::now(), '1.0', 'daily');
    }

    // add landing page
    $sitemap->add("https://qa.tso.vn/", Carbon::now(), '0.8', 'daily');
    $sitemap->add("https://edu.tso.vn", Carbon::now(), '0.8', 'daily');
    $sitemap->add("https://blockchain.tso.vn", Carbon::now(), '0.8', 'daily');
    $sitemap->add("https://datascience.tso.vn/", Carbon::now(), '0.8', 'daily');
    $sitemap->add("https://ecommerce.tso.vn/", Carbon::now(), '0.8', 'daily');
    foreach ($languages as $language => $value) {
      // service
      $sitemap->add($baseURL . '/' . $language . '/services/outsourcing-services', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/services/mobile-solutions', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/services/custom-software-development', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/services/testing-services', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/services/legacy-system-migration', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/services/innovation-technologies', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/services/staffing-augmentation', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/services/offshore-dedicated-team', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/services/on-site-resources', Carbon::now(), '0.8', 'daily');
      // industries
      $sitemap->add($baseURL . '/' . $language . '/industries/banking-finance', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/industries/education', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/industries/healthcare', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/industries/ecommerce-retail', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/industries/enterprise-management', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/industries/logistics', Carbon::now(), '0.8', 'daily');
      // technologies
      $sitemap->add($baseURL . '/' . $language . '/technologies', Carbon::now(), '0.8', 'daily');
      // news
      $sitemap->add($baseURL . '/' . $language . '/news', Carbon::now(), '0.8', 'daily');
      // talent
      $sitemap->add($baseURL . '/' . $language . '/talent-acquisition', Carbon::now(), '0.8', 'daily');
      // shareholder-page
      $sitemap->add($baseURL . '/' . $language . '/shareholder-page', Carbon::now(), '0.8', 'daily');
      // about-us
      $sitemap->add($baseURL . '/' . $language . '/about-us', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/about-us/tvj', Carbon::now(), '0.8', 'daily');
      $sitemap->add($baseURL . '/' . $language . '/about-us/contact-us', Carbon::now(), '0.8', 'daily');
      // case-studies
      $sitemap->add($baseURL . '/' . $language . '/case-studies', Carbon::now(), '0.8', 'daily');
    }

    // add bài viết
    $posts = \DB::table('posts')
      ->where('status', 1)
      ->whereNull('deleted_at')
      ->whereIn('type', ['News', 'CaseStudies'])
      ->orderBy('created_at', 'desc')
      ->get();
    foreach ($posts as $post) {
      $urlMultilang = "";
      foreach ($languages as $language => $value) {
        $slug = \DB::table('languages')
          ->where('prefer_id', '=', $post->id)
          ->where('language', '=', $language)
          ->whereNotNull('slug')
          ->get();
        if (isset($slug[0]->slug) && !empty($slug[0]->slug)) {
          if ($post->type ==  'News') {
            $url = $baseURL . '/' . $language . '/news/' . $post->id . '/' . $slug[0]->slug;
          }
          elseif ($post->type == 'CaseStudies') {
            $url = $baseURL . '/' . $language . '/case-studies/' . $post->id . '/' . $slug[0]->slug;
          }
          $sitemap->add($url, $post->created_at, '0.6', 'daily');
        }
      }
    }

    // lưu file và phân quyền
    $sitemap->store('xml', 'sitemap');
    if (File::exists(public_path() . '/sitemap.xml')) {
      chmod(public_path() . '/sitemap.xml', 0777);
    }
  }
}
