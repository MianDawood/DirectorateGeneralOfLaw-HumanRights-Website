@extends('layouts.app')

@section('content')
<div class="px-4 py-8 mx-auto max-w-5xl" 
     x-data="docManager({{ json_encode($documents) }})">
    
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">NGO Required Documents</h1>
            <p class="mt-1 text-sm text-gray-500">Manage the list of official documents available for download on the NGO Registration page.</p>
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

    <form method="POST" action="{{ route('admin.ngo-required-documents.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Deleted Documents Hidden Inputs -->
        <template x-for="id in deletedDocuments" :key="'deleted_'+id">
            <input type="hidden" name="deleted_documents[]" :value="id">
        </template>

        <!-- ========== DOCUMENTS LIST ========== -->
        <div class="space-y-6">
            <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-800 pb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-brand-50 dark:bg-brand-900/20 rounded-lg">
                        <svg class="w-6 h-6 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Documents List</h2>
                        <p class="text-sm text-gray-500">Add, rename, or replace downloadable files.</p>
                    </div>
                </div>
                <button type="button" @click="addDoc" class="inline-flex items-center px-4 py-2.5 bg-brand-600 hover:bg-brand-700 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-brand-500/20 hover:-translate-y-0.5 active:translate-y-0">
                    <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add Document
                </button>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <template x-for="(doc, index) in documents" :key="doc.local_id || doc.id">
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-5 transition-all hover:border-brand-300 dark:hover:border-brand-700 hover:shadow-xl">
                        
                        <div class="flex flex-col md:flex-row items-center gap-6">
                            <!-- Drag/Index Handle -->
                            <div class="flex items-center gap-4">
                                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-50 dark:bg-gray-900 text-gray-400 text-xs font-bold" x-text="index + 1"></span>
                                <div class="w-12 h-12 rounded-xl bg-slate-50 dark:bg-slate-900 flex items-center justify-center text-slate-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </div>
                            </div>

                            <!-- Inputs -->
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">Document Name</label>
                                    <input type="text" :name="'documents[' + (doc.id || 'new_' + index) + '][name]'" x-model="doc.name" placeholder="e.g. NGO Registration Form" class="w-full rounded-xl border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 p-3 text-sm focus:bg-white dark:text-white transition-all">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">Upload New File</label>
                                    <div class="flex items-center gap-3">
                                        <input type="file" :name="'documents[' + (doc.id || 'new_' + index) + '][file]'" class="flex-1 text-xs file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700">
                                        <template x-if="doc.file_path">
                                            <a :href="'/' + doc.file_path" target="_blank" class="p-2 bg-gray-50 dark:bg-gray-900 rounded-lg text-brand-600 hover:text-brand-700" title="View current file">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 00-2 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <div class="flex items-center gap-4 pt-4 md:pt-0">
                                <input type="hidden" :name="'documents[' + (doc.id || 'new_' + index) + '][order]'" :value="index">
                                
                                <label class="flex items-center gap-2 cursor-pointer group/check">
                                    <input type="checkbox" :name="'documents[' + (doc.id || 'new_' + index) + '][is_active]'" :checked="doc.is_active" class="w-5 h-5 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                                    <span class="text-xs font-semibold text-gray-500 dark:text-gray-400 group-hover/check:text-brand-600">Active</span>
                                </label>
                                
                                <div class="w-px h-6 bg-gray-200 dark:bg-gray-700 hidden md:block"></div>
                                
                                <button type="button" @click="removeDoc(index, $event)" class="inline-flex items-center justify-center w-9 h-9 text-gray-400 hover:text-white hover:bg-red-500 rounded-xl border border-gray-100 dark:border-gray-700 transition-all shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </div>

                    </div>
                </template>
            </div>
            
            <div class="flex justify-center pt-4">
                <button type="button" @click="addDoc" class="inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800 text-brand-600 dark:text-brand-400 text-sm font-bold rounded-xl border-2 border-dashed border-brand-200 dark:border-brand-900/50 hover:border-brand-500 hover:bg-brand-50 transition-all group">
                    <svg class="w-5 h-5 mr-2 transition-transform group-hover:scale-125" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add another document
                </button>
            </div>
        </div>

        <!-- Sticky Footer -->
        <div class="sticky bottom-6 flex items-center justify-end">
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-md p-2 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 flex items-center gap-3">
                <a href="{{ route('admin.ngo-required-documents.edit') }}" class="px-6 py-3 text-sm font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 transition">Reset</a>
                <button type="submit" class="inline-flex items-center px-8 py-3 bg-brand-500 hover:bg-brand-600 text-white text-sm font-bold rounded-xl shadow-xl transition-all hover:-translate-y-0.5 active:translate-y-0">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002 2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Save All Documents
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function docManager(initialDocs) {
        return {
            documents: initialDocs || [],
            deletedDocuments: [],

            addDoc() {
                this.documents.push({
                    local_id: Date.now(),
                    name: '',
                    file_path: null,
                    is_active: true,
                    order: this.documents.length
                });
            },

            async removeDoc(index, $event) {
                const doc = this.documents[index];

                if (doc.id) {
                    if (!confirm('Are you sure you want to permanently delete this document and its file?')) {
                        return;
                    }

                    const deleteButton = $event?.target?.closest('button');
                    if (deleteButton) deleteButton.innerHTML = '⏳';

                    try {
                        const response = await fetch(`/dashboard/ngo-required-documents/${doc.id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                            },
                        });

                        if (response.ok) {
                            this.documents.splice(index, 1);
                        } else {
                            alert('Failed to delete document. Please try again.');
                        }
                    } catch (error) {
                        console.error(error);
                        alert('An error occurred while deleting.');
                    } finally {
                        if (deleteButton) deleteButton.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>';
                    }
                } else {
                    this.documents.splice(index, 1);
                }
            }
        }
    }
</script>
@endpush
@endsection