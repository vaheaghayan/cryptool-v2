<?php

namespace App\Http\Controllers;

use App\Models\CypherCategory\CypherCategory;
use App\Models\CypherCategory\CypherCategoryMl;
use Illuminate\Http\Request;

class AlgorithmInnerPageController extends Controller
{
    public function index(Request $request)
    {
        $categoryName  = $request->route()->parameter('cipherCategory');
        $cypherCategory = CypherCategory::where('name', $categoryName)->first();
        $cypherCategoryMl = CypherCategoryMl::where('cypher_category_id', $cypherCategory->id)->where('lng_code', cLng())->first();

        return view('cryptool.inner_pages.' . $categoryName)->with([
            'cypherCategoryMl' => $cypherCategoryMl
        ]);
    }
}