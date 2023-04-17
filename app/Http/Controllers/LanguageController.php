<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
//use \Modules\Article\Http\Middleware\GenerateMenus;

class LanguageController extends Controller
{

    public function __construct()
    {
        $this->middleware(GenerateMenus::class, ['only' => 'switch']);
    }

    public function switch($language)
    {
        app()->setLocale($language);

        session()->put('locale', $language);

        setlocale(LC_TIME, $language);

        Carbon::setLocale($language);

        flash()->success(__("Language changed to") . " ". strtoupper($language))->important();

        return redirect()->back();
    }
}
