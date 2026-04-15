@extends('layouts.app')

@section('content')
    <div class="px-4 py-8 mx-auto max-w-7xl">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome back, {{ Auth::user()->name }}</h1>
            <p class="mt-1 text-sm text-gray-500">Manage your project sections and content from here.</p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Metric 1: Registrations -->
            <div class="relative p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Registrations</p>
                        <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['registrations'] }}</p>
                    </div>
                    <div class="p-3 bg-brand-50 rounded-full dark:bg-brand-500/10">
                        <svg class="w-6 h-6 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.registration-applications.index') }}" class="text-sm font-medium text-brand-500 hover:text-brand-600 transition">Manage Registrations &rarr;</a>
                </div>
            </div>

            <!-- Metric 2: Messages -->
            <div class="relative p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Messages</p>
                        <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['messages'] }}</p>
                    </div>
                    <div class="p-3 bg-success-50 rounded-full dark:bg-success-500/10">
                        <svg class="w-6 h-6 text-success-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.official-messages.index') }}" class="text-sm font-medium text-success-500 hover:text-success-600 transition">Manage Messages &rarr;</a>
                </div>
            </div>

            <!-- Metric 3: Complaints -->
            <div class="relative p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Complaints</p>
                        <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['complaints'] }}</p>
                    </div>
                    <div class="p-3 bg-warning-50 rounded-full dark:bg-warning-500/10">
                        <svg class="w-6 h-6 text-warning-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.complaints.index') }}" class="text-sm font-medium text-warning-500 hover:text-warning-600 transition">Manage Complaints &rarr;</a>
                </div>
            </div>

            <!-- Metric 4: Tenders -->
            <div class="relative p-6 overflow-hidden bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Tenders</p>
                        <p class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['tenders'] }}</p>
                    </div>
                    <div class="p-3 bg-error-50 rounded-full dark:bg-error-500/10">
                        <svg class="w-6 h-6 text-error-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.tenders.index') }}" class="text-sm font-medium text-error-500 hover:text-error-600 transition">Manage Tenders &rarr;</a>
                </div>
            </div>
        </div>

        <div class="mt-12">
            <h2 class="text-lg font-bold text-gray-900 dark:text-white">Quick Actions</h2>
            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                <a href="{{ route('admin.events.index') }}" class="flex items-center p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 transition dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700/50">
                    <div class="flex-shrink-0 p-3 bg-brand-100 rounded-lg dark:bg-brand-500/20">
                        <svg class="w-6 h-6 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Manage Events</p>
                        <p class="text-xs text-gray-500">Create and update featured and upcoming events.</p>
                    </div>
                </a>

                <a href="{{ route('admin.official-messages.index') }}" class="flex items-center p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 transition dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700/50">
                    <div class="flex-shrink-0 p-3 bg-success-100 rounded-lg dark:bg-success-500/20">
                        <svg class="w-6 h-6 text-success-600 dark:text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Update Leadership Messages</p>
                        <p class="text-xs text-gray-500">Edit Minister, Secretary, and DG messages.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
