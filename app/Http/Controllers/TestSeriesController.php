<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestSeries;
use App\Models\TestQuestions;
use App\EducatorTestSeriesQuestionOption;
use App\Imports\EducatorTestSeriesQuestionsImport;
use App\Models\order;
use App\Models\Playlist;
use App\Models\TestQueOptions;
use Illuminate\Support\Facades\DB;
use Session;
use Maatwebsite\Excel\Facades\Excel;

class TestSeriesController extends Controller
{
    public function test_series()
    {
        return "sdf";
        $data = TestSeries::where('status', '<>', '3')->with('playlist', 'category', 'sub_category')->orderBy('id', 'desc')->get();
        $playlist = Playlist::where('status', '<>', '3')->with('category', 'sub_category', 'tests')->orderBy('id', 'desc')->get();
        return view('admin.test_series.index', ['data'=>$data, 'playlists'=>$playlist]);
    }

    public function test_ques($id)
    {
        $data = TestQuestions::where('status', '<>', '3')->where('test_series_id', $id)->with('options')->get();
        return view('admin.test_series.question', ['data'=>$data, 'id'=>$id]);
    }

    public function test_series_create()
    {
        $categories = DB::table('categories')->where('parent_id','0')->where('status', '<>', '3')->get();
        $subjects = DB::table('subjects')->where('status', '<>', '3')->get();
        if (isset($_GET['Category'])){
             $subCat = DB::table('categories')->where('parent_id', $_GET['Category'])->where('status', '<>', '3')->get();
        }else{
            $subCat = '';
        }
        return view('admin.test_series.create', ['data'=>$categories, 'subCat'=>$subCat, 'subjects'=>$subjects]);
    }


    public function test_series_edit($id)
    {
        $categories = DB::table('categories')->where('parent_id','0')->where('status', '<>', '3')->get();
        $subjects = DB::table('subjects')->where('status', '<>', '3')->get();

        if (isset($_GET['Category'])){
             $subCat = DB::table('categories')->where('parent_id', $_GET['Category'])->where('status', '<>', '3')->get();
        }else{
            $subCat = '';
        }
        $data = TestSeries::where('id', $id)->first();
        return view('admin.test_series.edit', ['data'=>$data,'cat'=>$categories, 'subCat'=>$subCat, 'subjects'=>$subjects]);
    }

