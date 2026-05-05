@extends('layouts.app')

@section('content')
<div class="px-4 py-8 mx-auto max-w-5xl"
     x-data="activityManager({{ json_encode($activities) }})">

    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">What We Do Page</h1>
            <p class="mt-1 text-sm text-gray-500">Manage all sections and activity cards for the What We Do page.</p>
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

    <form method="POST" action="{{ route('admin.what-we-dos.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- Hidden fallback for deletions (used when not async) --}}
        <input type="hidden" name="deleted_activities_json" x-model="JSON.stringify(deletedActivities)">

        <template x-for="id in deletedActivities" :key="id">
            <input type="hidden" name="deleted_activities[]" :value="id">
        </template>

        <!-- ========== WHAT WE DO SECTIONS ========== -->
        <div class="space-y-6">
            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200 flex items-center gap-2">
                <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                Page Content Sections
            </h2>

            @foreach($whatWeDos as $index => $whatWeDo)
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800 overflow-hidden transition-all hover:shadow-md">
                    <div class="border-b border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 px-6 py-4 flex items-center justify-between">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Section #{{ $index + 1 }}</h3>
                        <label class="flex items-center gap-2 cursor-pointer group/check">
                            <input type="checkbox" name="what_we_dos[{{ $whatWeDo->id }}][is_active]" value="1" {{ $whatWeDo->is_active ? 'checked' : '' }} class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500 dark:bg-gray-900 dark:border-gray-700 transition">
                            <span class="text-xs font-semibold text-gray-500 dark:text-gray-400 group-hover/check:text-brand-600 transition">Active Status</span>
                        </label>
                    </div>

                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Heading</label>
                                <input type="text" name="what_we_dos[{{ $whatWeDo->id }}][heading]" value="{{ old('what_we_dos.' . $whatWeDo->id . '.heading', $whatWeDo->heading) }}" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Image</label>
                                <div class="flex items-start gap-4">
                                    <div class="flex-1">
                                        <input type="file" name="what_we_dos[{{ $whatWeDo->id }}][image]" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                                        <p class="mt-1 text-xs text-gray-400">Recommended: 800x600px, WebP or JPG.</p>
                                    </div>
                                    @if($whatWeDo->image)
                                        <div class="relative group">
                                            <img src="{{ asset($whatWeDo->image) }}" class="h-16 w-16 object-cover rounded-lg border border-gray-200 shadow-sm" alt="Preview">
                                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Short Description</label>
                                <textarea name="what_we_dos[{{ $whatWeDo->id }}][description]" rows="2" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white">{{ old('what_we_dos.' . $whatWeDo->id . '.description', $whatWeDo->description) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Extra Details / Footer Text</label>
                                <textarea name="what_we_dos[{{ $whatWeDo->id }}][extra_description]" rows="2" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white">{{ old('what_we_dos.' . $whatWeDo->id . '.extra_description', $whatWeDo->extra_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- ========== ACTIVITY CARDS MANAGEMENT (Async Deletion) ========== -->
        <div class="space-y-6">
            <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-800 pb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-brand-50 dark:bg-brand-900/20 rounded-lg">
                        <svg class="w-6 h-6 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Activity Highlights</h2>
                        <p class="text-sm text-gray-500">Add or remove core activities and services.</p>
                    </div>
                </div>
                <button type="button" @click="addActivity" class="inline-flex items-center px-4 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-brand-500/20 hover:-translate-y-0.5 active:translate-y-0">
                    <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add Activity
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <template x-for="(activity, index) in activities" :key="activity.local_id || activity.id">
                    <div class="group relative bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 transition-all hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-xl hover:shadow-gray-200/50 dark:hover:shadow-none">
                        
                        <!-- Header: Title and Controls -->
                        <div class="flex items-start justify-between gap-4 mb-5">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-[10px] font-bold text-brand-600 dark:text-brand-400 uppercase tracking-widest" x-text="'Activity Card #' + (index + 1)"></span>
                                    <template x-if="!activity.id">
                                        <span class="px-1.5 py-0.5 bg-green-100 text-green-700 text-[9px] font-bold rounded uppercase">New</span>
                                    </template>
                                </div>
                                <input type="text" :name="'activities[' + (activity.id || 'new_' + index) + '][title]'" x-model="activity.title" placeholder="Enter activity title..." class="w-full text-lg font-bold bg-transparent border-none p-0 focus:ring-0 placeholder-gray-300 dark:text-white dark:placeholder-gray-600">
                            </div>
                            
                            <div class="flex items-center gap-3 pt-1">
                                <label class="flex items-center gap-2 cursor-pointer group/check">
                                    <input type="checkbox" :name="'activities[' + (activity.id || 'new_' + index) + '][is_active]'" :checked="activity.is_active" class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500 dark:bg-gray-900 dark:border-gray-700 transition">
                                    <span class="text-xs font-semibold text-gray-500 dark:text-gray-400 group-hover/check:text-brand-600 transition">Active</span>
                                </label>
                                
                                <div class="w-px h-6 bg-gray-200 dark:bg-gray-700 mx-1"></div>
                                
                                <button type="button" @click="removeActivity(index, $event)" class="inline-flex items-center justify-center w-9 h-9 text-gray-400 hover:text-white bg-transparent hover:bg-red-500 dark:hover:bg-red-600 border border-gray-100 dark:border-gray-700 hover:border-red-500 dark:hover:border-red-600 rounded-xl transition-all duration-200" title="Delete Activity">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Body: Description -->
                        <div class="space-y-4">
                            <input type="hidden" :name="'activities[' + (activity.id || 'new_' + index) + '][order]'" :value="index">
                            
                            <div class="relative">
                                <label class="block text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-2">Description</label>
                                <textarea :name="'activities[' + (activity.id || 'new_' + index) + '][description]'" x-model="activity.description" rows="3" placeholder="Describe this activity..." class="w-full rounded-xl border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 p-4 text-sm focus:bg-white dark:focus:bg-gray-900 focus:border-brand-500 focus:ring-4 focus:ring-brand-500/5 transition-all dark:text-gray-300"></textarea>
                            </div>
                        </div>

                    </div>
                </template>

                <!-- Empty State -->
                <template x-if="activities.length === 0">
                    <div class="lg:col-span-2 py-16 bg-gray-50/50 dark:bg-gray-900/50 border-2 border-dashed border-gray-200 dark:border-gray-700 rounded-3xl flex flex-col items-center justify-center text-gray-400 transition-all hover:bg-gray-50 dark:hover:bg-gray-900">
                        <div class="p-4 bg-white dark:bg-gray-800 rounded-2xl shadow-sm mb-4">
                            <svg class="w-10 h-10 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        </div>
                        <h3 class="text-gray-900 dark:text-white font-bold mb-1">No activities listed</h3>
                        <p class="text-sm">Click "Add Activity" to start populating this section.</p>
                    </div>
                </template>
            </div>

            <!-- Bottom Add Button -->
            <div class="flex justify-center pt-4">
                <button type="button" @click="addActivity" class="inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800 text-brand-600 dark:text-brand-400 text-sm font-bold rounded-xl border-2 border-dashed border-brand-200 dark:border-brand-900/50 hover:border-brand-500 dark:hover:border-brand-500 hover:bg-brand-50 dark:hover:bg-brand-900/10 transition-all group">
                    <svg class="w-5 h-5 mr-2 transition-transform group-hover:scale-125" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Click to add another activity card
                </button>
            </div>
        </div>

        <!-- Sticky Footer -->
        <div class="sticky bottom-6 flex items-center justify-end">
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-md p-2 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 flex items-center gap-3">
                <a href="{{ route('admin.what-we-dos.edit') }}" class="px-6 py-3 text-sm font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white transition">Reset Changes</a>
                <button type="submit" class="inline-flex items-center px-8 py-3 bg-brand-500 hover:bg-brand-600 text-white text-sm font-bold rounded-xl shadow-xl shadow-brand-500/20 transition-all hover:-translate-y-0.5 active:translate-y-0">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Update What We Do Page
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function activityManager(initialActivities) {
        return {
            activities: initialActivities || [],
            deletedActivities: [], // used for fallback when saving the main form

            addActivity() {
                this.activities.push({
                    local_id: Date.now(),
                    title: '',
                    description: '',
                    is_active: true,
                    order: this.activities.length
                });
            },

            async removeActivity(index, $event) {
                const activity = this.activities[index];

                // For existing database records: call async delete endpoint
                if (activity.id) {
                    if (!confirm('Are you sure you want to permanently delete this activity?')) {
                        return;
                    }

                    // Show loading state on the delete button
                    const deleteButton = $event?.target?.closest('button');
                    const originalHtml = deleteButton?.innerHTML;
                    if (deleteButton) deleteButton.innerHTML = '⏳';

                    try {
                        const response = await fetch(`/dashboard/what-we-dos/activity/${activity.id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                        });

                        if (response.ok) {
                            // Remove from local array (card disappears instantly)
                            this.activities.splice(index, 1);
                            // Also add to deletedActivities so that if the main form is saved later,
                            // it won't try to recreate it (just in case)
                            this.deletedActivities.push(activity.id);
                        } else {
                            alert('Failed to delete activity. Please try again.');
                        }
                    } catch (error) {
                        console.error(error);
                        alert('An error occurred while deleting.');
                    } finally {
                        if (deleteButton) deleteButton.innerHTML = originalHtml;
                    }
                } else {
                    // For unsaved (new) cards: simply remove from the UI
                    if (!activity.title || confirm('Remove this unsaved card?')) {
                        this.activities.splice(index, 1);
                    }
                }
            }
        }
    }
</script>
@endpush
@endsection