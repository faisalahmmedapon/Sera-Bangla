<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Validator;
class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.slider.index',compact('sliders'));
    }

    public function create()
    {
        return view('backend.slider.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:sliders',
            'image' => 'required'

        ]);


        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        }else {

            $slider = new Slider();
            $slider->title = $request->title;

            if ($request->file('image')) {
                $slider_image = $request->file('image');
                $extension = $slider_image->getClientOriginalExtension();
                $slider_name = "slider_" . time() . "." . $extension;
                Image::make($slider_image)->resize(1920, 1000)->save(public_path().'/uploads/slider/'.$slider_name);
//                Image::make('foo.jpg')->resize(300, 200);
//                $slider_image->move(public_path('/uploads/slider/'), $slider_name);
                $slider->image = "/uploads/slider/" . $slider_name;
            }

            $slider->status = 1;
            $slider->save();

            $notification = array(
                'message' => 'The new slider publish successfully',
                'alert-type' => 'success'
            );

            return redirect('/sliders')->with($notification);

        }


    }

    public function edit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit',compact('slider'));

    }

    public function update( Request $request,$id){

        $slider = Slider::findOrFail($id);
        $slider->title = $request->title;

        if ($request->file('image')) {

            $image_path = public_path($slider->image);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }

            $slider_image = $request->file('image');
            $extension = $slider_image->getClientOriginalExtension();
            $slider_name = "slider_" . time() . "." . $extension;
            Image::make($slider_image)->resize(1920, 1000)->save(public_path().'/uploads/slider/'.$slider_name);

//            $slider_image->move(public_path('/uploads/slider/'), $slider_name);
            $slider->image = "/uploads/slider/" . $slider_name;
        }


        $slider->status = 1;
        $slider->save();

        $notification = array(
            'message' => 'The Slider update successfully',
            'alert-type' => 'success'
        );

        return redirect('/sliders')->with($notification);

    }

    public function status($id){
        $slider = Slider::findOrFail($id);
        if ($slider->status == 1) {
            $slider->status = 0;
        } else {
            $slider->status = 1;
        }
        $slider->save();

        $notification = array(
            'message' => 'The Slider status update successfully',
            'alert-type' => 'success'
        );

        return redirect('/sliders')->with($notification);
    }
    public function delete($id){
        $slider = Slider::findOrFail($id);
        $image_path = public_path($slider->image);
        if (file_exists($image_path)) {
            @unlink($image_path);
        }

        $slider->delete();
        $notification = array(
            'message' => 'The Slider delete successfully',
            'alert-type' => 'success'
        );

        return redirect('/sliders')->with($notification);
    }
}
