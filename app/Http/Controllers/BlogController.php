<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function viewbloglist(Request $request){

            

           $blog = DB::table('jobs as jobs')->select('jobs.*')->where('isblog','1')->orderBy('vacancy','desc')->get();

           return view('admin.blog.index',['blog'=>$blog]);

    }
    public function AddBlog(Request $request){

        return view('admin.blog.add_blog');


    }
    public function blog_view(Request $request){
      
        $id= $request->id;
            //     $blog_data = DB::select("
            //   SELECT jobs.*, jobs_details.*
            //   FROM jobs
            //   INNER JOIN jobs_details ON jobs.id = jobs_details.job_id
            //   WHERE jobs.id = :id", ['id' => $id]);

              $blog_data = DB::table('jobs')
                ->join('jobs_details', 'jobs.id', '=', 'jobs_details.job_id')
                ->select('jobs.title AS job_title','jobs.created_at','jobs.blog_img','jobs_details.title AS job_details_title', 'jobs_details.*')
                ->where('jobs.id', '=', $id)
                ->get();


          return view('web.blog_view',['blog_data'=>$blog_data]);
      }
}
