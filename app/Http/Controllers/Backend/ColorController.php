<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
use Validator;
use Str;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('backend.color.index',compact('colors'));
    }

    public function create()
    {
        return view('backend.color.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'color_name' => 'required|unique:colors'

        ]);


        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        }else {

            $color = new Color();
            $color->color_name = $request->color_name;
            $color->color_name_slug = Str::slug($request->color_name);
            $color->status = 1;
            $color->save();

            $notification = array(
                'message' => 'The new color publish successfully',
                'alert-type' => 'success'
            );

            return redirect('/colors')->with($notification);

        }


    }

    public function edit($id){
        $color = color::findOrFail($id);
        return view('backend.color.edit',compact('color'));

    }

    public function update( Request $request,$id){

        $color = Color::findOrFail($id);
        $color->color_name = $request->color_name;
        $color->color_name_slug = Str::slug($request->color_name);

        $color->status = 1;
        $color->save();

        $notification = array(
            'message' => 'The color update successfully',
            'alert-type' => 'success'
        );

        return redirect('/colors')->with($notification);

    }

    public function status($id){
        $color = Color::findOrFail($id);
        if ($color->status == 1) {
            $color->status = 0;
        } else {
            $color->status = 1;
        }
        $color->save();

        $notification = array(
            'message' => 'The color status update successfully',
            'alert-type' => 'success'
        );

        return redirect('/colors')->with($notification);
    }
    public function delete($id){
        $color = Color::findOrFail($id);
        $color->delete();
        $notification = array(
            'message' => 'The color delete successfully',
            'alert-type' => 'success'
        );

        return redirect('/colors')->with($notification);
    }
}
