@extends('layouts.app')

@section('content')
    @php
        $query = collect($filters)->filter(fn ($v) => filled($v))->all();
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">News &amp; Events Management</h1>
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('admin.events.create') }}"
                               class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-3 rounded text-sm">Add Event</a>
                            <a href="{{ route('admin.news.create') }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded text-sm">Add News</a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('admin.news-events.index') }}" class="mb-6 grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                        <div>
                            <label for="search" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Search</label>
                            <input type="text" name="search" id="search" value="{{ $filters['search'] }}"
                                   placeholder="Title, detail, subject..."
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="type" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Type</label>
                            <select name="type" id="type"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="all" @selected($filters['type'] === 'all')>All Types</option>
                                <option value="news" @selected($filters['type'] === 'news')>News</option>
                                <option value="events" @selected($filters['type'] === 'events')>Events</option>
                            </select>
                        </div>
                        <div>
                            <label for="category_id" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Subject / Category</label>
                            <select name="category_id" id="category_id"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All Subjects</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected((string) $filters['category_id'] === (string) $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="date_from" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date From</label>
                            <input type="date" name="date_from" id="date_from" value="{{ $filters['date_from'] }}"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="date_to" class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date To</label>
                            <input type="date" name="date_to" id="date_to" value="{{ $filters['date_to'] }}"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="md:col-span-5 flex gap-2">
                            <button type="submit"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Apply Filters</button>
                            <a href="{{ route('admin.news-events.index') }}"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Reset</a>
                        </div>
                    </form>

                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm text-gray-500">Showing {{ $items->total() }} record(s)</span>
                        <span>
                            <a href="{{ route('admin.news-events.export', array_merge(['format' => 'pdf'], $query)) }}"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-3 rounded text-sm">Export PDF</a>
                            <a href="{{ route('admin.news-events.export', array_merge(['format' => 'xlsx'], $query)) }}"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-3 rounded text-sm">Export Excel</a>
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject / Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Venue</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Media</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($items as $item)
                                    @php $isNews = $item->type === 'news'; @endphp
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($isNews)
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-cyan-100 text-cyan-800">News</span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800">Event</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($isNews)
                                                @if($item->image_path)
                                                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                                         class="w-12 h-12 rounded-full object-cover">
                                                @else
                                                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs">N/A</div>
                                                @endif
                                            @else
                                                @if(method_exists($item, 'coverImageUrl') && $item->coverImageUrl())
                                                    <img src="{{ $item->coverImageUrl() }}" alt="{{ $item->title }}"
                                                         class="w-12 h-12 rounded-full object-cover">
                                                @else
                                                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs">N/A</div>
                                                @endif
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ Str::limit($item->title, 50) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $isNews ? '—' : ($item->subject ?? ($item->category?->name ?? '—')) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ optional($item->display_date)->format('M d, Y') ?? '—' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $isNews ? '—' : Str::limit($item->location ?? '', 30) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if($isNews)
                                                {{ $item->images_count }} img
                                            @else
                                                {{ $item->images_count }} img / {{ $item->videos_count }} vid
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($item->is_featured)
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Featured</span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Regular</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($item->is_active)
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                @if($isNews)
                                                    <a href="{{ route('admin.news.show', $item) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                                    <a href="{{ route('admin.news.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    <form method="POST" action="{{ route('admin.news.destroy', $item) }}"
                                                          onsubmit="return confirm('Are you sure you want to delete this article?')" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('admin.events.show', $item) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                                    <a href="{{ route('admin.events.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    <form method="POST" action="{{ route('admin.events.destroy', $item) }}"
                                                          onsubmit="return confirm('Are you sure you want to delete this event?')" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="px-6 py-4 text-center text-gray-500">
                                        No records found matching your filters.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($items->hasPages())
                        <div class="mt-6">
                            {{ $items->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
