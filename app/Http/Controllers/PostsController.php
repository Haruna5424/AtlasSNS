<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{
    //
    public function index(){

       // 全ての投稿を取得
       $posts = Post::all();

        return view('posts.index',['posts'=> $posts]);
    }


    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
           'post' => 'required|max:400'
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/top')
                    ->withInput()
                    ->withErrors($validator);
        }

        $user_id = Auth::user()->id;
        $posts = new Post;//以下に登録処理を記述（Eloquentモデル）
        $posts->post = $request->post;
        $posts->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $posts->save();

        return redirect('/top');
    }

    public function update(Request $request)
    {
        $text = $request->text;
        $id = $request->id;
        Post::where('id',$id)->update(['post'=>$text]);

        return redirect('/top');
    }

    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

            return redirect('/top');
    }

}

