@extends('layouts.guest')

@section('title', 'Login Admin')

@section('content')
<h2 class="text-center text-2xl font-bold mb-6">Login Admin</h2>

@if(session('error'))
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.login') }}">
    @csrf

    <!-- Email -->
    <div class="mb-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus class="mt-1 block w-full" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mb-4">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" type="password" name="password" required class="mt-1 block w-full" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="mb-4 flex items-center">
        <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
        <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-3 w-full">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
</form>
@endsection
