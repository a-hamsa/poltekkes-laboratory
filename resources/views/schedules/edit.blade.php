@extends('admin.dashboard')

@section('content')
    <div class="flex flex-col mx-5 max-w-full overflow-x-hidden">
        <div class="card bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="card-body p-6">
                <h1 class="text-xl font-bold mb-4">Edit Schedule</h1>

                <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="form-group flex flex-col">
                        <label for="title" class="text-lg font-semibold mb-2">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $schedule->title) }}" required
                            class="form-control border border-gray-300 p-2 rounded @error('title') border-red-500 @enderror">
                        @error('title')
                            <span class="text-red-500 mt-2 text-sm">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="semester_id" class="text-lg font-semibold mb-2">Semester</label>
                        <select name="semester_id" id="semester_id"
                            class="form-control border border-gray-300 p-2 rounded @error('semester_id') border-red-500 @enderror">
                            @foreach ($semesters as $semester)
                                <option value="{{ $semester->id }}" {{ $schedule->semester_id == $semester->id ? 'selected' : '' }}>
                                    {{ $semester->semester }}
                                </option>
                            @endforeach
                        </select>
                        @error('semester_id')
                            <span class="text-red-500 mt-2 text-sm">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="pdf_file" class="text-lg font-semibold mb-2">Upload PDF</label>
                        <input type="file" name="pdf_file" id="pdf_file"
                            class="form-control border border-gray-300 p-2 rounded @error('pdf_file') border-red-500 @enderror">
                        <p class="mt-2">Current File: 
                            <a href="{{ asset('storage/uploads/' . $schedule->pdf_file) }}" target="_blank" class="text-primary">
                                {{ $schedule->pdf_file }}
                            </a>
                        </p>
                        @error('pdf_file')
                            <span class="text-red-500 mt-2 text-sm">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group flex justify-end">
                        <button type="submit" class="btn bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
