<?php

namespace App\Http\Controllers;

use Storage;
use App\User;
use App\Follow;
use App\UserInfo;
use App\UserTechRelate;
use App\TechnologyMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


class UserInfoController extends Controller
{
    public function mypage (Request $request) {
        if (Auth::check()) {
            $user = Auth::user(); //ログインしているユーザー取得
            $user_info = $user->UserInfo; //ログインしているユーザーのuser_info取得
            $user_tech_relates = $user_info->UserTechRelates; //ログインしているユーザーと学習している言語の紐付け
        } else {
            return redirect('/login'); //ログインしていなかったら/loginへ遷移
        }

        $follow_ids = Follow::where('self_id', $user_info->id)->get(['follow_id'])->toArray(); //Followsテーブルの内、ログインしているユーザーのIDと一致するself_idを持つカラムを取得
        $id_list = [];
        foreach ($follow_ids as $follow_id) {
            $id_list[] = $follow_id['follow_id']; //配列に追加する
        }

        $follow_users = UserInfo::whereIn('id', $id_list)->get();


        $follower_ids = Follow::where('follow_id', $user_info->id)->get(['self_id'])->toArray(); //Followsテーブルの内、ログインしているユーザーのIDと一致するfollow_idを持つカラムを取得
        $id_list = [];
        foreach ($follower_ids as $follower_id) {
            $id_list[] = $follower_id['self_id']; //配列に追加する
        }

        $follower_users = UserInfo::whereIn('id', $id_list)->get();

        return view('user_info/mypage', [
            'user' => $user,
            'user_info' => $user_info,
            'user_tech_relates' => $user_tech_relates,
            "follow_users" => $follow_users,
            "follower_users" => $follower_users,
            
        ]);
    }


    public function create(Request $request) {
        if (Auth::check()) {
            $user = Auth::user(); //ログインしているユーザー取得
        } else {
            return redirect('/login'); //ログインしていなかったら/loginへ遷移
        }

        $technology_masters = TechnologyMaster::all();

        return view('user_info/create', [
            'user' => $user,
            'technology_masters' => $technology_masters,
        ]);
    }


    public function create_confirmed (Request $request) {

        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('image', $image, 'public');

        $user_info = new UserInfo;
        $user_info->id = $request->id;
        $user_info->name = $request->name;
        $user_info->icon_image = Storage::disk('s3')->url($path);
        $user_info->description = $request->description;
        $user_info->user_id = $request->id;
        $user_info->save();

        $check_tech_list = $request->techs; // checkされた技術を取得
        $save_list = []; // 複数レコードを一気に登録するために連想配列を作成する
        foreach ($check_tech_list as $check_tech) {
            $save_list["technology_master_id"] = $check_tech;
            $save_list["user_info_id"] = $user_info->id;
            UserTechRelate::insert($save_list);

        }

        return redirect('/user_info/mypage');
    }


    public function edit (Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return redirect('/login');
        }

        $user_info = $user->UserInfo;
        $technology_masters = TechnologyMaster::all();

        return view('user_info/edit', [
            'user' => $user,
            'user_info' => $user_info,
            'technology_masters' => $technology_masters,
        ]);
    }


    public function update (Request $request) {
        // user_infoテーブル更新
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('image', $image, 'public');
        // アップロードした画像のフルパスを取得
        // $post->image_path = Storage::disk('s3')->url($path);
        $user_info = UserInfo::find($request->id);
        $user_info->icon_image = Storage::disk('s3')->url($path);
        $user_info->name = $request->name;
        $user_info->description = $request->description;
        $user_info->save();

        $user_tech_relates = $user_info->UserTechRelates;

        if ($user_tech_relates) {
            UserTechRelate::where('user_info_id', $user_info->id)->delete(); // データがすでに存在していた場合一度データを全て削除し新しいデータに洗い替えする
        }

        $check_tech_list = $request->techs; // checkされた技術を取得
        $save_list = []; // 複数レコードを一気に登録するために連想配列を作成する
        $data_list = [];

        foreach ($check_tech_list as $check_tech) {
            $save_list["technology_master_id"] = (int)$check_tech;
            $save_list["user_info_id"] = $user_info->id;
            $data_list[] = $save_list;
        }
        UserTechRelate::insert($data_list); // 作成した連想配列をinsert関数を使用し一括作成する

        return redirect('/user_info/mypage');
    }

    
    public function list (Request $request){
        if (Auth::check()) {
            $user = Auth::user(); // ログインユーザーの特定
        } else {
            return redirect('/login');
        }

        $users_list = User::all(); // 全ユーザーの取得
        $user_infoes_list = UserInfo::all();
        $user_tech_relates = UserTechRelate::all();

        return view('user_info.list', [
            'user' => $user,
            'users_list' => $users_list,
            'user_infoes_list' => $user_infoes_list,
            'user_tech_relates' => $user_tech_relates,
        ]);
    }


    public function userpage(Request $request) {
        $user = User::find($request->id);
        $user_info = UserInfo::find($request->id);
        $user_tech_relates = $user_info->UserTechRelates; //ログインしているユーザーと学習している言語の紐付け


        $follow_ids = Follow::where('self_id', $user_info->id)->get(['follow_id'])->toArray(); //Followsテーブルの内、ログインしているユーザーのIDと一致するself_idを持つカラムを取得
        $id_list = [];
        foreach ($follow_ids as $follow_id) {
            $id_list[] = $follow_id['follow_id']; //配列に追加する
        }

        $follow_users = UserInfo::whereIn('id', $id_list)->get();


        $follower_ids = Follow::where('follow_id', $user_info->id)->get(['self_id'])->toArray(); //Followsテーブルの内、ログインしているユーザーのIDと一致するfollow_idを持つカラムを取得
        $id_list = [];
        foreach ($follower_ids as $follower_id) {
            $id_list[] = $follower_id['self_id']; //配列に追加する
        }

        $follower_users = UserInfo::whereIn('id', $id_list)->get();

        return view('/user_info/userpage', [
            'user' => $user,
            'user_info' => $user_info,
            'user_tech_relates'=> $user_tech_relates,
            'follow_users' => $follow_users,
            'follower_users' => $follower_users,
        ]);
    }
}
