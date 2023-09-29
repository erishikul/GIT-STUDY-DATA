<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\banner;

use App\Models\Category;

use App\Models\order;

use App\Models\Playlist;

use App\Models\pdf;

use App\Models\Subject;

use App\Models\TestSeries;

use App\Models\User;

use App\Models\live_class;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Session;

use Carbon\Carbon;



// use Atuh;

use Illuminate\Support\Facades\Auth;



class SiteController extends Controller

{







    public function instructions($id)

    {

        if (!session('user')) {

            return redirect(route('login'));

        }

        $user_id = session('user')->id;

        $test_series = TestSeries::where('id', base64_decode($id))->first();

        // $total_ques = count($test_series->ques);



        return view('web.test.instructions', ['id' => $id, 'title' => $test_series->title, 'data' => $test_series]);

    }



    public function declaration($id)

    {

        if (!session('user')) {

            return redirect(route('login'));

        }

        $user_id = session('user')->id;

        $test_series = TestSeries::where('id', base64_decode($id))->first();

        $total_ques = count($test_series->ques);



        return view('web.test.declaration', ['id' => $id, 'data' => $test_series, 'total_ques' => $total_ques]);

    }







   





    public function index()

    {

        $banner = banner::where('type', 'web_banner')->where('status', '<>', '3')->get();

        $category = Category::where('parent_id', '0')->where('status', '<>', '3')->with('sub_categories')->get();

        $test_series = TestSeries::where('status', '1')->where('type', 'test')->with('category', 'sub_category')->orderBy('id', 'desc')->limit(3)->get();

        $playlist = Playlist::where('status', '1')->with('category', 'sub_category', 'tests')->orderBy('id', 'desc')->limit(3)->get();

        $vacancy = DB::table('jobs')->where('vacancy', '!=', '0')->orderBy('id', 'desc')->limit(3)->get();

        $admit_card = DB::table('jobs')->where('admit_card', '!=', '0')->orderBy('id', 'desc')->limit(3)->get();

        $result = DB::table('jobs')->where('result', '!=', '0')->orderBy('id', 'desc')->limit(3)->get();

        return view('web.home', ['banners' => $banner, 'tests' => $playlist, 'categories' => $category, 'vacancy' => $vacancy, 'admit_card' => $admit_card, 'result' => $result]);

    }

   





  




   





    



   



    public function explaination_v2($id)

    {

        if (!session('user')) {

            return redirect(route('login'));

        }

        $user_id = session('user')->id;

        $test_series = TestSeries::where('id', base64_decode($id))->with('category', 'sub_category', 'ques', 'ques.options')->first();

        $total_ques = count($test_series->ques);



        // for ($i = 1; $i <= $total_ques; $i++) {

        //     Session::forget('que'.$i);

        // }

        return view('web.test.test_explaination', ['id' => $id, 'data' => $test_series, 'count' => $total_ques]);

    }








    public function login()

    {

        return view('web.login');

    }

    public function admin_login(Type $var = null)

    {

        # code...

        return view('web.admin-login');



    }



    public function register(Request $request)

    {



        return view('web.register');

    }



    public function register_post(Request $request)

    {

        // return $request->all();



        $checkEmail = DB::table('user_master')->where('email', $request->email)->first();

        if ($checkEmail) {

            Session::flash('message', 'This email already in Use.');

            Session::flash('alert-class', 'alert-danger');

            return redirect()->back()->with('danger', 'Incorrect Email or Password!');

            // return response()->json(['result' => 'errors', 'message' => 'Email must be unique. This Email already registered.'], 400);

        }

        // return Hash::make($request->password);

        if ($request->password == $request->confirm_password) {

            $data = [];

            $input['name'] = $request->name;

            // $input['username'] = $request->username;

            $input['email'] = $request->email;

            $input['phone'] = $request->phone;

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

            Session::flash('message', 'Register Successfully. Login Now');

            Session::flash('alert-class', 'alert-success');

            return redirect(route('login'));

        } else {

            Session::flash('message', 'Your Password & confirm Password not Match.');

            Session::flash('alert-class', 'alert-danger');

            return redirect()->back()->with('danger', '...');

        }

    }





    public function about()

    {

        return view('web.cms.about');

    }



    public function contectUs()

    {

        return view('web.cms.contect');

    }



    public function login_post(Request $request)

    {

        $model = User::where('email', $request->email)->where('type_id', '1')->first();

        if ($model) {

            // return var_dump(Hash::check($request->password, $model->password)) . '<br>'. $request->password;

            if (Hash::check($request->password, $model->password)) {

                $model->last_login = date('Y-m-d H:i:s');

                $model->save();

                // ->where('type_id', '2')

                // Auth::guard('user')->login($model);

                // return $model;

                if ($model->type_id == '2') {

                    $request->session()->put('user', $model);

                    //    echo 'sucess';

                    return redirect()->route('profile')->with('success', 'You are successfully logged in.');

                } elseif ($model->type_id == '1') {

                    $request->session()->put('admin', $model);

                    return redirect()->route('admin.dashboard')->with('success', 'You are successfully logged in.');

                }

            } else {

                // echo '0';

                Session::flash('message', 'Entered Passwored is incorrect.');

                Session::flash('alert-class', 'alert-danger');

                return redirect()->back()->with('danger', 'Incorrect Email or Password!');

            }

        } else {

            Session::flash('message', 'Your Email is not registered.');

            Session::flash('alert-class', 'alert-danger');

            return redirect()->back()->with('danger', 'Incorrect Email or Password!');

        }

    }



  





