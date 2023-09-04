<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Session;



class settingController extends Controller

{
    
    public function homesetting(){
      $data=DB::table('setting')->where('id','1')->first();
        return view('admin.setting',['data'=>$data]);

    }
    public function homesetting_post(Request $request){
        // return $request;
        DB::table('setting')->where('id','1')->update([

            'data'=>$request->editor1,
           


        ]);

        return redirect(route('setting'));
         
    }

}

