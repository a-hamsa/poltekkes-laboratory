@extends('admin.dashboard')

@section('content')
    <div class="container mx-auto px-6">
        <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data"
            class="bg-white shadow-lg rounded-lg p-6 space-y-6">
            @csrf

            <div class="form-group">
                <label for="name" class="block text-lg font-semibold mb-2">Nama Siswa:</label>
                <input type="text" id="name" name="name" required
                    class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="form-group">
                <label for="nim" class="block text-lg font-semibold mb-2">Nim:</label>
                <input type="text" id="nim" name="nim" required
                    class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="form-group">
                <label for="class" class="block text-lg font-semibold mb-2">Kelas:</label>
                <input type="text" id="class" name="class" required
                    class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex justify-end">

                <button type="submit"
                    class="btn bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection
