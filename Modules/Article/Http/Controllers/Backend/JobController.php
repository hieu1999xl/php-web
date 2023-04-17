<?php

namespace Modules\Article\Http\Controllers\Backend;

use App\Models\LanguageJob;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Yajra\DataTables\DataTables;


class JobController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Jobs';

        // module name
        $this->module_name = 'jobs';

        // directory path of the module
        $this->module_path = 'jobs';

        // module icon
        $this->module_icon = 'fas fa-sitemap';

        // module model name, path
        $this->module_model = "App\Models\Job";
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $module_action = 'List';
        $$module_name = $module_model::paginate();

        $data = $$module_name;

        return view("article::backend.$module_path.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    public function index_data()
    {

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';
        $locate = app()->getLocale();
        $$module_name = $module_model::select(
            'id',
            'job_name',
            'job_title',
            'job_salary',
            'status'
        )->with(["language" => function ($q) use ($locate) {
            $q->where('language', $locate);
        }]);
        $data = $$module_name;

        return DataTables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            ->editColumn('job_name', function ($data) {
                $language = $data->language->first();
                $jobName = $language->job_name ?? '';
                return "<strong>$jobName</strong>";
            })
            ->editColumn('job_title', function ($data) {
                $language = $data->language->first();
                $jobTitle = $language->job_title ?? '';
                return $jobTitle;
            })
            ->editColumn('job_salary', function ($data) {
                $language = $data->language->first();
                $job_salary = $language->job_salary ?? '';
                return $job_salary;
            })
            ->editColumn('status', '{{$status ? "Published" : "Unpublished"}}')
            ->rawColumns(['job_name', 'action'])
            ->orderColumns(['id'], '-:column $1')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Create';

        // dd(123);
        return view(
            "article::backend.$module_name.create",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular')
        );
    }

    public function slug_format($string)
    {
        $base_string = $string;

        $string = preg_replace('/\s+/u', '-', trim($string));
        $string = str_replace('/', '-', $string);
        $string = str_replace('\\', '-', $string);
        $string = strtolower($string);

        $slug_string = $string;

        return $slug_string;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $module_action = 'Create';
        $data = [
            'job_name' => $request->job_name,
            'job_intro' => $request->job_intro,
            'status' => $request->status,
            'slug' => slug_format($request->job_name),
            'job_description' => $request->job_description,
            'job_requirement' => $request->job_requirement,
            'job_benefits' => $request->job_benefits,
            'job_title' => $request->job_title,
            'job_salary' => $request->job_salary,
            'job_left_time' => $request->job_left_time,
            'job_time' => $request->job_time,
            'job_location' => $request->job_location,
            'position_quantity' => (int)$request->position_quantity
        ];
        $$module_name_singular = $module_model::create($data);
        $this->createLanguageJob($data, $$module_name_singular->id);
        return redirect("admin/$module_name");
    }

    public function createLanguageJob($data, $jobId)
    {
        $languages = array_keys(LaravelLocalization::getSupportedLocales());
        $data['job_id'] = $jobId;
        foreach ($languages as $language) {
            $data['language'] = $language;
            LanguageJob::create($data);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $$module_name_singular = $module_model::findOrFail($id);

        return view(
            "article::backend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular")
        );
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Edit';

        $$module_name_singular = $module_model::findOrFail($id);
        $locate = app()->getLocale();
        $data_lang = LanguageJob::where('job_id', $$module_name_singular->id)->where('language', $locate)->first();
        if ($data_lang) {
            $$module_name_singular->job_name = $data_lang->job_name;
            $$module_name_singular->job_title = $data_lang->job_title;
            $$module_name_singular->slug = $data_lang->slug;
            $$module_name_singular->job_description = $data_lang->job_description;
            $$module_name_singular->job_requirement = $data_lang->job_requirement;
            $$module_name_singular->job_benefits = $data_lang->job_requirement;
            $$module_name_singular->job_salary = $data_lang->job_salary;
            $$module_name_singular->job_intro = $data_lang->job_intro;
        }
        return view(
            "article::backend.$module_name.edit",
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular")
        );
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';
        $$module_name_singular = $module_model::findOrFail($id);
        $locate = app()->getLocale();
        $dataEdit = [
            'job_name' => $request->job_name,
            'job_intro' => $request->job_intro,
            'status' => $request->status,
            'slug' => slug_format($request->job_name),
            'job_description' => $request->job_description,
            'job_requirement' => $request->job_requirement,
            'job_benefits' => $request->job_benefits,
            'job_title' => $request->job_title,
            'job_salary' => $request->job_salary,
            'job_left_time' => $request->job_left_time,
            'job_time' => $request->job_time,
            'job_location' => $request->job_location,
            'position_quantity' => (int)$request->position_quantity
        ];
        $$module_name_singular->update($dataEdit);
        $this->updateJobLanguage($dataEdit, $$module_name_singular->id, $locate);
        return redirect("admin/$module_name");
    }

    public function updateJobLanguage($data, $jobId, $locate)
    {
        unset($data['status']);
        unset($data['job_left_time']);
        $languages = LanguageJob::where('job_id', $jobId)->get();
        if (count($languages) > 0) {
            LanguageJob::where('job_id', $jobId)->where('language', $locate)->update($data);
        } else {
            $this->createLanguageJob($data, $jobId);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'destroy';

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();

        return redirect("admin/$module_name");
    }
}
