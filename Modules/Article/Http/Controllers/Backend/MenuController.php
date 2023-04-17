<?php

namespace Modules\Article\Http\Controllers\Backend;

use App\Models\Menu;
use Flash;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Article\Http\Requests\Backend\MenuRequest;
use Modules\Tag\Entities\Tag;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{

    public function __construct()
    {
        // Page Title
        $this->module_title = 'menus';

        // module name
        $this->module_name = 'menus';

        // directory path of the module
        $this->module_path = 'menus';

        // module icon
        $this->module_icon = 'fas fa-sitemap';

        // module model name, path
        $this->module_model = "App\Models\Menu";
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
        $menu_parents = $this->getMenuDataPrent()->pluck('name', 'id');
        $$module_name = $module_model::select(
            'id',
            'name',
            'parent_id',
            'slug',
            'level',
        );
        if (!empty($request->menu_id)) {
            $menu_child = [];
            $menu_lv2 = Menu::where('parent_id', $request->menu_id)->pluck('id')->toArray();
            $menu_child = array_merge($menu_child, $menu_lv2);
            if (!empty($menu_lv2)) {
                foreach ($menu_lv2 as $value) {
                    $menu_lv3 = Menu::where('parent_id', $value)->pluck('id')->toArray();
                    $menu_child = array_merge($menu_child, $menu_lv3);
                }
            }
            $$module_name = $$module_name->whereIn('id', $menu_child);
        }
        $data = $$module_name;
        return DataTables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;
                return view('backend.includes.action_column', compact('module_name', 'data'));
            })->editColumn('name', '<strong>{{$name}}</strong>')
            ->editColumn('parent_id', function ($data) use ($menu_parents) {
                if ($data->parent_id && $data->parent_id != 0) {
                    return $menu_parents[$data->parent_id];
                }
            })
            ->editColumn('$slug', '{{$slug}}')
            ->rawColumns(['name', 'action'])
            ->orderColumns(['id'], '-:column $1')
            ->make(true);
    }

    public function getMenuDataPrent()
    {
        $module_model = $this->module_model;
        return $module_model::orderBy('order', 'asc');
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
        $levels = [1, 2, 3];
        $menu_parent_level_2 = Menu::where('level', 1)->get();
        $menu_parent_level_3 = Menu::where('level', 2)->get();
        return view(
            "article::backend.$module_name.create",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', 'levels', 'menu_parent_level_2', 'menu_parent_level_3')
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(MenuRequest $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $data = $this->getDataMenu($request);
        $$module_name_singular = $module_model::create($data);
        if ($request->create_tag) {
            $tag = new Tag();
            $tag->name = $$module_name_singular->name;
            $tag->slug = $$module_name_singular->slug;
            $tag->status = $$module_name_singular->status;
            $tag->menu_id = $$module_name_singular->id;
            $tag->save();
        }
        Flash::success("<i class='fas fa-check'></i> New '" . Str::singular($module_title) . "' Added")->important();
        return redirect("admin/$module_name");
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

        $data_id = $$module_name_singular->parent_id;

        return view(
            "article::backend.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular", 'data_id')
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

        $menu = $module_model::findOrFail($id);
        $menu_parent_level_2 = Menu::where('level', 1)->where('status', 1)->get();
        $menu_parent_level_3 = Menu::where('level', 2)->where('status', 1)->get();
        $levels = [1, 2, 3];
        return view(
            "article::backend.$module_name.edit",
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "menu", 'levels', 'menu_parent_level_3', 'menu_parent_level_2')
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
        $data = $this->getDataMenu($request);
        $$module_name_singular->update($data);

        if ($request->create_tag) {
            $tag = Tag::where('menu_id', $$module_name_singular->id)->first();
            if ($tag) {
                $this->updateTag($tag, $menu);
            } else {
                $this->createTag($$module_name_singular);
            }
        } else {
            $tag = Tag::where('menu_id', $$module_name_singular->id)->first();
            if ($tag) {
                $tag->status = 0;
                $tag->save();
            }
        }
        Flash::success("<i class='fas fa-check'></i> '" . Str::singular($module_title) . "' Updated Successfully")->important();
        return redirect("admin/$module_name");
    }

    public function createTag($menu)
    {
        $tag = new Tag();
        $tag->name = $menu->name;
        $tag->slug = $menu->slug;
        $tag->status = $menu->status;
        $tag->menu_id = $menu->id;
        $tag->save();
        return $tag;
    }

    public function updateTag($tag, $menu)
    {
        $tag->name = $menu->name;
        $tag->slug = $menu->slug;
        $tag->status = $menu->status;
        $tag->menu_id = $menu->id;
        $tag->save();
    }

    public function getDataMenu($request)
    {
        return [
            'name' => $request->name,
            'slug' => slug_format($request->slug),
            'parent_id' => $this->getParentId($request->only(['parent_id_level_2', 'parent_id_level_3'])),
            'order' => $request->order,
            'status' => $request->status,
            'create_tag' => $request->create_tag,
            'level' => $request->level,
            'description' => $request->description,
            'image' => $request->image,
        ];
    }

    public function getParentId($request)
    {
        $parent_id = null;
        if (isset($request['parent_id_level_2']) && $request['parent_id_level_2']) {
            $parent_id = $request['parent_id_level_2'];
        }
        if (isset($request['parent_id_level_3']) && $request['parent_id_level_3']) {
            $parent_id = $request['parent_id_level_3'];
        }
        return $parent_id;
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
        $this->removeTag($$module_name_singular->id);
        $$module_name_singular->delete();
        Flash::success('<i class="fas fa-check"></i> ' . label_case($module_name_singular) . ' Deleted Successfully!')->important();
        return redirect("admin/$module_name");
    }

    public function removeTag($menuId)
    {
        $tag = Tag::where('menu_id', $menuId)->first();
        if ($tag) {
            $tag->delete();
        }
    }

    public function getMenusParent($level)
    {
        $data = Menu::where('level', $level)->get();
        // $data = $this->convertDataSelect($data);
        return response()->json($data);
    }
}
