<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

class LocaleController extends Controller
{
    public function switchLanguage($language_code)
    {
        if (array_key_exists($language_code, Config::get('languages'))) {
            session()->put('locale', $language_code);
        }
        return redirect()->back();
    }
}
