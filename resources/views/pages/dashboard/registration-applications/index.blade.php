@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Registration Applications</h1>
                            <p class="mt-1 text-sm text-gray-600">Review pending NGO registration applications (submitted / under review / rejected).</p>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('admin.registration-applications.index') }}" class="mb-6 flex flex-wrap items-end gap-2">
                        <div>
                            <label for="search" class="block text-[10px] font-medium text-gray-500 uppercase tracking-wider mb-1">Search</label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                   placeholder="NGO / App No / Reg No"
                                   class="block w-40 px-2 py-1.5 text-sm border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="district" class="block text-[10px] font-medium text-gray-500 uppercase tracking-wider mb-1">District</label>
                            <select name="district" id="district"
                                    class="block w-32 px-2 py-1.5 text-sm border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All</option>
                                @foreach($districts as $d)
                                    <option value="{{ $d }}" @selected(request('district') === $d)>{{ $d }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="thematic_area" class="block text-[10px] font-medium text-gray-500 uppercase tracking-wider mb-1">Thematic Area</label>
                            <select name="thematic_area" id="thematic_area"
                                    class="block w-44 px-2 py-1.5 text-sm border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All</option>
                                @foreach($thematicAreas as $key => $label)
                                    <option value="{{ $label }}" @selected(request('thematic_area') === $label)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="date_from" class="block text-[10px] font-medium text-gray-500 uppercase tracking-wider mb-1">From</label>
                            <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}"
                                   class="block w-32 px-2 py-1.5 text-sm border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="date_to" class="block text-[10px] font-medium text-gray-500 uppercase tracking-wider mb-1">To</label>
                            <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}"
                                   class="block w-32 px-2 py-1.5 text-sm border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="flex gap-2">
                            <button type="submit"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-3 rounded text-sm">Apply</button>
                            <a href="{{ route('admin.registration-applications.index') }}"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-3 rounded text-sm">Reset</a>
                        </div>
                    </form>

                    @php
    $query = collect(request()->query())->filter(fn ($v) => filled($v))->all();
@endphp

                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm text-gray-500">Showing {{ $applications->total() }} record(s)</span>
                        <span class="flex gap-2">
                            <a href="{{ route('admin.registration-applications.export', array_merge(['format' => 'pdf'], $query)) }}"
                               class="inline-flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-3 rounded text-sm">Export PDF</a>
                            <a href="{{ route('admin.registration-applications.export', array_merge(['format' => 'xlsx'], $query)) }}"
                               class="inline-flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-3 rounded text-sm">Export Excel</a>
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Application No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NGO Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">District</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thematic Areas</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted At</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($applications as $application)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $application->application_no }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                            {{ $application->profile?->organization_name ?: 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $application->profile?->district ?: '—' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                            {{ $application->profile?->thematic_areas ?: '—' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusColors = [
                                                    'submitted' => 'bg-blue-100 text-blue-800',
                                                    'under_review' => 'bg-amber-100 text-amber-800',
                                                    'approved' => 'bg-green-100 text-green-800',
                                                    'rejected' => 'bg-red-100 text-red-800',
                                                    'suspended' => 'bg-purple-100 text-purple-800',
                                                ];
                                                $color = $statusColors[$application->status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $color }}">
                                                {{ ucwords(str_replace('_', ' ', $application->status)) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ optional($application->submitted_at)->format('M d, Y h:i A') ?? '—' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.registration-applications.show', $application) }}?return_to={{ urlencode(url()->full()) }}"
                                                   class="text-blue-600 hover:text-blue-900">View</a>
                                                <a href="{{ route('admin.registration-applications.edit', $application) }}?return_to={{ urlencode(url()->full()) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">Review</a>
                                                @if($application->status === 'approved' && $application->certificate_path)
                                                    <a href="{{ asset('storage/' . $application->certificate_path) }}" target="_blank"
                                                       class="text-green-600 hover:text-green-900">Download</a>
                                                @endif
                                                <form method="POST" action="{{ route('admin.registration-applications.destroy', $application) }}"
                                                      onsubmit="return confirm('Are you sure you want to delete this application?')"
                                                      class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                        No registration applications found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($applications->hasPages())
                        <div class="mt-6">
                            {{ $applications->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
