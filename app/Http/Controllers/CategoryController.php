<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::with('sub_categories')->where('parent_id', '0')->where('status', '<>', '3')->get();
        return view('admin.categories.index', ['data'=>$data]);
    }

    public function get_subcategory(Request $request)
    {
       $id = $request->id;
       $data = Category::where('parent_id', $id)->where('status', '<>', '3')->get();

       foreach($data as $data){
        echo '<option value="'.$data->id.'">'.$data->name.'</option>';
       }
    //    return ;
    }

    public function create(Request $request)
    {
        // return $request->all();
        $create = Category::create();
        if($request->parent_id){
            $create->parent_id = $request->parent_id;
        }
        $create->name = $request->name;
        if ($request->category_image) {
            $imageName = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('images/cat_img/'), $imageName);
            $create->category_image = $imageName;
        }
        $create->save();
        if($request->parent_id){

            Session::flash('message', 'Sub Category Created Sucessfully');
            Session::flash('alert-class', 'alert-success');
            return redirect(route('admin.sub_category', $request->parent_id));

        }else{
            Session::flash('message', 'Category Created Sucessfully');
            Session::flash('alert-class', 'alert-success');
            return redirect(route('admin.categories'));
        }


    }
    public function delete($id)
    {
        // return $request->all();
        $update = Category::where('id', $id)->first();
        $update->status = '3';
        $update->save();
        if(isset($_GET['subCat'])){
            Session::flash('message', 'Sub Category Deleted Sucessfully');
            Session::flash('alert-class', 'alert-info');
            return redirect(route('admin.sub_category', $update->parent_id));
        }else{
            Session::flash('message', 'Category Deleted Sucessfully');
            Session::flash('alert-class', 'alert-info');
            return redirect(route('admin.categories'));
        }
    }

    public function edit(Request $request)
    {
        // $request->all();
        $update = Category::where('id', $request->id)->first();
        $update->name = $request->name;

        if ($request->category_image) {
            $imageName = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('images/cat_img/'), $imageName);
            $update->category_image = $imageName;
        }
        $update->save();
        if($request->parent_id){
            Session::flash('message', 'Sub Category Updated Sucessfully');
            Session::flash('alert-class', 'alert-success');
            return redirect(route('admin.sub_category', $request->parent_id));
        }else{
            Session::flash('message', 'Category Updated Sucessfully');
            Session::flash('alert-class', 'alert-success');
            return redirect(route('admin.categories'));
        }
    }

    public function sub_category($id)
    {
        // $cat =
        $data = Category::with('sub_categories')->where('id', $id)->where('status', '<>', '3')->first();
        return view('admin.categories.sub_categories', ['data'=>$data]);
    }


    public function coursesList(Request $request)
    {
        if($request->course_id){
            $data = Category::with('sub_categories')->where('id', $request->course_id)->where('status', '<>', '3')->first();
        } else{
            $data = Category::with('sub_categories')->where('parent_id', '0')->where('status', '<>', '3')->get();
        }
        return response()->json(['result' => 'success', 'message' => '', 'data'=>$data], 200);
    }
}
