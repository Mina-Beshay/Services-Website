<?php

namespace App\Http\Controllers\Web\Main;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class Main_cont extends Controller
{
    public function index()
    {
        $services=Services::all();
        $arr['services']=$services;

        return view('Web.Main.Main_view',$arr);
    }
}
