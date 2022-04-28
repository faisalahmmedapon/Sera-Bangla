<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\sendEmailJob;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Hash;
use Twilio\Rest\Client;
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
            'phone' => 'required',
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

        $token = "1a682947ff14e29ad85b7131890f5317";
        $twilio_sid = "AC706eaf584a6a8639c52c0300080a4bd4";
        $twilio_verify_sid = "VA164524caec528dbd8a7744249287a42d";

        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($request->phone, "sms");


        $auser = new User();
        $auser->name = $request->name;
        $auser->email = $request->email;
        $auser->phone = $request->phone;
        $auser->password = Hash::make($request->password);
        $auser->status = 1;
        $auser->save();
        $notification = array(
            'message' => 'Your register request successfully done. Now login!',
            'alert-type' => 'success'
        );

        //return redirect('/auth/user/login')->with($notification);
        return redirect()->route('phone.verify')->with(['phone_number' => $request->phone]);

    }


    public function login(Request $request)
    {

//        return $request->all();

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|min:8|max:17',

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        }

        $user = User::where('phone', '=', $request->phone)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                if ($user->phone_verified_at != null) {
                    if ($user->status != 0) {
                        $request->session()->put('user_id', $user->id);
                        return redirect('/auth/user/dashboard');

                    } else {
                        return redirect()->back()->with('error', 'Your account has been disabled . Please Contact in support team.');
                    }
                } else {

                    $token = "1a682947ff14e29ad85b7131890f5317";
                    $twilio_sid = "AC706eaf584a6a8639c52c0300080a4bd4";
                    $twilio_verify_sid = "VA164524caec528dbd8a7744249287a42d";

                    $twilio = new Client($twilio_sid, $token);
                    $twilio->verify->v2->services($twilio_verify_sid)
                        ->verifications
                        ->create($request->phone, "sms");

                    return redirect()->route('phone.verify')->with(['phone_number' => $request->phone]);

                }
            } else {
                return redirect()->back()->with('error', 'Password not match ');
            }

            //return redirect()->back()->with('success','We got your gmail '.$request->email);
        } else {
            return redirect()->back()->with('error', 'oh sorry we not found any ' . $request->email . 'in our database');
        }
    }


    public function logout()
    {
        if (Session::has('user_id')) {
            Session::pull('user_id');
            return redirect('/auth/user/login');
        }
    }


    public function dashboard()
    {
        return view('frontend.user.dashboard');
    }


    public function authUserEmailVerify()
    {

        return view('frontend.user.email_verify');

    }


    public function authUserEmailVerificationSend()
    {
        sendEmailJob::dispatch()
            ->delay(now()->addSeconds(5));

        $notification = array(
            'message' => 'Please check your gmail to verify',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function verifyed()
    {

        if (Session::get('user_id')) {
            $id = Session::get('user_id');

            $auth_user = User::where('id', $id)->first();
            $auth_user->email_verified_at = '1';
            $auth_user->save();
            return redirect('/auth/user/dashboard');
        }
    }


    public function phoneVerify()
    {
        return view('frontend.user.phone_verify');
    }


    protected function phoneVerifyNow(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
        /* Get credentials from .env */
        $current_date_time = Carbon::now()->toDateTimeString();
        $token = "1a682947ff14e29ad85b7131890f5317";
        $twilio_sid = "AC706eaf584a6a8639c52c0300080a4bd4";
        $twilio_verify_sid = "VA164524caec528dbd8a7744249287a42d";

        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($request->verification_code, array('to' => $request->phone_number));
        if ($verification->valid) {
            $user = tap(User::where('phone', $request->phone_number))->update(['phone_verified_at' => $current_date_time]);
            /* Authenticate user */
//            Auth::login($user->first());
            $notification = array(
                'message' => 'Phone number verified . Login Now',
                'alert-type' => 'success'
            );
            return redirect()->route('auth.user.login')->with($notification);
        }
        $notification = array(
            'message' => 'Invalid verification code entered!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


}
