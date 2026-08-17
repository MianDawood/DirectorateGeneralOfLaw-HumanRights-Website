@extends('layouts.app')

@section('content')
<div class="px-4 py-8 mx-auto max-w-5xl" 
     x-data="guidelineManager({{ json_encode($guidelines) }})">
    
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Registration Guidelines</h1>
            <p class="mt-1 text-sm text-gray-500">Manage the step-by-step registration process shown on the public NGO Guidelines page.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300 shadow-sm"
             x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    {{ session('success') }}
                </div>
                <button @click="show = false" class="text-green-500 hover:text-green-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.ngo-guidelines.update') }}" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- ========== GUIDELINES LIST ========== -->
        <div class="space-y-6">
            <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-800 pb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-brand-50 dark:bg-brand-900/20 rounded-lg">
                        <svg class="w-6 h-6 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Registration Steps</h2>
                        <p class="text-sm text-gray-500">Define the chronological steps for NGO registration.</p>
                    </div>
                </div>
                <button type="button" @click="addStep" class="inline-flex items-center px-4 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-brand-500/20 hover:-translate-y-0.5 active:translate-y-0">
                    <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add Step
                </button>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <template x-for="(step, index) in guidelines" :key="step.local_id || step.id">
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 transition-all hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-xl">
                        
                        <div class="flex items-start gap-6">
                            <!-- Step Number Icon -->
                            <div class="flex flex-col items-center gap-2">
                                <div class="w-12 h-12 rounded-2xl bg-brand-600 text-white flex items-center justify-center font-outfit font-black text-xl shadow-lg shadow-brand-500/30" x-text="index + 1"></div>
                                <div class="w-px h-full bg-gray-100 dark:bg-gray-700 min-h-[40px]"></div>
                            </div>

                            <!-- Inputs -->
                            <div class="flex-1 space-y-4">
                                <div class="flex items-center justify-between">
                                    <input type="text" :name="'guidelines[' + (step.id || 'new_' + index) + '][title]'" x-model="step.title" placeholder="Step Title (e.g. Obtain Registration Form)" class="flex-1 bg-transparent border-none p-0 text-lg font-bold text-gray-900 dark:text-white placeholder:text-gray-300 focus:ring-0">
                                    
                                    <div class="flex items-center gap-3">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="checkbox" :name="'guidelines[' + (step.id || 'new_' + index) + '][is_active]'" :checked="step.is_active" class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                                            <span class="text-xs font-semibold text-gray-400">Active</span>
                                        </label>
                                        <button type="button" @click="removeStep(index, $event)" class="text-gray-300 hover:text-red-500 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </div>

                                <textarea :name="'guidelines[' + (step.id || 'new_' + index) + '][description]'" x-model="step.description" rows="3" placeholder="Describe the requirements for this step..." class="w-full rounded-xl border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 p-4 text-sm text-gray-600 dark:text-gray-300 focus:bg-white transition-all"></textarea>
                                
                                <input type="hidden" :name="'guidelines[' + (step.id || 'new_' + index) + '][order]'" :value="index">
                            </div>
                        </div>

                    </div>
                </template>
            </div>
            
            <div class="flex justify-center pt-4">
                <button type="button" @click="addStep" class="inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800 text-brand-600 dark:text-brand-400 text-sm font-bold rounded-xl border-2 border-dashed border-brand-200 dark:border-brand-900/50 hover:border-brand-500 hover:bg-brand-50 transition-all group">
                    <svg class="w-5 h-5 mr-2 transition-transform group-hover:scale-125" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add another step
                </button>
            </div>
        </div>

        <!-- Sticky Footer -->
        <div class="sticky bottom-6 flex items-center justify-end">
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-md p-2 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 flex items-center gap-3">
                <a href="{{ route('admin.ngo-guidelines.edit') }}" class="px-6 py-3 text-sm font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 transition">Reset</a>
                <button type="submit" class="inline-flex items-center px-8 py-3 bg-brand-500 hover:bg-brand-600 text-white text-sm font-bold rounded-xl shadow-xl transition-all hover:-translate-y-0.5 active:translate-y-0">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002 2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Save Registration Process
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function guidelineManager(initialSteps) {
        return {
            guidelines: initialSteps || [],

            addStep() {
                this.guidelines.push({
                    local_id: Date.now(),
                    title: '',
                    description: '',
                    is_active: true,
                    order: this.guidelines.length
                });
            },

            async removeStep(index, $event) {
                const step = this.guidelines[index];

                if (step.id) {
                    if (!confirm('Are you sure you want to permanently delete this step?')) {
                        return;
                    }

                    const deleteButton = $event?.target?.closest('button');
                    if (deleteButton) deleteButton.innerHTML = '⏳';

                    try {
                        const response = await fetch(`/dashboard/ngo-guidelines/${step.id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                        });

                        if (response.ok) {
                            this.guidelines.splice(index, 1);
                        } else {
                            alert('Failed to delete step. Please try again.');
                        }
                    } catch (error) {
                        console.error(error);
                        alert('An error occurred while deleting.');
                    } finally {
                        if (deleteButton) deleteButton.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>';
                    }
                } else {
                    this.guidelines.splice(index, 1);
                }
            }
        }
    }
</script>
@endpush
@endsection