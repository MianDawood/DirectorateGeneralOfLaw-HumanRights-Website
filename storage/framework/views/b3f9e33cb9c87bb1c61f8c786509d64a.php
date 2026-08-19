<?php $__env->startSection('content'); ?>
<div class="px-4 py-8 mx-auto max-w-4xl">

    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b border-gray-200 pb-6">
        <div>
            <h1 class="text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tight">Site Settings</h1>
            <p class="mt-1 text-sm text-gray-500">Manage social media links and general site information.</p>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300 shadow-sm flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.site-settings.update')); ?>" enctype="multipart/form-data" class="space-y-8">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

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
                            <input type="url" name="facebook_url" value="<?php echo e(old('facebook_url', $settings->facebook_url)); ?>" placeholder="https://facebook.com/..."
                                   class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none">
                        </div>
                        <?php $__errorArgs = ['facebook_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Twitter / X URL</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="twitter" class="w-4 h-4 text-sky-500"></i>
                            </div>
                            <input type="url" name="twitter_url" value="<?php echo e(old('twitter_url', $settings->twitter_url)); ?>" placeholder="https://twitter.com/..."
                                   class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all outline-none">
                        </div>
                        <?php $__errorArgs = ['twitter_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Instagram URL</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="instagram" class="w-4 h-4 text-pink-600"></i>
                            </div>
                            <input type="url" name="instagram_url" value="<?php echo e(old('instagram_url', $settings->instagram_url)); ?>" placeholder="https://instagram.com/..."
                                   class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all outline-none">
                        </div>
                        <?php $__errorArgs = ['instagram_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">YouTube URL</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="youtube" class="w-4 h-4 text-red-600"></i>
                            </div>
                            <input type="url" name="youtube_url" value="<?php echo e(old('youtube_url', $settings->youtube_url)); ?>" placeholder="https://youtube.com/..."
                                   class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition-all outline-none">
                        </div>
                        <?php $__errorArgs = ['youtube_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">TikTok URL</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-gray-900"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                            </div>
                            <input type="url" name="tiktok_url" value="<?php echo e(old('tiktok_url', $settings->tiktok_url)); ?>" placeholder="https://tiktok.com/..."
                                   class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:ring-2 focus:ring-gray-500/20 focus:border-gray-900 transition-all outline-none">
                        </div>
                        <?php $__errorArgs = ['tiktok_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                        <input type="email" name="contact_email" value="<?php echo e(old('contact_email', $settings->contact_email)); ?>" placeholder="email@example.com"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Contact Phone</label>
                        <input type="text" name="contact_phone" value="<?php echo e(old('contact_phone', $settings->contact_phone)); ?>" placeholder="091-XXXXXXX"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Toll Free Number</label>
                        <input type="text" name="toll_free" value="<?php echo e(old('toll_free', $settings->toll_free)); ?>" placeholder="0800-11180"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Working Hours</label>
                        <textarea name="working_hours" rows="3" placeholder="Monday – Friday&#10;09:00 AM – 05:00 PM&#10;Closed on public holidays"
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all"><?php echo e(old('working_hours', $settings->working_hours)); ?></textarea>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Office Address</label>
                    <textarea name="contact_address" rows="3" placeholder="Full office address..."
                              class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all"><?php echo e(old('contact_address', $settings->contact_address)); ?></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Map Embed URL</label>
                        <input type="text" name="map_embed_url" value="<?php echo e(old('map_embed_url', $settings->map_embed_url)); ?>" placeholder="https://www.google.com/maps/embed?pb=..."
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                        <p class="mt-2 text-xs text-gray-500">The Google Maps embed (iframe) src shown in the footer and contact page.</p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Google Maps Location</label>
                        <input type="text" name="map_link" value="<?php echo e(old('map_link', $settings->map_link)); ?>" placeholder="https://maps.app.goo.gl/..."
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                        <p class="mt-2 text-xs text-gray-500">Used by the "Open in Google Maps" buttons.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Branding & SEO Section -->
        <div class="space-y-4">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] px-2">3. Branding & SEO</h2>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Site Name</label>
                    <input type="text" name="site_name" value="<?php echo e(old('site_name', $settings->site_name)); ?>" placeholder="Directorate of Human Rights"
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                    <p class="mt-2 text-xs text-gray-500">Used in the site header, footer and browser tab title.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Logo</label>
                        <?php if($settings->logo): ?>
                            <div class="mb-4">
                                <img src="<?php echo e(asset('storage/' . $settings->logo)); ?>" alt="Current Logo" class="h-20 object-contain border p-2 rounded bg-gray-50 dark:bg-gray-900">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="logo" accept="image/*"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                        <p class="mt-2 text-xs text-gray-500">Used in the header, mobile menu, footer and registration form. Defaults to images/logo.jpg when empty.</p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Favicon</label>
                        <?php if($settings->favicon): ?>
                            <div class="mb-4">
                                <img src="<?php echo e(asset('storage/' . $settings->favicon)); ?>" alt="Current Favicon" class="h-16 w-16 object-contain border p-2 rounded bg-gray-50 dark:bg-gray-900">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="favicon" accept="image/*,.ico"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                        <p class="mt-2 text-xs text-gray-500">Small icon shown in the browser tab. PNG, ICO or SVG, ideally 16x16 or 32x32.</p>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Meta Title</label>
                    <input type="text" name="meta_title" value="<?php echo e(old('meta_title', $settings->meta_title)); ?>" placeholder="Directorate of Human Rights | Khyber Pakhtunkhwa"
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                    <p class="mt-2 text-xs text-gray-500">Default browser tab title used when a page does not define its own.</p>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="3" placeholder="Short site description shown in search engine results..."
                              class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all"><?php echo e(old('meta_description', $settings->meta_description)); ?></textarea>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="<?php echo e(old('meta_keywords', $settings->meta_keywords)); ?>" placeholder="human rights, KP, NGOs, directorate"
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                </div>
            </div>
        </div>

        <!-- Certificate Settings Section -->
        <div class="space-y-4">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] px-2">4. NGO Certificate Settings</h2>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Director General Signature Image</label>
                    <?php if($settings->dg_signature_image): ?>
                        <div class="mb-4">
                            <img src="<?php echo e(asset('storage/' . $settings->dg_signature_image)); ?>" alt="Current Signature" class="h-20 object-contain border p-2 rounded bg-gray-50">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="dg_signature_image" accept="image/*"
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-sm focus:border-slate-900 outline-none transition-all">
                    <p class="mt-2 text-xs text-gray-500">Upload a transparent PNG for best results on the certificate.</p>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <div class="pt-6 border-t border-gray-200 flex justify-end">
            <button type="submit" class="flex items-center gap-3 px-12 py-4 bg-gray-800 hover:bg-gray-900 dark:bg-brand-600 dark:hover:bg-brand-700 text-white font-black uppercase tracking-widest text-xs rounded-2xl shadow-xl transition-all hover:-translate-y-1 active:scale-95">
                <i data-lucide="save" class="w-4 h-4"></i>
                Save All Settings
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/dashboard/site-settings/index.blade.php ENDPATH**/ ?>