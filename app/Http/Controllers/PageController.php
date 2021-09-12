<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function simulation()
    {
        return view('media-phet.simulation');
    }
}
