@extends('layouts.fullscreen-layout')

@section('content')
    <div class="relative z-1 bg-white p-6 sm:p-0 dark:bg-gray-900">
        <div class="relative flex h-screen w-full flex-col justify-center sm:p-0 lg:flex-row dark:bg-gray-900">
            <div class="flex w-full flex-1 flex-col lg:w-1/2">
                <div class="mx-auto w-full max-w-md pt-10">
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center text-sm text-gray-500 transition-colors hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="stroke-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Back to login
                    </a>
                </div>

                <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">
                    <div class="mb-5 sm:mb-8">
                        <h1 class="text-title-sm sm:text-title-md mb-2 font-semibold text-gray-800 dark:text-white/90">
                            Forgot Password
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Enter your administrator email and we will send you a password reset link.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label for="email" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Email<span class="text-error-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                                    placeholder="admin@example.com"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border @error('email') border-error-500 @else border-gray-300 @enderror bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                @error('email')
                                    <p class="mt-1 text-xs text-error-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <button type="submit"
                                    class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 flex w-full items-center justify-center rounded-lg px-4 py-3 text-sm font-medium text-white transition">
                                    Send Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-brand-950 relative hidden h-full w-full items-center lg:grid lg:w-1/2 dark:bg-white/5">
                <div class="z-1 flex items-center justify-center">
                    <x-common.common-grid-shape/>
                    <div class="flex max-w-xs flex-col items-center">
                        <a href="/" class="mb-4 block">
                            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-20" />
                        </a>
                        <p class="text-center text-gray-400 dark:text-white/60 text-xl font-bold">
                            Human Rights Directorate <br> KP
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
