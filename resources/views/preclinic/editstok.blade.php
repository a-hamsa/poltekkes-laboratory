@extends('admin.dashboard')

@section('content')
    <div class="container mx-auto px-6">
        <form action="{{ route('prestok.update', $stok->id) }}" method="post" enctype="multipart/form-data"
            class="bg-white shadow-lg rounded-lg p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="block text-lg font-semibold mb-2">Name:</label>
                <input type="text"
                    class="form-control w-full border border-gray-300 p-2 rounded @error('name') border-red-500 @enderror"
                    id="name" name="name" value="{{ $stok->name }}" required>
                @error('name')
                    <span class="text-red-500 mt-2 text-lg">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="amount" class="block text-lg font-semibold mb-2">Amount:</label>
                <input type="number"
                    class="form-control w-full border border-gray-300 p-2 rounded @error('amount') border-red-500 @enderror"
                    id="amount" name="amount" value="{{ $stok->amount }}" required>
                @error('amount')
                    <span class="text-red-500 mt-2 text-lg">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="condition" class="block text-lg font-semibold mb-2">Keterangan:</label>
                <textarea
                    class="appearance-none w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                    id="description" name="description" required>{{ $stok->description }}</textarea>
            </div>
        
            <div class="flex space-x-4 justify-end">
                <button type="submit" class="btn bg-primary hover:bg-primary-dark transition duration-300 ease-in-out text-white py-2 px-4 rounded">
                    Update
                </button>
                <a href="{{ route('prestok.index') }}"
                    class="btn bg-gray-300 hover:bg-gray-400 transition duration-300 ease-in-out text-gray-800 py-2 px-4 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
