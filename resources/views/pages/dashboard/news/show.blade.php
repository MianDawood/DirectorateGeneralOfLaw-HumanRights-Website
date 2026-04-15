@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">News Article Details</h1>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.news.edit', $news) }}"
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit Article
                            </a>
                            <a href="{{ route('admin.news.index') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Article Details -->
                        <div class="lg:col-span-2">
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h2 class="text-xl font-semibold text-gray-900 mb-4">{{ $news->title }}</h2>

                                <!-- Status Badges -->
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @if($news->is_featured)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Featured
                                        </span>
                                    @endif
                                    @if($news->is_active)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Published
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Draft
                                        </span>
                                    @endif
                                </div>

                                <!-- Excerpt -->
                                <div class="mb-6">
                                    <h3 class="text-sm font-medium text-gray-700 mb-2">Excerpt:</h3>
                                    <p class="text-gray-600 bg-white p-3 rounded border">{{ $news->excerpt }}</p>
                                </div>

                                <!-- Full Content -->
                                <div class="mb-6">
                                    <h3 class="text-sm font-medium text-gray-700 mb-2">Full Content:</h3>
                                    <div class="text-gray-600 bg-white p-4 rounded border whitespace-pre-line">
                                        {{ $news->content }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar Information -->
                        <div class="space-y-6">
                            <!-- Image -->
                            @if($news->image_path)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <h3 class="text-sm font-medium text-gray-700 mb-3">Featured Image</h3>
                                    <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}"
                                         class="w-full h-auto rounded-lg shadow-md">
                                </div>
                            @endif

                            <!-- Article Metadata -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-sm font-medium text-gray-700 mb-3">Article Information</h3>
                                <dl class="space-y-2">
                                    <div>
                                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide">Published Date</dt>
                                        <dd class="text-sm text-gray-900">{{ $news->published_date->format('M j, Y') }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide">Display Order</dt>
                                        <dd class="text-sm text-gray-900">{{ $news->order }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide">Created</dt>
                                        <dd class="text-sm text-gray-900">{{ $news->created_at->format('M j, Y g:i A') }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wide">Last Updated</dt>
                                        <dd class="text-sm text-gray-900">{{ $news->updated_at->format('M j, Y g:i A') }}</dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Actions -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="text-sm font-medium text-gray-700 mb-3">Actions</h3>
                                <div class="space-y-2">
                                    <a href="{{ route('admin.news.edit', $news) }}"
                                       class="w-full bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded text-center block">
                                        Edit Article
                                    </a>
                                    <form method="POST" action="{{ route('admin.news.destroy', $news) }}"
                                          onsubmit="return confirm('Are you sure you want to delete this article?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Delete Article
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
