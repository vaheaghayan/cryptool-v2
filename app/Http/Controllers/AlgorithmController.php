<?php

namespace App\Http\Controllers;

use App\Models\Cypher;
use Illuminate\Http\Request;

class AlgorithmController extends Controller
{
    public function hash()
    {
        $algorithms = Cypher::where('category', 'hash_algorithms')->get();

        return view('cryptool.algorithms.hash')->with([
            'algorithm' => $algorithms
        ]);
    }

    public function classic()
    {
        $algorithms = Cypher::where('category', 'classic_algorithms')->get();

        return view('cryptool.algorithms.classic')->with([
            'algorithm' => $algorithms
        ]);
    }
    public function crypto()
    {
        $algorithms = Cypher::where('category', 'cryptographic_algorithms')->get();

        return view('cryptool.algorithms.crypto')->with([
            'algorithm' => $algorithms
        ]);
    }
}
