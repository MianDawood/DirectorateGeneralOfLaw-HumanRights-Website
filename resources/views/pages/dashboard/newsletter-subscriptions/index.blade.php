@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Newsletter Subscriptions</h1>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('admin.newsletter-subscriptions.index') }}"
                          class="mb-4 flex items-center gap-2">
                        <input type="text" name="search" value="{{ $search ?? '' }}"
                               placeholder="Search by name, email or phone..."
                               class="flex-1 rounded border border-gray-300 px-4 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition-all">
                        <button type="submit"
                                class="bg-gray-800 hover:bg-gray-900 dark:bg-brand-600 dark:hover:bg-brand-700 text-white font-bold py-2 px-4 rounded text-sm">
                            Search
                        </button>
                        @if(!empty($search))
                            <a href="{{ route('admin.newsletter-subscriptions.index') }}"
                               class="text-gray-500 hover:text-gray-700 text-sm font-medium">Clear</a>
                        @endif
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subscribed At</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($subscriptions as $subscription)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $subscription->full_name ?: '—' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $subscription->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $subscription->phone ?: '—' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $subscription->created_at?->format('d M Y, h:i A') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <form method="POST" action="{{ route('admin.newsletter-subscriptions.destroy', $subscription) }}"
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this subscription?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            {{ empty($search) ? 'No subscriptions found.' : 'No subscriptions match your search.' }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $subscriptions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection