<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Session;
use Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function create()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:admins|max:255',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|min:8|max:17',
        ]);

        if ($validatedData) {
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->password = Hash::make($request->password);
            $admin->status = '0';
            $admin->save();
            return redirect('/auth/admin/login')->with('success','Admin Register Successfully');
        } else {
            return redirect()->back()->with('error','something went wrong');

        }

    }



    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8|max:17',
        ]);

        $admin = Admin::where('email' , '=', $request->email)->first();
        if ($admin){
            if (Hash::check($request->password,$admin->password)){
                $request->session()->put('admin_id',$admin->id);
                return redirect('/auth/admin/dashboard');
            }else{
                return redirect()->back()->with('error','Password not match ');
            }

            //return redirect()->back()->with('success','We got your gmail '.$request->email);
        }else{
            return redirect()->back()->with('error','oh sorry we not found any '.$request->email . 'in our database');
        }
    }



    public function logout(){
        if (Session::has('admin_id')){
            Session::pull('admin_id');
            return redirect('/auth/admin/login');
        }
    }
}
