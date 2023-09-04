<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\live_class;
use App\Models\Category;
use Session;

class LiveClassController extends Controller
{
    public function index(){
        $data = live_class::where('status', '<>', '3')->get();
        $cat = Category::where('parent_id', '0')->where('status', '<>', '3')->get();
        return view('admin.live_class.index', ['data'=>$data,'categories'=>$cat]);
        // return view('admin.live_class.index');

    }
    public function create(Request $request)
    {
        // return $request->all();
        $create = live_class::create();
        $create->title = $request->name;
        $create->description = $request->description;
        $create->link = $request->video_link;
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/live_class/'), $imageName);
            $create->image = $imageName;
        }
        $create->save();
        Session::flash('message', 'live_class Created Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.live_class'));
    }
    public function delete($id)
    {
        // return $request->all();
        $update = live_class::where('id', $id)->first();
        $update->status = '3';
        $update->save();
        // if(isset($_GET['subCat'])){
        //     Session::flash('message', 'Sub Category Deleted Sucessfully');
        //     Session::flash('alert-class', 'alert-info');
        //     return redirect(route('admin.sub_category', $update->parent_id));
        // }else{
            Session::flash('message', ' video class Deleted Sucessfully');
            Session::flash('alert-class', 'alert-danger');
            return redirect(route('admin.live_class'));
        // }
    }

    public function edit(Request $request)
    {
        // $request->all();
        $update = live_class::where('id', $request->id)->first();
        $update->title = $request->title;
        // $update->category_id = $request->category;
        // $update->sub_category_id = $request->sub_category_id;
        $update->description = $request->description;
        $update->link = $request->link;

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/live_class/'), $imageName);
            $update->pdf = $imageName;
        }
        $update->save();
        Session::flash('message', 'Subject Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.live_class'));
    }



    // Apis ........

    public function ytVideos()
    {
        $data = live_class::orderBy('id', 'desc')->get();
        // return
        return response()->json(['success'=>true,'message'=>'YT Videos', 'data'=>$data],200);

    }


}
