@php
    $sectionImageUrl = static function ($path) {
        if (!$path) {
            return null;
        }

        return str_starts_with($path, 'uploads/') || str_starts_with($path, 'images/')
            ? asset($path)
            : asset('storage/' . $path);
    };

    $sectionLabels = [
        'vision' => 'Vision',
        'mission' => 'Mission',
        'core_values' => 'Core Values',
    ];
@endphp

@extends('layouts.app')

@section('content')
<div class="px-4 py-8 mx-auto max-w-5xl">

    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Vision &amp; Mission Page</h1>
            <p class="mt-1 text-sm text-gray-500">Manage the Vision, Mission and Core Values content shown on the public Vision &amp; Mission page.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300 shadow-sm"
             x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    {{ session('success') }}
                </div>
                <button @click="show = false" class="text-green-500 hover:text-green-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.vision-missions.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            @foreach(['vision', 'mission', 'core_values'] as $sectionKey)
                @php
                    $section = $sections[$sectionKey] ?? null;
                @endphp
                @if($section)
                    <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800 overflow-hidden transition-all hover:shadow-md">
                        <div class="border-b border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 px-6 py-4 flex items-center justify-between">
                            <h3 class="font-semibold text-gray-900 dark:text-white">{{ $sectionLabels[$sectionKey] ?? ucwords(str_replace('_', ' ', $sectionKey)) }}</h3>
                            <label class="flex items-center gap-2 cursor-pointer group/check">
                                <input type="checkbox" name="sections[{{ $section->id }}][is_active]" value="1" {{ $section->is_active ? 'checked' : '' }} class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500 dark:bg-gray-900 dark:border-gray-700 transition">
                                <span class="text-xs font-semibold text-gray-500 dark:text-gray-400 group-hover/check:text-brand-600 transition">Active Status</span>
                            </label>
                        </div>

                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
                                    <input type="text" name="sections[{{ $section->id }}][title]" value="{{ old('sections.' . $section->id . '.title', $section->title) }}" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                </div>

                                {{-- <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Image</label>
                                    <div class="flex items-start gap-4">
                                        <div class="flex-1">
                                            <input type="file" name="sections[{{ $section->id }}][image]" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                                        </div>
                                        @if($section->image)
                                            <div class="relative group">
                                                <img src="{{ $sectionImageUrl($section->image) }}" class="h-16 w-16 object-cover rounded-lg border border-gray-200 shadow-sm" alt="Preview">
                                            </div>
                                        @endif
                                    </div>
                                </div> --}}
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                                <textarea name="sections[{{ $section->id }}][description]" rows="5" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white">{{ old('sections.' . $section->id . '.description', $section->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="flex items-center justify-end">
                <button type="submit" class="inline-flex items-center px-8 py-3 bg-brand-500 hover:bg-brand-600 text-white text-sm font-bold rounded-xl ">
                    Update Vision &amp; Mission Page
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
