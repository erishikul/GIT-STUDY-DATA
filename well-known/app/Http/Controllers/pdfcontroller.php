<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pdf;
use App\Models\Category;
use Session;

class pdfcontroller extends Controller
{
        public function index(){
            $data = pdf::where('status', '<>', '3')->with('category', 'sub_category')->get();
            $cat = Category::where('parent_id', '0')->where('status', '<>', '3')->get();
            return view('admin.pdf.index', ['data'=>$data, 'categories'=>$cat]);
        }

        public function create(Request $request)
    {
        // return $request->all();
        $create = pdf::create();
        $create->title = $request->name;
        $create->category_id = $request->category;
        $create->sub_category_id = $request->sub_category_id;
        $create->description = $request->description;
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/pdf/'), $imageName);
            $create->pdf = $imageName;
        }
        $create->save();
        Session::flash('message', 'Subject Created Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.pdf'));
    }
    public function edit(Request $request)
    {
        // $request->all();
        $update = pdf::where('id', $request->id)->first();
        $update->title = $request->title;
        $update->category_id = $request->category;
        $update->sub_category_id = $request->sub_category_id;
        $update->description = $request->description;

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/pdf/'), $imageName);
            $update->pdf = $imageName;
        }
        $update->save();

        Session::flash('message', 'Subject Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.pdf'));
    }

    public function delete($id)
    {
        // return $request->all();
        $update = pdf::where('id', $id)->first();
        $update->status = '3';
        $update->save();
        // if(isset($_GET['subCat'])){
        //     Session::flash('message', 'Sub Category Deleted Sucessfully');
        //     Session::flash('alert-class', 'alert-info');
        //     return redirect(route('admin.sub_category', $update->parent_id));
        // }else{
            Session::flash('message', 'PDF Deleted Sucessfully');
            Session::flash('alert-class', 'alert-danger');
            return redirect(route('admin.pdf'));
        // }
    }

    public function pdfView(Type $var = null)
    {
        $data = pdf::where('status', '1')->get();
        return view('web.pdfs', ['data'=>$data]);
    }



}
