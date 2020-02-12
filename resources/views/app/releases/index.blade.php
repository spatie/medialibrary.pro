@extends('app.layouts.master')

@section('title', 'Releases')

@section('content')

    <ul>
        @foreach($releases as $release)
            <h2>{{ $release->name }}</h2>
            {!! $release->description !!}
        @endforeach
    </ul>

@endsection
