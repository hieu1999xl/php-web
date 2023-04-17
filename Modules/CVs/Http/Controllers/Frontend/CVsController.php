<?php

namespace Modules\CVs\Http\Controllers\Frontend;
use Modules\CVs\Http\Controllers\Frontend;

use App\Models\languages;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\cvs;
use Modules\CVs\Http\Requests\Frontend\Requestscvs;

use App\Models\Notice;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TelegramRegister;

use Illuminate\Support\Facades\Mail;

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
        return view('cvs::frontend.index');

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
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;

        $file_path = $request->fileCvs->getClientOriginalName();
        $fileCvs = $request->file('fileCvs');
        $storedPath = $fileCvs->move('public/cvs', $file_path);
        // $request->fileCvs->store('public');

        $currentURL = \URL::current();
        $URL = explode("/", $currentURL);
        $URLdefault = $URL[0].'//'.$URL[1].$URL[2].'/public/cvs';
        $urlFile = $URLdefault . '/' . $file_path;
        $dataCVs = [
            'username_candidate' => $request->username_candidate,
            'email_candidate'=> $request->email_candidate,
            'phone_candidate'=> $request->phone_candidate,
            // 'description_candidate'=> $request->description_candidate,
            'position'=>$request->position,
            'times_start_job'=>$request->times_start_job,
            'file_cv' =>  '<a href="'.$urlFile.'">'.$file_path.'</a>',
            'update_by' => null
        ];
        // dd(Config::get('services.telegram_id'));
        cvs::create($dataCVs);

        Mail::to($request->email_candidate)->send(new \App\Mail\MailHR($dataCVs));

        //push telegram
        //$user = Auth::user();
        $notice = new Notice([
            'notice' => 'Ứng tuyển job',
            'noticedes' => 'Ứng viên:'.  $request->username_candidate . "\n" . "Vị trí: ". $request->position,
            // 'telegram_id' => Config::get('services.telegram_id')
        ]);

        $notice->save();

        $notice->notify(new TelegramRegister());
        return back()->with('msg', 'Thank you for applying to Tinhvan Software. We will review the CV and get back to you as soon as possible.');
        // dd($currentURL);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('cvs::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('cvs::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

    }
}
