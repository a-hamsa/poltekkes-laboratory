@extends('admin.dashboard')

@section('content')
    
    <div class="container mx-auto px-6">
        <form action="{{ route('sop.update', $sop->id) }}" method="post" enctype="multipart/form-data"
            class="bg-white shadow-lg rounded-lg p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="block text-lg font-semibold mb-2">Nama:</label>
                <input type="text"
                    class="form-control w-full border border-gray-300 p-2 rounded @error('name') border-red-500 @enderror"
                    id="name" name="name" value="{{ $sop->name }}" required>
                @error('name')
                    <span class="text-red-500 mt-2 text-lg">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="pdf_file" class="block text-lg font-semibold mb-2">File:</label>
                <input type="file"
                    class="form-control w-full border border-gray-300 p-2 rounded @error('pdf_file') border-red-500 @enderror"
                    id="image" name="pdf_file">
                @if ($sop->pdf_file)
                    <p class="text-lg font-semibold mb-2 mt-2">Current File:</p>
                    <iframe src="{{ asset('storage/' . $sop->pdf_file) }}" frameborder="0" width="50%" height="300"></iframe>
                @endif
                @error('pdf_file')
                    <span class="text-red-500 mt-2 text-lg">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex space-x-4 justify-end">
                <button type="submit" class="btn bg-primary hover:bg-primary-dark transition duration-300 ease-in-out text-white py-2 px-4 rounded">
                    Update
                </button>
                <a href="{{ route('sop.index') }}"
                    class="btn bg-gray-300 hover:bg-gray-400 transition duration-300 ease-in-out text-gray-800 py-2 px-4 rounded">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