    public function test_series_create_post(Request $request)
    {
        //    return $request->all();
        //    {"category_id":"14","_token":"vaRU9bYkiiTpgBri5Z9C0Y1O0FHNz91dI36hyyJz","title":"test","price":"32","mrp":"2322","duration":"42","description":"this is just description","test_create":"test_create","thumbnail":{}}
        $insert = TestSeries::create();
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
        // if ($request->thumbnail) {
        //     $imageName = time() . '.' . $request->thumbnail->extension();
        //     $request->thumbnail->move(public_path('images/test_img/'), $imageName);
        //     $insert->thumbnail_url = $imageName;
        // }

        $insert->save();

        Session::flash('message', 'Test Created Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.test_series'));
    }

    public function test_series_edit_post(Request $request, $id)
    {
    //    return $request->all();
    //    {"category_id":"14","_token":"vaRU9bYkiiTpgBri5Z9C0Y1O0FHNz91dI36hyyJz","title":"test","price":"32","mrp":"2322","duration":"42","description":"this is just description","test_create":"test_create","thumbnail":{}}
        $update = TestSeries::where('id', $id)->first();
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

        // if ($request->thumbnail) {
        //     $imageName = time() . '.' . $request->thumbnail->extension();
        //     $request->thumbnail->move(public_path('images/test_img/'), $imageName);
        //     $update->thumbnail_url = $imageName;
        // }

        $update->save();

        Session::flash('message', 'Test Series Detail Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.test_series'));
    }

    public function test_series_delete($id)
    {
        $update = TestSeries::where('id', $id)->first();
        $update->status = "3";
        $update->save();

        Session::flash('message', 'Test Series Detail Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.test_series'));
    }

    public function test_series_status(Request $request,  $id)
    {
        // return $request->all();
        $update = TestSeries::where('id', $id)->first();
        $update->status = $request->status;
        $update->save();

        Session::flash('message', 'Test Series Detail Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.test_series'));
    }

    public function test_remove_playlist($id)
    {
        $update = TestSeries::where('id', $id)->first();
        $update->playlist_id = null;
        $update->save();

        Session::flash('message', 'Test Series Removed from Playlist.');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.test_series'));
    }

    public function test_add_playlist(Request $request)
    {
        $update = TestSeries::where('id', $request->id)->first();
        $update->playlist_id = $request->playlist_id;
        $update->save();

        Session::flash('message', 'Test Series Added to Playlist.');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.test_series'));
    }



    public function que_add($id)
    {
        return view('admin.test_series.que_add',['id'=>$id]);
    }


    public function que_add_post(Request $request)
    {
         // return $request->all();

        $que = TestQuestions::create();
        $que->test_series_id = $request->test_series_id;
        $que->question = $request->question;
        $que->language = $request->lang;

        if ($request->question_image_url) {
            $imageName = time() . '.' . $request->question_image_url->extension();
            $request->question_image_url->move(public_path('images/test_img/'), $imageName);
            $que->question_image_url = $imageName;
        }
        $que->explanation = $request->explanation;

        if ($request->explanation_image_url) {
            $imageName = time() . '.' . $request->explanation_image_url->extension();
            $request->explanation_image_url->move(public_path('images/test_img/'), $imageName);
            $que->explanation_image_url = $imageName;
        }
        // $que->question_type = $request->question_type;
        $que->save();

        $option1= TestQueOptions::create();
        $option1->question_id = $que->id;
        $option1->option = $request->Option1;
        if ($request->optionImg1) {
            $imageName = time() . '.' . $request->optionImg1->extension();
            $request->optionImg1->move(public_path('images/test_img/'), $imageName);
            $option1->option_image_url = $imageName;
        }

        $option2=TestQueOptions::create();
        $option2->question_id = $que->id;
        $option2->option = $request->Option2;
        if ($request->optionImg2) {
            $imageName = time() . '.' . $request->optionImg2->extension();
            $request->optionImg2->move(public_path('images/test_img/'), $imageName);
            $option2->option_image_url = $imageName;
        }

        $option3=TestQueOptions::create();
        $option3->question_id = $que->id;
        $option3->option = $request->Option3;
        if ($request->optionImg3) {
            $imageName = time() . '.' . $request->optionImg3->extension();
            $request->optionImg3->move(public_path('images/test_img/'), $imageName);
            $option3->option_image_url = $imageName;
        }

        $option4=TestQueOptions::create();
        $option4->question_id = $que->id;
        $option4->option = $request->Option4;
        if ($request->optionImg4) {
            $imageName = time() . '.' . $request->optionImg4->extension();
            $request->optionImg4->move(public_path('images/test_img/'), $imageName);
            $option4->option_image_url = $imageName;
        }
        if($request->is_correct == 'option1'){
            $option1->is_correct = '1';
        }elseif($request->is_correct == 'option2'){
            $option2->is_correct = '1';
        }elseif($request->is_correct == 'option3'){
            $option3->is_correct = '1';
        }elseif($request->is_correct == 'option4'){
            $option4->is_correct = '1';
        }
        $option1->save();
        $option2->save();
        $option3->save();
        $option4->save();

        Session::flash('message', 'Test Question Added Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.test_ques', $request->test_series_id));

        // return $que->id;
    }



    public function que_edit($id)
    {

        $data = TestQuestions::where('status', '<>', '3')->where('id', $id)->with('options')->first();
        return view('admin.test_series.que_edit',['id'=>$id, 'data'=>$data]);
    }



    public function que_edit_post(Request $request)
    {
        // return $request->all();

        $que = TestQuestions::where('status', '<>', '3')->where('id', $request->question_id)->with('options')->first();
        // $que->test_series_id = $request->test_series_id;
        $que->question = $request->question;
        $que->language = $request->lang;
        if ($request->question_image_url) {
            $imageName = time() . '.' . $request->question_image_url->extension();
            $request->question_image_url->move(public_path('images/test_img/'), $imageName);
            $que->question_image_url = $imageName;
        }
        $que->explanation = $request->explanation;

        if ($request->explanation_image_url) {
            $imageName = time() . '.' . $request->explanation_image_url->extension();
            $request->explanation_image_url->move(public_path('images/test_img/'), $imageName);
            $que->explanation_image_url = $imageName;
        }
        // $que->question_type = $request->question_type;
        $que->save();

        $option1= TestQueOptions::where('id', $que->options[0]->id)->first();
        // $option1->question_id = $que->id;
        $option1->option = $request->Option1;
        if ($request->optionImg1) {
            $imageName = time() . '.' . $request->optionImg1->extension();
            $request->optionImg1->move(public_path('images/test_img/'), $imageName);
            $option1->option_image_url = $imageName;
        }

        $option2=TestQueOptions::where('id', $que->options[1]->id)->first();
        // $option2->question_id = $que->id;
        $option2->option = $request->Option2;
        if ($request->optionImg2) {
            $imageName = time() . '.' . $request->optionImg2->extension();
            $request->optionImg2->move(public_path('images/test_img/'), $imageName);
            $option2->option_image_url = $imageName;
        }

        $option3=TestQueOptions::where('id', $que->options[2]->id)->first();
        // $option3->question_id = $que->id;
        $option3->option = $request->Option3;
        if ($request->optionImg3) {
            $imageName = time() . '.' . $request->optionImg3->extension();
            $request->optionImg3->move(public_path('images/test_img/'), $imageName);
            $option3->option_image_url = $imageName;
        }

        $option4=TestQueOptions::where('id', $que->options[3]->id)->first();
        // $option4->question_id = $que->id;
        $option4->option = $request->Option4;
        if ($request->optionImg4) {
            $imageName = time() . '.' . $request->optionImg4->extension();
            $request->optionImg4->move(public_path('images/test_img/'), $imageName);
            $option4->option_image_url = $imageName;
        }
        if($request->is_correct == 'option1'){
            $option1->is_correct = '1';
        }
        else{
            $option1->is_correct = '0';
        }
        if($request->is_correct == 'option2'){
            $option2->is_correct = '1';
        }
        else {
            $option2->is_correct = '0';
        }
        if($request->is_correct == 'option3'){
            $option3->is_correct = '1';
        }
        else{
            $option3->is_correct = '0';
        }
        if($request->is_correct == 'option4'){
            $option4->is_correct = '1';
        }else{
            $option4->is_correct = '0';

        }
        $option1->save();
        $option2->save();
        $option3->save();
        $option4->save();

        Session::flash('message', 'Test Question Detail Updated Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.test_ques', $que->test_series_id));
        // return $que->id;
    }

    public function que_delete($id)
    {
        $que = TestQuestions::where('status', '<>', '3')->where('id', $id)->with('options')->first();
        $que->status = '3';
        $que->save();

        Session::flash('message', 'Test Question Deleted Sucessfully');
        Session::flash('alert-class', 'alert-success');
        return redirect(route('admin.test_ques', $que->test_series_id));
    }

    //import test questions
    public function importExcel(Request $request)
    {
        $testId = $request->input('test_id');
        $response =  Excel::import(new EducatorTestSeriesQuestionsImport($testId), request()->file('file'));
        if ($response == true) {
            // return 'success';
            Session::flash('message', 'Questions Imported Successfully.');
            Session::flash('alert-class', 'alert-success');
        }else{
            Session::flash('message', 'Error : please check excel file or try again after some time.');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect(route('admin.test_ques', $testId));
    }



    // apis'''''''''''''''////////////////////////////
    // apis'''''''''''''''////////////////////////////
    // apis'''''''''''''''////////////////////////////
    // apis'''''''''''''''////////////////////////////

    public function list(Request $request)
    {
        if($request->cat_id){
            $data = Playlist::where('status', '<>', '3')->where('category_id', $request->cat_id)->with('category', 'sub_category')->orderBy('id', 'desc')->get();
        }else{
            $data = Playlist::where('status', '<>', '3')->with('category', 'sub_category')->orderBy('id', 'desc')->get();
        }
        return response()->json(['result' => 'success', 'message' => '', 'data'=>$data], 200);
    }

    public function Quizlist(Request $request)
    {
        $data = TestSeries::where('status', '<>', '3')->where('type', 'quiz')->with('category', 'sub_category')->orderBy('id', 'desc')->get();
        return response()->json(['result' => 'success', 'message' => '', 'data'=>$data], 200);
    }

    public function test_detail(Request $request)
    {
        // $data = TestSeries::where('id',$request->id)->with('category', 'sub_category')->first();
        $data = Playlist::where('id',$request->id)->with('category', 'sub_category')->first();

        if($request->user_id){
            $order = order::where('user_id', $request->user_id)->where('product_id', $request->id)->where('status', '1')->first();

            if($order){
                $is_purchase = true;
            }else{
                $is_purchase = false;
            }
        }else{
            $is_purchase = false;
        }

        return response()->json(['result' => 'success', 'message' => '', 'data'=>$data, 'is_purchase'=>$is_purchase], 200);
    }

    public function test_start_data(Request $request)
    {
        if($request->id){
            $data = TestSeries::where('id', $request->id)->with('category', 'sub_category', 'ques', 'ques.options')->first();
            return response()->json(['result' => 'success', 'message' => '', 'data'=>$data], 200);
        }else{
            return response()->json(['result' => 'error', 'message' => 'id is required'], 400);
        }
    }


    public function purchased_products(Request $request)
    {
        if($request->id){

            $id = $request->id;
            $myTestSeries = order::where('user_id', $id)->with('playlist', 'playlist.category', 'playlist.sub_category')->where('status', '1')->get();
            $data = [];
            foreach($myTestSeries as $key=>$test){
                $data[$key] = $test->playlist;
            }
            return response()->json(['result' => 'success', 'message' => '', 'data'=>$data], 200);
        } else{
            return response()->json(['result' => 'error', 'message' => 'id is required'], 400);
        }
    }
}
