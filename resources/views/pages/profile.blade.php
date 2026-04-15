@extends('layouts.app')

@section('content')
    <div class="px-4 py-8 mx-auto max-w-7xl">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">User Profile</h1>
            <p class="mt-1 text-sm text-gray-500">Manage your account details and login credentials.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-200 dark:bg-white">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Account Overview</h2>

                <div class="space-y-4 text-sm">
                    <div>
                        <p class="text-gray-500">Full Name</p>
                        <p class="font-medium text-gray-900">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email Address</p>
                        <p class="font-medium text-gray-900">{{ $user->email }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email Verified</p>
                        <p class="font-medium text-gray-900">
                            {{ $user->email_verified_at ? $user->email_verified_at->format('M d, Y h:i A') : 'Not verified' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500">Member Since</p>
                        <p class="font-medium text-gray-900">{{ $user->created_at->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Last Updated</p>
                        <p class="font-medium text-gray-900">{{ $user->updated_at->format('M d, Y h:i A') }}</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-200 dark:bg-white">
                <h2 class="text-lg font-semibold text-gray-800 mb-6">Update Profile</h2>

                <form method="POST" action="{{ route('dashboard.profile.update') }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-gray-300 dark:bg-white dark:text-gray-900"
                            required
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-gray-300 dark:bg-white dark:text-gray-900"
                            required
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-sm font-semibold text-gray-900 mb-3">Change Password (Optional)</h3>
                        <p class="text-xs text-gray-500 mb-4">Leave password fields empty if you do not want to change it.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Current Password</label>
                                <input
                                    type="password"
                                    id="current_password"
                                    name="current_password"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-gray-300 dark:bg-white dark:text-gray-900"
                                >
                                @error('current_password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">New Password</label>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-gray-300 dark:bg-white dark:text-gray-900"
                                >
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Confirm New Password</label>
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-brand-500 focus:ring-brand-500 dark:border-gray-300 dark:bg-white dark:text-gray-900"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-5 py-2.5 bg-brand-500 text-white text-sm font-medium rounded-lg hover:bg-brand-600 transition"
                        >
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
