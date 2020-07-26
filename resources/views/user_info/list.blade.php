@extends('layouts.common')

@section('title', 'TOP')
@include('layouts.head')
@include('layouts.header')

@section('content')
    
  <!-- Page Content -->
  <div class="container">
  <!-- Page Heading -->
  <h1 class="my-4">一覧</h1>
  <div class="row">
  @foreach ($user_infoes_list as $user_info_list)
    <div class="col-lg-4 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body">
          <a href="/user_info/userpage/{{ $user_info_list->id }}">
            <img class="card-img-top img-thumbnail" id="icon_image" src="{{ $user_info_list->icon_image }}">
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-name d-flex justify-content-center"><strong>{{ $user_info_list->name }}</strong></h4>
        </div>
        <div class="card-body tech-list border m-4">
          <dt><u>学習内容</u></dt>
          <div>
          <ul class="list text-center px-0 my-0">
            @foreach ($user_info_list->TechnologyMasters as $user_info_list->TechnologyMaster)
            <li class="list-item mx-auto"><u>{{ $user_info_list->TechnologyMaster->name }}</u></li>
            @endforeach
          </ul>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  </div>

  <!-- Pagination -->
  {{ $user_infoes_list->links() }}

</div>

@endsection

@include('layouts.footer')