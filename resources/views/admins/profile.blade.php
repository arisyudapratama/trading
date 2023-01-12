@extends('layouts.admin')

@section('title', 'Profile')
@section('content')
<div class="card">
    <div class=" card-body">
        <h5 class="card-title">{{ $users->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $users->email }}</h6>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    </div>
</div>

@endsection