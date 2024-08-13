@extends('admin.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Schedule</div>
                    <div class="card-body">
                        @if($schedule->pdf_file)
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
    </div>
@endsection