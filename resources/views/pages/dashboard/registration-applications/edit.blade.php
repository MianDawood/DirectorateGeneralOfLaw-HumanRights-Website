@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Review Registration Application</h1>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.registration-applications.certificate-preview', $application) }}" target="_blank"
                               class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Preview Certificate
                            </a>
                            <a href="{{ $returnTo ?? route('admin.registration-applications.index') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.registration-applications.update', $application) }}">
                        @csrf
                        @method('PUT')
                        @if($returnTo)
                            <input type="hidden" name="return_to" value="{{ $returnTo }}">
                        @endif

                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Application No</label>
                                <input type="text" value="{{ $application->application_no }}" readonly
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md bg-gray-100">
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select id="status" name="status"
                                        class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md"
                                        required>
                                    @foreach(['submitted', 'under_review', 'approved', 'rejected', 'suspended'] as $status)
                                        <option value="{{ $status }}" {{ old('status', $application->status) === $status ? 'selected' : '' }}>
                                            {{ ucwords(str_replace('_', ' ', $status)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="suspension-fields" @if(old('status', $application->status) !== 'suspended') style="display: none;" @endif>
                                <div>
                                    <label for="suspended_at" class="block text-sm font-medium text-gray-700">Suspension Date</label>
                                    <input type="date" id="suspended_at" name="suspended_at"
                                           value="{{ old('suspended_at', $application->suspended_at?->format('Y-m-d')) }}"
                                           class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md">
                                </div>

                                <div class="mt-4">
                                    <label for="suspension_reason" class="block text-sm font-medium text-gray-700">Suspension Reason</label>
                                    <textarea id="suspension_reason" name="suspension_reason" rows="4"
                                              class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md">{{ old('suspension_reason', $application->suspension_reason) }}</textarea>
                                </div>
                            </div>

                            <div>
                                <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                                <input type="text" id="district" name="district"
                                       value="{{ old('district', $application->profile?->district) }}"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label for="thematic_areas" class="block text-sm font-medium text-gray-700">Thematic Areas</label>
                                <input type="text" id="thematic_areas" name="thematic_areas"
                                       value="{{ old('thematic_areas', $application->profile?->thematic_areas) }}"
                                       placeholder="Comma-separated values"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label for="expiry_date" class="block text-sm font-medium text-gray-700">Expiry Date</label>
                                <input type="date" id="expiry_date" name="expiry_date"
                                       value="{{ old('expiry_date', $application->expiry_date?->format('Y-m-d')) }}"
                                       class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label for="review_notes" class="block text-sm font-medium text-gray-700">Review Notes</label>
                                <textarea id="review_notes" name="review_notes" rows="6"
                                          class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md">{{ old('review_notes', $application->review_notes) }}</textarea>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Application
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const statusSelect = document.getElementById('status');
    const suspensionFields = document.getElementById('suspension-fields');

    const toggleSuspension = () => {
        if (statusSelect.value === 'suspended') {
            suspensionFields.style.display = 'block';
        } else {
            suspensionFields.style.display = 'none';
        }
    };

    statusSelect.addEventListener('change', toggleSuspension);
    toggleSuspension();
</script>
@endpush
