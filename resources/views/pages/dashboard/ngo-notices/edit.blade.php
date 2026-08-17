@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Edit NGO Notice</h1>
                        <a href="{{ route('admin.ngo-notices.index') }}"
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.ngo-notices.update', $ngoNotice) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $ngoNotice->title) }}"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       required>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Current Image (if applies) -->
                            @if($ngoNotice->image)
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Current Image</label>
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $ngoNotice->image) }}" alt="Current Notice Image" class="h-32 rounded-lg shadow-md border p-1">
                                    </div>
                                </div>
                            @endif

                            <!-- Image Update -->
                            <div class="md:col-span-2">
                                <label for="image" class="block text-sm font-medium text-gray-700">{{ $ngoNotice->image ? 'Change Image' : 'Add Large Public Notice Image' }}</label>
                                <input type="file" name="image" id="image" accept="image/*"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <p class="mt-1 text-sm text-gray-500">Only needed if this notice should appear as a large image announcement at the bottom of the page.</p>
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Is Public Notice -->
                            <div class="md:col-span-2">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_public_notice" value="1" {{ old('is_public_notice', $ngoNotice->is_public_notice) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700 italic">Mark as Large Public Announcement (This will display the image instead of the card)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description / Label</label>
                            <textarea name="description" id="description" rows="6"
                                      class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                      required>{{ old('description', $ngoNotice->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-10 flex justify-end gap-3 pt-6 border-t border-gray-100">
                            <a href="{{ route('admin.ngo-notices.index') }}" 
                               class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2.5 px-6 rounded-lg transition duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-8 rounded-lg shadow-lg hover:shadow-blue-500/20 transition duration-200">
                                Update NGO Notice
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
