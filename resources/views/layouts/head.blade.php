@section('head')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    @if(app('env')=='local')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    @endif
    @if(app('env')=='production')
    <link rel="stylesheet" href="{{ secure_asset('css/user.css') }}">
    @endif
    
@endsection