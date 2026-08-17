<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label for="title" class="block text-sm font-medium text-gray-700">Title (Optional)</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $headerCampaign->title ?? '') }}"
            class="mt-1 block w-full rounded-md border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="Optional campaign title"
        >
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label for="url" class="block text-sm font-medium text-gray-700">Banner Link</label>
        <input
            type="url"
            name="url"
            id="url"
            value="{{ old('url', $headerCampaign->url ?? '') }}"
            class="mt-1 block w-full rounded-md border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="https://example.com/page"
            required
        >
        @error('url')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Banner Image</label>
        <input
            type="file"
            name="image"
            id="image"
            accept="image/*"
            class="mt-1 block w-full rounded-md border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            {{ isset($headerCampaign) ? '' : 'required' }}
        >
        <p class="mt-1 text-sm text-gray-500">Use a small horizontal image. Max size: 4MB.</p>
        @error('image')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
        <input
            type="number"
            name="order"
            id="order"
            min="0"
            value="{{ old('order', $headerCampaign->order ?? 0) }}"
            class="mt-1 block w-full rounded-md border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-blue-500"
        >
        @error('order')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @if (!empty($headerCampaign?->image_path))
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Current Image</label>
            <img
                src="{{ asset('storage/' . $headerCampaign->image_path) }}"
                alt="{{ $headerCampaign->title ?: 'Header campaign' }}"
                class="mt-2 h-24 rounded-lg border border-gray-200 object-cover"
            >
        </div>
    @endif

    <div class="md:col-span-2 flex items-center">
        <label class="inline-flex items-center">
            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $headerCampaign->is_active ?? true) ? 'checked' : '' }}
                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
            >
            <span class="ml-2 text-sm text-gray-700">Show this campaign in the header</span>
        </label>
    </div>
</div>
