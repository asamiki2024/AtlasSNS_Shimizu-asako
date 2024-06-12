<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index(){
        return view('posts.index');
    }

    //ログイン閲覧制限　ミドルウェア
    public function __construct(){
        $this->middleware('auth');
    }
}
