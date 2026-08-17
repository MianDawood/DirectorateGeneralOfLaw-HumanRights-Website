@extends('layouts.app')

@section('content')
<div class="px-4 py-8 mx-auto max-w-4xl">
    
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b border-gray-200 pb-6">
        <div>
            <h1 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tight">Manage NGO Directives</h1>
            <p class="mt-1 text-sm text-gray-500">Update the regulatory headings and penalty card contents.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300 shadow-sm flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <form id="directives-form" method="POST" action="{{ route('admin.ngo-directives.update') }}" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Main Heading Section -->
        <div class="space-y-4">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] px-2">1. Primary Header</h2>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm">
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Section Heading</label>
                    <input type="text" name="heading" value="{{ old('heading', $directive->heading) }}" placeholder="e.g. Mandatory Registration Under" 
                           class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 p-4 text-sm font-bold text-gray-900 dark:text-white focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all outline-none">
                </div>
            </div>
        </div>

        <!-- Directive Content Section -->
        <div class="space-y-4">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] px-2">2. Directive Description</h2>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm">
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Main Legal Description</label>
                    <textarea name="desc_2" rows="4" placeholder="Detailed legal directive text..."
                              class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 p-4 text-sm text-gray-600 dark:text-gray-300 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all outline-none">{{ old('desc_2', $directive->desc_2) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Penalty Cards Section -->
        <div class="space-y-4">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] px-2">3. Compliance Cards</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Card 1 -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm space-y-4">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-2 h-2 rounded-full bg-red-500"></div>
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Card 1: Late Penalties</span>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1.5">Card Title</label>
                        <input type="text" name="card_1_title" value="{{ old('card_1_title', $directive->card_1_title) }}" 
                               class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 p-3 text-sm font-bold text-gray-900 dark:text-white focus:border-brand-500 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1.5">Card Description</label>
                        <textarea name="card_1_desc" rows="5" placeholder="Use [brackets] for red text..."
                                  class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 p-3 text-sm text-gray-600 dark:text-gray-300 focus:border-brand-500 outline-none transition-all">{{ old('card_1_desc', $directive->card_1_desc) }}</textarea>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm space-y-4">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-2 h-2 rounded-full bg-slate-900 dark:bg-white"></div>
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Card 2: Closure Policy</span>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1.5">Card Title</label>
                        <input type="text" name="card_2_title" value="{{ old('card_2_title', $directive->card_2_title) }}" 
                               class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 p-3 text-sm font-bold text-gray-900 dark:text-white focus:border-brand-500 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1.5">Card Description</label>
                        <textarea name="card_2_desc" rows="5" placeholder="Use [brackets] for red text..."
                                  class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 p-3 text-sm text-gray-600 dark:text-gray-300 focus:border-brand-500 outline-none transition-all">{{ old('card_2_desc', $directive->card_2_desc) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <div class="pt-6 border-t border-gray-200 flex justify-end">
            <button type="submit" class="flex items-center gap-3 px-12 py-4 bg-slate-900 hover:bg-black text-white font-black uppercase tracking-widest text-xs rounded-2xl shadow-xl transition-all hover:-translate-y-1 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Save All Changes
            </button>
        </div>
    </form>
</div>
@endsection