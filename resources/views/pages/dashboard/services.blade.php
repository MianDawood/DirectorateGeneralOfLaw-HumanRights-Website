@extends('layouts.app')

@section('content')
    <div class="px-4 py-8 mx-auto max-w-7xl">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Service Management</h1>
                <p class="mt-1 text-sm text-gray-500">Manage the key services displayed on the home page.</p>
            </div>
            <span class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg">
                Total: {{ $services->count() }}
            </span>
        </div>

        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700/50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider dark:text-gray-400">Service Name</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider dark:text-gray-400">Description</th>
                        <th class="px-6 py-3 text-xs font-medium text-right text-gray-500 uppercase tracking-wider dark:text-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse($services as $service)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ $service['name'] }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 line-clamp-1">
                                {{ $service['description'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route($service['route']) }}" class="text-brand-500 hover:text-brand-600 mr-3">
                                    View
                                </a>
                                <a href="{{ route($service['management_route']) }}" class="text-indigo-600 hover:text-indigo-800">
                                    Manage
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                No services available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
