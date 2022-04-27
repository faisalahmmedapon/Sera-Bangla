<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Validator;
use Str;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();
        return view('backend.size.index',compact('sizes'));
    }

    public function create()
    {
        return view('backend.size.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'size_name' => 'required|unique:sizes'

        ]);


        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        }else {

            $size = new Size();
            $size->size_name = $request->size_name;
            $size->size_name_slug = Str::slug($request->size_name);
            $size->status = 1;
            $size->save();

            $notification = array(
                'message' => 'The new size publish successfully',
                'alert-type' => 'success'
            );

            return redirect('/sizes')->with($notification);

        }


    }

    public function edit($id){
        $size = Size::findOrFail($id);
        return view('backend.size.edit',compact('size'));

    }

    public function update( Request $request,$id){

        $size = Size::findOrFail($id);
        $size->size_name = $request->size_name;
        $size->size_name_slug = Str::slug($request->size_name);
        $size->save();

        $notification = array(
            'message' => 'The size update successfully',
            'alert-type' => 'success'
        );

        return redirect('/sizes')->with($notification);

    }

    public function status($id){
        $size = Size::findOrFail($id);
        if ($size->status == 1) {
            $size->status = 0;
        } else {
            $size->status = 1;
        }
        $size->save();

        $notification = array(
            'message' => 'The size status update successfully',
            'alert-type' => 'success'
        );

        return redirect('/sizes')->with($notification);
    }
    public function delete($id){
        $size = Size::findOrFail($id);
        $size->delete();
        $notification = array(
            'message' => 'The size delete successfully',
            'alert-type' => 'success'
        );

        return redirect('/sizes')->with($notification);
    }
}
