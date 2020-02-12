@extends('app.layouts.master')

@section('title', 'Account')

@section('content')
    <h1>Change password</h1>

    <p class="mb-6">
        <a href="{{ route('account') }}">Back to account</a>
    </p>

    <form
        class="form-grid"
        action="{{ route('password') }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <x-text-field label="Current password" name="current_password" type="password"  required />

        <x-text-field label="New password" name="password" type="password"  required />
        <x-text-field label="Confirm new password" name="password_confirmation" type="password" required />

        <div class="form-buttons">
            <button type="submit" class="button">
                Update password
            </button>
        </div>
    </form>
@endsection
