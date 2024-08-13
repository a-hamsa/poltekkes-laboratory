@extends('admin.dashboard')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Schedule</div>
                    <div class="card-body">
                        @if ($schedule && $schedule->pdf_file)
                            <embed src="{{ asset($schedule->pdf_file) }}" type="application/pdf" width="100%" height="500px">
                        @else
                            <p>No schedule PDF file uploaded.</p>
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('dashboard.schedule') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="schedule" class="col-md-4 col-form-label text-md-right">Schedule PDF</label>

                                <div class="col-md-6">
                                    <input type="file" name="pdf_file" required>

                                    @if ($errors->has('pdf_file'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pdf_file') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Schedule
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="flex flex-col mx-5">

        <div class="card flex flex-col bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="card-body p-6">
                @if ($schedule && $schedule->pdf_file)
                    <embed src="{{ asset($schedule->pdf_file) }}" type="application/pdf" width="100%" height="400px"
                        class="border border-gray-300 rounded-lg shadow-md">
                @else
                    <p class="text-gray-600">No schedule PDF file uploaded.</p>
                @endif
            </div>

            <div class="card-body px-6 pb-6">
                <form method="POST" action="{{ route('dashboard.schedule') }}" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div class="form-group flex flex-col">
                        <label for="pdf_file" class="mb-2 text-lg font-semibold">Schedule PDF</label>
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
                            Update Schedule
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
