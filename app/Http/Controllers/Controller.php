<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Modules\Article\Constants\PostConstants;
use Modules\Article\Entities\Post;
use Modules\Tag\Entities\Tag;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function getPostsByTag($tagName)
    {
        $data = [];
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $post = Post::whereHas('tags', function ($q) use ($tagName) {
            $q->where('name', 'LIKE', '%' . $tagName . '%');
        })->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['dataLocale', 'tags', 'tags.menu'])
            ->orderBy('created_at', 'DESC')->limit(3)->get();
        if ($post) {
            $data = $post;
        }
        return $data;
    }

    public function getDataCaseStudiesByName($tagName)
    {
        $data = [];
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $post = Post::whereHas('tags', function ($q) use ($tagName) {
            $q->where('name', 'LIKE', '%' . $tagName . '%');
        })->where('type', PostConstants::TYPE_CASE_STUDIES)
            ->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['dataLocale', 'tags', 'tags.menu'])
            ->orderBy('created_at', 'DESC')->limit(3)->get();
        if ($post) {
            $data = $post;
        }
        return $data;
    }

    public function getDataCaseStudiesByIds($ids)
    {
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        return Post::whereHas('tags', function ($q) use ($ids) {
            $q->whereIn('tag_id', $ids);
        })->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['dataLocale', 'tags'])
            ->orderBy('updated_at', 'DESC')
            ->orderBy('order', 'ASC')->get();
    }

    public function getAllPostsByTag($tagName)
    {
        // tagname =['mobile', 'java']
        $data = [];
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $post = Post::whereHas('tags', function ($q) use ($tagName) {
            $q->where('name', 'LIKE', $tagName);
        })->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['dataLocale'])
            ->orderBy('created_at', 'DESC')->get();
        if ($post) {
            $data = $post;
        }
        return $data;
    }

    public function getBreadCrumbHome()
    {
        return [
            'title' => trans('frontend.Home'),
            'url' => route('frontend.index'),
        ];
    }

    public function getTagsMenus($idMenuLevel1, $attribute = '*')
    {
        $idsMenu2 = Menu::where('parent_id', $idMenuLevel1)->pluck('id')->toArray();
        $idsMenu3 = Menu::whereIn('parent_id', $idsMenu2)->pluck('id')->toArray();
        $idsMenu = array_merge($idsMenu2, $idsMenu3);
        $tag = Tag::select($attribute)->whereIn('menu_id', $idsMenu)->where('status', 1)->get();
        return $tag;
    }

    public function getPostsTag($tagName)
    {
        $data = [];
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $post = Post::whereHas('tags', function ($q) use ($tagName) {
            $q->where('name', 'LIKE', '%' . $tagName . '%');
        })->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['dataLocale'])
            ->orderBy('published_at', 'DESC')->get();
        if ($post) {
            $data = $post;
        }
        return $data;
    }

    public function getPostsTagByNew($tagName)
    {
        $data = [];
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $post = Post::whereHas('tags', function ($q) use ($tagName) {
            $q->where('name', 'LIKE', '%' . $tagName . '%');
        })->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->where('type', PostConstants::TYPE_NEWS)
            ->with(['dataLocale'])
            ->orderBy('published_at', 'DESC')->get();
        if ($post) {
            $data = $post;
        }
        return $data;
    }

    public function downloadFile($post_id)
    {
        $post = Post::findOrFail($post_id);
        $filePath = storage_path('app/' . $post->file);
        $download_file = explode("/", $filePath);
        $total = count($download_file);

        $file_name = str_replace(' ', '', $download_file[$total - 1]);
        return response()->download($filePath, $file_name);
    }

    public function getStylesView($title, $class, $displayBanner = true, $displayBreadcrumb = true)
    {
        return ['flagBreadcrumbs' => $displayBreadcrumb, 'display' => $displayBanner, 'title' => $title, 'class' => $class];
    }
}
