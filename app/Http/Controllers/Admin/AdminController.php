<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Gate;

class AdminController extends Controller
{
   public  function  dashboard()
   {
       return view('backend.pages.dashboard.dashboard');
   }
}
