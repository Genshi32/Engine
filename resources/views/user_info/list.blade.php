@extends('layouts.common')

@section('title', 'TOP')
@include('layouts.head')
@include('layouts.header')

@section('content')
    
  <!-- Page Content -->
  <div class="container">
  <!-- Page Heading -->
  <h1 class="my-4">一覧
    <!-- <small>Secondary Text</small> -->
  </h1>
  <div class="row">
    @foreach ($users_list as $user_list)
    @if ($user_list->id != $user->id)
    <div class="col-lg-4 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          @foreach ($user_infoes_list as $user_info_list)
          @if ($user_list->id == $user_info_list->id)
          <a href="/user_info/userpage/{{ $user_info_list->id }}">
            <img class="card-img-top img-thumbnail" id="icon_image" src="{{ $user_info_list->icon_image }}">
          </a>
          @endif
          @endforeach
        </div>
        <div class="card-body">
          @foreach ($user_infoes_list as $user_info_list)
          @if ($user_list->id == $user_info_list->id)
            <h4 class="card-name d-flex justify-content-center"><strong>{{ $user_info_list->name }}</strong></h4>
          @endif
          @endforeach
        </div>
        <div class="card-body border m-4">
          <dt><u>学習内容</u></dt>
          <ul class="list text-center">
            <br>
            @foreach ($user_tech_relates as $user_tech_relate)
            @if ($user_list->id == $user_tech_relate->user_info_id)
            <li class="list-item"><u>{{$user_tech_relate->TechnologyMaster->name}}</u></li>
            @endif
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    @endif
    @endforeach
  </div>

  <!-- Pagination -->
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
    </li>
  </ul>

</div>

@endsection

@include('layouts.footer')