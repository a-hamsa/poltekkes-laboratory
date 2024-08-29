@extends('admin.dashboard')

@section('content')
    <div class="flex flex-col mx-5 max-w-full overflow-x-hidden">
        <div class="card bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="card-body p-6">
                <h1 class="text-xl font-bold mb-4">Schedules</h1>

                <a href="{{ route('schedules.create') }}" class="btn bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded">
                    Create New Schedule
                </a>

                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Title</th>
                            <th class="border px-4 py-2">Semester</th>
                            <th class="border px-4 py-2">PDF File</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <td class="border px-4 py-2">{{ $schedule->title }}</td>
                                <td class="border px-4 py-2">{{ $schedule->semester->semester }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ asset('storage/uploads/' . $schedule->pdf_file) }}" target="_blank" class="text-primary">
                                        View PDF
                                    </a>
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('schedules.edit', $schedule->id) }}" class="ml-2 text-yellow-500 hover:underline">Edit</a>
                                    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
