@extends('app.layouts.master')

@section('title', 'Videos')

@section('sidebar')
    @include('app.videos.partials.sidebar')
@endsection

@section('content')

    <div class="markup markup-lists markup-links markup-code markup-tables">
        <h1>Mailcoach video course</h1>
        <p>Welcome to the Mailcoach video course! Now is the first time you can peak over our shoulders to see how we integrate all those pieces into a real world application.
            You'll get some practical tips to improve your code style along the way.</p>

            <h2 class="markup-h2 mt-6">What you'll learn:</h2>
            <ul class="mt-4 grid gap-4">
                <li>
                    <div>
                        What is Mailcoach?
                        <div class="opacity-75">A tour of the application</div>
                    </div>
                </li>
                <li>
                    <div>
                        The building process
                        <div class="opacity-75">A behind-the-scenes</div>
                    </div>
                </li>
                <li>
                    <div>
                        Writing clear code
                        <div class="opacity-75">Proven patterns in Laravel</div>
                    </div>
                </li>
            </ul>

            <p class="mt-12">
                <strong>Select a topic</strong> from the menu <span class="sm:hidden">at the top</span><span class="hidden sm:inline">on the left</span> and start the course!
            </p>
    </div>

@endsection
