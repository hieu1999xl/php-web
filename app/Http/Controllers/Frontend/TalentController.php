<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TalentController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function talent()
    {
        $module_title = 'Jobs';
        $module_name = 'jobs';
        $module_icon = 'fas fa-sitemap';
        $module_model = "App\Models\Job";
        $module_model_post = "Modules\Article\Entities\Post";
        $module_name_singular = Str::singular($module_name);
        $module_model_news = "Modules\Article\Entities\Post";
        $module_action = 'List';
        $hots = DB::table($module_name)->orderBy('hot', 'ASC')->limit(4)->get();
        //dd($hot);
        $lang = app()->getLocale();
        $jobList = $module_model::with(['dataLocale'])->where('status', 1)->get();
        // $newEvents = 'Events news';

        $count = $module_model::where('status', '=', '1')->with(['language'])->count();
        $$module_name = $module_model::where('status', '=', '1')->with(['language'])->orderBy('created_at', 'DESC')->paginate(4);
        $dataNewsEvents = $module_model_post::where('type', 'News')->with('dataLocale')->orderBy('created_at', 'DESC')->limit(3)->get();
        $body_class = '';
        $breadcrumbs = $this->getBreadcrumbTalent();
        $styles = $this->getStylesView(trans('frontend.news'), 'pNews', false, false);
        $keyword = 'Tinh vân, tinhvan, software, tuyển dụng, talent, Talent Acquisition';
        $meta = [
            'pType' => 'website',
            'nDescription' => $keyword,
            'pTitle' => trans('frontend.TSOTalent'),
            'pUrl' => url()->current(),
            'pDescription' => $keyword,
            'pImage' => asset('frontend/assets/images/section_1/logo.webp'),
            'nKeywords' => $keyword,
            'nAnalytics' => setting('google_analytics'),
            'linkRel' => url()->full(),
        ];
        return view('frontend.talent.talent', compact(
            'body_class',
            'lang',
            'module_name',
            'dataNewsEvents',
            'module_title',
            'count',
            "$module_name",
            'module_icon',
            'module_action',
            'module_name_singular',
            'hots',
            'jobList',
            'breadcrumbs',
            'styles',
            'meta'
        ));
    }

    public function searchTalent(Request $request)
    {
        $module_title = 'Jobs';

        $module_name = 'jobs';

        $module_path = 'jobs';

        $module_icon = 'fas fa-sitemap';

        $module_model = "App\Models\Job";

        $module_action = 'Search';

        $module_name_singular = Str::singular($module_name);

        $data = $request->all();

        $jobName = $data['jobName'];

        $locations = explode(',', $data['location']);

        $jobs = null;

        // dd(gettype($locations));
        if (isset($locations)) {
            $jobs = $module_model::where('job_name', 'like', "%$jobName%")
                ->whereIn('job_location', $locations)
                ->get();
        } else {
            $jobs = $module_model::where('job_name', 'LIKE', '%' . $jobName . '%')->get();
        }

        return response()->json($jobs);
    }

    public function apiSearchTalent(Request $request)
    {
        $module_title = 'Jobs';
        $module_name = 'jobs';
        $module_model = "App\Models\Job";
        $module_name_singular = Str::singular($module_name);
        $lang = app()->getLocale();
        $data = $request->all();
        // dd($data);
        $jobName = $data['jobName'];
        $locations = $request['location'];

        if (!empty($locations) || isset($locations)) {
            $locations = explode(',', $locations);
        } else {
            $locations = [];
        }

        $jobs = null;

        if (isset($locations) && count($locations) > 0) {
            $jobs = $module_model::where('job_name', 'like', "%$jobName%")
                ->where('status', 1)
                ->whereIn('job_location', $locations)
                ->with(['dataLocale'])
                ->get();
            foreach ($jobs as $job) {
                $job->job_name = $job->dataLocale->job_name ?? $job->job_name;
            }
        } else {
            $jobs = $module_model::where('job_name', 'LIKE', '%' . $jobName . '%')->where('status', 1)->with(['dataLocale'])->get();
            foreach ($jobs as $job) {
                $job->job_name = $job->dataLocale->job_name ?? $job->job_name;
            }
        }

        $dataResult['lang'] = $lang;
        $dataResult['jobs'] = $jobs;

        return response()->json($dataResult);
    }

    public function talent_detail($id)
    {
        $idJob = $id;
        $module_title = 'Jobs';
        $module_name = 'jobs';
        $module_path = 'jobs';
        $module_icon = 'fas fa-sitemap';
        $module_model = "App\Models\Job";
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::where('id', $idJob)->with(['dataLocale'])->first();


        $body_class = '';
        $hots = DB::table($module_name)->orderBy('hot', 'ASC')->limit(4)->get();
        $title_breadcrumb = $$module_name_singular->job_name;
        $breadcrumbs = $this->getBreadcrumbTalentDetail($title_breadcrumb);
            return view('frontend.talent.talent_detail', compact(
            'body_class',
            'module_title',
            'module_name',
            'module_icon',
            'module_name_singular',
            "$module_name_singular",
            'hots',
            'breadcrumbs'
        ));
    }
}
