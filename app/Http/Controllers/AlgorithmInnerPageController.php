<?php

namespace App\Http\Controllers;

use App\Models\Cypher\Cypher;
use App\Models\CypherCategory\CypherCategory;
use App\Models\CypherCategory\CypherCategoryMl;
use Illuminate\Http\Request;

class AlgorithmInnerPageController extends Controller
{
    public function index(Request $request)
    {
        $categoryName = $request->route()->parameter('cipherCategory');

        if (!in_array($categoryName, Cypher::CATEGORIES)) {
            abort(404);
        }

        $cypherCategory = CypherCategory::where('alias', $categoryName)->first();
        $cypherCategoryMl = CypherCategoryMl::where('cypher_category_id', $cypherCategory->id)->where('lng_code', cLng())->first();
        $cyphers = Cypher::where('cypher_category_id', $cypherCategory->id)->get();

        return view('cryptool.inner_pages.category_inner_page')->with([
            'cypherCategoryMl' => $cypherCategoryMl,
            'cyphers' => $cyphers
        ]);
    }
}
