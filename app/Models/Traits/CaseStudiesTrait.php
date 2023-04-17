<?php

namespace App\Models\Traits;

use App\Models\Menu;
use Carbon\Carbon;
use DateTimeZone;
use Modules\Article\Constants\PostConstants;
use Modules\Article\Entities\Post;

trait CaseStudiesTrait
{
    public function getCaseStudiesOfHome()
    {
        $myTime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        return Post::where('type', PostConstants::TYPE_CASE_STUDIES)
            ->where('published_at', '<', $myTime)
            ->where('status', 1)
            ->where('is_featured', 1)
            ->with(['dataLocale'])
            ->orderBy('updated_at', 'DESC')
            ->orderBy('order', 'ASC')
            ->limit(6)
            ->get();
    }

    public function getCaseStudiesWhenClickDetail($tagIds)
    {
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        return Post::whereHas('tags', function ($q) use ($tagIds) {
            $q->whereIn('tag_id', $tagIds);
        })->where('type', PostConstants::TYPE_CASE_STUDIES)
            ->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['dataLocale', 'tags'])
            ->orderBy('updated_at', 'DESC')
            ->orderBy('order', 'ASC')
            ->limit(3)
            ->get();
    }

    public function getCaseStudiesMenuLevel2($ids)
    {
        return $this->getPostByTagIds($ids);
    }

    public function getPostByTagIds($tagIds)
    {
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        return Post::whereHas('tags', function ($q) use ($tagIds) {
            $q->where('tag_id', $tagIds);
        })->where('type', PostConstants::TYPE_CASE_STUDIES)
            ->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->where('is_featured', 1)
            ->with(['dataLocale'])
            ->limit(3)
            ->orderBy('updated_at', 'DESC')
            ->get();
    }

    public function getCaseStudiesMenuChild($tagIds)
    {
        $mytime = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        return Post::whereHas('tags', function ($q) use ($tagIds) {
            $q->whereIn('tag_id', $tagIds);
        })->where('type', PostConstants::TYPE_CASE_STUDIES)
            ->where('published_at', '<', $mytime)
            ->where('status', 1)
            ->with(['dataLocale', 'tags'])
            ->orderBy('updated_at', 'DESC')
            ->orderBy('order', 'ASC')
            ->get();
    }

    public function getCaseStudiesBySlug($slug)
    {
        $menu = Menu::where('slug', $slug)->where('status', 1)->first();
        if ($menu) {
            $tagIds = isset($menu->tag) ? [$menu->tag->id] : '';
            return $this->getPostByTagIds($tagIds);
        }
    }

}
