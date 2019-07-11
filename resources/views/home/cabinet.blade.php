@extends('layout')
  @section('title', 'user страница')
@section('content')
<h1>User page</h1>
    <div>name =>{{ Auth::user()->name }}</div>
    <div>email =>{{ Auth::user()->email }}</div>
    <div>admin =>{{ Auth::user()->is_admin }}</div>
@endsection
