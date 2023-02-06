<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassicAlgController extends Controller
{
    public function atbash()
    {
        return view('cryptool.classic-algorithms.atbash');
    }

    public function caesar()
    {
        return view('cryptool.classic-algorithms.caesar');
    }

    public function vigenere()
    {
        return view('cryptool.classic-algorithms.vigenere');
    }
}
