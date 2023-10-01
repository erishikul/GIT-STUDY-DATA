<?php



namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Session;
use Illuminate\Support\Facades\Http;
use Google_Service_Indexing_UrlNotification;

use Google_Client;
use Google_Service_Indexing;
use Google\Service\Indexing\Resource\UrlNotifications;
use Google\Service\Indexing\UrlNotification;





class vacancyController extends Controller

{

    public function getVacancies(Request $request)

    {

        if(isset($_GET['type'])){

            if($_GET['type'] == 'jobs'){

                $type = 'jobs';

                $vacancies = DB::table('jobs as jobs')->select('jobs.*')->where('vacancy','!=','0')->orderBy('vacancy','desc')->get();

            }elseif($_GET['type'] == 'admit_cards'){

                $type = 'admit_cards';

                $vacancies = DB::table('jobs as jobs')->select('jobs.*')->where('admit_card','!=','0')->orderBy('admit_card','desc')->get();

            }elseif($_GET['type'] == 'result'){

                $type = 'results';

                $vacancies = DB::table('jobs as jobs')->select('jobs.*')->where('result','!=','0')->orderBy('result','desc')->get();

            }

        }else{

            $type = 'all';

            $vacancies = DB::table('jobs as jobs')->select('jobs.*')->where('isblog','0')->orderBy('jobs.id', 'desc')->paginate(100);

        }

        return view('admin.vacancy', ['data'=>$vacancies, 'type'=>$type]);

    }









    public function getVacancyDetails($id)

    {

        // $details = DB::table('jobs as jobs')->where('jobs.id', $id)

        // ->join('jobs_details as info', 'info.job_id', '=', 'jobs.id')->select('jobs.*', 'info.id as infoId', 'info.job_id' , 'info.title as info')->get();



        $details = DB::table('jobs')->where('jobs.id', $id)->select('jobs.*')->first();


        return view('admin.vacancyUpdate', ['details' => $details]);

        // return $details;

    }










    public function newVacancy(Request $request)

    {
        
        $title = $request->input('title');

        $department = $request->input('department');

        $state = $request->input('state');

        $tag = $request->input('tag');

        $description = $request->input('description');
          $isblog= $request->input('is_blog');
          if(empty($isblog)){
            $isblog = 0;
          }


        if($request->input('is_vacancy') !=null){

            $lastVacancy = DB::table('jobs as job')->select('job.vacancy')->orderBy('vacancy', 'desc')->first();

            $is_vacancy = $lastVacancy->vacancy+1;

        }else{ $is_vacancy = 0; }



        if($request->input('is_admit_card') !=null){

            $lastAdmitCard = DB::table('jobs as job')->select('job.admit_card')->orderBy('admit_card', 'desc')->first();

            $is_AdmitCard = $lastAdmitCard->admit_card+1;

        }else{ $is_AdmitCard = 0; }



        if($request->input('is_result') !=null){

            $lastResult = DB::table('jobs as job')->select('job.result')->orderBy('result', 'desc')->first();

            $is_result = $lastResult->result+1;

        }else{ $is_result = 0; }


        // add blog img

        if($request->hasFile('img')){

            $image = $request->file('img');
            $imageName = time() . '.' .$image->extension();
             $request->img->move(public_path('images/blog_image/'), $imageName);
           
            $imagePath = 'images/blog_image/' . $imageName;

        }else{
            $imagePath=null;
        }
           

        // return "alskdjf";
        $vacancy = DB::table('jobs')->insertGetId(["title"=>"$title","department"=>"$department","govt"=>"$state","vacancy"=>$is_vacancy,"admit_card"=>$is_AdmitCard,"result"=>$is_result,'description'=>$description,'tag'=>$tag,'isblog'=>$isblog,'blog_img'=> $imagePath]);


        if($vacancy){

            // return $vacancy;

            return view('admin.vacancyCreate', ['vacancy_id'=>$vacancy, 'title'=>$title]);

        }else{

            return 'Something Went Gone. Please Try Again. ';

        }

    }



    public function saveVacancyArticle(Request $request)

