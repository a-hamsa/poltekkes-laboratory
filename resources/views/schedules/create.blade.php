@extends('admin.dashboard')

@section('content')
    <div class="flex flex-col mx-5 max-w-full overflow-x-hidden">
        <div class="card bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="card-body p-6">
                <h1 class="text-xl font-bold mb-4">Create New Schedule</h1>

                <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div class="form-group flex flex-col">
                        <label for="title" class="text-lg font-semibold mb-2">Tingkat</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                            class="form-control border border-gray-300 p-2 rounded @error('title') border-red-500 @enderror">
                        @error('title')
                            <span class="text-red-500 mt-2 text-sm">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="semester" class="text-lg font-semibold mb-2">Semester</label>
                        <input type="text" name="semester" id="semester" value="{{ old('semester') }}" required
                            class="form-control border border-gray-300 p-2 rounded @error('semester') border-red-500 @enderror">
                        @error('semester')
                            <span class="text-red-500 mt-2 text-sm">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="pdf_file" class="text-lg font-semibold mb-2">Upload PDF</label>
                        <input type="file" name="pdf_file" id="pdf_file" required
                            class="form-control border border-gray-300 p-2 rounded @error('pdf_file') border-red-500 @enderror">
                        @error('pdf_file')
                            <span class="text-red-500 mt-2 text-sm">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group flex justify-end">
                        <button type="submit" class="btn bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
