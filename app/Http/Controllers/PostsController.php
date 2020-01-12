<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index(Request $request){
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(10);
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        // $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
        $user = Auth::user(); //ユーザー表示
        return view('posts.index', ['username' => $user]);//ユーザ表示
    }

    public function create(){
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('posts.create', ['user_id' => $user]);
        //return view('posts.create');
    }

    public function store(Request $request){
        // $auths = Auth::user();
        // return view('posts.create', [ 'auths' => $auths ]);
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
            'user_id' => 'required|max:50',
        ]);
        Post::create($params);
        return redirect()->route('top');//indexに戻る
    }

    public function show($post_id){
        $post = Post::findOrFail($post_id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($post_id){
        $post = Post::findOrFail($post_id);
        return view('posts.edit', ['post' => $post,]);
    }

    public function update($post_id, Request $request){
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
            'user_id' => 'required|max:50',
            //'user_id' => 'auth()->id()'
        ]);
        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();
        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy($post_id){
        $post = Post::findOrFail($post_id);

        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('top');
    }
}