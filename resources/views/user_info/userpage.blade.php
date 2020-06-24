@extends('layouts.common')

@section('title', 'TOP')
@include('layouts.head')
@include('layouts.header')

@section('content')
    
      <!-- プロフィール -->
  <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card-deck">
                <div class="card">
                  @if ($user_info->icon_image == null)
                  <img class="card-img-top img-thumbnail" id="icon_image" src="/public/images/blank.png">
                  @else
                  <img class="card-img-top img-thumbnail" id="icon_image" src={{ $user_info->icon_image }}>
                  @endif
                  <div class="card-body">
                    @if ($user->UserInfo == null)
                    <h4 class="card-name d-flex justify-content-center"><strong>{{ $user->name }}</strong></h4>
                    @else
                    <h4 class="card-name d-flex justify-content-center"><strong>{{ $user_info->name }}</strong></h4>
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
                    <ul class="list text-center">
                      <br>
                      @foreach ($user_tech_relates as $user_tech_relate)
                      <li class="list-item"><u>{{$user_tech_relate->TechnologyMaster->name}}</u></li>
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
                    @if ($user->UserInfo == null)
                    <h5 class="card-text">※自己紹介文を編集してください</h5>
                    @else
                    <h5 class="card-text">{{ $user->UserInfo->description }}</h5>
                    @endif
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>

      <!-- フォローリスト -->
    <div class="container mt-5 ">
        <button type="button" class="btn btn-primary btn-lg btn-block">フォローする</button>
    </div>

    <!-- フォロワーリスト -->
    <div class="container mt-5 ">
        <button type="button" class="btn btn-danger btn-lg btn-block">メッセージを送る</button>
    </div>

@endsection

@include('layouts.footer')