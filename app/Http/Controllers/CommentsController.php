<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use App\Text;
use App\User;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();   #ログインユーザー情報を取得します。
        $params = $request->validate([
            'text_id' => 'required|exists:texts,id',
            'body' => 'required|max:2000',
            'user_id' => 'nullable',
        ]);
        
        $text = Text::findOrFail($params['text_id']);
        $text->comments()->create($params);

        return view('texts.show', ['user_id' => $user]);

        return redirect()->route('texts.show', ['text' => $text]);
    }

}