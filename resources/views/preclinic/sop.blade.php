@extends('admin.dashboard')

@section('content')

<div class="flex flex-col mx-5 max-w-full overflow-x-hidden">

    <div class="card flex flex-col bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="card-body p-6">
            @if ($sop && $sop->pdf_file)
                <embed src="{{ asset($sop->pdf_file) }}" type="application/pdf" width="100%" height="400px"
                    class="border border-gray-300 rounded-lg shadow-md">
            @else
                <p class="text-gray-600">Belum ada PDF untuk Ditampilkan</p>
            @endif
        </div>

        <div class="card-body px-6 pb-6">
            <form method="POST" action="{{ route('pre.sop') }}" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <div class="form-group flex flex-col">
                    <label for="pdf_file" class="mb-2 text-lg font-semibold">Upload PDF SOP & Instruksi Kerja</label>
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
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection