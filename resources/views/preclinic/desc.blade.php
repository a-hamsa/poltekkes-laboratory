@extends('admin.dashboard')

@section('content')

    <div class="flex flex-col mx-5">
        <div class="card flex flex-col bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="bg-primary text-white p-6 rounded-t-lg">
                @if ($desc && $desc->title)
                    <p class="text-xl">Judul saat ini: {{ $desc->title }}<br>Deskripsi saat ini: {{ $desc->description }}
                    </p>
                @else
                    <p class="text-xl">Judul saat ini: Kemenkes<br>Deskripsi saat ini: Lorem Ipsum</p>
                @endif
            </div>

            <form method="POST" action="{{ route('pre.desc') }}" class="p-6">
                @csrf
                <div class="flex flex-wrap flex-col">
                    <div class="w-full mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                            Judul
                        </label>
                        <input
                            class="appearance-none w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="title" type="text" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <p class="text-primary text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                            Deskripsi
                        </label>
                        <textarea
                            class="appearance-none w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="description" name="description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-primary text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded mt-4"
                        type="submit">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
