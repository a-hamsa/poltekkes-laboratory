@extends('admin.dashboard')
@section('content')
    <div class="flex-1 p-6">
        <main class="mt-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-4 shadow-sm rounded">
                    <h3 class="text-xl font-semibold">Card 1</h3>
                    <p class="mt-2 text-gray-600">Content goes here...</p>
                </div>
                <div class="bg-white p-4 shadow-sm rounded">
                    <h3 class="text-xl font-semibold">Card 2</h3>
                    <p class="mt-2 text-gray-600">Content goes here...</p>
                </div>
                <div class="bg-white p-4 shadow-sm rounded">
                    <h3 class="text-xl font-semibold">Card 3</h3>
                    <p class="mt-2 text-gray-600">Content goes here...</p>
                </div>
            </div>
            
        </main>
    </div>
@endsection
