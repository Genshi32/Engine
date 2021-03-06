@extends('layouts.common')

@section('title', 'マイページ')
@include('layouts.head')
@include('layouts.header')

@section('content')
    
      <!-- プロフィール -->
  <div class="container">
    <h2 class="my-4">マイページ</h1>
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card-deck">
                <div class="card">
                  <div class="card-body">
                    @if ($user_info == null || $user_info->icon_image == '') <!-- user_infoが未設定またはuser_info設定時に画像を設定しなかった時 --> 
                    <img class="card-img-top img-thumbnail" id="icon_image" src="{{ asset('/images/blank.png') }}">
                    @else
                    <img class="card-img-top img-thumbnail" id="icon_image" src={{ $user_info->icon_image }}>
                    @endif
                    <br>
                    @if ($user_info == null)
                    <h4 class="card-name d-flex justify-content-center"><strong>{{ $user->name }}</strong></h4>
                    @else
                    <h4 class="card-name d-flex justify-content-center"><strong>{{ $user_info->name }}</strong></h4>
                    @endif
                    <div id="follow-link" class="users-follow-link d-flex justify-content-center mt-3">
                      <div class="m-2">
                        @if ($follow_users != null)
                        <p class="text-center">{{ $follow_users->count() }}</p>
                        フォロー
                        @else
                        <p class="text-center">0</p>
                        フォロー
                        @endif
                      </div>
                      <div class="m-2">
                        @if ($follower_users != null)
                        <p class="text-center">{{ $follower_users->count() }}</p>
                        フォロワー
                        @else
                        <p class="text-center">0</p>
                        フォロワー
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="card-body tech-list border m-4">
                    <dt><u>学習内容</u></dt>
                    <ul class="list text-center px-0 my-0">
                      @if ($user_tech_relates != null)
                      @foreach ($user_tech_relates as $user_tech_relate)
                        <li class="list-item mx-auto"><u>{{$user_tech_relate->TechnologyMaster->name}}</u></li>
                      @endforeach
                      @else
                        <p><u>※学習言語を<br>登録してください</u><p>
                      @endif
                    </ul>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">自己紹介</h3>
                    <br>
                    <br>
                    <br>
                    @if ($user_info->description == null)
                    <h4 class="card-text"><u>※自己紹介文を<br>編集してください</u></h5>
                    @else
                    <h4 class="card-text">{{ $user_info->description }}</h5>
                    @endif
                  </div>
                  <a href="/user_info/edit" class="text-center m-3">
                    <button class="btn btn-outline-info">プロフィール設定</button>
                  </a>
                </div>
            </div>
        </div>
      </div>
    </div>

      <!-- フォローリスト -->
    <div class="container mt-5 "><h5><mark>フォロー</mark></h5></div>
    <div class="container border col-sm-9 col-md-7 col-lg-7 mx-auto">
      <div class="d-flex justify-content-center">
        @if ($follow_users->count() !== 0)
        @foreach ($follow_users as $follow_user)
        <a href="/user_info/userpage/{{ $follow_user->id }}">
          @if($follow_user->icon_image)
          <img class="card-img-top img-thumbnail" id="icon_image" src="{{ $follow_user->icon_image }}">
          @else
          <img class="card-img-top img-thumbnail" id="icon_image" src="{{ asset('/images/blank.png') }}">
          @endif
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">{{ $follow_user->name }}</h5>
        </a>
        @endforeach
        @else
        <div class="p-2">
          <br>
          <br>
          <br>
        </div>
        @endif
      </div>
    </div>

    <!-- フォロワーリスト -->
    <div class="container mt-5 "><h5><mark>フォロワー</mark></h5></div>
    <div class="container border col-sm-9 col-md-7 col-lg-7 mx-auto">
      <div class="d-flex justify-content-center">
        @if ($follower_users->count() !== 0)
        @foreach ($follower_users as $follower_user)
        <a href="/user_info/userpage/{{ $follower_user->id }}">
          @if($follower_user->icon_image)
          <img class="card-img-top img-thumbnail" id="icon_image" src="{{ $follower_user->icon_image }}">
          @else
          <img class="card-img-top img-thumbnail" id="icon_image" src="{{ asset('/images/blank.png') }}">
          @endif
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">{{ $follower_user->name }}</h5>
        </a>
        @endforeach
        @else
        <div class="p-2">
          <br>
          <br>
          <br>
        </div>
        @endif
      </div>
    </div>

@endsection
@include('layouts.footer')