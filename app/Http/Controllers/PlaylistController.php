<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\TestSeries;
use Session;
use Illuminate\Support\Facades\DB;

class PlaylistController extends Controller
{
    public function playlist()
    {
        $data = Playlist::where('status', '<>', '3')->orderBy('id', 'desc')->get();
        return view('admin.playlist.index', ['data'=>$data]);
    }

    public function playlist_items($id)
    {
        $playlist = Playlist::where('status', '<>', '3')->where('id',$id)->orderBy('id', 'desc')->first();

        $data = TestSeries::where('status', '<>', '3')->where('playlist_id', $id)->orderBy('id', 'desc')->get();

        return view('admin.playlist.items', ['playlist'=>$playlist,'data'=>$data]);
    }

    // public function test_ques($id)
    // {
    //     $data = TestQuestions::where('status', '<>', '3')->where('playlist_id', $id)->with('options')->get();
    //     return view('admin.playlist.question', ['data'=>$data, 'id'=>$id]);
    // }

    public function playlist_create()
    {
        $categories = DB::table('categories')->where('parent_id','0')->where('status', '<>', '3')->get();
        $subjects = DB::table('subjects')->where('status', '<>', '3')->get();
        if (isset($_GET['Category'])){
             $subCat = DB::table('categories')->where('parent_id', $_GET['Category'])->where('status', '<>', '3')->get();
        }else{
            $subCat = '';
        }
        return view('admin.playlist.create', ['data'=>$categories, 'subCat'=>$subCat, 'subjects'=>$subjects]);
    }


    public function playlist_edit($id)
    {
        $categories = DB::table('categories')->where('parent_id','0')->where('status', '<>', '3')->get();
        $subjects = DB::table('subjects')->where('status', '<>', '3')->get();

        if (isset($_GET['Category'])){
             $subCat = DB::table('categories')->where('parent_id', $_GET['Category'])->where('status', '<>', '3')->get();
        }else{
            $subCat = '';
        }
        $data = Playlist::where('id', $id)->first();
        return view('admin.playlist.edit', ['data'=>$data,'cat'=>$categories, 'subCat'=>$subCat, 'subjects'=>$subjects]);
    }

    public function playlist_create_post(Request $request)
    {
        //    return $request->all();
        //    {"category_id":"14","_token":"vaRU9bYkiiTpgBri5Z9C0Y1O0FHNz91dI36hyyJz","title":"test","price":"32","mrp":"2322","duration":"42","description":"this is just description","test_create":"test_create","thumbnail":{}}
        $insert = Playlist::create();
        $insert->title = $request->title;
        $insert->type = $request->test_type;
        $insert->category_id = $request->category_id;
        $insert->sub_category_id = $request->sub_category_id;
        $insert->subject_id = $request->subject_id;
        $insert->description = $request->description;
        $insert->price = $request->price;
        $insert->mrp = $request->mrp;
        $insert->duration = $request->duration;
        $insert->language = $request->language;

        // $insert->thumbnail_url = $request->thumbnail_url;
        if ($request->thumbnail) {
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/test_img/'), $imageName);
            $insert->thumbnail_url = $imageName;
        }

        $insert->save();

        Session::flash('message', 'Test Created Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.playlist'));
    }

    public function playlist_edit_post(Request $request, $id)
    {
    //    return $request->all();
    //    {"category_id":"14","_token":"vaRU9bYkiiTpgBri5Z9C0Y1O0FHNz91dI36hyyJz","title":"test","price":"32","mrp":"2322","duration":"42","description":"this is just description","test_create":"test_create","thumbnail":{}}
        $update = Playlist::where('id', $id)->first();
        $update->title = $request->title;
        $update->type = $request->test_type;
        $update->category_id = $request->category_id;
        $update->sub_category_id = $request->sub_category_id;
        $update->subject_id = $request->subject_id;
        $update->description = $request->description;
        $update->price = $request->price;
        $update->mrp = $request->mrp;
        $update->duration = $request->duration;
        $update->language = $request->language;

        if ($request->thumbnail) {
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/test_img/'), $imageName);
            $update->thumbnail_url = $imageName;
        }

        $update->save();

        Session::flash('message', 'Test Series Detail Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.playlist'));
    }

    public function playlist_delete($id)
    {
        $update = Playlist::where('id', $id)->first();
        $update->status = "3";
        $update->save();

        Session::flash('message', 'Test Series Detail Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.playlist'));
    }

    public function playlist_status(Request $request,  $id)
    {
        // return $request->all();
        $update = Playlist::where('id', $id)->first();
        $update->status = $request->status;
        $update->save();

        Session::flash('message', 'Test Series Detail Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.playlist'));
    }
}
