@php
    $event = $event ?? null;
    $categories = $categories ?? collect();
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label for="title" class="block text-sm font-medium text-gray-700">Event Name *</label>
        <input type="text" name="title" id="title" value="{{ old('title', $event?->title) }}"
               class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
               required>
        @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="event_date" class="block text-sm font-medium text-gray-700">Date *</label>
        <input type="datetime-local" name="event_date" id="event_date"
               value="{{ old('event_date', $event?->event_date ? $event->event_date->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}"
               class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
               required>
        @error('event_date')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div x-data="manageSubjects()">
        <div class="flex items-center justify-between">
            <label for="subject" class="block text-sm font-medium text-gray-700">Subject / Event Category</label>
            <button type="button" @click="open()"
                    class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-blue-700 bg-blue-50 rounded-md hover:bg-blue-100">
                + Manage Subjects
            </button>
        </div>
        <select name="category_id" id="subject"
                class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="">— Select Subject —</option>
            <template x-for="cat in categories" :key="cat.id">
                <option :value="cat.id" x-text="cat.name" :selected="String(cat.id) === selectedId"></option>
            </template>
        </select>
        @error('category_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        @error('subject')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror

        <div x-show="modalOpen" x-cloak style="display:none"
             class="fixed inset-0 z-50 overflow-y-auto" @keydown.escape.window="modalOpen = false">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black/50" @click="modalOpen = false"></div>
                <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md p-6 my-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Manage Event Subjects</h3>
                        <button type="button" @click="modalOpen = false" class="text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
                    </div>

                    <div class="flex gap-2 mb-2">
                        <input type="text" x-model="newName" placeholder="New subject name"
                               @keydown.enter.prevent="add()"
                               class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm">
                        <button type="button" @click="add()"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md">Add</button>
                    </div>
                    <p x-show="error" x-text="error" class="text-sm text-red-600 mb-2"></p>

                    <ul class="divide-y divide-gray-100 max-h-72 overflow-y-auto">
                        <template x-for="cat in categories" :key="cat.id">
                            <li class="flex items-center justify-between py-2 gap-2">
                                <template x-if="editingId !== cat.id">
                                    <span class="text-sm text-gray-800 flex-1" x-text="cat.name"></span>
                                </template>
                                <template x-if="editingId === cat.id">
                                    <input type="text" x-model="editingName"
                                           @keydown.enter="save(cat)"
                                           class="flex-1 px-2 py-1 border border-gray-300 rounded-md text-sm">
                                </template>
                                <div class="flex items-center gap-3 shrink-0">
                                    <template x-if="editingId !== cat.id">
                                        <button type="button" @click="beginEdit(cat)" class="text-indigo-600 hover:text-indigo-900 text-sm">Rename</button>
                                    </template>
                                    <template x-if="editingId === cat.id">
                                        <button type="button" @click="save(cat)" class="text-green-600 hover:text-green-900 text-sm">Save</button>
                                    </template>
                                    <button type="button" @click="remove(cat)" class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                                </div>
                            </li>
                        </template>
                        <li x-show="categories.length === 0" class="py-3 text-sm text-gray-500 text-center">No subjects yet.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="md:col-span-2">
        <label for="location" class="block text-sm font-medium text-gray-700">Venue *</label>
        <input type="text" name="location" id="location" value="{{ old('location', $event?->location) }}"
               placeholder="Event venue / location"
               class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
               required>
        @error('location')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="md:col-span-2">
        <label for="description" class="block text-sm font-medium text-gray-700">Short Description *</label>
        <textarea name="description" id="description" rows="5"
                  class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                  required>{{ old('description', $event?->description) }}</textarea>
        @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
        <input type="number" name="order" id="order" value="{{ old('order', $event?->order ?? 0) }}" min="0"
               class="mt-1 block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        @error('order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="flex flex-col gap-3 justify-end">
        <label class="inline-flex items-center">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $event?->is_featured) ? 'checked' : '' }}
                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-700">Featured Event</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $event?->is_active ?? true) ? 'checked' : '' }}
                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-700">Publish (Active)</span>
        </label>
    </div>
</div>

<div class="mt-8 pt-6 border-t border-gray-200">
    <h3 class="text-lg font-semibold text-gray-900 mb-2">Event Images</h3>
    <p class="text-sm text-gray-500 mb-4">Upload one or more photos. Visitors can click to enlarge on the event page.</p>

    @if($event && $event->images->isNotEmpty())
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mb-4">
            @foreach($event->images as $image)
                <label class="relative block rounded-lg overflow-hidden border border-gray-200 cursor-pointer group">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Event image" class="w-full h-28 object-cover">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <span class="text-white text-xs font-bold">Remove</span>
                    </div>
                    <input type="checkbox" name="remove_images[]" value="{{ $image->id }}"
                           class="absolute top-2 right-2 w-4 h-4 rounded border-white">
                </label>
            @endforeach
        </div>
        <p class="text-xs text-gray-500 mb-3">Check images above to remove them when saving.</p>
    @endif

    <input type="file" name="images[]" id="images" accept="image/*" multiple
           class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
    @error('images')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    @error('images.*')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    <p class="mt-1 text-sm text-gray-500">JPG, PNG, WEBP. Max 4MB per image. Select multiple files at once.</p>
