@php
    $pageTitle = $metaTitle ?? $page->title;
    $pageDescription = $metaDescription ?? $page->meta_description;
    $isAdmin = auth()->check() && auth()->user()->isAdmin();
@endphp

<x-layout :title="$pageTitle">
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $page->title }}</h1>
                <?php if (!empty($pageDescription)): ?>
                    <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">{{ $pageDescription }}</p>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 lg:p-8">
                        <div class="prose prose-lg max-w-none dark:prose-invert">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <?php if ($navigationPages->count() > 0): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pages</h3>
                            <nav class="space-y-2">
                                <?php foreach ($navigationPages as $navPage): ?>
                                    <a href="{{ route('page.show', $navPage->slug) }}"
                                       class="block px-3 py-2 rounded-md text-sm font-medium {{ $navPage->id === $page->id ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-700' }}">
                                        {{ $navPage->title }}
                                    </a>
                                <?php endforeach; ?>
                            </nav>
                        </div>
                    <?php endif; ?>

                    <?php if ($isAdmin): ?>
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Admin Actions</h3>
                            <div class="space-y-2">
                                <a href="{{ route('admin.pages.edit', $page) }}"
                                   class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">
                                    Edit Page
                                </a>
                                <a href="{{ route('admin.pages.show', $page) }}"
                                   class="block w-full text-center bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md">
                                    Admin View
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</x-layout>
