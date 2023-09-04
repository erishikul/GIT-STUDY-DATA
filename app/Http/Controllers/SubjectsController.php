<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Session;

class SubjectsController extends Controller
{
    public function index()
    {
        $data = Subject::where('status', '<>', '3')->get();
        return view('admin.subjects.index', ['data'=>$data]);
    }

    public function create(Request $request)
    {
        // return $request->all();
        $create = Subject::create();
        $create->name = $request->name;
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/cat_img/'), $imageName);
            $create->image = $imageName;
        }
        $create->save();
        Session::flash('message', 'Subject Created Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.subjects'));
    }



    public function delete($id)
    {
        // return $request->all();
        $update = Subject::where('id', $id)->first();
        $update->status = '3';
        $update->save();
        if(isset($_GET['subCat'])){
            Session::flash('message', 'Sub Category Deleted Sucessfully');
            Session::flash('alert-class', 'alert-info');
            return redirect(route('admin.sub_category', $update->parent_id));
        }else{
            Session::flash('message', 'Category Deleted Sucessfully');
            Session::flash('alert-class', 'alert-info');
            return redirect(route('admin.subjects'));
        }
    }

    public function edit(Request $request)
    {
        // $request->all();
        $update = Subject::where('id', $request->id)->first();
        $update->name = $request->name;

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/cat_img/'), $imageName);
            $update->image = $imageName;
        }
        $update->save();

        Session::flash('message', 'Subject Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.subjects'));
    }

    public function coursesList(Request $request)
    {
        if($request->course_id){
            $data = Subject::with('sub_categories')->where('id', $request->course_id)->where('status', '<>', '3')->first();
        } else{
            $data = Subject::with('sub_categories')->where('parent_id', '0')->where('status', '<>', '3')->get();
        }
        return response()->json(['result' => 'success', 'message' => '', 'data'=>$data], 200);
    }

}
