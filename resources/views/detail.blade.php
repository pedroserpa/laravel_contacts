@extends('layouts.front')
 
@section('title', $contact['name'])

@section('content')
<div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-3">
        <div class="col"><a href="{{ url()->previous() }}" class="btn btn-primary">Back</a></div>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php if (null != $contact): ?>
            <div class="col">
                <div class="card">
                    <div class="card-header"><h2 class="card-title">{{ $contact['name'] }}</h2></div>
                    <div class="card-body">
                        <p><a href="mailto:{{ $contact['email'] }}" target="_blank">{{ $contact['email'] }}</a></p>
                        <p>{{ $contact['tel'] }}</p>
                        
                    </div>
                    @auth
                    <div class="card-footer">
                        <a href="{{ route('app_contact_edit', $contact['id']) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('app_contact_delete', $contact['id']) }}" class="btn btn-danger">Delete</a>
                    </div>
                    @endauth
                </div>
            </div>
        <?php endif ;?>
      </div>
    </div>
</div>
@endsection
