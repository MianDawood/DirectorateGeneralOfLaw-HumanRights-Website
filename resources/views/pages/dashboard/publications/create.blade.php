@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Add Publication</h1>
                            <p class="mt-2 text-sm text-gray-600">Upload and manage new PDF publications.</p>
                        </div>
                        <a href="{{ route('admin.publications.index') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-600 px-4 py-2 text-sm font-semibold shadow-sm hover:bg-gray-700">
                            Back to list
                        </a>
                    </div>

                    <form action="{{ route('admin.publications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @include('pages.dashboard.publications._form', ['categories' => $categories])

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">
                                Create Publication
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection