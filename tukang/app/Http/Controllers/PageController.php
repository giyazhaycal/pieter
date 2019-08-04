<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provinsi;
class PageController extends Controller
{
    public function getTnc()
    {
       return view('tnc');
    }

    public function getPanduan()
    {
       return view('panduan');
    }

    public function getAbout()
    {
       return view('about');
    }

}


