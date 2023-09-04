<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;
use Session;
class BannerController extends Controller
{
   public function banners()
   {
        $data = banner::where('status', '<>', '3')->get();
        return view('admin.banners', ['data'=>$data]);
   }


   public function banner_status(Request $request,  $id)
   {
       // return $request->all();
       $update = banner::where('id', $id)->first();
       $update->status = $request->status;
       $update->save();

       Session::flash('message', 'Banner Status Updated Sucessfully');
       Session::flash('alert-class', 'alert-success');
       return redirect(route('admin.banners'));
   }


   public function edit(Request $request)
    {
        // return $request->all();
        $update = banner::where('id', $request->id)->first();
        $update->title = $request->title;
        $update->description = $request->description;

        if ($request->img) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images/banners/'), $imageName);
            $update->img = $imageName;
        }
        $update->save();

        Session::flash('message', 'Banner Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.banners'));

    }

}
