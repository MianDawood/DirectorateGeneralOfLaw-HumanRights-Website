@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Edit News Article</h1>
                        <a href="{{ route('admin.news.index') }}"
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       required>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Current Image -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Current Featured Image</label>
                                @if($news->image_path)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $news->image_path) }}" alt="Current image"
                                             class="max-w-xs h-auto rounded-lg shadow-md">
                                    </div>
                                @else
                                    <p class="mt-2 text-sm text-gray-500">No image uploaded</p>
                                @endif
                            </div>

                            <!-- Image -->
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Change Featured Image</label>
                                <input type="file" name="image" id="image" accept="image/*"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-sm text-gray-500">Leave empty to keep current image. Recommended size: 800x400px. Max file size: 2MB</p>
                            </div>

                            <!-- Published Date -->
                            <div>
                                <label for="published_date" class="block text-sm font-medium text-gray-700">Published Date</label>
                                <input type="date" name="published_date" id="published_date" value="{{ old('published_date', $news->published_date->format('Y-m-d')) }}"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       required>
                                @error('published_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Order -->
                            <div>
                                <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
                                <input type="number" name="order" id="order" value="{{ old('order', $news->order) }}" min="0"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('order')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Is Featured -->
                            <div class="flex items-center">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Mark as Featured Article</span>
                                </label>
                            </div>

                            <!-- Is Active -->
                            <div class="flex items-center">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $news->is_active) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Publish Article (Active)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Excerpt -->
                        <div class="mt-6">
                            <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt (Short Summary)</label>
                            <textarea name="excerpt" id="excerpt" rows="3"
                                      class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                      required>{{ old('excerpt', $news->excerpt) }}</textarea>
                            <p class="mt-1 text-sm text-gray-500">This will be displayed on the homepage card (max 500 characters)</p>
                            @error('excerpt')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mt-6">
                            <label for="content" class="block text-sm font-medium text-gray-700">Full Content</label>
                            <textarea name="content" id="content" rows="12"
                                      class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                      required>{{ old('content', $news->content) }}</textarea>
                            <p class="mt-1 text-sm text-gray-500">Use double line breaks to create paragraphs. This content will be displayed on the news detail page.</p>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Article
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
