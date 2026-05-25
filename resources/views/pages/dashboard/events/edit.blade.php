@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Edit Event</h1>
                        <a href="{{ route('admin.events.index') }}"
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.events.update', $event) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('pages.dashboard.events._form', ['event' => $event])
                        <div class="mt-8 flex justify-end gap-3">
                            <a href="{{ route('events.show', $event) }}" target="_blank"
                               class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded">
                                Preview Public Page
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                                Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