</div>

<div class="mt-8 pt-6 border-t border-gray-200">
    <h3 class="text-lg font-semibold text-gray-900 mb-2">YouTube Videos</h3>
    <p class="text-sm text-gray-500 mb-4">Paste YouTube links — they will be embedded on the event page (no file upload).</p>

    @if($event && $event->videos->isNotEmpty())
        <div class="space-y-3 mb-4">
            @foreach($event->videos as $video)
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                    <img src="https://img.youtube.com/vi/{{ $video->youtube_video_id }}/default.jpg" alt="" class="w-20 h-12 object-cover rounded">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-800 truncate">{{ $video->youtube_url }}</p>
                    </div>
                    <label class="inline-flex items-center text-sm text-red-600 shrink-0">
                        <input type="checkbox" name="remove_videos[]" value="{{ $video->id }}" class="rounded border-gray-300 text-red-600 mr-1">
                        Remove
                    </label>
                </div>
            @endforeach
        </div>
    @endif

    <div id="youtube-urls-list" class="space-y-3">
        <div class="youtube-url-row flex gap-2">
            <input type="url" name="youtube_urls[]" placeholder="https://www.youtube.com/watch?v=..."
                   class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <button type="button" class="remove-youtube-row px-3 py-2 text-sm text-red-600 border border-red-200 rounded-md hover:bg-red-50 hidden">Remove</button>
        </div>
    </div>
    <button type="button" id="add-youtube-row"
            class="mt-3 inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-50 rounded-md hover:bg-blue-100">
        + Add another video link
    </button>
    @error('youtube_urls.*')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
</div>

@push('scripts')
<script>
function manageSubjects() {
    return {
        categories: @js(
            $categories->map(fn ($c) => ['id' => $c->id, 'name' => $c->name])->values()->all()
        ),
        selectedId: '{{ old('category_id', $event?->category_id) }}',
        modalOpen: false,
        newName: '',
        editingId: null,
        editingName: '',
        error: '',
        csrf() {
            return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
        },
        open() {
            this.modalOpen = true;
            this.error = '';
            this.fetchAll();
        },
        async fetchAll() {
            try {
                const res = await fetch('{{ route('admin.event-categories.index') }}', {
                    headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                });
                if (!res.ok) throw new Error();
                this.categories = await res.json();
            } catch (e) {
                this.error = 'Could not load subjects.';
            }
        },
        async add() {
            const name = this.newName.trim();
            if (!name) return;
            this.error = '';
            try {
                const res = await fetch('{{ route('admin.event-categories.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': this.csrf(),
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({ name }),
                });
                const data = await res.json();
                if (!res.ok) throw new Error(data?.errors?.name?.[0] ?? 'Could not add subject.');
                this.newName = '';
                await this.fetchAll();
            } catch (e) {
                this.error = e.message || 'Could not add subject.';
            }
        },
        beginEdit(cat) {
            this.editingId = cat.id;
            this.editingName = cat.name;
        },
        async save(cat) {
            const name = this.editingName.trim();
            if (!name) return;
            this.error = '';
            try {
                const res = await fetch(
                    '{{ route('admin.event-categories.update', ['category' => '__ID__']) }}'.replace('__ID__', cat.id),
                    {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': this.csrf(),
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: JSON.stringify({ name }),
                    }
                );
                const data = await res.json();
                if (!res.ok) throw new Error(data?.errors?.name?.[0] ?? 'Could not save subject.');
                this.editingId = null;
                await this.fetchAll();
            } catch (e) {
                this.error = e.message || 'Could not save subject.';
            }
        },
        async remove(cat) {
            if (!confirm('Delete subject "' + cat.name + '"?')) return;
            this.error = '';
            try {
                const res = await fetch(
                    '{{ route('admin.event-categories.destroy', ['category' => '__ID__']) }}'.replace('__ID__', cat.id),
                    {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': this.csrf(),
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    }
                );
                if (!res.ok) throw new Error();
                await this.fetchAll();
            } catch (e) {
                this.error = 'Could not delete subject.';
            }
        },
    };
}
</script>
@endpush
@push('scripts')
<script>
(function () {
    const list = document.getElementById('youtube-urls-list');
    const addBtn = document.getElementById('add-youtube-row');
    if (!list || !addBtn) return;

    const syncRemoveButtons = () => {
        const rows = list.querySelectorAll('.youtube-url-row');
        rows.forEach((row) => {
            const btn = row.querySelector('.remove-youtube-row');
            if (btn) btn.classList.toggle('hidden', rows.length <= 1);
        });
    };

    addBtn.addEventListener('click', () => {
        const row = list.querySelector('.youtube-url-row');
        if (!row) return;
        const clone = row.cloneNode(true);
        clone.querySelector('input').value = '';
        list.appendChild(clone);
        syncRemoveButtons();
    });

    list.addEventListener('click', (e) => {
        const btn = e.target.closest('.remove-youtube-row');
        if (!btn) return;
        const row = btn.closest('.youtube-url-row');
        if (list.querySelectorAll('.youtube-url-row').length <= 1) return;
        row.remove();
        syncRemoveButtons();
    });

    syncRemoveButtons();
})();
</script>
@endpush
