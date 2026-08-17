@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit NGO Notice Section</h1>
                    <form method="POST" action="{{ route('admin.ngo-notices-pages.update', $ngoNoticesPage) }}">
                        @csrf @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div><label class="block text-sm font-medium text-gray-700 mb-2">Section Key</label>
                                <select name="section_key" class="w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="hero" {{ $ngoNoticesPage->section_key == 'hero' ? 'selected' : '' }}>Hero Section</option>
                                    <option value="notices" {{ $ngoNoticesPage->section_key == 'notices' ? 'selected' : '' }}>Notices List</option>
                                </select>
                            </div>
                            <div><label class="block text-sm font-medium text-gray-700 mb-2">Order</label><input type="number" name="order" value="{{ $ngoNoticesPage->order }}" class="w-full border-gray-300 rounded-md shadow-sm"></div>
                            <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-2">Title</label><input type="text" name="title" value="{{ $ngoNoticesPage->title }}" class="w-full border-gray-300 rounded-md shadow-sm"></div>
                            <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-2">Content</label><textarea name="content" rows="5" class="w-full border-gray-300 rounded-md shadow-sm">{{ $ngoNoticesPage->content }}</textarea></div>
                            <div><label class="block text-sm font-medium text-gray-700 mb-2">Image Path</label><input type="text" name="image" value="{{ $ngoNoticesPage->image }}" class="w-full border-gray-300 rounded-md shadow-sm"></div>
                            <div><label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label><input type="text" name="button_text" value="{{ $ngoNoticesPage->button_text }}" class="w-full border-gray-300 rounded-md shadow-sm"></div>
                            <div><label class="block text-sm font-medium text-gray-700 mb-2">Button Link</label><input type="text" name="button_link" value="{{ $ngoNoticesPage->button_link }}" class="w-full border-gray-300 rounded-md shadow-sm"></div>
                            <div><label class="block text-sm font-medium text-gray-700 mb-2">Status</label><div class="flex items-center mt-4"><input type="checkbox" name="is_active" id="is_active" value="1" {{ $ngoNoticesPage->is_active ? 'checked' : '' }} class="w-4 h-4"><label for="is_active" class="ml-2 text-sm text-gray-700">Active</label></div></div>
                        </div>
                        <div class="flex justify-end mt-6 gap-4">
                            <a href="{{ route('admin.ngo-notices-pages.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
                            <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-bold py-2 px-4 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection