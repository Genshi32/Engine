@extends('layouts.common')

@section('title', 'TOP')
@include('layouts.head')
@include('layouts.header')

@section('content')
    
<div class="container pt-5">
  <div class="row">
    <div id="topImageContainer" class="col-xl text-center float-left">
        <br>
        <img id="topImage" class="top-image img-fluid" src="{{ asset('images/enjin_people.png') }}" alt="#">
    </div>
    <div id="topContainer" class="col-xl float-right">
        <div class="jumbotron bg-transparent">
            <h1 class="display-4">Engine</h1>
            <p class="lead">このアプリはプログラミング初心者である開発者が<br>共に技術を高め合う仲間を探そうと思い作成した<br>プログラミング初心者のためのマッチングアプリです。</p>
            <hr class="my-4">
            <p>仲間と一緒にプログラミング学習を進めよう！</p>
            <a class="btn btn-outline-primary btn-block p-2" href="/login">
                ログイン
            </a>
            <a class="btn btn-outline-danger btn-block p-2" href="/register">
                サインアップ
            </a>
        </div>
    </div>
  </div>
</div>

@endsection

@include('layouts.footer')