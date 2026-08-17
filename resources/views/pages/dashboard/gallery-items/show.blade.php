@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">View Gallery Item</h1>
                        <div>
                            <a href="{{ route('admin.gallery-items.edit', $item) }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Edit
                            </a>
                            <a href="{{ route('admin.gallery-items.index') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            @php
                                $preview = $item->thumbnail_path ?: $item->media_path;
                                $previewUrl = $preview
                                    ? (str_starts_with($preview, 'images/') ? asset($preview) : asset('storage/' . $preview))
                                    : null;
                            @endphp
                            <div class="mb-4">
                                @if($previewUrl)
                                    <img src="{{ $previewUrl }}" alt="{{ $item->title ?? 'Preview' }}" class="w-48 h-48 rounded-lg object-cover">
                                @else
                                    <div class="w-48 h-48 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                                        N/A
                                    </div>
                                @endif
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $item->title ?? 'Untitled' }}</h2>
                            <p class="text-sm text-gray-600 mb-4">{{ $item->description ?? '—' }}</p>
                            <div class="space-y-2 text-sm text-gray-700">
                                <div><span class="font-semibold">Type:</span> {{ ucfirst($item->type) }}</div>
                                <div><span class="font-semibold">Status:</span> {{ ucfirst($item->status) }}</div>
                                <div><span class="font-semibold">Order:</span> {{ $item->order }}</div>
                                <div><span class="font-semibold">Duration:</span> {{ $item->duration ?? '—' }}</div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Files</h3>
                            <dl class="space-y-2 text-sm text-gray-700">
                                <div><span class="font-semibold">Media:</span> {{ $item->media_path ?? '—' }}</div>
                                <div><span class="font-semibold">Thumbnail:</span> {{ $item->thumbnail_path ?? '—' }}</div>
                            </dl>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Metadata</h3>
                        <dl class="space-y-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                <dd class="text-sm text-gray-900">{{ $item->created_at->format('M d, Y H:i') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                <dd class="text-sm text-gray-900">{{ $item->updated_at->format('M d, Y H:i') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
