<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = $request->user();
        // $posts = $user->load('posts');
        return view('home');
    }
    
//     public function index(Request $request)
// {
//     $user = $request->user();
//     $posts = $user->load('posts');
//     return view('home', ['posts'=>$posts->posts]);
// }

}
