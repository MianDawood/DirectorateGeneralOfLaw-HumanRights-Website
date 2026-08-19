@php
    $ngos = $ngos ?? collect();
    $type = $type ?? 'registered';
    $districts = $districts ?? [];
    $thematicAreas = $thematicAreas ?? [];
    $pageTitle = $pageTitle ?? 'NGOs';
    $pageDescription = $pageDescription ?? '';
    $statusBadge = $statusBadge ?? null;

    $date = function ($value) {
        return $value ? \Carbon\Carbon::parse($value)->format('Y-m-d') : '—';
    };
@endphp

@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">{{ $pageTitle }}</h1>
                            <p class="mt-1 text-sm text-gray-600">{{ $pageDescription }}</p>
                        </div>
                        <span class="inline-flex items-center rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-700">
                            Total: {{ $ngos->total() }}
                        </span>
                    </div>

                    @if(session('success'))
                        <div class="border border-green-400 bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ url()->current() }}" class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">District</label>
                            <select name="district"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All Districts</option>
                                @foreach($districts as $d)
                                    <option value="{{ $d }}" @selected(request('district') === $d)>{{ $d }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Thematic Area</label>
                            <select name="thematic_area"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">All Thematic Areas</option>
                                @foreach($thematicAreas as $label)
                                    <option value="{{ $label }}" @selected(request('thematic_area') === $label)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date From</label>
                            <input type="date" name="date_from" value="{{ request('date_from') }}"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date To</label>
                            <input type="date" name="date_to" value="{{ request('date_to') }}"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="md:col-span-4 flex gap-2 flex-wrap">
                            <button type="submit"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Apply Filters</button>
                            <a href="{{ url()->current() }}"
                               class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded text-sm">Reset</a>
                            <span class="flex-1"></span>
                            @if(isset($exportRoute) && $exportRoute)
                                @php $query = request()->only(['district', 'thematic_area', 'date_from', 'date_to']); @endphp
                                <a href="{{ route($exportRoute, array_merge(['format' => 'pdf'], $query)) }}"
                                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-3 rounded text-sm">Export PDF</a>
                                <a href="{{ route($exportRoute, array_merge(['format' => 'xlsx'], $query)) }}"
                                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-3 rounded text-sm">Export Excel</a>
                            @endif
                        </div>
                    </form>

                    @if($customFilters ?? null)
                        {{ $customFilters }}
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    @foreach($columns as $column)
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $column }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($ngos as $ngo)
                                    <tr>
                                        @foreach($rows[$loop->index] as $cell)
                                            {!! $cell !!}
                                        @endforeach
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ count($columns) }}" class="px-6 py-4 text-center text-gray-500">
                                            No {{ strtolower($pageTitle) }} found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($ngos->hasPages())
                        <div class="mt-6">
                            {{ $ngos->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
