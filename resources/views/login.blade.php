@extends('layouts.front')
 
@section('title', 'Login')
 
{{-- 
@section('sidebar')
    @parent
 
    <p>This is appended to the master sidebar.</p>
@endsection

--}}
 
@section('content')

@if(session('message'))
  <h1 class="h3 mb-3 fw-normal {{ session('message')['status'] }}">{{ session('message')['text'] }}</h1>
@endif

<main class="form-signin w-100 m-auto">
  <form action="{{ route('app_login') }}" method="POST">
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="login_email" placeholder="name@example.com">
      <label for="login_email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="login_password" placeholder="Password">
      <label for="login_password">Password</label>
    </div>

    {{--
    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" name="remember_me" value="remember-me" id="login_remember">
      <label class="form-check-label" for="login_remember">
        Remember me <small>(not working because i am laisy on weekends)</small>
      </label>
    </div>
    --}}

    @csrf
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
  </form>
</main>
@endsection