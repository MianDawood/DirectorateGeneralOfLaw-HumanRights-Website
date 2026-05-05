@extends('layouts.app')

@section('content')
<div class="px-4 py-8 mx-auto max-w-4xl">
    
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b border-gray-200 pb-6">
        <div>
            <h1 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tight">Site Settings</h1>
            <p class="mt-1 text-sm text-gray-500">Manage social media links and general site information.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300 shadow-sm flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.site-settings.update') }}" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Social Media Section -->
        <div class="space-y-4">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] px-2">1. Social Media Links</h2>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Facebook URL</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="facebook" class="w-4 h-4 text-blue-600"></i>
                            </div>
                            <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings->facebook_url) }}" placeholder="https://facebook.com/..." 
                                   class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none">
                        </div>
                        @error('facebook_url') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Twitter / X URL</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="twitter" class="w-4 h-4 text-sky-500"></i>
                            </div>
                            <input type="url" name="twitter_url" value="{{ old('twitter_url', $settings->twitter_url) }}" placeholder="https://twitter.com/..." 
                                   class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all outline-none">
                        </div>
                        @error('twitter_url') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Instagram URL</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="instagram" class="w-4 h-4 text-pink-600"></i>
                            </div>
                            <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings->instagram_url) }}" placeholder="https://instagram.com/..." 
                                   class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all outline-none">
                        </div>
                        @error('instagram_url') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">YouTube URL</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="youtube" class="w-4 h-4 text-red-600"></i>
                            </div>
                            <input type="url" name="youtube_url" value="{{ old('youtube_url', $settings->youtube_url) }}" placeholder="https://youtube.com/..." 
                                   class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition-all outline-none">
                        </div>
                        @error('youtube_url') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="space-y-4">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] px-2">2. Contact Information</h2>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Contact Email</label>
                        <input type="email" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}" placeholder="email@example.com" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Contact Phone</label>
                        <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings->contact_phone) }}" placeholder="091-XXXXXXX" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Office Address</label>
                    <textarea name="contact_address" rows="3" placeholder="Full office address..."
                              class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">{{ old('contact_address', $settings->contact_address) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Campaign Section -->
        <div class="space-y-4">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] px-2">3. Campaign Highlights</h2>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Primary Campaign (Green Badge)</label>
                        <input type="text" name="home_campaign_primary" value="{{ old('home_campaign_primary', $settings->home_campaign_primary) }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm font-bold focus:border-slate-900 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Secondary Campaign (Blue Badge)</label>
                        <input type="text" name="home_campaign_secondary" value="{{ old('home_campaign_secondary', $settings->home_campaign_secondary) }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm font-bold focus:border-slate-900 outline-none transition-all">
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <div class="pt-6 border-t border-gray-200 flex justify-end">
            <button type="submit" class="flex items-center gap-3 px-12 py-4 bg-slate-900 hover:bg-black text-white font-black uppercase tracking-widest text-xs rounded-2xl shadow-xl transition-all hover:-translate-y-1 active:scale-95">
                <i data-lucide="save" class="w-4 h-4"></i>
                Save All Settings
            </button>
        </div>
    </form>
</div>
@endsection
