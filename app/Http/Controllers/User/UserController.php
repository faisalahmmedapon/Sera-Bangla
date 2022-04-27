<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\sendEmailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Validator;
use Session;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.user.login');
    }

    public function create()
    {
        return view('frontend.user.register');
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
            'password' => 'required|min:8|max:17',

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        }

        $auser = new User();
        $auser->name = $request->name;
        $auser->email = $request->email;
        $auser->password = Hash::make($request->password);
        $auser->status = 1;
        $auser->save();
        $notification = array(
            'message' => 'Your register request successfully done. Now login!',
            'alert-type' => 'success'
        );

        return redirect('/auth/user/login')->with($notification);

    }



    public function login(Request $request){

//        return $request->all();

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8|max:17',

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        }

        $user = User::where('email' , '=', $request->email)->first();
        if ($user){
            if (Hash::check($request->password,$user->password)){
                if ($user->status != 0){
                    $request->session()->put('user_id',$user->id);
                    return redirect('/auth/user/dashboard');
                }else{
                    return redirect()->back()->with('error','Your account has been disabled . Please Contact in support team.');

                }
            }else{
                return redirect()->back()->with('error','Password not match ');
            }

            //return redirect()->back()->with('success','We got your gmail '.$request->email);
        }else{
            return redirect()->back()->with('error','oh sorry we not found any '.$request->email . 'in our database');
        }
    }



    public function logout(){
        if (Session::has('user_id')){
            Session::pull('user_id');
            return redirect('/auth/user/login');
        }
    }



    public function dashboard(){
        return view('frontend.user.dashboard');
    }



    public function authUserEmailVerify(){

        return view('frontend.user.email_verify');

    }


    public function authUserEmailVerificationSend(){
            sendEmailJob::dispatch()
                ->delay(now()->addSeconds(5));

        $notification = array(
            'message' => 'Please check your gmail to verify',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }


}
