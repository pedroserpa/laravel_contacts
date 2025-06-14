@extends('layouts.front')
 
@section('title', 'Register')

@section('styles')
<style type="text/css">
.form-error{border:1px solid #d92c2c}
</style>
@endsection
 
@section('content')

@if(session('message'))
  <h1 class="h3 mb-3 fw-normal {{ session('message')['status'] }}">{{ session('message')['text'] }}</h1>
@endif


<main class="form-signin w-100 m-auto">
  <form action="/register" method="POST">
    <h1 class="h3 mb-3 fw-normal">Register</h1>

    <div class="mb-3">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" placeholder="Name" required>
    </div>

    <div class="mb-3">
      <label for="email">Email address</label>
      <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>

        <span id="passwordHelpInline" class="form-text">
        Must be 8-20 characters long.
        </span>
    </div>
    <div class="mb-3">
        <label for="repeat_password">Repeat Password</label>
      <input type="password" name="repeat_password" class="form-control" id="repeat_password" placeholder="Repeat Password" required>
        <span id="repeatPasswordHelp" class="form-text" style="display: none;">
        Passwords must match
        </span>
    </div>
    
    @csrf
    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
    
  </form>
</main>
@endsection

@section('scripts')
<script defer type="text/javascript">
jQuery(function(){
    $('input#repeat_password').on('keyup', function(){
        var $this = $(this);
        if( $('input#password').val() != $this.val() ){
            $('#repeatPasswordHelp').show();
            $this.addClass('form-error');
            return $this.focus();
        }
        $this.removeClass('form-error');
        return $('#repeatPasswordHelp').hide();
    })
})
</script>
@endsection