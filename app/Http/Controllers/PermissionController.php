<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Log;
use Carbon\Carbon;
use Flash;
use Auth;


class PermissionController extends Controller
{

    public function __construct() {
        //module title
        $this->module_title = 'Permissions';

        //module name
        $this->module_name = 'permissions';

        // directory path of the module
        $this->module_path = 'permissions';

        // module icon
        $this->module_icon = 'c-icon fas fa-bell';

        // module model name, path
        $this->module_model = "App\Models\Permission";
    }

    /**
     * @return Illuminate\Http\Response;
     */
    public function index() {
        $module_name = $this->module_name;
        $module_title = $this->module_title;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = $module_model::all();

        return view("backend.$module_name.index_data",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action'));
    }

    /**
     *
     *
     * @return Yajra\DataTables\DataTables
     */
    public function index_data()
    {
        $module_name = $this->module_name;
        $module_title = $this->module_title;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        //get data
        $$module_name_singular = $module_model::select('id', 'name', 'guard_name', 'created_at', 'updated_at');
        //dd(json_encode(DataTables::of($$module_name_singular)->make(true)->getData()));
        return DataTables::of($$module_name_singular)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
                ->editColumn('name', function($data) {
                    return "<strong>$data->name</strong>";
                })
                ->editColumn('updated_at', function ($data) {
                    $module_name = $this->module_name;

                    $diff = Carbon::now()->diffInHours($data->updated_at);

                    if ($diff < 25) {
                        return Carbon::parse($data->updated_at)->diffForHumans();
                    } else {
                        return Carbon::parse($data->updated_at)->isoFormat('LLLL');
                    }
                })
                ->rawColumns(['name', 'action'])
                //->orderColumns(['id'], '-:column $1')
                ->make(true);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module_name = $this->module_name;
        $module_title = $this->module_title;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Create';

        return view('backend.permissions.create_permission',
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module_name = $this->module_name;
        $module_title = $this->module_title;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Store';

        $module_model::create($request->all());
        Flash::success("<i class='fas fa-check'></i>  '". __('New'). ' '.Str::singular(__($module_title)).' '. __('Added'))->important();

        return redirect()->route("backend.$module_name.index")->with('flash_success',__("$module_name") . __('Added'));
    }

    /**
     * Display the specified resource.￼
     *
     * @param \App\Permission $permission
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $permission is id of permission
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($permission)
    {
        $module_name = $this->module_name;
        $module_title = $this->module_title;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Edit';

        $$module_name_singular = $module_model::find($permission);

        return view('backend.permissions.edit_permission',
            compact('module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action', "$module_name_singular"));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permission)
    {
        $module_name = $this->module_name;
        $module_title = $this->module_title;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';

        $$module_name_singular = $module_model::find($permission)->update($request->all());

        Flash::success("<i class='fas fa-check'></i>  '".Str::singular(__($module_title)).' '. __('Updated'))->important();

        return redirect()->route("backend.$module_name.index");

    }

    /**
     * Remove the specified resource from storage.
     * @param int id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $module_name = $this->module_name;
        $module_title = $this->module_title;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::findOrFail($id);
        $$module_name_singular->delete();
        Flash::success("<i class='fas fa-check'></i>  '".Str::singular(__($module_title)).' '. __('Deleted'))->important();

        return redirect()->route("backend.$module_name.index");
    }
    public function trashed() {

    }
}
