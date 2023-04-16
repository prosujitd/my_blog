<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }

    public function demo(){
        $data = Post::orderBy('id','desc')->first();
//        dd($data);
        dd($data->tags[0]);
    }

}
