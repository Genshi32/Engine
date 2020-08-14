@extends('layouts.common')

@section('title', 'ユーザーページ')
@include('layouts.head')
@include('layouts.header')

@section('content')
    
      <!-- プロフィール -->
  <div class="container">
  <h2 class="my-4">ユーザーページ</h1>
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card-deck">
                <div class="card">
                  @if ($request_user_info->icon_image == null)
                  <img class="card-img-top img-thumbnail" id="icon_image" src="/public/images/blank.png">
                  @else
                  <img class="card-img-top img-thumbnail" id="icon_image" src={{ $request_user_info->icon_image }}>
                  @endif
                  <div class="card-body">
                    @if ($request_user_info == null)
                    <h4 class="card-name d-flex justify-content-center"><strong>{{ $request_user->name }}</strong></h4>
                    @else
                    <h4 class="card-name d-flex justify-content-center"><strong>{{ $request_user_info->name }}</strong></h4>
                    @endif
                    <div id="follow-link" class="users-follow-link d-flex justify-content-center mt-3">
                      <div class="m-2">
                        <p class="text-center">{{ $follow_users->count() }}</p>
                        フォロー
                      </div>
                      <div class="m-2">
                        <p class="text-center">{{ $follower_users->count() }}</p>
                        フォロワー
                      </div>
                    </div>
                  </div>

                  <div class="card-body border m-4">
                    <dt><u>学習内容</u></dt>
                    <ul class="list text-center px-0 my-0">
                      @foreach ($request_user_tech_relates as $request_user_tech_relate)
                      <li class="list-item mx-auto"><u>{{$request_user_tech_relate->TechnologyMaster->name}}</u></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">自己紹介</p>
                    <br>
                    <br>
                    <br>
                    @if ($request_user_info == null)
                    <h5 class="card-text">※自己紹介文を編集してください</h5>
                    @else
                    <h5 class="card-text">{{ $request_user_info->description }}</h5>
                    @endif
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>

      <!-- フォローリスト -->
    <div class="container mt-5 text-center">
      @if ($search_follow->exists() === false)
      <a href="/user_info/userpage/{{ $request_user->id }}/{{ $user->id }}" class="mx-auto">
        <button type="button" class="btn btn-outline-primary btn-lg">　フォローする　</button>
      </a>
      @else
      <a href="/user_info/userpage/{{ $request_user->id }}/{{ $user->id }}" class="mx-auto">
        <button type="button" class="btn btn-outline-danger btn-lg">　フォロー解除　</button>
      </a>
      @endif
      <a href="#" class="mx-auto">
        <button type="button" class="btn btn-outline-success btn-lg">メッセージを送る</button>
      </a>
    </div>


@endsection

@include('layouts.footer')