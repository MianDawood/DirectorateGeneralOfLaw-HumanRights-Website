@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Review Registration Application</h1>
                        <a href="{{ route('admin.registration-applications.index') }}"
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.registration-applications.update', $application) }}">
                        @csrf
                        @method('PUT')

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
                                    @foreach(['draft', 'submitted', 'under_review', 'approved', 'rejected'] as $status)
                                        <option value="{{ $status }}" {{ old('status', $application->status) === $status ? 'selected' : '' }}>
                                            {{ ucwords(str_replace('_', ' ', $status)) }}
                                        </option>
                                    @endforeach
                                </select>
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
