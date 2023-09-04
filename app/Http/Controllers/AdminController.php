<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $data = User::where('status', '<>', '3')->get();
        return view('admin.users', ['data'=>$data]);

    }
}
