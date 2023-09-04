<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\TestSeries;
use Session;

class UsersController extends Controller
{

    public function login_by_otp(Request $request)
    {
        # code...

        if(!$request->mobile){
            return 'Mobile no is Required';
        }

        $model = User::where('mobile', $request->mobile)->where('type_id', '2')->first();
        // return $model;
        if(!$request->name && $request->otp){
            if($model->otp == $request->otp){
                $model->last_login = date('Y-m-d H:i:s');
                $model->otp = 0;
                $model->save();
                // $request->session()->put('user', $model);
                return response()->json(['result' => 'success', 'message' => 'login Successfully.', 'data'=>$model], 200);

                // return redirect()->route('profile')->with('success', 'You are successfully logged in.');
            }else{
                // Session::flash('message', 'OTP Incorrect. Please Enter OTP Again');
                // Session::flash('alert-class', 'alert-danger');
                // return view('web.login', ['mobile'=>$request->mobile]);
                return response()->json(['result' => 'error', 'message' => 'OTP Incorrect. Please Enter OTP Again'], 400);
            }
        }

        if($request->name && $request->otp){
            if($model->otp == $request->otp){
                $model->name = $request->name;
                $model->email = $request->email;
                $model->otp = 0;
                $model->last_login = date('Y-m-d H:i:s');
                $model->save();
                // $request->session()->put('user', $model);
                // return redirect()->route('profile')->with('success', 'You are successfully logged in.');
                return response()->json(['result' => 'success', 'message' => 'login Successfully.', 'is_new_user'=> false, 'data'=>$model], 200);
            }else{
                // Session::flash('message', 'OTP Incorrect. Please Enter OTP Again');
                // Session::flash('alert-class', 'alert-danger');
                // return view('web.login', ['mobile'=>$request->mobile]);
                return response()->json(['result' => 'error', 'message' => 'OTP Incorrect. Please Enter OTP Again', 'is_new_user'=> false], 400);

            }
        }

        if ($model) {
            $pass = rand(1000, 9999);
            $fields = array(
                "variables_values" => $pass,
                "route" => "otp",
                "numbers" => $request->mobile,
            );

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($fields),
                CURLOPT_HTTPHEADER => array(
                    "authorization: RN1P83hywZdL0g7MTCQWelAmHDvqc2YrskJ96naiKx5Xft4jpF4LmX0TZ8l7GPonrzD52IeRucUsbqSf",
                    "accept: */*",
                    "cache-control: no-cache",
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $response = json_decode($response);
                //  return $response->message[0];
                // if($response->return )
                $model->otp = $pass;
                $model->save();
                // Session::flash('message', $response->message[0]);
                // Session::flash('alert-class', 'alert-success');
                // return view('web.login', ['mobile'=>$request->mobile]);

                return response()->json(['result' => 'success', 'message' => $response->message[0], 'is_new_user'=> false], 200);
            }
        }else{
            $pass = rand(1000, 9999);

            $fields = array(
                "variables_values" => $pass,
                "route" => "otp",
                "numbers" => $request->mobile,
            );

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($fields),
                CURLOPT_HTTPHEADER => array(
                    "authorization: RN1P83hywZdL0g7MTCQWelAmHDvqc2YrskJ96naiKx5Xft4jpF4LmX0TZ8l7GPonrzD52IeRucUsbqSf",
                    "accept: */*",
                    "cache-control: no-cache",
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            $newUser = [];
            $newUser['mobile'] = $request->mobile;
            $newUser['name'] = 'New Student';
            $newUser['otp'] = $pass;
            $newUser['type_id'] = '2';
            $newUser = User::create($newUser);
            $newUser->save();
            // Session::flash('message', 'New User ? Please Fill Your Details.');
            // Session::flash('alert-class', 'alert-success');
            // return view('web.login', ['mobile'=>$request->mobile, 'newUser'=>true]);
            return response()->json(['result' => 'success', 'message' => 'New User ? Please Fill Your Details.', 'is_new_user'=> true, 'mobile'=>$request->mobile], 200);
        }
    }

    public function login(Request $request)
    {
        // return 'testing';
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // return $validator;'
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $model = User::where('email', $request->email)->where('type_id', '2')->where('status', '1')->first();
        if ($model) {

            if (Hash::check($request->input('password'), $model->password)) {
                $model->last_login = date('Y-m-d H:i:s');
                $model->save();
                // return 'You are successfully logged in.';
                return response()->json(['result' => 'success', 'message' => 'You are successfully logged in.', 'data' => $model], 200);
            } else {
                return response()->json(['result' => 'errors', 'message' => 'Entered Passwored is incorrect.'], 400);
            }

        } else {
            return response()->json(['result' => 'errors', 'message' => 'Your Email is not registered.'], 400);
        }
    }


    public function loginByMobile(Request $request)
    {
        // return 'testing';
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
        ]);
        // return $validator;'
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $model = User::where('mobile', $request->mobile)->where('type_id', '2')->where('status', '1')->first();
        if ($model) {
            $model->last_login = date('Y-m-d H:i:s');
            $model->save();

            return response()->json(['result' => 'success', 'message' => 'user data', 'data' => $model], 200);

        } else {
            return response()->json(['result' => 'errors', 'message' => 'User Not Found please check you mobile no.'], 400);
        }
    }



    public function user_signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if($request->password != $request->confirm_password){
            return response()->json(['result' => 'errors', 'message' => 'Password and Confirm Password Should be Same.'], 400);
        }

        $checkEmail = DB::table('user_master')->where('email', $request->email)->first();
        if ($checkEmail) {
                return response()->json(['result' => 'errors', 'message' => 'Email must be unique. This Email already registered.'], 400);
        }

        if ($validator->passes() && $request->password == $request->confirm_password) {
                $data = [];
                $input['name'] = $request->name;
                $input['username'] = $request->username;
                $input['email'] = $request->email;
                $input['mobile'] = $request->phone;
                $input['password'] = Hash::make($request->input("password"));
                $input['type_id'] = '2';
                $input['ip_address'] = $request->ip();
                $input['status'] = '1';
                $input['active_token'] = $this->rand_string(25);
                $input['created_at'] = Carbon::now()->toDateTimeString();
                $input['login_type'] = '1';
                $input['type'] = 'user';

                $user = User::create($input);

                // $url = Route('active-account', ['id' => base64_encode($user->id), 'token' => $input['active_token']]);
                // $link = '<a href="' . $url . '">Click Here</a>';
                // $email_setting = $this->get_email_data('user_registration', array('NAME' => $user->name, "LINK" => $link));
                // $email_data = [
                //     'to' => $user->email,
                //     'subject' => $email_setting['subject'],
                //     'template' => 'signup',
                //     'data' => ['message' => $email_setting['body']]
                // ];
                // $this->SendMail($email_data);
                // $data['success'] = true;
                // $data['msg'] = 'A verification link has been sent on your registered email address. <br><b>Check your spam folder if you did not receive the verification link.</b>';
                // $data['link'] = Route('login');
                // return response()->json($data);

                return response()->json(['result' => 'success', 'message' => 'Signup Sucessfully. Login Now..'], 200);
        } else {
            return response()->json(['result' => 'errors', 'data' => $validator->errors()], 400);
        }
    }


    public function profile(Request $request)
    {
        $id = session('user')->id;
        $model = User::where('id', $id)->where('type_id', '2')->first();
        // $test_series = TestSeries::where('status', '1')->with('category', 'sub_category', 'ques')->get();
         $myTestSeries = order::where('user_id', $id)->with('playlist', 'playlist.category', 'playlist.sub_category','playlist.tests')->where('status', '1')->get();

        return view('web.profile', ['data'=>$model, 'tests'=>$myTestSeries]);
    }


    public function profileSetting(Request $request)
    {
        // return $request->all();

        $id = session('user')->id;
        $update = User::where('id', $id)->first();
        $update->name = $request->name;
        $update->father_name = $request->father_name;
        $update->email = $request->email;
        $update->mobile = $request->mobile;
        $update->gender = $request->gender;
        $update->dob = $request->dob;
        $update->address = $request->address;

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/users/'), $imageName);
            $update->profile_picture = $imageName;
        }

        $update->save();

        Session::flash('message', 'Your Email is not registered.');
        Session::flash('alert-class', 'alert-danger');
        return redirect(route('profile'));
    }

    // API .........//////////////////////////////
    // API .........//////////////////////////////
    // API .........//////////////////////////////
    // API .........//////////////////////////////

    public function userProfile_Update(Request $request)
    {
        // return $request->all();
        // $validator = Validator::make($request->all(), [
        //     'user_id' => 'required',
        //     'test_id' => 'required',
        //     'order_id' => 'required',
        //     'transection_id' => 'required',
        //     'amount' => 'required'
        // // ]);
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 401);
        // }

        $id = $request->user_id;
        $update = User::where('id', $id)->first();
        if($update){
            if($request->name){
                $update->name = $request->name;
            }
            // $update->father_name = $request->father_name;
            if($request->email){
                $update->email = $request->email;
            }
            if($request->mobile){
                $update->mobile = $request->mobile;
            }
            if($request->gender){
                $update->gender = $request->gender;
            }
            if($request->dob){
                $update->dob = $request->dob;
            }
            if($request->address){
                $update->address = $request->address;
            }

            if($request->password && $request->confirm_password){
                if($request->password == $request->confirm_password){
                    $update->address = Hash::make($request->password);
                }
            }
            if ($request->image) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/users/'), $imageName);
                $update->profile_picture = $imageName;
            }
            $update->save();
            return response()->json(['success'=>true,'message'=>'profile image updated successfully','data'=>$update],200);

        }  else{
            return response()->json(['success'=>false,'message'=>' User ID is not Correct '],400);
        }
    }

    public function user_detail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $data = User::where('id', $request->id)->first();
        return response()->json(['success'=>true,'message'=>'User Details By Id','data'=>$data],200);
    }

}
