@extends('layouts.app')

@section('content')
<div class="px-4 py-8 mx-auto max-w-5xl" 
     x-data="headManager({{ json_encode($heads) }})">
    
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Introduction Page</h1>
            <p class="mt-1 text-sm text-gray-500">Manage the introduction content and key departmental heads.</p>
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

    <form method="POST" action="{{ route('admin.introductions.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Deleted Heads Hidden Inputs -->
        <template x-for="id in deletedHeads" :key="'deleted_'+id">
            <input type="hidden" name="deleted_heads[]" :value="id">
        </template>

        <!-- ========== INTRODUCTION SECTIONS ========== -->
        <div class="space-y-6">
            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200 flex items-center gap-2">
                <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                Page Content Sections
            </h2>
            
            @foreach($introductions as $index => $intro)
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800 overflow-hidden transition-all hover:shadow-md">
                    <div class="border-b border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 px-6 py-4 flex items-center justify-between">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Section #{{ $index + 1 }}</h3>
                        <label class="flex items-center gap-2 cursor-pointer group/check">
                            <input type="checkbox" name="introductions[{{ $intro->id }}][is_active]" value="1" {{ $intro->is_active ? 'checked' : '' }} class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500 dark:bg-gray-900 dark:border-gray-700 transition">
                            <span class="text-xs font-semibold text-gray-500 dark:text-gray-400 group-hover/check:text-brand-600 transition">Active Status</span>
                        </label>
                    </div>
                    
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
                                <input type="text" name="introductions[{{ $intro->id }}][title]" value="{{ old('introductions.' . $intro->id . '.title', $intro->title) }}" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Image</label>
                                <div class="flex items-start gap-4">
                                    <div class="flex-1">
                                        <input type="file" name="introductions[{{ $intro->id }}][image]" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                                    </div>
                                    @if($intro->image)
                                        <div class="relative group">
                                            <img src="{{ asset($intro->image) }}" class="h-16 w-16 object-cover rounded-lg border border-gray-200 shadow-sm" alt="Preview">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                            <textarea name="introductions[{{ $intro->id }}][description]" rows="5" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white">{{ old('introductions.' . $intro->id . '.description', $intro->description) }}</textarea>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- ========== HEADS MANAGEMENT ========== -->
        <div class="space-y-6">
            <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-800 pb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-brand-50 dark:bg-brand-900/20 rounded-lg">
                        <svg class="w-6 h-6 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Departmental Heads</h2>
                        <p class="text-sm text-gray-500">Manage names, roles, and messages of key leaders.</p>
                    </div>
                </div>
                <button type="button" @click="addHead" class="inline-flex items-center px-4 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-brand-500/20 hover:-translate-y-0.5 active:translate-y-0">
                    <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add Head
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <template x-for="(head, index) in heads" :key="head.local_id || head.id">
                    <div class="group relative bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 transition-all hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-xl">
                        
                        <!-- Header -->
                        <div class="flex items-start justify-between gap-4 mb-5">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-[10px] font-bold text-brand-600 dark:text-brand-400 uppercase tracking-widest" x-text="'Leader Card #' + (index + 1)"></span>
                                    <template x-if="!head.id">
                                        <span class="px-1.5 py-0.5 bg-green-100 text-green-700 text-[9px] font-bold rounded uppercase">New</span>
                                    </template>
                                </div>
                                <input type="text" :name="'heads[' + (head.id || 'new_' + index) + '][name]'" x-model="head.name" placeholder="Full Name" class="w-full text-lg font-bold bg-transparent border-none p-0 focus:ring-0 placeholder-gray-300 dark:text-white">
                            </div>
                            
                            <div class="flex items-center gap-3 pt-1">
                                <label class="flex items-center gap-2 cursor-pointer group/check">
                                    <input type="checkbox" :name="'heads[' + (head.id || 'new_' + index) + '][is_active]'" :checked="head.is_active" class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                                    <span class="text-xs font-semibold text-gray-500 dark:text-gray-400 group-hover/check:text-brand-600">Active</span>
                                </label>
                                <div class="w-px h-6 bg-gray-200 dark:bg-gray-700"></div>
                                <button type="button" @click="removeHead(index, $event)" class="inline-flex items-center justify-center w-9 h-9 text-gray-400 hover:text-white hover:bg-red-500 rounded-xl border border-gray-100 dark:border-gray-700 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="space-y-4">
                            <input type="hidden" :name="'heads[' + (head.id || 'new_' + index) + '][order]'" :value="index">
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Role / Designation</label>
                                    <input type="text" :name="'heads[' + (head.id || 'new_' + index) + '][role]'" x-model="head.role" class="w-full rounded-xl border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 p-3 text-sm focus:bg-white dark:text-white">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Profile URL</label>
                                    <input type="text" :name="'heads[' + (head.id || 'new_' + index) + '][profile_url]'" x-model="head.profile_url" class="w-full rounded-xl border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 p-3 text-sm focus:bg-white dark:text-white">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Image</label>
                                <div class="flex items-center gap-4">
                                    <input type="file" :name="'heads[' + (head.id || 'new_' + index) + '][image]'" accept="image/*" class="flex-1 text-xs file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700">
                                    <template x-if="head.image">
                                        <img :src="'/' + head.image" class="w-10 h-10 object-cover rounded-lg border">
                                    </template>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-2">Message</label>
                                <textarea :name="'heads[' + (head.id || 'new_' + index) + '][message]'" x-model="head.message" rows="3" class="w-full rounded-xl border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 p-4 text-sm focus:bg-white dark:text-white"></textarea>
                            </div>
                        </div>

                    </div>
                </template>
            </div>
            
            <div class="flex justify-center pt-4">
                <button type="button" @click="addHead" class="inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800 text-brand-600 dark:text-brand-400 text-sm font-bold rounded-xl border-2 border-dashed border-brand-200 dark:border-brand-900/50 hover:border-brand-500 hover:bg-brand-50 transition-all group">
                    <svg class="w-5 h-5 mr-2 transition-transform group-hover:scale-125" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add another leader card
                </button>
            </div>
        </div>

        <!-- Sticky Footer -->
        <div class="sticky bottom-6 flex items-center justify-end">
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-md p-2 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 flex items-center gap-3">
                <a href="{{ route('admin.introductions.edit') }}" class="px-6 py-3 text-sm font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 transition">Reset Changes</a>
                <button type="submit" class="inline-flex items-center px-8 py-3 bg-brand-500 hover:bg-brand-600 text-white text-sm font-bold rounded-xl shadow-xl transition-all hover:-translate-y-0.5 active:translate-y-0">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Update Introduction Page
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function headManager(initialHeads) {
        return {
            heads: initialHeads || [],
            deletedHeads: [],

            addHead() {
                this.heads.push({
                    local_id: Date.now(),
                    name: '',
                    role: '',
                    message: '',
                    profile_url: '',
                    is_active: true,
                    order: this.heads.length
                });
            },

            async removeHead(index, $event) {
                const head = this.heads[index];

                if (head.id) {
                    if (!confirm('Are you sure you want to permanently delete this leader?')) {
                        return;
                    }

                    const deleteButton = $event?.target?.closest('button');
                    if (deleteButton) deleteButton.innerHTML = '⏳';

                    try {
                        const response = await fetch(`/dashboard/introductions/head/${head.id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                        });

                        if (response.ok) {
                            this.heads.splice(index, 1);
                        } else {
                            alert('Failed to delete leader. Please try again.');
                        }
                    } catch (error) {
                        console.error(error);
                        alert('An error occurred while deleting.');
                    } finally {
                        if (deleteButton) deleteButton.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>';
                    }
                } else {
                    if (!head.name || confirm('Remove this unsaved card?')) {
                        this.heads.splice(index, 1);
                    }
                }
            }
        }
    }
</script>
@endpush
@endsection