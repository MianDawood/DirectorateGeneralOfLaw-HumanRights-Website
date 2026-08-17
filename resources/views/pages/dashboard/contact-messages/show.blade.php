@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">View Contact Message</h1>
                        <div>
                            <a href="{{ route('admin.contact-messages.edit', $message) }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Edit
                            </a>
                            <a href="{{ route('admin.contact-messages.index') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $message->full_name }}</h2>
                            <p class="text-sm text-gray-600 mb-4">{{ $message->message }}</p>
                            <div class="space-y-2 text-sm text-gray-700">
                                <div><span class="font-semibold">Email:</span> {{ $message->email }}</div>
                                <div><span class="font-semibold">Phone:</span> {{ $message->phone ?? '—' }}</div>
                                <div><span class="font-semibold">Subject:</span> {{ $message->subject }}</div>
                                <div>
                                    <span class="font-semibold">Status:</span>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ strtolower($message->status) === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ ucfirst($message->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Metadata</h3>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                    <dd class="text-sm text-gray-900">{{ $message->created_at->format('M d, Y H:i') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                    <dd class="text-sm text-gray-900">{{ $message->updated_at->format('M d, Y H:i') }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
