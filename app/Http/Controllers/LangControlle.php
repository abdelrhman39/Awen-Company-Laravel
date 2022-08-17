<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class LangControlle extends Controller
{
    function changeLang($lang)
    {
        App::setLocale($lang);
        session()->put("lang_code",$lang);
        return redirect()->back();
    }

    
}
