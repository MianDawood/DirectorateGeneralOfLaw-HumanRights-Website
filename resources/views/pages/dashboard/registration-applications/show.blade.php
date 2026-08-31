@extends('layouts.app')

@php
    use App\Support\RegistrationStepFields;

    $stepDefinitions = RegistrationStepFields::steps();

    $displayValue = function ($value) {
        if (is_bool($value)) {
            return $value ? 'Yes' : 'No';
        }
        if (is_array($value)) {
            return array_map(function ($item) {
                return is_scalar($item) ? (string) $item : '';
            }, array_values(array_filter($value, fn ($i) => $i !== null && $i !== '')));
        }
        return (string) $value;
    };

    $hasValue = function ($value) {
        if ($value === null || $value === '') return false;
        if (is_array($value)) {
            return collect($value)->filter(fn ($i) => $i !== null && $i !== '')->count() > 0;
        }
        return true;
    };

    $fileValues = function ($value) {
        if (is_array($value)) {
            return array_values(array_filter($value, fn ($i) => is_string($i) && $i !== ''));
        }
        return is_string($value) && $value !== '' ? [$value] : [];
    };

    $ngoName = optional($application->profile)->organization_name;
    if (empty($ngoName)) {
        foreach ($stepPayloads as $stepPayload) {
            if ($stepPayload->step_no === 1 && !empty($stepPayload->payload['ngo_name'])) {
                $ngoName = $stepPayload->payload['ngo_name'];
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
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Complete review of all submitted registration steps.</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @if($application->status === 'approved' && $application->certificate_path)
                                <a href="{{ asset('storage/' . $application->certificate_path) }}" target="_blank"
                                   class="inline-flex items-center rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-700">
                                    <i data-lucide="download" class="w-4 h-4 mr-2"></i> Certificate
                                </a>
                            @endif
                            <a href="{{ route('admin.registration-applications.certificate-preview', $application) }}" target="_blank"
                               class="inline-flex items-center rounded-lg bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
                                <i data-lucide="eye" class="w-4 h-4 mr-2"></i> Preview Certificate
                            </a>
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
                            <div class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">{{ $application->application_no }}</div>
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
                            $definition = $stepDefinitions[$stepPayload->step_no] ?? null;
                            $payload = $stepPayload->payload ?: [];
                        @endphp

                        @if(!$definition)
                            <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-6 text-sm text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
                                No structured data available for Step {{ $stepPayload->step_no }}.
                            </div>
                            @continue
                        @endif

                        <details open class="group rounded-2xl border border-slate-200 bg-white shadow-sm open:shadow-md dark:border-gray-700 dark:bg-gray-800">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-900 text-sm font-bold text-white dark:bg-gray-700">
                                        {{ $stepPayload->step_no }}
                                    </span>
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-900 dark:text-white">{{ $definition['title'] }}</h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Click to collapse or expand the section</p>
                                    </div>
                                </div>
                                <span class="step-toggle-text text-xs font-semibold uppercase tracking-wider text-slate-400 group-open:text-slate-700 dark:text-gray-400 dark:group-open:text-gray-200">
                                    View
                                </span>
                            </summary>

                            <div class="border-t border-slate-100 px-5 py-5 dark:border-gray-700">
                                @php
                                    $shownAny = false;
                                @endphp

                                <div class="space-y-8">
                                    @foreach($definition['sections'] as $section)
                                        @php
                                            $presentFields = array_filter(
                                                $section['fields'],
                                                fn ($key) => $hasValue($payload[$key] ?? null),
                                                ARRAY_FILTER_USE_KEY
                                            );
                                        @endphp
                                        @if(count($presentFields) === 0)
                                            @continue
                                        @endif
                                        @php $shownAny = true; @endphp
                                        <div>
                                            <h4 class="mb-3 text-sm font-bold uppercase tracking-wider text-gray-800 dark:text-gray-200">{{ $section['title'] }}</h4>
                                            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-3">
                                                @foreach($presentFields as $fieldKey => $fieldLabel)
                                                    @php
                                                        $value = $payload[$fieldKey];
                                                    @endphp
                                                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 dark:border-gray-700 dark:bg-gray-700/30">
                                                        <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">{{ $fieldLabel }}</div>
                                                        <div class="mt-1">
                                                            @if(is_array($value))
                                                                <div class="flex flex-wrap gap-1.5">
                                                                    @foreach($displayValue($value) as $item)
                                                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 border border-blue-100 px-3 py-1 text-xs font-semibold text-blue-800 dark:bg-blue-500/20 dark:border-blue-500/30 dark:text-blue-300">
                                                                            <span class="text-blue-500 dark:text-blue-400">✓</span>
                                                                            {{ $item }}
                                                                        </span>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <div class="text-sm text-gray-900 break-words dark:text-gray-100">{{ $displayValue($value) }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach

                                    @foreach($definition['files'] as $fileKey => $fileLabel)
                                        @php
                                            $paths = $fileValues($payload[$fileKey] ?? null);
                                        @endphp
                                        @if(count($paths) === 0)
                                            @continue
                                        @endif
                                        @php $shownAny = true; @endphp
                                        <div>
                                            <h4 class="mb-3 text-sm font-bold uppercase tracking-wider text-gray-800 dark:text-gray-200">{{ $fileLabel }}</h4>
                                            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-3">
                                                @foreach($paths as $path)
                                                    @php
                                                        $fileUrl = \Illuminate\Support\Facades\Storage::url($path);
                                                        $fileName = basename($path);
                                                        $isImage = in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                                    @endphp
                                                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 dark:border-gray-700 dark:bg-gray-700/30">
                                                        @if($isImage)
                                                            <a href="{{ $fileUrl }}" target="_blank" class="block mb-2">
                                                                <img src="{{ $fileUrl }}" alt="{{ $fileName }}" class="max-h-40 w-full rounded-lg object-cover border border-slate-200 dark:border-gray-600">
                                                            </a>
                                                        @endif
                                                        <a href="{{ $fileUrl }}" target="_blank" class="inline-flex items-center gap-1.5 rounded-lg bg-blue-600 px-3 py-1.5 text-xs font-semibold text-white hover:bg-blue-700">
                                                            <i data-lucide="download" class="w-3 h-3"></i> {{ $fileName }}
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach

                                    @foreach($definition['repeat'] as $groupKey => $groupDef)
                                        @php
                                            $rows = [];
                                            if (isset($groupDef['prefix'])) {
                                                for ($i = 1; $i <= $groupDef['count']; $i++) {
                                                    $row = [];
                                                    foreach (array_keys($groupDef['columns']) as $col) {
                                                        $row[$col] = $payload[$groupDef['prefix'] . $i . '_' . $col] ?? null;
                                                    }
                                                    $rows[] = $row;
                                                }
                                                $rows = array_values(array_filter($rows, fn ($r) => collect($r)->filter(fn ($v) => $v !== null && $v !== '')->count() > 0));
                                            } else {
                                                $raw = $payload[$groupKey] ?? null;
                                                if (is_array($raw)) {
                                                    $rows = array_values(array_filter($raw, fn ($r) => is_array($r)));
                                                }
                                            }
                                        @endphp
                                        @if(count($rows) === 0)
                                            @continue
                                        @endif
                                        @php $shownAny = true; @endphp
                                        <div>
                                            <div class="mb-3 flex items-center justify-between">
                                                <h4 class="text-sm font-bold uppercase tracking-wider text-gray-800 dark:text-gray-200">{{ $groupDef['label'] }}</h4>
                                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ count($rows) }} item(s)</span>
                                            </div>
                                            <div class="overflow-x-auto rounded-xl border border-slate-200 dark:border-gray-700">
                                                <table class="min-w-full divide-y divide-slate-200 text-sm dark:divide-gray-700">
                                                    <thead class="bg-slate-50 dark:bg-gray-800">
                                                        <tr>
                                                            <th class="px-3 py-2.5 text-left text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">S.No</th>
                                                            @foreach($groupDef['columns'] as $colKey => $colLabel)
                                                                <th class="px-3 py-2.5 text-left text-[10px] font-bold uppercase tracking-wider text-slate-400 dark:text-gray-400">{{ $colLabel }}</th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-slate-100 bg-white dark:divide-gray-800 dark:bg-gray-800">
                                                        @foreach($rows as $index => $row)
                                                            <tr>
                                                                <td class="px-3 py-2.5 text-xs font-bold text-slate-400 dark:text-gray-400">{{ $index + 1 }}</td>
                                                                @foreach($groupDef['columns'] as $colKey => $colLabel)
                                                                    @php
                                                                        $cell = $row[$colKey] ?? null;
                                                                    @endphp
                                                                    <td class="px-3 py-2.5 text-sm text-gray-900 break-words dark:text-gray-100">
                                                                        {{ $hasValue($cell) ? $displayValue($cell) : '—' }}
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                @if(!$shownAny)
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