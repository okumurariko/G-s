<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use App\Text;
use App\User;

class TextsController extends Controller
{
    public function index(Request $request){
        $texts = Text::with(['comments'])->orderBy('created_at', 'desc')->paginate(10);
        $texts = Text::orderBy('created_at', 'desc')->paginate(10);
        // $texts = Text::orderBy('created_at', 'desc')->get();
        return view('texts.index', ['texts' => $texts]);
        $user = Auth::user(); //ユーザー表示
        return view('texts.index', ['username' => $user]);//ユーザ表示
    }

    public function create(){
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('texts.create', ['user_id' => $user]);
        //return view('texts.create');
    }

    public function store(Request $request){
        // $auths = Auth::user();
        // return view('texts.create', [ 'auths' => $auths ]);
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
            'user_id' => 'required|max:50',
        ]);
        Text::create($params);
        return redirect()->route('top');//indexに戻る
    }

    public function show($text_id){
        $text = Text::findOrFail($text_id);
        return view('texts.show', ['text' => $text]);
    }

    public function edit($text_id){
        $text = Text::findOrFail($text_id);
        return view('texts.edit', ['text' => $text,]);
    }

    public function update($text_id, Request $request){
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
            'user_id' => 'required|max:50',
            //'user_id' => 'auth()->id()'
        ]);
        $text = Text::findOrFail($text_id);
        $text->fill($params)->save();
        return redirect()->route('texts.show', ['text' => $text]);
    }

    public function destroy($text_id){
        $text = Text::findOrFail($text_id);

        \DB::transaction(function () use ($text) {
            $text->comments()->delete();
            $text->delete();
        });

        return redirect()->route('top');
    }
}