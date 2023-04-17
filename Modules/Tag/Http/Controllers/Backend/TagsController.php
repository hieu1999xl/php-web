<?php

namespace Modules\Tag\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Article\Constants\MenuConstants;
use Modules\Tag\Entities\Tag;
use Yajra\DataTables\DataTables;

class TagsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Tags';

        // module name
        $this->module_name = 'tags';

        // directory path of the module
        $this->module_path = 'tag::backend';

        // module icon
        $this->module_icon = 'fas fa-tags';

        // module model name, path
        $this->module_model = "Modules\Tag\Entities\Tag";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */


    public function index_data()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $page_heading = label_case($module_title);
        $title = $page_heading . ' ' . label_case($module_action);

        $$module_name = $module_model::select('id', 'name', 'slug','menu_id', 'updated_at');

        $data = $$module_name;

        return Datatables::of($$module_name)
            ->addColumn('action', function ($data) {
                if ($data->menu_id) {
                    return '';
                } else {
                    $module_name = $this->module_name;
                    return view('backend.includes.action_column', compact('module_name', 'data'));
                }
            })
            ->editColumn('name', '<strong>{{$name}}</strong>')
            ->editColumn('updated_at', function ($data) {
                $module_name = $this->module_name;
                $diff = Carbon::now()->diffInHours($data->updated_at);

                if ($diff < 25) {
                    return $data->updated_at->diffForHumans();
                } else {
                    return $data->updated_at->isoFormat('llll');
                }
            })
            ->rawColumns(['name', 'action'])
            ->orderColumns(['id'], '-:column $1')
            ->make(true);
    }

    public function store(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Store';

        $validatedData = $request->validate([
            'name' => 'required|max:191|unique:' . $module_model . ',name',
            'slug' => 'nullable|max:191|unique:' . $module_model . ',slug',
        ]);

        $$module_name_singular = $module_model::create($request->except('image'));

        if ($request->image) {
            $media = $$module_name_singular->addMedia($request->file('image'))->toMediaCollection($module_name);
            $$module_name_singular->image = $media->getUrl();
            $$module_name_singular->save();
        }

        flash(icon() . " " . Str::singular($module_title) . "' Created.")->success()->important();

        logUserAccess($module_title . ' ' . $module_action . " | Id: " . $$module_name_singular->id);

        return redirect("admin/$module_name");
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

        $module_action = 'show';

        $$module_name_singular = $module_model::findOrFail($id);

        $posts = $$module_name_singular->posts()->latest()->limit(10);

        logUserAccess($module_title . ' ' . $module_action . " | Id: " . $$module_name_singular->id);

        return view(
            "$module_path.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular", 'posts')
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
    public function update(Request $request, $id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';

        $validatedData = $request->validate([
            'name' => 'required|max:191|unique:' . $module_model . ',name,' . $id,
            'slug' => 'nullable|max:191|unique:' . $module_model . ',slug,' . $id,
        ]);

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->update($request->except('image', 'image_remove'));

        // Image
        if ($request->hasFile('image')) {
            if ($$module_name_singular->getMedia($module_name)->first()) {
                $$module_name_singular->getMedia($module_name)->first()->delete();
            }
            $media = $$module_name_singular->addMedia($request->file('image'))->toMediaCollection($module_name);

            $$module_name_singular->image = $media->getUrl();

            $$module_name_singular->save();
        }
        if ($request->image_remove == 'image_remove') {
            if ($$module_name_singular->getMedia($module_name)->first()) {
                $$module_name_singular->getMedia($module_name)->first()->delete();

                $$module_name_singular->image = '';

                $$module_name_singular->save();
            }
        }

        flash(icon() . " " . Str::singular(__($module_title)) . "" . __('Updated Successfully'))->success()->important();

        logUserAccess($module_title . ' ' . $module_action . " | Id: " . $$module_name_singular->id);

        return redirect("admin/$module_name");
    }

    public function getTagServices(Request $request)
    {
        $menus_services_level_2 = Menu::where('parent_id', MenuConstants::MENU_SERVICES)->pluck('id')->toArray();
        $menus_services_level_3 = Menu::whereIn('parent_id', $menus_services_level_2)->pluck('id')->toArray();
        $menus_services = array_merge($menus_services_level_2, $menus_services_level_3);
        $tags_services = Tag::whereIn('menu_id', $menus_services)->where('status',1)->get();
        $data = $this->convertDataSelect($tags_services);
        return response()->json($data);
    }

    public function getTagIndustries(){
        $menus_industries_level_2 = Menu::where('parent_id', MenuConstants::MENU_INDUSTRIES)->pluck('id')->toArray();
        $menus_industries_level_3 = Menu::whereIn('parent_id', $menus_industries_level_2)->pluck('id')->toArray();
        $menus_industries = array_merge($menus_industries_level_2, $menus_industries_level_3);
        $tag_industries = Tag::whereIn('menu_id', $menus_industries)->where('status',1)->get();
        $data = $this->convertDataSelect($tag_industries);
        return response()->json($data);
    }

    public function getTagTechnologies(){
        $menus_technologies_level_2 = Menu::where('parent_id', MenuConstants::MENU_TECHNOLOGIES)->pluck('id')->toArray();
        $menus_technologies_level_3 = Menu::whereIn('parent_id', $menus_technologies_level_2)->pluck('id')->toArray();
        $menus_technologies = array_merge($menus_technologies_level_2, $menus_technologies_level_3);
        $tag_technologies = Tag::whereIn('menu_id', $menus_technologies)->where('status',1)->get();
        $data = $this->convertDataSelect($tag_technologies);
        return response()->json($data);
    }

    public function convertDataSelect($object)
    {
        $data = [];
        foreach ($object as $key => $record) {
            $data[$key]['id'] = $record->id;
            $data[$key]['text'] = $record->name;
        }
        return $data;
    }


}
