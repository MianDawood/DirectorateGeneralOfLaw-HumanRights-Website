@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">View Tender</h1>
                        <div>
                            <a href="{{ route('admin.tenders.edit', $tender) }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Edit
                            </a>
                            <a href="{{ route('admin.tenders.index') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $tender->title }}</h2>
                            <p class="text-sm text-gray-600 mb-4">{{ $tender->description }}</p>
                            <div class="space-y-2 text-sm text-gray-700">
                                <div>
                                    <span class="font-semibold">Reference No.:</span> {{ $tender->reference_no }}
                                </div>
                                <div>
                                    <span class="font-semibold">Publish Date:</span> {{ optional($tender->publish_date)->format('M d, Y') ?? '—' }}
                                </div>
                                <div>
                                    <span class="font-semibold">Closing Date:</span> {{ optional($tender->closing_date)->format('M d, Y') ?? '—' }}
                                </div>
                                <div>
                                    <span class="font-semibold">Status:</span>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ strtolower($tender->status) === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst($tender->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">File</h3>
                            @if($tender->file_path)
                                <a href="{{ route('tenders.download', $tender->id) }}"
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500 text-white text-sm font-semibold rounded hover:bg-blue-600">
                                    Download File
                                </a>
                                <p class="mt-2 text-xs text-gray-500 break-all">{{ $tender->file_path }}</p>
                            @else
                                <p class="text-sm text-gray-500">No file uploaded.</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Metadata</h3>
                        <dl class="space-y-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                <dd class="text-sm text-gray-900">{{ $tender->created_at->format('M d, Y H:i') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                <dd class="text-sm text-gray-900">{{ $tender->updated_at->format('M d, Y H:i') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