    public function logOut()

    {

        Session::flush();

        return redirect()->route('vacancy');

    }



    public function vacancy()

    {

        if (!isset($_GET['viewAll'])) {



            $vacancy = DB::table('jobs')->where('vacancy', '!=', '0')->orderBy('id', 'desc')->limit(25)->get();

            $result = DB::table('jobs')->where('result', '!=', '0')->orderBy('id', 'desc')->limit(25)->get();

            $admit_card = DB::table('jobs')->where('admit_card', '!=', '0')->orderBy('id', 'desc')->limit(25)->get();


             $seo_data = DB::table('setting')->where('id', '1')->first();
                
             $blogs_data = DB::table('jobs')->where('isblog','1')->orderBy('id', 'desc')->limit(4)->get();
            // return   $canonicalUrl = url('/example');

            

            return view('web.vacancy', ['vacancy' => $vacancy, 'result' => $result, 'admit_card' => $admit_card,'seo_data'=>$seo_data,'blogs_data'=>$blogs_data]);

        } else {

            if ($_GET['viewAll'] == 'Admit_Card') {

                $title = 'Admit Cards';
               

                $vacancy = DB::table('jobs')->where('admit_card', '!=', '0')->orderBy('id', 'desc')->get();

            }

            if ($_GET['viewAll'] == 'Result') {

                $title = 'Results';

                $vacancy = DB::table('jobs')->where('result', '!=', '0')->orderBy('id', 'desc')->get();

            }

            if ($_GET['viewAll'] == 'Vacancy') {

                $title = 'Latest Jobs';

                $vacancy = DB::table('jobs')->where('vacancy', '!=', '0')->orderBy('id', 'desc')->get();
                    $test="new title";
            }

            // $discretion="test discretion";
            // $tag="test tag";

            return view('web.vacancy', ['vacancy' => $vacancy, 'title' => $title]);
           

        }

    }



    public function vacancyDetail($id)

    {

        $vacancy = DB::table('jobs')->where('id', $id)->first();

        $detail = DB::table('jobs_details')->where('job_id', $id)->get();

      $title= $vacancy->title;
      $titles = str_replace(' ', '-', strtolower($title));
      
            
       $canonicalUrl = url('new/govt/jobs/detail/'.$id.'?'.$titles);
         $tag= $vacancy->tag;
       if($vacancy->description != null){
            $description = $vacancy->description;
       }else{
        $description = $vacancy->title;
       }
       
        return view('web.govt', ['vacancy' => $vacancy, 'detail' => $detail,'canonicalUrl'=>$canonicalUrl,'description'=>$description,'tag'=>$tag]);

    }

    public function govt()

    {

        if (!isset($_GET['viewAll'])) {



            $vacancy = DB::table('jobs')->where('vacancy', '!=', '0')->orderBy('id', 'desc')->get()->take(10);

            $result = DB::table('jobs')->where('result', '!=', '0')->orderBy('id', 'desc')->limit(10)->get();

            $admit_card = DB::table('jobs')->where('admit_card', '!=', '0')->orderBy('id', 'desc')->take(10)->get();



            return view('web.govt', ['vacancy' => $vacancy, 'result' => $result, 'admit_card' => $admit_card]);

        } else {

            if ($_GET['viewAll'] == 'Admit_Card') {

                $title = 'Admit Cards';

                $vacancy = DB::table('jobs')->where('admit_card', '!=', '0')->orderBy('id', 'desc')->get();

            }

            if ($_GET['viewAll'] == 'Result') {

                $title = 'Results';

                $vacancy = DB::table('jobs')->where('result', '!=', '0')->orderBy('id', 'desc')->get();

            }

            if ($_GET['viewAll'] == 'Vacancy') {

                $title = 'Latest Jobs';

                $vacancy = DB::table('jobs')->where('vacancy', '!=', '0')->orderBy('id', 'desc')->get();

            }

            return view('web.govt', ['vacancy' => $vacancy, 'title' => $title]);


        }

     

    }
    public function all_job(){
        $title = 'Latest Jobs';
        $canonicalUrl = url('/jobs');
        $vacancy = DB::table('jobs')->where('vacancy', '!=', '0')->orderBy('id', 'desc')->get();
        return view('web.all_job', ['vacancy' => $vacancy, 'title' => $title,'canonicalUrl'=>$canonicalUrl]);
        
    }
    public function all_result(){
        $title = 'Results';
        $canonicalUrl = url('/result');
        $vacancy = DB::table('jobs')->where('result', '!=', '0')->orderBy('id', 'desc')->get();


        return view('web.all_job', ['vacancy' => $vacancy, 'title' => $title,'canonicalUrl'=>$canonicalUrl]);
        
    }
    public function all_admit_card(){
        $title = 'Admit Cards';

                $vacancy = DB::table('jobs')->where('admit_card', '!=', '0')->orderBy('id', 'desc')->get();

                $canonicalUrl = url('/admit_card');
       
        return view('web.all_job', ['vacancy' => $vacancy, 'title' => $title,'canonicalUrl'=>$canonicalUrl]);
        
    }

}

