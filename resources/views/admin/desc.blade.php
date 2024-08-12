@extends('admin.dashboard')

@section('content')

    <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
        <h1 class="text-3xl font-bold mb-4">Update Description</h1>

        <p class="text-lg mb-8"></p>
        <p class="text-lg mb-8">Current Title: {{ $desc->title }}<br>Current Description: {{ $desc->description }}</p>

        @if (session('success'))
            <div class="bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif



        <form method="POST" action="{{ route('dashboard.desc') }}">
            @csrf

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                        Title
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="title" type="text" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                        Description
                    </label>
                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="description" name="description" required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded" type="submit">
                Update Description
            </button>
        </form>
    </div>

@endsection