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
        } else {
            return redirect('/login'); //ログインしていなかったら/loginへ遷移
        }

        if ($user_info != null) {
            $user_tech_relates = $user_info->UserTechRelates; //ログインしているユーザーと学習している言語の紐付け
        } else {
            $user_tech_relates = null;
        }

        if ($user_info != null) {
            $follow_ids = Follow::where('self_id', $user_info->id)->get(['follow_id'])->toArray(); //Followsテーブルの内、ログインしているユーザーのIDと一致するself_idを持つカラムを取得
            $id_list = [];
            foreach ($follow_ids as $follow_id) {
                $id_list[] = $follow_id['follow_id']; //配列に追加する
            }
            $follow_users = UserInfo::whereIn('id', $id_list)->get();
        } else {
            $follow_users = null;
        }

        if ($user_info != null) {
            $follower_ids = Follow::where('follow_id', $user_info->id)->get(['self_id'])->toArray(); //Followsテーブルの内、ログインしているユーザーのIDと一致するfollow_idを持つカラムを取得
            $id_list = [];
            foreach ($follower_ids as $follower_id) {
               $id_list[] = $follower_id['self_id']; //配列に追加する
            }
            $follower_users = UserInfo::whereIn('id', $id_list)->get();
        } else {
            $follower_users = null;
        }

        return view('user_info/mypage', [
            'user' => $user,
            'user_info' => $user_info,
            'user_tech_relates' => $user_tech_relates,
            "follow_users" => $follow_users,
            "follower_users" => $follower_users,
            
        ]);
    }


    public function edit (Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return redirect('/login');
        }

        $technology_masters = TechnologyMaster::all();

        return view('user_info/edit', [
            'user' => $user,
            'technology_masters' => $technology_masters,
        ]);
    }


    public function update (Request $request) {
        $user_info = UserInfo::find($request->id);
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        if($image !== null) {
        $path = Storage::disk('s3')->putFile('image', $image, 'public');
        // アップロードした画像のフルパスを取得
        }

        if ($user_info) {
            if($image !== null) {
                $user_info->icon_image = Storage::disk('s3')->url($path);
            }
            $user_info->name = $request->name;
            $user_info->description = $request->description;
            $user_info->save();
        } else {
            $user_info = new UserInfo;
            $user_info->id = $request->id;
            if($image !== null) {
                $user_info->icon_image = Storage::disk('s3')->url($path);
            } else {
                $user_info->icon_image = '';
            }
            $user_info->name = $request->name;
            $user_info->description = $request->description;
            $user_info->user_id = $request->id;
            $user_info->save();
        }

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

        $category_id = (int)$request->category;
        $query = UserInfo::query();
        if ($category_id !== 0) {
            $user_tech_relates = UserTechRelate::where('technology_master_id', $category_id)->get(['user_info_id'])->toArray();
            $id_list = [];
            foreach ($user_tech_relates as $user_tech_relate) {
               $id_list[] = $user_tech_relate['user_info_id']; //配列に追加する
            }
            $query->whereIn('id', $id_list);
        }
        if (strlen($request->search) >= 1) {
            $query->where('name', $request->search);
        }
        $user_infoes_list = $query->paginate(6);

        return view('user_info.list',compact('user','category_id', 'user_infoes_list'));
    }


    public function userpage (Request $request) {
        if (Auth::check()) {
            $user = Auth::user(); // ログインユーザーの特定
        } else {
            return redirect('/login');
        }

        $request_user = User::find($request->id);
        $request_user_info = UserInfo::find($request->id);
        $request_user_tech_relates = $request_user_info->UserTechRelates; //ログインしているユーザーと学習している言語の紐付け


        $follow_ids = Follow::where('self_id', $request_user_info->id)->get(['follow_id'])->toArray(); //Followsテーブルの内、ログインしているユーザーのIDと一致するself_idを持つカラムを取得
        $id_list = [];
        foreach ($follow_ids as $follow_id) {
            $id_list[] = $follow_id['follow_id']; //配列に追加する
        }
        $follow_users = UserInfo::whereIn('id', $id_list)->get();


        $follower_ids = Follow::where('follow_id', $request_user_info->id)->get(['self_id'])->toArray(); //Followsテーブルの内、ログインしているユーザーのIDと一致するfollow_idを持つカラムを取得
        $id_list = [];
        foreach ($follower_ids as $follower_id) {
            $id_list[] = $follower_id['self_id']; //配列に追加する
        }
        $follower_users = UserInfo::whereIn('id', $id_list)->get();

        return view('/user_info/userpage', [
            'user' => $user,
            'request_user' => $request_user,
            'request_user_info' => $request_user_info,
            'request_user_tech_relates'=> $request_user_tech_relates,
            'follow_users' => $follow_users,
            'follower_users' => $follower_users,
        ]);
    }

    public function follow (Request $request) {
        $user_id = (int)$request->user; // ログインユーザーID取得
        $request_user_id = (int)$request->request_user; // フォロー対象ユーザーID取得
        $search_follow = Follow::where('self_id', $user_id)->where('follow_id', $request_user_id); // 自分が相手をフォローしていればレコードを取得
        $search_follower = Follow::where('follow_id', $user_id)->where('self_id', $request_user_id); // 相手が自分をフォローしていればレコードを取得

        // 自分が相手をフォローしていなければ相手をフォローする
        if ($search_follow->exists() === false) {
            $follow = new Follow;
            $follow->self_id = $user_id;
            $follow->follow_id = $request_user_id;
            $follow->mutual_flag = 0;
            $follow->save();

            // 相互フォローであればmutual_flagをtrueにする
            if ($search_follower->exists() === true) {
                $search_follow->update(['mutual_flag' => 1]);
                $search_follower->update(['mutual_flag' => 1]);
            }

        } else {
            // 自分が相手をフォローしていたらフォローを外す
            $search_follow->delete();
            $search_follower->update(['mutual_flag' => 0]);
        }

        return redirect('/user_info/list');   
    }
}
