@extends('layouts.default')
@section('title','用户列表')

@section('content')
  <div class="offset-md-2 col-md-8">
    <h2 class="mb-4 text-center">所有用户</h2>
    <div class="list-group list-group-flush">
      @foreach ($users as $value)
        @include('layouts._user')
      @endforeach
    </div>
    {!! $users->render() !!}
  </div>
@stop
