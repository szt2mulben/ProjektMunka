@extends('layouts.app')

@section('title', 'Főoldal')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">{{ $company['name'] }}</h2>
    <p class="mb-4 text-gray-700">{{ $company['tagline'] }}</p>

    <p>
       
    </p>
@endsection
