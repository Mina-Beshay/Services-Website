<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Project;
use App\Models\RelatedProject;
use App\Models\Services;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::with('services')->get();

        // Add a new key 'relatedProjects' to each project
        $projects->each(function ($project) {
            $project->relatedProjects = $this->getRelatedProjects($project);
        });

        $arr['projects'] = $projects;
        return view('Admin.projects.index', $arr);
    }

    private function getRelatedProjects(Project $project)
    {
        return RelatedProject::whereHas('service', function ($query) use ($project) {
            $query->whereIn('id', $project->services->pluck('id'));
        }) ->where('project_id', '!=', $project->id)->get();
    }

    public function add(Request $request)
    {
        $services = Services::all();
        if ($request->isMethod('post')) {
            $this->storeProject($request);
            return redirect()->route('projects.index');
        } else {
            $arr['services'] = $services;
            return view('Admin.projects.add', $arr);
        }
    }

    public function update(Request $request, $id)
    {
        $services = Services::all();
        $project = Project::findOrFail($id);

        if ($request->isMethod('post')) {
            $this->validateUpdateRequest($request);

            $project = $this->updateProject($request, $project);

            return redirect(route('projects.index'));
        } else {
            $arr['services'] = $services;
            $arr['project'] = $project;
            return view('Admin.projects.update', $arr);
        }
    }

    public function delete(Request $request, $id)
    {
        $project = Project::find($id);
        if ($request->isMethod('post')) {
            $this->deleteProject($id);
            return redirect(route('projects.index'));
        } else {
            $arr['project'] = $project;
            return view('Admin.projects.delete', $arr);
        }
    }

    private function storeProject(Request $request)
    {
        // Validation and other checks can be added here
        $project = new Project([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Save the project
        $project->save();

        // Handle image upload
        if ($request->hasFile('image')) {
            $this->handleImageUpload($request, $project);
        }

        // Attach services
        $serviceIds = $request->input('service_ids');
        $project->services()->attach($serviceIds, ['project_id' => $project->id]);

        // Handle gallery images upload
        if ($request->hasFile('images')) {
            $this->handleGalleryImagesUpload($request, $project);
        }


        foreach ($serviceIds as $serviceId) {
            $relatedProject = new RelatedProject([
                'project_id' => $project->id,
                'service_id' => $serviceId,
            ]);

            // Save the related project
            $relatedProject->save();
        }



    }

    private function handleImageUpload(Request $request, Project $project)
    {
        $file = $request->file('image');
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path("image/"), $imageName);

        $project->image = $imageName;
        $project->save();
    }

    private function handleGalleryImagesUpload(Request $request, Project $project)
    {
        $files = $request->file('images');
        foreach ($files as $file) {
            $imageName = time() . '_' . $file->getClientOriginalName();
            Image::create([
                'project_id' => $project->id,
                'image' => $imageName,
            ]);
            $file->move(public_path("gallery/"), $imageName);
        }
    }

    private function validateUpdateRequest(Request $request)
    {
        // Validation rules can be added here
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    }

    private function updateProject(Request $request, Project $project)
    {
        if ($request->hasFile('image')) {
            $this->handleImageUpload($request, $project);
        }

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $project->services()->sync($request->input('service_ids'));

        if ($request->hasFile('images')) {
            $this->handleGalleryImagesUpload($request, $project);
        }

        return $project;
    }

    private function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        Image::where('project_id', $id)->delete();
        $project->services()->detach();
        $project->delete();
    }
}

