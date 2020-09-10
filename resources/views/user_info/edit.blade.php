@extends('layouts.common')

@section('title', 'マイページ編集')
@include('layouts.head')
@include('layouts.header')

@section('content')
    
<body>
    <div class="container">
      <h1> マイページ編集 </h1>
      <form action="/user_info/update" enctype="multipart/form-data" method="post">
        @csrf
        <!-- ID -->
        @if ($user->UserInfo != null)
        <input type="hidden" name="id" value="{{ $user->UserInfo->id }}">
        @else
        <input type="hidden" name="id" value="{{ $user->id }}">
        @endif
        <!-- icon -->
        <div class="form-group my-5">
          <label for="user_icon_image">アイコン:</label>
          <input type="file" name="image" class="form-control-file">
        </div>
        <!-- name -->
        <div class="form-group my-5">
          @if ($user->UserInfo != null)
          <label for="name">名前:</label>
          <input type="text" id="name" name="name" class="form-control" value="{{ $user->UserInfo->name }}">
          @else
          <label for="name">名前:</label>
          <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
          @endif
        </div>
        <!-- comment -->
        <div class="form-group my-5">
          @if ($user->UserInfo != null)
          <label for="descriptionTextarea">コメント:</label>
          <textarea id="description" class="form-control" name="description" >{{ $user->UserInfo->description }}</textarea>
          @else
          <label for="descriptionTextarea">コメント:</label>
          <textarea id="description" class="form-control" name="description">自己紹介文を入力してください</textarea>
          @endif
        </div>
        <!-- technologymaster -->
        <label class="my-3" for="technologyMastersName">学習言語:</label>
          <div class="row">
            <div class="col-md-3">
              <label for="technologyMastersName">バックエンド</label>
            </div>
            <div class="col-md-3">
              <label for="technologyMastersName">フロントエンド</label>
            </div>
            <div class="col-md-3">
              <label for="technologyMastersName">フレームワーク</label>
            </div>
            <div class="col-md-3">
              <label for="technologyMastersName">開発ツール</label>
            </div>
          </div>



          <!-- ※学習言語のソートができてない状態 -->
          <div class="row form-group">
          @foreach ($technology_masters as $technology_master)
          @switch ($technology_master->category_id)
            @case(1)
              <div class="col-md-3">  
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="techs[]" value="{{ $technology_master->id }}" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">{{ $technology_master->name }}</label>
                </div>
              </div>
            @break
            @case(2)
              <div class="col-md-3">  
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="techs[]" value="{{ $technology_master->id }}" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">{{ $technology_master->name }}</label>
                </div>
              </div>
            @break
            @case(3)
              <div class="col-md-3">  
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="techs[]" value="{{ $technology_master->id }}" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">{{ $technology_master->name }}</label>
                </div>
              </div>
            @break
            @default
              <div class="col-md-3">  
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="techs[]" value="{{ $technology_master->id }}" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">{{ $technology_master->name }}</label>
                </div>
              </div>
            @break
          @endswitch
          @endforeach
          </div>
        <br>
        <input type="submit" class="btn btn-lg btn-outline-primary" value="保存">
      </form>
    </div>

@endsection

@include('layouts.footer')