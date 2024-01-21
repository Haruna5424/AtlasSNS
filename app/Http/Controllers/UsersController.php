<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\follow;
use Auth;
use App\Http\Requests\UpdateFormRequest;

class UsersController extends Controller
{
    //
    public function profile(){

        return view('users.profile');
    }

    public function profileUpdate(UpdateFormRequest $request)
    {
        $user = User::find(Auth::id());
        $user->username=$request->username;
        $user->mail=$request->mailadress;
        $user->password=bcrypt($request->password);
        $user->bio=$request->bio;

        if($request->file('image')){
            $image=$request->file('image')->getClientOriginalName();//getClientOriginalNameでオリジナルの名前が取れる。
            $request->file('image')->storeAs('public',$image);//storeAsメソッドを追加して引数に上で取得したオリジナル名を入れる。
            $user->images=$image;
        }
        $user->save();

        return redirect('/profile');
    }

    public function index(Request $request) 
    {
        $users = User::all();
        $search = $request->search;
        //もしユーザー名があればget
        if(!empty($search)){
            $users = User::where('username','like',"%$search%")->get();
        }

        return view('users.index',compact('users','search'));
    }

    // フォロー
    public function follow($id)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($id);
            return back();
        }
    }

     // フォロー解除
    public function unfollow($id)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($id);
            return back();
        }
    }

    public function follow_list(){
        $user = auth()->user();
        $users = $user->follows(auth()->user()->id)->get();
        $posts = Post::get();

        return view('users.follow_list',compact('users','posts'));
    }

    public function follower_list(){
        $user = auth()->user();
        $users = $user->followers(auth()->user()->id)->get();
        $posts = Post::get();

        return view('users.follower_list',compact('users','posts'));
    }

    public function userProfile($id){
        $user = User::find($id);
        $posts = Post::where('user_id',$id)->get();

        return view('users.user_profile',compact('user','posts'));
    }
}
