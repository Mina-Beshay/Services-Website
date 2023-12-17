<?php

namespace App\Http\Controllers\Web\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Services;


class Project_cont extends Controller
{
    public function index( $id)
    {
        $projects = Project::find($id);
        $services = $projects->services;
        $arr['projects'] = $projects;
        $arr2['services']=$services;
        return view('Web.Project.Index_view', $arr,$arr2);

    }

}
