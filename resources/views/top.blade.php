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
            <img class="top-image" src="../img/photo.png" alt="#">
        </div>
    </div>
  
  <!-- Page Content -->
  　<section class="py-4">
        <div class="container">
            <h2 class="font-weight-light text-center py-1">「タイトル」</h2>
            <p class="text-center py-2">このアプリは、プログラミング初心者のためのマッチングアプリです。</p>
            <button type="button" class="btn btn-primary btn-lg btn-block py-2">ログイン</button>
            <button type="button" class="btn btn-danger btn-lg btn-block">サインアップ</button>
        </div>
    </section>

@endsection

@include('layouts.footer')