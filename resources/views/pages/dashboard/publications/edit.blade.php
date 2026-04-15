@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Edit Publication</h1>
                            <p class="mt-2 text-sm text-gray-600">Update the publication details or replace the PDF file.</p>
                        </div>
                        <a href="{{ route('admin.publications.index') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-600 px-4 py-2 text-sm font-semibold  shadow-sm hover:bg-gray-700">
                            Back to list
                        </a>
                    </div>

                    <form action="{{ route('admin.publications.update', $publication) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $publication->title) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500" />
                                @error('title')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="description" name="description" rows="4" required
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $publication->description) }}</textarea>
                                @error('description')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                    <select id="category" name="category" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
                                        <option value="Annual Report" {{ old('category', $publication->category) === 'Annual Report' ? 'selected' : '' }}>Annual Report</option>
                                        <option value="Legal Act" {{ old('category', $publication->category) === 'Legal Act' ? 'selected' : '' }}>Legal Act</option>
                                        <option value="Policy" {{ old('category', $publication->category) === 'Policy' ? 'selected' : '' }}>Policy</option>
                                    </select>
                                    @error('category')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label for="published_date" class="block text-sm font-medium text-gray-700">Published Date</label>
                                    <input type="date" id="published_date" name="published_date" value="{{ old('published_date', $publication->published_date->format('Y-m-d')) }}" required
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500" />
                                    @error('published_date')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="file" class="block text-sm font-medium text-gray-700">Replace PDF File</label>
                                    <input type="file" id="file" name="file" accept="application/pdf"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500" />
                                    <p class="mt-2 text-sm text-gray-500">Leave empty to keep the existing PDF.</p>
                                    @error('file')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div class="flex items-center gap-4 mt-6 md:mt-0">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $publication->is_active) ? 'checked' : '' }}
                                               class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                                        <span class="ml-2 text-sm text-gray-700">Active</span>
                                    </label>
                                    <label class="flex-1">
                                        <span class="block text-sm font-medium text-gray-700">Display Order</span>
                                        <input type="number" name="order" value="{{ old('order', $publication->order) }}" min="0"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500" />
                                        @error('order')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">
                                Update Publication
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
