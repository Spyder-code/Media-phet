<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function simulation()
    {
        return view('media-phet.simulation');
    }

    public function index()
    {
         return view('media-phet.index');
    }

    public function room()
    {
        return view('media-phet.room');
    }

    public function akun()
    {
        return view('media-phet.akun');
    }
}
