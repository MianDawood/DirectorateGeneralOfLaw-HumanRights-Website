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
    <div class="bg-slate-50 min-h-screen py-20">
        <div class="max-w-[800px] mx-auto px-4 sm:px-6 lg:px-10">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 md:p-12">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-[#123B2D]/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="search" class="w-8 h-8 text-[#123B2D]"></i>
                    </div>
                    <h1 class="font-outfit text-3xl md:text-4xl font-black text-[#123B2D] uppercase tracking-tight">Track Complaint
                        <span class="text-[#02B1EB]">Status</span>
                    </h1>
                    <p class="text-slate-500 mt-3 max-w-lg mx-auto text-sm">Enter your complaint reference number to check the current status of your complaint.</p>
                </div>
                <form class="space-y-6" method="GET" action="<?php echo e(route('complaint_cell')); ?>">
                    <div>
                        <label for="reference_no" class="block text-sm font-medium text-slate-700 mb-2">Complaint Reference Number</label>
                        <input type="text" name="reference_no" id="reference_no"
                               placeholder="e.g. CMP-2026-00123"
                               class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm focus:border-[#02B1EB] focus:ring-2 focus:ring-[#02B1EB]/10 transition-all outline-none">
                    </div>
                    <button type="submit"
                            class="w-full py-3.5 bg-[#123B2D] text-white font-bold uppercase tracking-widest text-xs rounded-xl hover:bg-[#02B1EB] transition-all shadow-lg">
                        Check Status
                    </button>
                </form>
                <p class="text-center text-xs text-slate-400 mt-6">If you don't have a reference number, please <a href="<?php echo e(route('complaint_cell')); ?>" class="text-[#02B1EB] hover:text-[#123B2D] font-semibold">register a new complaint</a>.</p>
            </div>
        </div>
    </div>
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
<?php /**PATH /Applications/MAMP/htdocs/human-rights-kp/resources/views/pages/track-complaint.blade.php ENDPATH**/ ?>