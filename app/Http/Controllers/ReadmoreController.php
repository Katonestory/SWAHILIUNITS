<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadmoreController extends Controller
{
    //
    public function showMore()
    {
        return view('readmore.readmore');
    }
}
