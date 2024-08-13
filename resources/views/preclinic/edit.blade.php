@extends('admin.dashboard')

@section('content')
    <div class="container mx-auto px-6">
        <form action="{{ route('preinventory.update', $inventory->id) }}" method="post" enctype="multipart/form-data"
            class="bg-white shadow-lg rounded-lg p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="block text-lg font-semibold mb-2">Name:</label>
                <input type="text"
                    class="form-control w-full border border-gray-300 p-2 rounded @error('name') border-red-500 @enderror"
                    id="name" name="name" value="{{ $inventory->name }}" required>
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
                    id="amount" name="amount" value="{{ $inventory->amount }}" required>
                @error('amount')
                    <span class="text-red-500 mt-2 text-lg">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="condition" class="block text-lg font-semibold mb-2">Condition:</label>
                <select
                    class="form-control w-full border border-gray-300 p-2 rounded @error('condition') border-red-500 @enderror"
                    id="condition" name="condition" required>
                    <option value="good" {{ $inventory->condition == 'good' ? 'selected' : '' }}>Good</option>
                    <option value="broken" {{ $inventory->condition == 'broken' ? 'selected' : '' }}>Broken</option>
                </select>
                @error('condition')
                    <span class="text-red-500 mt-2 text-lg">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image" class="block text-lg font-semibold mb-2">Image:</label>
                <input type="file"
                    class="form-control w-full border border-gray-300 p-2 rounded @error('image') border-red-500 @enderror"
                    id="image" name="image">
                @if ($inventory->image)
                    <p class="text-lg font-semibold mb-2 mt-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $inventory->image) }}" alt="Inventory Image"
                        class="w-24 h-24 object-cover rounded">
                @endif
                @error('image')
                    <span class="text-red-500 mt-2 text-lg">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex space-x-4 justify-end">
                <button type="submit" class="btn bg-primary hover:bg-primary-dark transition duration-300 ease-in-out text-white py-2 px-4 rounded">
                    Update
                </button>
                <a href="{{ route('preinventory.index') }}"
                    class="btn bg-gray-300 hover:bg-gray-400 transition duration-300 ease-in-out text-gray-800 py-2 px-4 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
