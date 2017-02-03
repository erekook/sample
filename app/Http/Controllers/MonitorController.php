<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitorController extends Controller
{
  public function index()
  {
    return view('monitor/index');
  }

  public function city()
  {

    return view('monitor/city');
  }

  public function county()
  {
    return view('monitor.county');
  }

}
