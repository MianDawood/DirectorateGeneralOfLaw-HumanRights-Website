@extends('layouts.app')

@php
    $formatLabel = function ($key) {
        $key = preg_replace('/\[\d+\]/', '', (string) $key);
        $key = preg_replace('/\[\]$/', '', $key);
        return ucwords(str_replace(['_', '-'], ' ', $key));
    };

    $formatValue = function ($value) use (&$formatValue, $formatLabel) {
        if (is_bool($value)) {
            return $value ? 'Yes' : 'No';
        }

        if ($value === null || $value === '') {
            return '—';
        }

        if (is_array($value)) {
            if (array_is_list($value)) {
                $items = array_map(function ($item) use (&$formatValue) {
                    return is_scalar($item) ? (string) $item : $formatValue($item);
                }, $value);

                return implode(', ', $items);
            }

            $items = [];
            foreach ($value as $nestedKey => $nestedValue) {
                $items[] = $formatLabel($nestedKey) . ': ' . $formatValue($nestedValue);
            }

            return implode(' | ', $items);
        }

        return (string) $value;
    };

    $specialSections = [
        'security_companies' => 'Security Companies',
        'ongoing_projects' => 'Ongoing Projects',
        'planned_projects' => 'Planned Projects',
    ];
@endphp

@section('content')
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-white to-slate-50">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Registration Application Details</h1>
                            <p class="mt-1 text-sm text-gray-500">Compact review view for submitted registration steps.</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('admin.registration-applications.edit', $application) }}"
                               class="inline-flex items-center rounded-lg bg-yellow-500 px-4 py-2 text-sm font-semibold text-white hover:bg-yellow-600">
                                Review
                            </a>
                            <a href="{{ route('admin.registration-applications.index') }}"
                               class="inline-flex items-center rounded-lg bg-gray-600 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-5 border-b border-gray-100 bg-slate-50/70">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                        <div class="rounded-xl bg-white p-4 border border-slate-100">
                            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Application No</div>
                            <div class="mt-1 text-sm font-semibold text-gray-900">{{ $application->application_no }}</div>
                        </div>
                        <div class="rounded-xl bg-white p-4 border border-slate-100">
                            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Status</div>
                            <div class="mt-1 text-sm font-semibold text-gray-900">{{ ucfirst($application->status) }}</div>
                        </div>
                        <div class="rounded-xl bg-white p-4 border border-slate-100">
                            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Submitted At</div>
                            <div class="mt-1 text-sm font-semibold text-gray-900">
                                {{ optional($application->submitted_at)->format('M d, Y h:i A') ?? 'Not submitted' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 lg:p-8 space-y-4">
                    @forelse($stepPayloads as $stepPayload)
                        @php
                            $payload = $stepPayload->payload ?: [];
                            $remainingFields = array_diff_key($payload, array_fill_keys(array_keys($specialSections), true));
                        @endphp

                        <details class="group rounded-2xl border border-slate-200 bg-white shadow-sm open:shadow-md">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-900 text-sm font-bold text-white">
                                        {{ $stepPayload->step_no }}
                                    </span>
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-900">Step {{ $stepPayload->step_no }} Details</h3>
                                        <p class="text-xs text-gray-500">Click to expand the section</p>
                                    </div>
                                </div>
                                <span class="step-toggle-text text-xs font-semibold uppercase tracking-wider text-slate-400 group-open:text-slate-700">
                                    View
                                </span>
                            </summary>

                            <div class="border-t border-slate-100 px-5 py-5">
                                @if(!empty($payload))
                                    <div class="space-y-5">
                                        @foreach($specialSections as $sectionKey => $sectionTitle)
                                            @if(!empty($payload[$sectionKey]) && is_array($payload[$sectionKey]))
                                                @php
                                                    $entries = array_is_list($payload[$sectionKey]) ? $payload[$sectionKey] : [$payload[$sectionKey]];
                                                @endphp

                                                <div>
                                                    <div class="mb-3 flex items-center justify-between">
                                                        <h4 class="text-sm font-bold uppercase tracking-wider text-gray-800">
                                                            {{ $sectionTitle }}
                                                        </h4>
                                                        <span class="text-xs text-gray-500">{{ count($entries) }} item(s)</span>
                                                    </div>

                                                    <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">
                                                        @foreach($entries as $index => $entry)
                                                            <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                                                                <div class="mb-3 flex items-center justify-between">
                                                                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">
                                                                        Item {{ $index + 1 }}
                                                                    </span>
                                                                </div>

                                                                @if(is_array($entry))
                                                                    <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                                                                        @foreach($entry as $key => $value)
                                                                            <div class="rounded-lg bg-white px-3 py-2 border border-slate-100">
                                                                                <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                                                                    {{ $formatLabel($key) }}
                                                                                </div>
                                                                                <div class="mt-1 text-sm text-gray-900">
                                                                                    {{ $formatValue($value) }}
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @else
                                                                    <div class="text-sm text-gray-900">{{ $formatValue($entry) }}</div>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        @if(!empty($remainingFields))
                                            <div>
                                                <div class="mb-3">
                                                    <h4 class="text-sm font-bold uppercase tracking-wider text-gray-800">Other Details</h4>
                                                </div>
                                                <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-3">
                                                    @foreach($remainingFields as $key => $value)
                                                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                                                            <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                                                {{ $formatLabel($key) }}
                                                            </div>
                                                            <div class="mt-1 text-sm text-gray-900 break-words">
                                                                {{ $formatValue($value) }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        @if(empty(array_filter($payload)))
                                            <div class="text-sm text-gray-500">No structured data available for this step.</div>
                                        @endif
                                    </div>
                                @else
                                    <div class="text-sm text-gray-500">No data available for this step.</div>
                                @endif
                            </div>
                        </details>
                    @empty
                        <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-8 text-center text-gray-500">
                            No step data found for this application.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('details.group').forEach((details) => {
        const label = details.querySelector('.step-toggle-text');
        if (!label) return;

        const sync = () => {
            label.textContent = details.open ? 'Hide' : 'View';
        };

        sync();
        details.addEventListener('toggle', sync);
    });
</script>
@endpush
