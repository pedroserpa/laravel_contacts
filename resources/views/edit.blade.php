@extends('layouts.front')
 
@section('title', $contact['name'])

@section('content')

@if(session('message'))
<h1 class="h3 mb-3 fw-normal {{ session('message')['status'] }}">{{ session('message')['text'] }}</h1>
@endif

<main class="form-signin w-100 m-auto">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-3">
            <div class="col"><a href="{{ route('app_home') }}" class="btn btn-primary">Back</a></div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('app_contact_update', $contact['id'])}}" method="POST">
                    @method('PUT')
                    <h1 class="h3 mb-3 fw-normal">Edit {{ $contact['name'] }}</h1>

                    <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $contact['name'] }}" required>
                    </div>

                    <div class="mb-3">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="name@example.com" value="{{ $contact['email'] }}" required>
                    </div>

                    <div class="mb-3">
                    <label for="tel">Phone Number</label>
                    <input type="text" name="telephone" class="form-control" placeholder="911 91 91 92" required value="{{ $contact['telephone'] }}">
                    </div>

                    @csrf
                    <button class="btn btn-primary w-100 py-2" type="submit">Save</button>  
                </form>
            </div>
        </div>
    </div>
</main>

@endsection