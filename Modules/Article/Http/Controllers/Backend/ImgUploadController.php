<?php

namespace Modules\Article\Http\Controllers\Backend;

use App\Models\ImgUpload;
use App\Models\languages;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ImgUploadController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Image';

        // module name
        $this->module_name = 'imgupload';

        // directory path of the module
        $this->module_path = 'imgupload';

        // module icon
        $this->module_icon = 'fas fa-sitemap';

        // module model name, path
        $this->module_model = "App\Models\ImgUpload";
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
        return view(
            "article::backend.$module_name.index_datatable",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular')
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
            'title',
            'image',
            'sub_title',
            'link_button'
        )->with(["language" => function ($q) use ($locate) {
            $q->where('languages.language', '=', $locate)->where('languages.type', '=', 2);
        }]);
        $data = $$module_name;
        return DataTables::of($$module_name)
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view('backend.includes.action_column', compact('module_name', 'data'));
            })
            ->editColumn('title', function ($data) {
                // $is_featured = ($data->is_featured) ? '<span class="badge badge-primary">Featured</span>' : '';
//                            return $data->language.' '.$data->status_formatted.' '.$is_featured;
                $title = $data->language->first();
                // dd($title);
                return $title ? $title->title : '';
            })
            ->editColumn('sub_title', function ($data) {
                $sub_title = $data->language->first();
                return $sub_title ? $sub_title->body : '';
            })
            // ->editColumn('title', '<strong>{{$title}}</strong>')
            ->editColumn('image', '{{$image}}')
            // ->editColumn('sub_title', '{{$sub_title}}')
            ->editColumn('link_button', '{{$link_button}}')
            ->rawColumns(['title','sub_title','action'])
            ->orderColumns(['id'], '-:column $1')
            ->make(true);
    }

    /**
     * get list image upload format json
     * @return list image upload format json
     */
    // public function index_data()
    // {
    //     $module_title = $this->module_title;
    //     $module_name = $this->module_name;
    //     $module_path = $this->module_path;
    //     $module_icon = $this->module_icon;
    //     $module_model = $this->module_model;
    //     $module_name_singular = Str::singular($module_name);

    //     $$module_name = $module_model::all()->with(["language" => function($q) use ($locate) {
    //         $q->where('languages.language', '=', $locate);
    //     }]);
    //     $data = $$module_name;
    //     return DataTables::of($$module_name)
    //                     ->addColumn('action', function ($data) {
    //                         $module_name = $this->module_name;
    //                         return view('backend.includes.action_column_slide', compact('module_name', 'data'));
    //                     })
    //                     ->make(true);
    // }

    /**
     * set position slide
     *
     */
    public function updateImage($imgUpdate, $module_model, $offset, $limit)
    {
        $image = $module_model::where('type', '=', 0)
                                            ->orderBy('oder', 'asc')
                                            ->offset($offset)
                                            ->limit($limit)
                                            ->first();
        //get oder
        $imgOder = $image->oder;
        $imgUpdateOder = $imgUpdate->oder;

        //update oder
        $image->oder = $imgUpdateOder;
        $image->save();
        $imgUpdate->oder = $imgOder;
        $imgUpdate->save();
    }

    public function setPositionSlide(Request $request)
    {
        $id = $request->id;
        $oder = $request->order;
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $$module_name_singular = $module_model::where('id', '=', $id)
                                                ->where('type', '=', 0)
                                                ->first();
        if ($oder == 1) {
            if ($$module_name_singular) {
                $this->updateImage($$module_name_singular, $module_model, 0, 1);
            }
        }
        if ($oder == 2) {
            if ($$module_name_singular) {
                $this->updateImage($$module_name_singular, $module_model, 1, 1);
            }
        }
        if ($oder == 3) {
            if ($$module_name_singular) {
                $this->updateImage($$module_name_singular, $module_model, 2, 1);
            }
        }
        return response()->json(['status' => 'success']);
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

        $file_path = $request->image->getClientOriginalName();
        $fileImg = $request->file('image');
        $storedPath = $fileImg->move('public/imgupload', $file_path);

        // dd($storedPath);

        $dataImg = [
            'title' => $request->title,
            'sub_title'=> $request->sub_title,
            'oder'=> $request->oder,
            'link_button'=> $request->link_button,
            'type'=>$request->type,
            'image'=>  $storedPath
        ];
        // dd($dataImg);
        $dataSave = ImgUpload::create($dataImg);

        $languages = ['en', 'vi', 'jp'];
        foreach ($languages as $leng) {
            $dataLang = [
                'title' => $request->title,
                // 'descrition'=> $request->sub_title,
                'body'=> $request->sub_title,
                'type'=> 2,
                'language'=> $leng,
                'prefer_id'=> $dataSave->id,
                // hot fix for upload banner homepage
                'slug' => '---',
                'meta_title' => '---',
                'meta_keywords' => '---',
                'meta_description' => '---',
                'meta_og_url' => '---',
                // end hot fix for upload banner homepage
            ];
            languages::create($dataLang);
        }
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



//        Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.'(ID:'.$$module_name_singular->id.") ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

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
        $request->validate([
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);


        $locate = app()->getLocale();
        $$module_name_singular = $module_model::findOrFail($id);

        $file_path = $request->image->getClientOriginalName();
        $fileImg = $request->file('image');
        $storedPath = $fileImg->move('public/imgupload', $file_path);


        //update with leng = en
        $dataLengUpdate = [
                'title' => $request->title,
                'body' => $request->sub_title,
            ];
        if ($locate == 'en') {
            $dataUpdate = [
                    'title' => $request->title,
                    'sub_title'=> $request->sub_title,
                    'oder'=> $request->oder,
                    'link_button'=> $request->link_button,
                    'type'=>$request->type,
                    'image'=> $storedPath
                ];
            $$module_name_singular->update($dataUpdate);
            $matchThese = ['prefer_id' => $id, 'language' => 'en'];
            languages::where($matchThese)->update($dataLengUpdate);
        }
        if ($locate == 'vi') {
            $matchThese = ['prefer_id' => $id, 'language' => 'vi'];
            languages::where($matchThese)->update($dataLengUpdate);
        }
        if ($locate == 'jp') {
            $matchThese = ['prefer_id' => $id, 'language' => 'jp'];
            languages::where($matchThese)->update($dataLengUpdate);
        }

        return redirect("admin/$module_name");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $module_name = $this->module_name;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'destroy';

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->delete();
        return redirect("admin/$module_name");
    }
}
