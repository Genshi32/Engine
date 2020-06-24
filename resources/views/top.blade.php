@extends('layouts.common')

@section('title', 'TOP')
@include('layouts.head')
@include('layouts.header')

@section('content')
    
  <!-- Full Page Image Header with Vertically Centered Content -->
  <!-- <header class="masthead"> -->
    <div class="container">
        <div>
            <br>
            <img id="topImage" class="top-image" src="../img/photo.png" alt="#">
        </div>
    </div>
  
  <!-- Page Content -->
  　<section class="py-4">
        <div id="topContainer" class="container">
            <h2 class="font-weight-light text-center py-1">「タイトル」</h2>
            <p class="text-center py-2">このアプリは、プログラミング初心者のためのマッチングアプリです。</p>
            <a class="btn btn-primary btn-block p-2" href="/login">
                ログイン
            </a>
            <a class="btn btn-danger btn-block p-2" href="/register">
                サインアップ
            </a>
        </div>
    </section>

@endsection

@include('layouts.footer')