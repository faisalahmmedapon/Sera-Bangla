<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Validator;
use Str;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('backend.material.index',compact('materials'));
    }

    public function create()
    {
        return view('backend.material.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'material_name' => 'required|unique:materials'

        ]);


        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        }else {

            $material = new Material();
            $material->material_name = $request->material_name;
            $material->material_name_slug = Str::slug($request->material_name);
            $material->status = 1;
            $material->save();

            $notification = array(
                'message' => 'The new material publish successfully',
                'alert-type' => 'success'
            );

            return redirect('/materials')->with($notification);

        }


    }

    public function edit($id){
        $material = Material::findOrFail($id);
        return view('backend.material.edit',compact('material'));

    }

    public function update( Request $request,$id){

        $material = Material::findOrFail($id);
        $material->material_name = $request->material_name;
        $material->material_name_slug = Str::slug($request->material_name);
        $material->save();

        $notification = array(
            'message' => 'The material update successfully',
            'alert-type' => 'success'
        );

        return redirect('/materials')->with($notification);

    }

    public function status($id){
        $material = Material::findOrFail($id);
        if ($material->status == 1) {
            $material->status = 0;
        } else {
            $material->status = 1;
        }
        $material->save();

        $notification = array(
            'message' => 'The material status update successfully',
            'alert-type' => 'success'
        );

        return redirect('/materials')->with($notification);
    }
    public function delete($id){
        $material = Material::findOrFail($id);
        $material->delete();
        $notification = array(
            'message' => 'The material delete successfully',
            'alert-type' => 'success'
        );

        return redirect('/materials')->with($notification);
    }
}
