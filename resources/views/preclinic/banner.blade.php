@extends('admin.dashboard')

@section('content')
    <div class="flex flex-col mx-5 max-w-full overflow-x-hidden">
        <div class="card flex flex-col bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden">

            @if ($banner && $banner->image)
                <img class="h-96 w-full object-cover" src="{{ asset($banner->image) }}" alt="Banner Image">
            @else
                <img class="h-96 w-full object-cover" src="{{ asset('images/default-image.jpg') }}" alt="Default Banner Image">
            @endif

            <div class="card-body p-6">
                <form method="POST" action="{{ route('pre.banner') }}" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf

                    <div class="form-group flex flex-col">
                        <label for="image" class="mb- text-lg font-semibold">Upload Gambar</label>
                        <input type="file" name="image" id="image"
                            class="form-control border border-gray-300 p-2 rounded @error('image') border-red-500 @enderror">
                        @error('image')
                            <span class="text-red-500 mt-2 text-sm">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group flex justify-end">
                        <button type="submit" class="btn bg-primary hover:bg-primary-dark transition duration-300 ease-in-out text-white py-2 px-4 rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
