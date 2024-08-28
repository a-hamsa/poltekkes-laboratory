@extends('admin.dashboard')

@section('content')
    <div class="container mx-auto px-6">
        <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data"
            class="bg-white shadow-lg rounded-lg p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="block text-lg font-semibold mb-2">Nama:</label>
                <input type="text"
                    class="form-control w-full border border-gray-300 p-2 rounded @error('name') border-red-500 @enderror"
                    id="name" name="name" value="{{ $student->name }}" required>
                @error('name')
                    <span class="text-red-500 mt-2 text-lg">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nim" class="block text-lg font-semibold mb-2">Nim:</label>
                <input type="text"
                    class="form-control w-full border border-gray-300 p-2 rounded @error('nim') border-red-500 @enderror"
                    id="nim" name="nim" value="{{ $student->nim }}" required>
                @error('nim')
                    <span class="text-red-500 mt-2 text-lg">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="class" class="block text-lg font-semibold mb-2">Kelas:</label>
                <input type="text"
                    class="form-control w-full border border-gray-300 p-2 rounded @error('class') border-red-500 @enderror"
                    id="class" name="class" value="{{ $student->class }}" required>
                @error('class')
                    <span class="text-red-500 mt-2 text-lg">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        
            <div class="flex space-x-4 justify-end">
                <button type="submit" class="btn bg-primary hover:bg-primary-dark transition duration-300 ease-in-out text-white py-2 px-4 rounded">
                    Update
                </button>
                <a href="{{ route('student.index') }}"
                    class="btn bg-gray-300 hover:bg-gray-400 transition duration-300 ease-in-out text-gray-800 py-2 px-4 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
