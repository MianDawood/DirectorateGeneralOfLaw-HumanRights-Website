<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<main class="bg-slate-50/50 min-h-screen">
        <!-- Page Header Strip -->
        <section class="bg-[#123B2D] lg:py-14 py-10">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                    <div class="reveal-on-scroll">
                        <p class="text-[#02B1EB] text-[10px] font-black uppercase tracking-[0.5em] mb-3">Get in Touch
                        </p>
                        <h1
                            class="font-outfit text-3xl md:text-4xl font-black text-white uppercase tracking-tight leading-tight">
                            Contact Us
                        </h1>
                        <p class="text-white/60 text-sm mt-3 max-w-lg leading-relaxed">
                            Have questions, need assistance, or want to report a concern? Reach out through any of the
                            channels below.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content: Map + Info | Form -->
        <section class="lg:py-16 py-10">
            <div class="max-w-[1536px] mx-auto px-6 lg:px-20">
                <div class="grid lg:grid-cols-5 gap-10">

                    <!-- Left: Office Details + Map -->
                    <div class="lg:col-span-2 space-y-8 reveal-on-scroll">
                        <!-- Office Details Card -->
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="bg-[#123B2D] px-7 py-5">
                                <h3 class="font-outfit text-base font-bold text-white uppercase tracking-wider">Office
                                    Information</h3>
                            </div>
                            <div class="p-7 space-y-6">
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-9 h-9 bg-[#123B2D]/5 rounded-lg flex items-center justify-center text-[#123B2D] shrink-0 mt-0.5">
                                        <i data-lucide="map-pin" class="w-4 h-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">
                                            Office Address</p>
                                        <p class="text-sm text-slate-700 leading-relaxed"><?php echo nl2br(e($settings->contact_address)); ?></p>
                                    </div>
                                </div>
                                <div class="border-t border-slate-100"></div>
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-9 h-9 bg-[#02B1EB]/5 rounded-lg flex items-center justify-center text-[#02B1EB] shrink-0 mt-0.5">
                                        <i data-lucide="phone" class="w-4 h-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">
                                            Phone Numbers</p>
                                        <p class="text-sm text-slate-700 font-semibold"><?php echo e($settings->contact_phone); ?></p>
                                        <?php if($settings->toll_free): ?>
                                            <p class="text-sm text-slate-700 font-semibold mt-1">
                                                <span class="text-slate-400 font-black uppercase tracking-widest">Toll Free: </span><?php echo e($settings->toll_free); ?>

                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="border-t border-slate-100"></div>
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-9 h-9 bg-[#123B2D]/5 rounded-lg flex items-center justify-center text-[#123B2D] shrink-0 mt-0.5">
                                        <i data-lucide="mail" class="w-4 h-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">
                                            Email Addresses</p>
                                        <a href="mailto:<?php echo e($settings->contact_email); ?>"
                                            class="block text-sm text-[#02B1EB] font-semibold hover:underline"><?php echo e($settings->contact_email); ?></a>
                                    </div>
                                </div>
                                <div class="border-t border-slate-100"></div>
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-9 h-9 bg-[#02B1EB]/5 rounded-lg flex items-center justify-center text-[#02B1EB] shrink-0 mt-0.5">
                                        <i data-lucide="clock" class="w-4 h-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">
                                            Office Hours</p>
                                        <p class="text-sm text-slate-700"><?php echo nl2br(e($settings->working_hours)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Map Card -->
                        <div
                            class="bg-white lg:block hidden rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="w-full h-64 lg:h-72 ">
                                <?php if($settings->map_embed_url): ?>
                                    <iframe
                                        src="<?php echo e($settings->map_embed_url); ?>"
                                        class="w-full h-full border-0 grayscale hover:grayscale-0 transition-all duration-700"
                                        allowfullscreen="" loading="lazy"></iframe>
                                <?php else: ?>
                                    <div class="w-full h-full bg-slate-50 flex items-center justify-center text-slate-400 text-xs font-semibold uppercase tracking-widest">
                                        Map not configured
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="px-7 py-4 border-t border-slate-100">
                                <?php if($settings->map_link): ?>
                                    <a href="<?php echo e($settings->map_link); ?>" target="_blank"
                                        class="flex items-center justify-center gap-2 w-full py-3 bg-[#123B2D] text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-[#02B1EB] transition-all">
                                        <i data-lucide="external-link" class="w-3 h-3"></i> Open in Google Maps
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Contact Form -->
                    <div class="lg:col-span-3 reveal-on-scroll">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="bg-[#123B2D] px-8 py-5 flex items-center justify-between">
                                <h3 class="font-outfit text-base font-bold text-white uppercase tracking-wider">Send Us
                                    a Message</h3>
                                <i data-lucide="message-square" class="w-5 h-5 text-white/40"></i>
                            </div>
                            <div class="p-8 lg:p-10">
                                <?php if(session('success')): ?>
                                    <div class="mb-6 rounded-xl bg-green-50 border border-green-200 p-4 text-sm text-green-700">
                                        <?php echo e(session('success')); ?>

                                    </div>
                                <?php endif; ?>

                                <form id="contactForm" class="space-y-5" method="POST" action="<?php echo e(route('contact.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="grid md:grid-cols-2 gap-5">
                                        <div>
                                            <label
                                                class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Full
                                                Name <span class="text-red-400">*</span></label>
                                            <input type="text" name="full_name" value="<?php echo e(old('full_name')); ?>" required placeholder="Enter your full name"
                                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#02B1EB]/20 focus:border-[#02B1EB] transition-all placeholder:text-slate-400" />
                                        </div>
                                        <div>
                                            <label
                                                class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Email
                                                Address <span class="text-red-400">*</span></label>
                                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" required placeholder="your.email@example.com"
                                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#02B1EB]/20 focus:border-[#02B1EB] transition-all placeholder:text-slate-400" />
                                        </div>
                                    </div>
                                    <div class="grid md:grid-cols-2 gap-5">
                                        <div>
                                            <label
                                                class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Phone
                                                Number</label>
                                            <input type="tel" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="+92 300 1234567"
                                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#02B1EB]/20 focus:border-[#02B1EB] transition-all placeholder:text-slate-400" />
                                        </div>
                                        <div>
                                            <label
                                                class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Subject
                                                <span class="text-red-400">*</span></label>
                                            <select name="subject" required
                                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#02B1EB]/20 focus:border-[#02B1EB] transition-all">
                                                <option value="">Select a subject</option>
                                                <option value="general" <?php echo e(old('subject') === 'general' ? 'selected' : ''); ?>>General Inquiry</option>
                                                <option value="feedback" <?php echo e(old('subject') === 'feedback' ? 'selected' : ''); ?>>Feedback</option>
                                                <option value="other" <?php echo e(old('subject') === 'other' ? 'selected' : ''); ?>>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label
                                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Message
                                            <span class="text-red-400">*</span></label>
                                        <textarea name="message" required rows="8"
                                            placeholder="Please describe your inquiry in detail..."
                                            class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#02B1EB]/20 focus:border-[#02B1EB] transition-all resize-none placeholder:text-slate-400"><?php echo e(old('message')); ?></textarea>
                                    </div>
                                    <div class="flex items-start gap-3 py-2">
                                        <input type="checkbox" id="privacy" required
                                            class="w-4 h-4 mt-0.5 rounded border-slate-300 text-[#123B2D] focus:ring-[#02B1EB]">
                                        <label for="privacy" class="text-xs text-slate-500 leading-relaxed">I agree that
                                            my submitted data is being collected and stored. I have read and accept the
                                            <a href="#" class="text-[#02B1EB] font-semibold hover:underline">Privacy
                                                Policy</a>.</label>
                                    </div>
                                    <div class="flex items-center justify-between pt-2">
                                        <button type="submit"
                                            class="group inline-flex items-center gap-3 px-8 py-4 bg-[#123B2D] text-white text-[11px] font-black uppercase tracking-widest rounded-xl hover:bg-[#02B1EB] transition-all shadow-lg active:scale-95">
                                            Submit Message
                                            <i data-lucide="send"
                                                class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                                        </button>
                                        <p class="text-[10px] text-slate-400 italic hidden sm:block">We respond within 2
                                            business days</p>
                                    </div>
                                    <!-- Informative Notice -->
                                    <div
                                        class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mt-5 pt-5 border-t border-slate-100">
                                        <div class="flex items-center gap-2 text-slate-400">
                                            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-[#123B2D]"></i>
                                            <p class="text-[10px] font-semibold">Your data is secure & confidential</p>
                                        </div>
                                        <div class="flex items-center gap-2 text-slate-400">
                                            <i data-lucide="info" class="w-3.5 h-3.5 text-[#02B1EB]"></i>
                                            <p class="text-[10px] font-semibold">Fields marked with <span
                                                    class="text-red-400">*</span> are required</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section (Pixel-Perfect from other pages) -->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/contact_us.blade.php ENDPATH**/ ?>