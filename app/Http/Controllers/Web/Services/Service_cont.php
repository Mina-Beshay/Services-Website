<?php

namespace App\Http\Controllers\Web\Services;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Services;

class Service_cont extends Controller
{
    public function index($id){
        $service = Services::find($id);
        if (!$service) {
            // Handle the case where the service with the given ID is not found.
            return abort(404);
        }
        $projects = Project::whereHas('services', function ($query) use ($id) {
            $query->where('services.id', $id);
        })->get();

        $arr['projects'] = $projects;
        $arr2['service']=$service;
        return view('Web.Services.Index_view', $arr,$arr2);
    }
}