    {


        $protocol = request()->secure() ? 'https://' : 'http://';
       $domain = $protocol . request()->getHost();
        

        $article = $request->input('editor1');

        $vacancy_id = $request->input('job_id');
        $seo_article = $request->input('editor_seo');

        $vacancy_ids = $request->input('job_id');
        $job = DB::table('jobs')->where('id', $vacancy_ids)->first();
        $title = $job->title;


        $curnturl = $domain."/new/govt/jobs/detail/".$request->input('job_id')."?".$title;



        $save = DB::table('jobs_details')->insertGetId(['job_id'=>$vacancy_id, 'title'=>$article, 'seo_article'=>$seo_article]);



        if($save){

            //$response = Http::post(route('indexapi'));






            Session::flash('message', 'Vacancy Information Save Successfully');

            Session::flash('alert-class', 'alert-success');


            $client = new Google_Client();
            $client->setAuthConfig(config_path('google-indexing-api.json'));
            $client->setScopes([Google_Service_Indexing::INDEXING]);
            
            $service = new Google_Service_Indexing($client);
           
           
            $articleUrl = $curnturl;

            

        $urlNotification = new Google_Service_Indexing_UrlNotification();
        $urlNotification->setUrl($articleUrl);
        $urlNotification->setType('URL_UPDATED');

        // Request indexing for the article URL
        try {
            $service->urlNotifications->publish($urlNotification);
             response()->json(['message' => 'Article URL submitted for indexing successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return redirect(route('admin.vacancy'));
        }else{

            return 'please try again after some time .';

        }

    }







public function vacancyUpdate(Request $request)

{
   

        $id = $request->input('job_id');

        $title = $request->input('title');

        $department = $request->input('department');

        $state = $request->input('state');

        $tag = $request->input('tag');

        $description = $request->input('description');


   


        if($request->input('is_vacancy') !=null){

            if($request->input('is_vacancy') == "1"){

            $lastVacancy = DB::table('jobs as job')->select('job.vacancy')->orderBy('vacancy', 'desc')->first();

            $is_vacancy = $lastVacancy->vacancy+1;

            }else {

                $is_vacancy = $request->input('is_vacancy');

            }

        }else{ $is_vacancy = 0; }



        if($request->input('is_admit_card') !=null){

            if($request->input('is_admit_card') == "1"){

                $lastAdmitCard = DB::table('jobs as job')->select('job.admit_card')->orderBy('admit_card', 'desc')->first();

                $is_AdmitCard = $lastAdmitCard->admit_card+1;

            }else {

                $is_AdmitCard = $request->input('is_admit_card');

            }

        }else{ $is_AdmitCard = 0; }



        if($request->input('is_result') !=null){

            if($request->input('is_result') == "1"){

                $lastResult = DB::table('jobs as job')->select('job.result')->orderBy('result', 'desc')->first();

                $is_result = $lastResult->result+1;

            }else{

                $is_result = $request->input('is_result');

            }

        }else{ $is_result = 0; }



        $update = DB::table('jobs')->where('id', $id)->update(['title'=>$title, 'department'=>$department, 'govt'=>$state, 'vacancy'=>$is_vacancy, 'admit_card'=>$is_AdmitCard, 'result'=>$is_result,'description'=>$description,'tag'=>$tag]);



        // if($update){

            $info = DB::table('jobs_details as info')->where('info.job_id', $id)->select('info.*')->get();



            return view('admin.vacancyUpdate', ['data'=>'article', 'info'=>$info]);



        // }else{

        //     return 'Error. Please try again .';

        // }

    }



    public function vacancyArticleUpdate(Request $request)

    {

        $id = $request->input('id_0');

        $title = $request->input('editor1');

       $seo_article = $request->input('editor2');
      

        $update = DB::table('jobs_details')->where('id', $id)->update(['title'=>$title ,'seo_article'=>$seo_article]);


        if($request->input('id_1') != null){

            $id1 = $request->input('id_1');
            $delete1 = DB::table('jobs_details')->where('id', $id1)->delete();
        }

        if($request->input('id_2') != null){

            $id2 = $request->input('id_2');

            $delete2 = DB::table('jobs_details')->where('id', $id2)->delete();

        }

        if($request->input('id_3') != null){

            $id3 = $request->input('id_3');

            $delete2 = DB::table('jobs_details')->where('id', $id3)->delete();

        }

        Session::flash('message', 'Vacancy Information Updated Successfully');

        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.vacancy'));

    }

}

