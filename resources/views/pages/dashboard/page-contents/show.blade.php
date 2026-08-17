@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-900 mb-6">Content Details</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Page</label>
                            <p class="text-lg font-medium text-gray-900">{{ $pageContent->page_key }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Section</label>
                            <p class="text-lg font-medium text-gray-900">{{ $pageContent->section_key }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500 mb-1">Title</label>
                            <p class="text-lg font-medium text-gray-900">{{ $pageContent->title ?? 'N/A' }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500 mb-1">Content</label>
                            <div class="p-4 bg-gray-50 rounded-md">
                                <p class="text-gray-700 whitespace-pre-wrap">{{ $pageContent->content ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Image</label>
                            @if($pageContent->image)
                                <img src="{{ asset($pageContent->image) }}" alt="Content Image" class="w-64 h-48 object-cover rounded-md">
                            @else
                                <p class="text-gray-400">No image</p>
                            @endif
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Button</label>
                            <p class="text-gray-900">{{ $pageContent->button_text ?? 'N/A' }}</p>
                            <p class="text-sm text-brand-600">{{ $pageContent->button_link ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Order</label>
                            <p class="text-gray-900">{{ $pageContent->order }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $pageContent->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $pageContent->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.page-contents.index', ['page' => $pageContent->page_key]) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</a>
                        <div class="flex gap-4">
                            <a href="{{ route('admin.page-contents.edit', $pageContent) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            <form method="POST" action="{{ route('admin.page-contents.destroy', $pageContent) }}" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection