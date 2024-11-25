@extends('layouts.app')

@section('title', 'Welcome to Home Page')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Welcome to My Website</h1>
        <p class="lead">This is a simple homepage with a reusable layout.</p>
        <hr class="my-4">
        <p>Use the navigation bar to explore more pages.</p>
        <a class="btn btn-primary btn-lg" href="{{ url('/about') }}" role="button">Learn more</a>
    </div>
@endsection
