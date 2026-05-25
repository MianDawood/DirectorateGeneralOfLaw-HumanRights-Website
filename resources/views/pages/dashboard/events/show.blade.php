@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">{{ $event->title }}</h1>
                        <div class="flex gap-2">
                            <a href="{{ route('events.show', $event) }}" target="_blank"
                               class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded text-sm">Public View</a>
                            <a href="{{ route('admin.events.edit', $event) }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">Edit</a>
                            <a href="{{ route('admin.events.index') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm">Back</a>
                        </div>
                    </div>

                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm mb-8">
                        <div><dt class="font-semibold text-gray-500">Date</dt><dd>{{ $event->event_date?->format('d M Y, h:i A') }}</dd></div>
                        <div><dt class="font-semibold text-gray-500">Venue</dt><dd>{{ $event->location }}</dd></div>
                        @if($event->subject)
                            <div class="md:col-span-2"><dt class="font-semibold text-gray-500">Subject</dt><dd>{{ $event->subject }}</dd></div>
                        @endif
                        <div class="md:col-span-2"><dt class="font-semibold text-gray-500">Description</dt><dd class="whitespace-pre-wrap">{{ $event->description }}</dd></div>
                    </dl>

                    <h3 class="font-bold text-gray-900 mb-3">Images ({{ $event->images->count() }})</h3>
                    @if($event->images->isNotEmpty())
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
                            @foreach($event->images as $image)
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="" class="rounded-lg h-32 w-full object-cover">
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 mb-8">No images uploaded.</p>
                    @endif

                    <h3 class="font-bold text-gray-900 mb-3">Videos ({{ $event->videos->count() }})</h3>
                    @if($event->videos->isNotEmpty())
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($event->videos as $video)
                                <div>
                                    <x-ui.youtube-embed :videoId="$video->youtube_video_id" :title="$event->title" />
                                    <p class="text-xs text-gray-500 mt-1 truncate">{{ $video->youtube_url }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No YouTube videos linked.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
