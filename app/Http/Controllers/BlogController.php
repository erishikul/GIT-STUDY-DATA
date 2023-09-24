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
}
