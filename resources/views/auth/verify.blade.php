@extends('auth.layouts.auth')

@section('title', 'Verify')

@section('auth')
    <h1>{{ __('Verify Your Email Address') }}</h1>

    @if (session('resent'))
        <p class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </p>
    @endif

    <p>
        {{ __('Before proceeding, please check your email for a verification link.') }}
    </p>

    <div>
        {{ __('If you did not receive the email') }},
        <form class="inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="markup-link">{{ __('click here to request another') }}</button>.
        </form>
    </div>

@endsection
