<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class AuthUserProfileController extends Controller
{
    public function authUserProfile()
    {
        if (Session::get('user_id')) {
            $id = Session::get('user_id');

            $auth_user = User::where('id', $id)->first();
        }
        return view('frontend.user.profile', compact('auth_user'));
    }


    public function authUserProfileEdit()
    {
        if (Session::get('user_id')) {
            $id = Session::get('user_id');

            $auth_user = User::where('id', $id)->first();
        }
        return view('frontend.user.profile_edit', compact('auth_user'));
    }


    public function authUserProfileUpdate(Request $request,$id){
        $auth_user = User::where('id', $id)->first();
        $auth_user->name = $request->name;
        $auth_user->phone = $request->phone;
        $auth_user->gender = $request->gender;
        $auth_user->address = $request->address;

        if ($request->file('image')) {
            $image_path = public_path($auth_user->image);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $brand_logo = $request->file('image');
            $extension = $brand_logo->getClientOriginalExtension();
            $logo_name = "user_profile_logo" . time() . "." . $extension;
            $brand_logo->move(public_path('/uploads/user/'), $logo_name);
            $auth_user->image = "/uploads/user/" . $logo_name;
        }
        $auth_user->save();

        $notification = array(
            'message' => 'Successfully Updated Your Profile ',
            'alert-type' => 'success'
        );

        return redirect()->route('auth.user.profile')->with($notification);

    }



}
