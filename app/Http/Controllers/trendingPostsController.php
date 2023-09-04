<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class trendingPostsController extends Controller
{
    public function create(Request $request)
    {
        $title = $request->input('title');
        $link = $request->input('link');
        $type = $request->input('type');
        $postId = $request->input('postId');

        // DB::table('trending_posts')->
        $insert = DB::table('trending_posts')->insert(['title'=>$title, 'link'=>$link, 'type'=>$type, 'post_id'=>$postId]);
        if($insert){

            Session::flash('massage', 'trending Post Created Successfully');
            Session::flash('alert-class', 'alert-success');
            return redirect('trending');

        }else{
            echo 'please try again after some time.';
        }
    }
    public function getRecords()
    {
        if(isset($_GET['type'])){
            if($_GET['type'] == 'jobs'){
                $type = 'jobs';
                $data = DB::table('trending_posts')->select('trending_posts.*')->where('type','=','vacancy')->orderBy('id','desc')->get();
            }elseif($_GET['type'] == 'blogs'){
                $type = 'blogs';
                $data = DB::table('trending_posts')->select('trending_posts.*')->where('type','=','BlogArticle')->orderBy('id','desc')->get();
            }
        }else{
            $type = "all";
            $data = DB::table('trending_posts')->orderBy('id', 'desc')->get();
        }

        return view('admin.trending', ['data'=>$data, 'type'=>$type]);
    }
}
