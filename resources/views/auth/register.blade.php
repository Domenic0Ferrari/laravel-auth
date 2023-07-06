@extends('guest.layouts.base')

@section('contents')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input 
        id="name" 
        class="block mt-1 w-full" 
        type="text" 
        name="name" 
        required autofocus autocomplete="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input 
        type="email" 
        class="form-control" 
        id="email" 
        aria-describedby="emailHelp" 
        name="email" 
        required autofocus autocomplete="name"
        value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input 
        type="password"
        class="form-control"
        id="password"
        name="password"
        required autocomplete="new-password"
        value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input 
        type="password_confirmation"
        class="form-control"
        id="password_confirmation"
        name="password_confirmation"
        required autocomplete="new-password"
        value="{{ old('email') }}">
    </div>

    <a href="{{ route('login') }}">
        Already registered?
    </a>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection