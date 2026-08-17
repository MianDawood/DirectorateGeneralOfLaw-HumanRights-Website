@extends('layouts.app')

@php
    $formatLabel = function ($key) {
        $key = (string) $key;
        $key = preg_replace('/^part_\d+_/', '', $key);
        $key = preg_replace('/_(\d+)$/', '', $key);
        $key = preg_replace('/\[\d+\]/', '', $key);
        $key = preg_replace('/\[\]$/', '', $key);
        $key = preg_replace('/(?<=[a-z0-9])(?=[A-Z])/', ' ', $key);
        return ucwords(str_replace(['_', '-'], ' ', $key));
    };

    $isObjectList = function ($value) {
        return is_array($value) && array_is_list($value) && count($value) > 0 && is_array($value[0]);
    };

    $isScalarList = function ($value) {
        return is_array($value) && array_is_list($value) && count($value) > 0 && !is_array($value[0]);
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

    $stepTitles = [
        1 => 'PART-1: GENERAL INFORMATION',
        2 => 'PART-2: ADDRESS INFORMATION',
        3 => 'PART-3: OBJECTIVES & STRATEGY',
        4 => 'PART-4: MANAGEMENT & FOCAL PERSON',
        5 => 'PART-5: PERSONNEL & FINANCIAL DETAILS',
        6 => 'PART-6: PROJECT IMPLEMENTATION',
        7 => 'PART-7: PLANNED PROJECTS / PROGRAMMES',
        8 => 'PART-8: FINANCIAL & BANKING INFORMATION',
        9 => 'PART-9: EXPANDED FINANCIAL & AUDIT INFORMATION',
        10 => 'PART-10: ASSETS DISCLOSURE',
        11 => 'PART-11: SECURITY AGREEMENT & ARRANGEMENTS',
    ];

    $ngoName = optional($application->profile)->organization_name;
    if (empty($ngoName)) {
        foreach ($stepPayloads as $stepPayload) {
            if ($stepPayload->step_no === 1 && !empty($stepPayload->payload['ngoName'])) {
                $ngoName = $stepPayload->payload['ngoName'];
                break;
            }
        }
    }
@endphp

@section('content')
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden dark:bg-gray-800">
                <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-white to-slate-50 dark:border-gray-700 dark:from-gray-800 dark:to-gray-800">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Registration Application Details</h1>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Compact review view for submitted registration steps.</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @if($application->status === 'approved' && $application->certificate_path)
                                <a href="{{ asset('storage/' . $application->certificate_path) }}" target="_blank"
                                   class="inline-flex items-center rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-700">
                                    <i data-lucide="download" class="w-4 h-4 mr-2"></i> Certificate
                                </a>
                            @endif
                            <a href="{{ route('admin.registration-applications.edit', $application) . ($returnTo ? '?return_to=' . urlencode($returnTo) : '') }}"
                               class="inline-flex items-center rounded-lg bg-yellow-500 px-4 py-2 text-sm font-semibold text-white hover:bg-yellow-600">
                                Review
                            </a>
                            <a href="{{ $returnTo ?? route('admin.registration-applications.index') }}"
                               class="inline-flex items-center rounded-lg bg-gray-600 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-5 border-b border-gray-100 bg-slate-50/70 dark:border-gray-700 dark:bg-gray-800/70">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div class="rounded-xl bg-white p-4 border border-slate-100 dark:bg-gray-800 dark:border-gray-700">
                            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">NGO Name</div>
                            <div class="mt-1 text-sm font-semibold text-gray-900 break-words dark:text-white">{{ $ngoName ?: '—' }}</div>
                        </div>
                        <div class="rounded-xl bg-white p-4 border border-slate-100 dark:bg-gray-800 dark:border-gray-700">
                            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">Application No</div>
                            <div class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">{{ ($application->application_no) }}</div>
                        </div>
                        <div class="rounded-xl bg-white p-4 border border-slate-100 dark:bg-gray-800 dark:border-gray-700">
                            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">Status</div>
                            <div class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">{{ ucfirst($application->status) }}</div>
                        </div>
                        <div class="rounded-xl bg-white p-4 border border-slate-100 dark:bg-gray-800 dark:border-gray-700">
                            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">Submitted At</div>
                            <div class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">
                                {{ optional($application->submitted_at)->format('M d, Y h:i A') ?? 'Not submitted' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 lg:p-8 space-y-4">
                    @forelse($stepPayloads as $stepPayload)
                        @php
                            $payload = $stepPayload->payload ?: [];
                            $payload = array_diff_key($payload, ['application_id' => true]);

                            $commaListKeys = ['operationalArea'];

                            foreach ($commaListKeys as $ck) {
                                if (isset($payload[$ck]) && is_string($payload[$ck]) && str_contains($payload[$ck], ',')) {
                                    $payload[$ck] = array_map('trim', explode(',', $payload[$ck]));
                                }
                            }

                            $fileKeys = ['sealSignature', 'auditReport'];
                            $fileFields = [];
                            foreach ($fileKeys as $fileKey) {
                                if (array_key_exists($fileKey, $payload)) {
                                    $fileFields[$fileKey] = $payload[$fileKey];
                                    unset($payload[$fileKey]);
                                }
                            }

                            $objectListFields = array_filter($payload, $isObjectList);
                            $scalarListFields = array_filter($payload, $isScalarList);
                            $plainFields = array_diff_key($payload, $objectListFields, $scalarListFields);
                        @endphp

                        <details open class="group rounded-2xl border border-slate-200 bg-white shadow-sm open:shadow-md dark:border-gray-700 dark:bg-gray-800">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-900 text-sm font-bold text-white dark:bg-gray-700">
                                        {{ $stepPayload->step_no }}
                                    </span>
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-900 dark:text-white">{{ $stepTitles[$stepPayload->step_no] ?? ('Step ' . $stepPayload->step_no . ' Details') }}</h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Click to collapse or expand the section</p>
                                    </div>
                                </div>
                                <span class="step-toggle-text text-xs font-semibold uppercase tracking-wider text-slate-400 group-open:text-slate-700 dark:text-gray-400 dark:group-open:text-gray-200">
                                    View
                                </span>
                            </summary>

                            <div class="border-t border-slate-100 px-5 py-5 dark:border-gray-700">
                                @if(!empty($payload))
                                    <div class="space-y-5">
                                        @foreach($objectListFields as $sectionKey => $entries)
                                            <div>
                                                <div class="mb-3 flex items-center justify-between">
                                                    <h4 class="text-sm font-bold uppercase tracking-wider text-gray-800 dark:text-gray-200">
                                                        {{ $formatLabel($sectionKey) }}
                                                    </h4>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ count($entries) }} item(s)</span>
                                                </div>

                                                <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">
                                                    @foreach($entries as $index => $entry)
                                                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 dark:border-gray-700 dark:bg-gray-700/30">
                                                            <div class="mb-3 flex items-center justify-between">
                                                                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">
                                                                    Item {{ $index + 1 }}
                                                                </span>
                                                            </div>

                                                            @if(is_array($entry))
                                                                <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                                                                    @foreach($entry as $key => $value)
                                                                        <div class="rounded-lg bg-white px-3 py-2 border border-slate-100 dark:bg-gray-800 dark:border-gray-700">
                                                                            <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">
                                                                                {{ $formatLabel($key) }}
                                                                            </div>
                                                                            <div class="mt-1 text-sm text-gray-900 break-words dark:text-gray-100">
                                                                                {{ $formatValue($value) }}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <div class="text-sm text-gray-900 dark:text-gray-100">{{ $formatValue($entry) }}</div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach

                                        @if(!empty($scalarListFields))
                                            <div>
                                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                                                    @foreach($scalarListFields as $key => $values)
                                                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 dark:border-gray-700 dark:bg-gray-700/30">
                                                            <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2 dark:text-gray-400">
                                                                {{ $formatLabel($key) }}
                                                            </div>
                                                            <div class="space-y-2">
                                                                @foreach($values as $item)
                                                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 border border-blue-100 px-3 py-1 text-xs font-semibold text-blue-800 dark:bg-blue-500/20 dark:border-blue-500/30 dark:text-blue-300">
                                                                        <span class="text-blue-500 dark:text-blue-400">✓</span>
                                                                        {{ $formatValue($item) }}
                                                                    </span>
                                                                    <span class="block"></span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        @if(!empty($plainFields))
                                            <div>
                                                <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-3">
                                                    @foreach($plainFields as $key => $value)
                                                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 dark:border-gray-700 dark:bg-gray-700/30">
                                                            <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">
                                                                {{ $formatLabel($key) }}
                                                            </div>
                                                            <div class="mt-1 text-sm text-gray-900 break-words dark:text-gray-100">
                                                                {{ $formatValue($value) }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        @if(!empty($fileFields))
                                            <div>
                                                <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-3">
                                                    @foreach($fileFields as $fileKey => $fileValue)
                                                        @php $filePaths = is_array($fileValue) ? $fileValue : [$fileValue]; @endphp
                                                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 dark:border-gray-700 dark:bg-gray-700/30">
                                                            <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">
                                                                {{ $formatLabel($fileKey) }}
                                                            </div>
                                                            <div class="mt-2 space-y-2">
                                                                @foreach($filePaths as $path)
                                                                    @if(is_string($path) && $path)
                                                                        @php
                                                                            $fileUrl = \Illuminate\Support\Facades\Storage::url($path);
                                                                            $fileName = basename($path);
                                                                            $isImage = in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                                        @endphp
                                                                        @if($isImage)
                                                                            <a href="{{ $fileUrl }}" target="_blank" class="block">
                                                                                <img src="{{ $fileUrl }}" alt="{{ $fileName }}" class="max-h-40 w-full rounded-lg object-cover border border-slate-200 dark:border-gray-600">
                                                                            </a>
                                                                        @endif
                                                                        <a href="{{ $fileUrl }}" target="_blank" class="inline-flex items-center gap-1.5 rounded-lg bg-blue-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-blue-700">
                                                                            <i data-lucide="download" class="w-3 h-3"></i> {{ $fileName }}
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        @if(empty($objectListFields) && empty($scalarListFields) && empty($plainFields) && empty($fileFields))
                                            <div class="text-sm text-gray-500 dark:text-gray-400">No structured data available for this step.</div>
                                        @endif
                                    </div>
                                @else
                                    <div class="text-sm text-gray-500 dark:text-gray-400">No data available for this step.</div>
                                @endif
                            </div>
                        </details>
                    @empty
                        <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-8 text-center text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
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
