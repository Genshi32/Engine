@extends('layouts.common')

@section('title', 'TOP')
@include('layouts.head')
@include('layouts.header')

@section('content')
    
<body>
    <div class="container">
      <h1> ユーザー情報作成 </h1>
      <form action="/user_info/create_confirmed" enctype="multipart/form-data" method="post">
        @csrf
        <!-- ID -->
        <input type="hidden" name="id" value="{{ $user->id }}">
        <!-- icon -->
        <div class="form-group my-5">
          <label for="user_icon_image">アイコン:</label>
          <input type="file" name="image" class="form-control-file">
        </div>
        <!-- name -->
        <div class="form-group my-5">
          <label for="name">名前:</label>
          <input type="text" id="name" name="name" class="form-control">
        </div>
        <!-- comment -->
        <div class="form-group my-5">
          <label for="descriptionTextarea">コメント:</label>
          <textarea type="description" id="description" class="form-control" name="description"></textarea>
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
              <label for="technologyMastersName">インフラ</label>
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
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="保存">
      </form>
    </div>

@endsection

@include('layouts.footer')