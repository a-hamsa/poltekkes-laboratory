@extends('admin.dashboard')

@section('content')

    <div class="flex flex-col mx-5">
        <div class="card flex flex-col bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="bg-primary text-white p-6 rounded-t-lg">
                @if ($absen && $absen->link)
                    <p class="text-xl">Current Link: {{ $absen->link }}</p>
                @else
                    <p class="text-xl">Current Link: hhtps</p>
                @endif
            </div>

            <form method="POST" action="{{ route('dashboard.absen') }}" class="p-6">
                @csrf
                <div class="flex flex-wrap flex-col">
                    <div class="w-full mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="link">
                            Title
                        </label>
                        <input
                            class="appearance-none w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="link" type="text" name="link" value="{{ old('link') }}" required>
                        @error('link')
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
