@extends('layouts.front')
 
@section('title', 'Home')
 
{{-- 
@section('sidebar')
    @parent
 
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
@endsection

--}}
 
@section('content')
<div class="album py-5 bg-body-tertiary">
    <div class="container">
      @if(session('message'))
        <div class="row"><div class="col-12"><h1 class="h3 mb-3 fw-normal {{ session('message')['status'] }}">{{ session('message')['text'] }}</h1></div></div>
      @endif
      @auth
        <div class="row mb-3"><div class="col-12"><a href="{{ route('app_contact_create') }}" class="btn btn-primary">Add New</a></div></div>
      @endauth
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php if (null != $contacts): ?>
        <?php foreach ($contacts as $contact): ?>
            <div class="col">
                <div class="card">
                    <div class="card-header"><h2 class="card-title">{{ $contact['name'] }}</h2></div>
                    <div class="card-body">
                        <p><a href="mailto:{{ $contact['email'] }}" target="_blank">{{ $contact['email'] }}</a></p>
                        <p>{{ $contact['tel'] }}</p>
                        
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('app_contact_detail', $contact['id']) }}" class="btn btn-dark">Detail</a>
                        <!-- If user is logged in show the edit button -->
                        @auth
                            <a href="{{ route('app_contact_edit', $contact['id']) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('app_contact_delete', $contact['id']) }}" class="btn btn-danger">Delete</a>
                        @endauth
                    </div>
                </div>
            </div>
        <?php endforeach ;?>
        <?php else : ?>
            <div class="col-12"><h3>No data available</h3></div>
        <?php endif ;?>
      </div>
    </div>
</div>
@endsection