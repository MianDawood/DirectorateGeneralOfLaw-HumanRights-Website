@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Edit Page: {{ $page->title }}</h1>
                        <div class="space-x-2">
                            <a href="{{ route('admin.pages.show', $page) }}"
                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                View Page
                            </a>
                            <a href="{{ route('admin.pages.index') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.pages.update', $page) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700">Page Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       required>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            
                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status"
                                        class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                    <option value="draft" {{ old('status', $page->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status', $page->status) === 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="archived" {{ old('status', $page->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Order -->
                            <div>
                                <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
                                <input type="number" name="order" id="order" value="{{ old('order', $page->order) }}" min="0"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <p class="mt-1 text-sm text-gray-500">Lower numbers appear first in navigation</p>
                                @error('order')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            
                            <!-- Show in Navigation -->
                            <div class="md:col-span-2 flex items-center">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="show_in_navigation" value="1" {{ old('show_in_navigation', $page->show_in_navigation) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Show in Navigation Menu</span>
                                </label>
                            </div>
                        </div>

                        <!-- SEO Meta Title -->
                        <div class="mt-6">
                            <label for="meta_title" class="block text-sm font-medium text-gray-700">SEO Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $page->meta_title) }}"
                                   class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Leave empty to use page title">
                            <p class="mt-1 text-sm text-gray-500">Recommended: 50-60 characters for optimal SEO</p>
                            @error('meta_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SEO Meta Description -->
                        <div class="mt-6">
                            <label for="meta_description" class="block text-sm font-medium text-gray-700">SEO Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                      class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Leave empty to auto-generate from content">{{ old('meta_description', $page->meta_description) }}</textarea>
                            <p class="mt-1 text-sm text-gray-500">Recommended: 150-160 characters for optimal SEO</p>
                            @error('meta_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SEO Meta Keywords -->
                        <div class="mt-6">
                            <label for="meta_keywords" class="block text-sm font-medium text-gray-700">SEO Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $page->meta_keywords) }}"
                                   class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="keyword1, keyword2, keyword3">
                            <p class="mt-1 text-sm text-gray-500">Comma-separated keywords</p>
                            @error('meta_keywords')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mt-6">
                            <label for="content" class="block text-sm font-medium text-gray-700">Page Content</label>
                            <div id="editor-container" class="mt-1">
                                <textarea name="content" id="content" rows="15"
                                          class="hidden">{{ old('content', $page->content) }}</textarea>
                                <div id="content-editor" class="min-h-[400px] border border-gray-300 rounded-md shadow-sm"></div>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Rich text editor for page content. Supports formatting, links, and media.</p>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- CKEditor 5 Classic CDN (no API key required) -->
                        @push('scripts')
                            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
                            <script>
                                class PageImageUploadAdapter {
                                    constructor(loader) {
                                        this.loader = loader;
                                    }

                                    upload() {
                                        return this.loader.file.then(file => {
                                            const data = new FormData();
                                            data.append('upload', file);

                                            return fetch('{{ route("admin.pages.upload-image") }}', {
                                                method: 'POST',
                                                headers: {
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                },
                                                body: data
                                            })
                                            .then(response => response.json())
                                            .then(result => {
                                                if (!result || !result.url) {
                                                    throw new Error('Invalid upload response');
                                                }

                                                return {
                                                    default: result.url
                                                };
                                            });
                                        });
                                    }

                                    abort() {}
                                }

                                ClassicEditor
                                    .create(document.querySelector('#content'), {
                                        toolbar: {
                                            items: [
                                                'heading', '|',
                                                'bold', 'italic', '|',
                                                'bulletedList', 'numberedList', '|',
                                                'link', 'imageUpload', '|',
                                                'undo', 'redo'
                                            ]
                                        },
                                    })
                                    .then(editor => {
                                        editor.plugins.get('FileRepository').createUploadAdapter = loader => {
                                            return new PageImageUploadAdapter(loader);
                                        };

                                        // Set initial content if editing
                                        <?php if(isset($page)): ?>
                                            editor.setData(@json($page->content));
                                        <?php endif; ?>
                                    })
                                    .catch(error => {
                                        console.error('CKEditor initialization failed:', error);
                                    });
                            </script>
                        @endpush

                        <div class="mt-6 flex justify-between">
                            <div class="space-x-2">
                                <form method="POST" action="{{ route('admin.pages.duplicate', $page) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                                        Duplicate Page
                                    </button>
                                </form>
                            </div>
                            <div class="space-x-3">
                                <a href="{{ route('admin.pages.index') }}"
                                   class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Cancel
                                </a>
                                <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Update Page
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
