<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    public function mypage (Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            dd($user);
        } else {
            return redirect('/login');
        }
        return view('user_info.mypage');

    }

    public function edit (Request $request){
        return view('user_info.edit');
    }
}
