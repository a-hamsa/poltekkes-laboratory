@extends('admin.dashboard')

@section('content')
    <div class="flex flex-col mx-5">
        {{-- <div class="row justify-content-center"> --}}
        {{-- <div class="col-md-8"> --}}
        {{-- <div class="card flex flex-col overflow-y bg-gray-500">
                    <div class="card-header flex ">Dashboard</div>

                    @if ($banner && $banner->image)
                        <img class="flex h-96 justify" src="{{ asset($banner->image) }}" alt="Banner Image">
                    @else
                        <img class="flex h-96" src="{{ asset('images/default-image.jpg') }}" alt="Default Banner Image">
                    @endif

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('dashboard.banner') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    <input type="file" name="image" id="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Banner
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
        <div class="card flex flex-col bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden">

            @if ($banner && $banner->image)
                <img class="h-96 w-full object-cover" src="{{ asset($banner->image) }}" alt="Banner Image">
            @else
                <img class="h-96 w-full object-cover" src="{{ asset('images/default-image.jpg') }}" alt="Default Banner Image">
            @endif

            <div class="card-body p-6">
                <form method="POST" action="{{ route('dashboard.banner') }}" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf

                    <div class="form-group flex flex-col">
                        <label for="image" class="mb- text-lg font-semibold">Image</label>
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
                            Update Banner
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    {{-- </div> --}}
    {{-- </div> --}}
@endsection
