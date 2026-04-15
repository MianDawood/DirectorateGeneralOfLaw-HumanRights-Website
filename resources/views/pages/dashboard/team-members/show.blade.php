@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">View Team Member</h1>
                        <div>
                            <a href="{{ route('admin.team-members.edit', $member) }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Edit
                            </a>
                            <a href="{{ route('admin.team-members.index') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <div class="flex items-center gap-6 mb-6">
                                @if($member->image_path)
                                    <img src="{{ asset($member->image_path) }}" alt="{{ $member->name }}"
                                         class="w-24 h-24 rounded-full object-cover border-4 border-gray-300 shadow-lg">
                                @else
                                    <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                                        N/A
                                    </div>
                                @endif
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900">{{ $member->name }}</h2>
                                    <p class="text-sm font-medium text-blue-600 uppercase tracking-wider">{{ $member->position }}</p>
                                    <div class="mt-2">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ strtolower($member->status) === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ ucfirst($member->status) }}
                                        </span>
                                        <span class="ml-2 text-sm text-gray-500">Order: {{ $member->order }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-sm text-gray-700 space-y-2">
                                <div><span class="font-semibold">Email:</span> {{ $member->email ?? '—' }}</div>
                                <div><span class="font-semibold">Phone:</span> {{ $member->phone ?? '—' }}</div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Social Links</h3>
                            <dl class="space-y-2 text-sm text-gray-700">
                                <div><span class="font-semibold">Facebook:</span> {{ $member->facebook_url ?? '—' }}</div>
                                <div><span class="font-semibold">Twitter:</span> {{ $member->twitter_url ?? '—' }}</div>
                                <div><span class="font-semibold">Instagram:</span> {{ $member->instagram_url ?? '—' }}</div>
                            </dl>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Metadata</h3>
                        <dl class="space-y-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                <dd class="text-sm text-gray-900">{{ $member->created_at->format('M d, Y H:i') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                                <dd class="text-sm text-gray-900">{{ $member->updated_at->format('M d, Y H:i') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
