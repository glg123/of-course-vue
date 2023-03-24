<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    /**
     * Handle the incoming request.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        if($request->has('lang')) {
            if (in_array($request->get('lang'), config('app.supported_locales'))) {
                // Set Lang
                Session::put('locale', $request->get('lang'));
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
