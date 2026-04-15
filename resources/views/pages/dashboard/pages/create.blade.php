@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Add New Page</h1>
                    <a href="{{ route('admin.pages.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
                </div>

                <form method="POST" action="{{ route('admin.pages.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- title -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Page Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm" required>
                            @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        
                        <!-- status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>

                        <!-- order -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Display Order</label>
                            <input type="number" name="order" value="{{ old('order', 0) }}" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">
                        </div>

                        <!-- navigation -->
                        <div class="md:col-span-2 flex items-center">
                            <input type="checkbox" name="show_in_navigation" value="1" {{ old('show_in_navigation', true) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Show in Navigation Menu</span>
                        </div>
                    </div>

                    <!-- SEO fields -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">SEO Meta Title</label>
                        <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">
                    </div>
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">SEO Meta Description</label>
                        <textarea name="meta_description" rows="3" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">{{ old('meta_description') }}</textarea>
                    </div>
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">SEO Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm">
                    </div>

                    <!-- Rich Text Editor -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">Page Content</label>
                        <textarea id="content" name="content" rows="15" class="mt-1 block w-full">{{ old('content') }}</textarea>
                        @error('content')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('admin.pages.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold px-4 py-2 rounded">Cancel</a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Create Page</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

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

    ClassicEditor.create(document.querySelector('#content'), {
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
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endpush
