<?php

namespace Modules\CVs\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\cvs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Spatie\Activitylog\Models\Activity;
use Log;
use Auth;
use App\Models\Notice;

class CVsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function __construct()
    {
        // Page Title
        $this->module_title = 'CVs';

        // module name
        $this->module_name = 'cvs';

        // directory path of the module
        $this->module_path = 'CVs';

        // module icon
        $this->module_icon = 'fas fa-file-alt';

        // module model name, path
        $this->module_model = "App\Models\cvs";
    }

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

        return view('cvs::backend.index_datatable',
        compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action')
    );
    }

    public function index_data(){

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';
        $$module_name = $module_model::select(
            'id',
            'username_candidate',
            'email_candidate',
            'phone_candidate',
            'status',
            'created_at'
        );
        $data = $$module_name;
        return DataTables::of($$module_name)
                        ->addColumn('action', function ($data) {
                            $module_name = $this->module_name;

                            return view('cvs::backend.action_column', compact('module_name', 'data'));
                        })
                        ->editColumn('username_candidate', '<strong>{{$username_candidate}}</strong>')
                        ->editColumn('email_candidate', '{{$email_candidate}}')
                        ->editColumn('phone_candidate', '{{$phone_candidate}}')
                        ->editColumn('status', function ($data) {
                            $dataStatus = $data->status;
                            if($dataStatus == 0){
                                return '<button type="button" class="btn btn-secondary">Open</button>';
                            }
                            if ($dataStatus == 1 ){
                                return '<button type="button" class="btn btn-info">Inprogress</button>';
                            }
                            if ($dataStatus == 2 ){
                                return ' <button type="button" class="btn btn-warning">Interview</button>';
                            }
                            if ($dataStatus == 3 ){ 
                                return '<button type="button" class="btn btn-success">Done</button>';
                            }
                            if ($dataStatus == 4 ){
                                return '<button type="button" class="btn btn-danger">Cancel</button>';
                            }
                        })
                        ->editColumn('created_at', function($data){
                            $dateCreate = $data->created_at->format('Y-m-d');
                            return $dateCreate;
                        })
                        ->rawColumns(['username_candidate','action', 'status'])
                        ->orderColumns(['id'], '-:column $1')
                        ->make(true);
    }



    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cvs::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    //  public function show(Request $request)
    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';
    
        $$module_name_singular = $module_model::with('user')->findOrFail($id);
        $activities = Activity::where('subject_type', '=', $module_model)
                                ->where('log_name', '=', $module_name)
                                ->where('subject_id', '=', $id)
                                ->latest()
                                ->limit(1);
        Log::info(label_case($module_title.' '.$module_action).' | User:'.Auth::user()->name.'(ID:'.Auth::user()->id.')');
        return view(
            "cvs::backend.show",
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
        return view(
            'cvs::backend.edit',
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
        $module_name_singular = $this->module_model::findOrFail($id);
        $result = $module_name_singular->update([
            'status' => $request->status,
            'update_by' => auth()->user()->id
        ]);
        if ($request->ajax) {
            if ($result) {
                return response()->json(['result' => 'success']);
            }
            return response()->json(['result' => 'error']);
        }
        if($result) {
            return redirect('admin/cvs');
        }
        return redirect()->back();
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
