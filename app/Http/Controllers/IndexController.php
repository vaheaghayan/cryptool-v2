<?php

namespace App\Http\Controllers;

use App\Models\Cypher;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $algorithms = Cypher::where('show_status', '1')->get();
        $count = $algorithms->count();

        return view('cryptool.index')->with(['ciphers' => $algorithms, 'count' => $count]);
    }

    public function table(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $algorithms = Cypher::where('show_status', '1')->get();
        } else {
            $algorithms = Cypher::where('show_status', '1')->where('name', 'like', '%' . $search . '%')->get();
        }

        $count = $algorithms->count();

        return response()->json(['ciphers' => $algorithms, 'count' => $count]);
    }
}
