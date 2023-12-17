<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('Admin.services.index', compact('services'));
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=>['required','string','max:40'],
                'details'=>['required','string','max:100'],
            ]);
            $services=Services::create($request->all());

            return redirect()->route('services.index');
        }else{

            return view('Admin.services.add');
        }

    }

    public function update(Request $request,$id){
        $services=Services::find($id);
        if($request->isMethod('post')){
            $request->validate([
                'name'=>['required','string','max:40'],
                'details'=>['required','string','max:100'],
            ]);

            $services->name=$request->input('name');
            $services->details=$request->input('details');
            $services->update();
            return redirect()->route('services.index');
        }else{
            $arr['services']=$services;
            return view('Admin.services.update',$arr);
        }
    }

    public function delete(Request $request,$id){
        $services=Services::find($id);
        if($request->isMethod('post')){
                $services->delete();
            }else{
            $arr['services']=$services;
            return view('Admin.services.delete',$arr);
        }
        return redirect(route('services.index'));

    }


}
