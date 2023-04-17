<?php

namespace Modules\Article\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\languages;
use App\Models\Menu;
use Auth;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Log;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Article\Constants\MenuConstants;
use Modules\Article\Constants\PostConstants;
use Modules\Article\Events\PostCreated;
use Modules\Article\Events\PostUpdated;
use Modules\Article\Http\Requests\Backend\PostsRequest;
use Modules\Tag\Entities\Tag;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;

class PostsController extends Controller
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Posts';

        // module name
        $this->module_name = 'posts';

        // directory path of the module
        $this->module_path = 'posts';

        // module icon
        $this->module_icon = 'fas fa-file-alt';

        // module model name, path
        $this->module_model = "Modules\Article\Entities\Post";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
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
//        $$module_name = $module_model::with('language')->whereIn('id', [57, 58])->get();
        $$module_name = $module_model::paginate();
//        dd($module_model::with('languages')->whereIn('id', [57, 58])->get());
//        $locate = app()->getLocale();
        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . Auth::user()->name . '(ID:' . Auth::user()->id . ')');

        return view(
            "article::backend.$module_path.index_datatable",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }


    public function index_data(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';
        $locate = app()->getLocale();
        $$module_name = $module_model::select('id', 'name', 'status', 'type', 'updated_at', 'published_at', 'is_featured')
            ->with(["language" => function ($q) use ($locate) {
                $q->where('languages.language', '=', $locate);
            }]);
        if (!empty($request->type)) {
            $$module_name->where('type', $request->type);
        }
        $data = $$module_name;
        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            ->editColumn('name', function ($data) {
                $is_featured = ($data->is_featured) ? '<span class="badge badge-primary">Featured</span>' : '';
//                            return $data->language.' '.$data->status_formatted.' '.$is_featured;
                $name = $data->language->first();
                return $name ? $name->title : '';
            })
            ->editColumn('status', function ($data) {
                $select_options = [
                    '1' => 'Published',
                    '0' => 'Unpublished',
                    '2' => 'Draft'
                ];
                return $select_options["$data->status"];
            })
            ->editColumn('updated_at', function ($data) {
                $module_name = $this->module_name;

                $diff = Carbon::now()->diffInHours($data->updated_at);

                if ($diff < 25) {
                    return $data->updated_at->diffForHumans();
                } else {
                    return $data->updated_at->isoFormat('LLLL');
                }
            })
            ->rawColumns(['name', 'status', 'action'])
            ->orderColumns(['id'], '-:column $1')
            ->make(true);
    }

    /**
     * Select Options for Select 2 Request/ Response.
     *
     * @return Response
     */
    public function index_list(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $term = trim($request->q);

        if (empty($term)) {
            return response()->json([]);
        }

        $query_data = $module_model::where('name', 'LIKE', "%$term%")->published()->limit(10)->get();

        $$module_name = [];

        foreach ($query_data as $row) {
            $$module_name[] = [
                'id' => $row->id,
                'text' => $row->name,
            ];
        }

        return response()->json($$module_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
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

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . Auth::user()->name . '(ID:' . Auth::user()->id . ')');
        $tags_services = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $tags_industries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $tags_technologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $tags_news = $this->getTagsMenus(MenuConstants::MENU_NEWS);
        $tags_shareholders = $this->getTagsMenus(MenuConstants::MENU_SHAREHOLDERS);
        return view(
            "article::backend.$module_name.create",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', 'tags_services', 'tags_industries', 'tags_technologies', 'tags_news', 'tags_shareholders')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(PostsRequest $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $module_action = 'Store';
        $data = $request->except(['tags_news', 'tags_services', 'tags_technologies', 'tags_industries', 'tags_shareholders']);
        $data['created_by_name'] = auth()->user()->name;
        $data['file'] = $this->getFile($request);
        $$module_name_singular = $module_model::create($data);
        $this->createTags($request, $$module_name_singular);
        event(new PostCreated($$module_name_singular));
        $this->createPostLanguages($request, $$module_name_singular->id);
        Flash::success("<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added")->important();
        Log::info(label_case($module_title . ' ' . $module_action) . " | '" . $$module_name_singular->name . '(ID:' . $$module_name_singular->id . ") ' by User:" . Auth::user()->name . '(ID:' . Auth::user()->id . ')');

        return redirect("admin/$module_name");
    }

    public function createTags($request, $post)
    {
        $data_tags = $this->getDataTags($request);
        $post->tags()->attach($data_tags);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
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

        $activities = Activity::where('subject_type', '=', $module_model)
            ->where('log_name', '=', $module_name)
            ->where('subject_id', '=', $id)
            ->latest()
            ->limit(10);

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . Auth::user()->name . '(ID:' . Auth::user()->id . ')');

        return view(
            "article::backend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular", 'activities')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
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
        $data_lang = languages::select('title', 'descrition', 'body', 'slug', 'meta_title', 'meta_keywords', 'meta_description', 'meta_og_url')->where('prefer_id', $id)->where('language', 'LIKE', $locate)->first();
        if ($data_lang) {
            $$module_name_singular->name = $data_lang->title;
            $$module_name_singular->intro = $data_lang->descrition;
            $$module_name_singular->content = $data_lang->body;
            $$module_name_singular->slug = $data_lang->slug;
            $$module_name_singular->meta_title = $data_lang->meta_title;
            $$module_name_singular->meta_keywords = $data_lang->meta_keywords;
            $$module_name_singular->meta_description = $data_lang->meta_description;
            $$module_name_singular->meta_og_url = $data_lang->meta_og_url;
        }
        Log::info(label_case($module_title . ' ' . $module_action) . " | '" . $$module_name_singular->name . '(ID:' . $$module_name_singular->id . ") ' by User:" . Auth::user()->name . '(ID:' . Auth::user()->id . ')');
        $tags_services = $this->getTagsMenus(MenuConstants::MENU_SERVICES);
        $tags_industries = $this->getTagsMenus(MenuConstants::MENU_INDUSTRIES);
        $tags_technologies = $this->getTagsMenus(MenuConstants::MENU_TECHNOLOGIES);
        $tags_news = $this->getTagsMenus(MenuConstants::MENU_NEWS);
        $tags_shareholders = $this->getTagsMenus(MenuConstants::MENU_SHAREHOLDERS);
        return view(
            "article::backend.$module_name.edit",
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular", 'tags_services', 'tags_industries', 'tags_technologies', 'tags_news', 'tags_shareholders')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return Response
     */
    public function update(PostsRequest $request, $id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $module_action = 'Update';
        $locate = app()->getLocale();
        $$module_name_singular = $module_model::findOrFail($id);
        $dataUpdate = $this->getDataUpdatePost($request, $$module_name_singular);
        $$module_name_singular->update($dataUpdate);
        $this->updateTags($request, $$module_name_singular);
        event(new PostUpdated($$module_name_singular));
        $this->updatePostLanguages($$module_name_singular->id, $locate, $request);
        Flash::success("<i class='fas fa-check'></i> '" . Str::singular($module_title) . "' Updated Successfully")->important();
        Log::info(label_case($module_title . ' ' . $module_action) . " | '" . $$module_name_singular->name . '(ID:' . $$module_name_singular->id . ") ' by User:" . Auth::user()->name . '(ID:' . Auth::user()->id . ')');
        return redirect("admin/$module_name");
    }

    public function updateTags($request, $post)
    {
        $data_tags = $this->getDataTags($request);
        $post->tags()->sync($data_tags);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
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
        // $lang = DB::table('languages')->where('prefer_id', '=', $id)
        //         ->where('type', '=', 1);
        // $lang->delete();
        Flash::success('<i class="fas fa-check"></i> ' . label_case($module_name_singular) . ' Deleted Successfully!')->important();

        Log::info(label_case($module_title . ' ' . $module_action) . " | '" . $$module_name_singular->name . ', ID:' . $$module_name_singular->id . " ' by User:" . Auth::user()->name . '(ID:' . Auth::user()->id . ')');

        return redirect("admin/$module_name");
    }

    /**
     * Remove the specified resource from database.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy_trash($id)
    {

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $module_action = 'destroy_trash';
        $$module_name_singular = $module_model::withTrashed()->where('id', $id)->first();
        $$module_name_singular->forceDelete();
        $this->removeFileStorage($$module_name_singular);
        Flash::success('<i class="fas fa-check"></i> ' . label_case($module_name_singular) . ' Deleted Successfully!')->important();

        Log::info(label_case($module_title . ' ' . $module_action) . " | '" . $$module_name_singular->name . ', ID:' . $$module_name_singular->id . " ' by User:" . Auth::user()->name . '(ID:' . Auth::user()->id . ')');

        return redirect("admin/$module_name");
    }

    /**
     * List of trashed ertries
     * works if the softdelete is enabled.
     *
     * @return Response
     */
    public function trashed()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Trash_List';

        $$module_name = $module_model::onlyTrashed()->orderBy('deleted_at', 'desc')->limit(10);

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . Auth::user()->name);

        return view(
            "article::backend.$module_name.trash",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
        );
    }

    /**
     * Restore a soft deleted entry.
     *
     * @param Request $request
     * @param int $id
     *
     * @return Response
     */
    public function restore($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Restore';

        $$module_name_singular = $module_model::withTrashed()->find($id);
        $$module_name_singular->restore();

        Flash::success('<i class="fas fa-check"></i> ' . label_case($module_name_singular) . ' Data Restoreded Successfully!')->important();

        Log::info(label_case($module_action) . " '$module_name': '" . $$module_name_singular->name . ', ID:' . $$module_name_singular->id . " ' by User:" . Auth::user()->name . '(ID:' . Auth::user()->id . ')');

        return redirect("admin/$module_name");
    }


    public function getTagsMenusByMenuLevel1($idMenuLevel1)
    {
        $idsMenu2 = Menu::where('parent_id', $idMenuLevel1)->pluck('id')->toArray();
        $idsMenu3 = Menu::whereIn('parent_id', $idsMenu2)->pluck('id')->toArray();
        $idsMenu = array_merge($idsMenu2, $idsMenu3);
        $tag = Tag::whereIn('menu_id', $idsMenu)->where('status', 1)->get();
        return $tag;
    }

    public function getDataTags($request)
    {
        $data_tags = [];
        if ($request->type == PostConstants::TYPE_CASE_STUDIES) {
            $tags_services = $request->input('tags_services') ?? [];
            $tags_industries = $request->input('tags_industries') ?? [];
            $tags_technologies = $request->input('tags_technologies') ?? [];
            $data_tags = array_merge($tags_services, $tags_industries, $tags_technologies);
        }
        if ($request->type == PostConstants::TYPE_SHAREHOLDERS) {
            $data_tags = $request->input('tags_shareholders') ?? [];
        }
        if ($request->type == PostConstants::TYPE_NEWS) {
            $data_tags = $request->input('tags_news') ?? [];
        }
        return $data_tags;
    }

    public function getFile($request)
    {
        $file_path = null;
        if ($request->file && $request->hasFile('file')) {
            $file = $request->file;
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('/posts/files', $fileName, 'local');
        }
        return $file_path;
    }

    public function updateFile($request, $post)
    {
        if ($request->has('file')) {
            $this->removeFileStorage($post);
            return $this->getFile($request);
        } else {
            return $post->file;
        }
    }

    public function removeFileStorage($post)
    {
        if (Storage::exists($post->file)) {
            Storage::delete($post->file);
        }
    }

    public function updatePostLanguages($postId, $locate, $request)
    {
        $matchThese = ['prefer_id' => $postId, 'language' => $locate];
        if (str_contains($request->content, 'alt=""')) {
            $body = str_replace('alt=""', 'alt="' . $request->name . '"', $request->content);
        }
        $dataLengUpdate = [
            'title' => $request->name,
            'descrition' => $request->intro,
            'body' => $body ?? $request->content,
            'slug' => $request->slug,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'meta_og_url' => $request->meta_og_url,
        ];
        languages::where($matchThese)->update($dataLengUpdate);
    }

    public function getDataUpdatePost($request, $post)
    {
        $dataUpdate = $request->except(['tags_news', 'tags_services', 'tags_technologies', 'tags_industries', 'tags_shareholders']);
        $dataUpdate['file'] = $this->updateFile($request, $post);
        return $dataUpdate;
    }

    public function createPostLanguages($request, $postId)
    {
        $languages = array_keys(LaravelLocalization::getSupportedLocales());
        if (str_contains($request->content, 'alt=""')) {
            $body = str_replace('alt=""', 'alt="' . $request->name . '"', $request->content);
        }
        foreach ($languages as $leng) {
            $dataLang = [
                'title' => $request->name,
                'descrition' => $request->intro,
                'body' => $body ?? $request->content,
                'slug' => $request->slug,
                'type' => 1,
                'language' => $leng,
                'prefer_id' => $postId,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'meta_og_url' => $request->meta_og_url,
            ];
            languages::create($dataLang);
        }
    }
}
