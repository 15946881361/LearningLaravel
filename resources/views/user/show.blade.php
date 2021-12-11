@extends('layouts.default')
@section('title',$user->name)

@section('content')
  <div class="row">
    <div class="offset-md-2 col-md-8">
      <div class="col-md-12">
        <div class="offset-md-2 col-md-8">
          <section class="user_info">
            <a href="{{ route('user.show', $user->id) }}">
              <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar"/>
            </a>
            <h1>{{ $user->name }}</h1>
          </section>
        </div>
      </div>
    </div>
  </div>
@stop
