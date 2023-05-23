<?php

namespace App\Http\Controllers;

use App\Models\Cypher\Cypher;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function index(Request $request)
    {
        $cipherName = $request->route()->parameter('cipher');
        $cipher = Cypher::where('name', $cipherName)->with('current')->first();

        return view('static.static')->with(['cipher' => $cipher]);
    }

    public function logicPage(Request $request)
    {
        $cipherName = $request->route()->parameter('cipher');
        $cipher = Cypher::where('name', $cipherName)->with('current')->first();

        return view('static.algorithm')->with(['cipher' => $cipher]);
    }
}
