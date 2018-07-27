<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public  function  dashboard()
    {
        return view('frontend.pages.dashboard.dashboard');
    }
}
