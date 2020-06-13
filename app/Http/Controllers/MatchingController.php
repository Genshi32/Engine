<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // 追加

class MatchingController extends Controller
{
    public function mypage () {
        return view('mypage');
    }
}
