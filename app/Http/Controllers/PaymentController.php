<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\TestSeries;
use Validator;
use Session;

class PaymentController extends Controller
{

    public function index(Request $request)
    {
        $data = order::where('status', '<>', '3')->with('test_series', 'user')->get();
        return view('admin.orders', ['data' => $data]);
    }


    public function createOrder(Request $request)
    {



        if (!session('user')) {
            return redirect(route('login'));
        }
        $user_id = session('user')->id;
        $id = $request->id;
        $playlist = Playlist::where('id', $id)->first();
        $amount = $playlist->price;

        if ($amount <= 0) {
            $new_order = order::create();
            $new_order->user_id = $user_id;
            $new_order->product_id = $id;
            $new_order->product_type = 'playlist';
            $new_order->order_id =  'free_' . uniqid();
            $new_order->amount = $amount;
            $new_order->payment_mode = 'RazorPay';
            $new_order->status = '1';
            $new_order->created_at = Carbon::now();
            $new_order->updated_at = Carbon::now();
            $new_order->save();

            Session::flash('message', 'Product Unlock Successfully.');
            Session::flash('alert-class', 'alert-success');
            return redirect(route('test_series_detail', $id));
        } else {
            $amt = $amount * 100;
            $url = "https://api.razorpay.com/v1/orders";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $headers = array(
                "content-type: application/json",
                "Authorization: Basic cnpwX3Rlc3RfZFFReXRITEhwSlhHaHE6aXVVUlRPWnRTZzZLMXdxS1FBMFZHa3pB",
            );
            // cnpwX3Rlc3RfZFFReXRITEhwSlhHaHE6aXVVUlRPWnRTZzZLMXdxS1FBMFZHa3pB         <- test
            // cnpwX2xpdmVfR082OGdvcXhWeTNiUlg6Z3ZPcGFPZlNBRkFRZTd5NDVuV3VEZXlw             <- prod
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $data = <<<DATA
        {
            "amount": $amt,
            "currency": "INR"
        }
        DATA;
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            //for debug only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $resp = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($resp, true);
            // var_dump($result);
            $order_id = $result['id'];
            // echo $order_id;

            $new_order = order::create();
            $new_order->user_id = $user_id;
            $new_order->product_id = $id;
            $new_order->product_type = 'playlist';
            $new_order->order_id = $order_id;
            $new_order->amount = $amount;
            $new_order->payment_mode = 'RazorPay';
            $new_order->status = '0';
            $new_order->updated_at = Carbon::now();
            $new_order->save();
            return view('web.pay', ['order_id' => $order_id, 'amount' => $amount, 'data' => $new_order]);
        }
    }

    public function updatePaymentStatus(Request $request)
    {
        $user_id = session('user')->id;
        $update_order = order::where('id', $request->id)->where('order_id', $request->order_id)->first();
        $update_order->transection_id = $request->tran_id;
        $update_order->status = '1';
        $update_order->updated_at = Carbon::now();
        $update_order->save();
        return 'successfully Capured';
    }


    // api api api api api.................. api api api api api api.................. api api api apiapi api api ..................
    // api api api api api.................. api api api api api api ..................api api api apiapi api api..................
    // api api api api api.................. api api api api api api ..................api api api apiapi api api..................

    public function successData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'test_id' => 'required',
            'order_id' => 'required',
            'transection_id' => 'required',
            'amount' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $user_id = $request->user_id;
        $new_order = order::create();
        $new_order->user_id = $user_id;
        $new_order->product_id = $request->test_id;
        $new_order->product_type = 'test_series';
        $new_order->order_id = $request->order_id;
        $new_order->transection_id = $request->transection_id;
        $new_order->amount = $request->amount;
        $new_order->payment_mode = 'RazorPay';
        $new_order->status = '1';
        $new_order->updated_at = Carbon::now();
        $new_order->save();

        return response()->json(['result' => 'success', 'message' => 'Capured Successfully'], 200);

        // return 'successfully Capured';
    }
}
