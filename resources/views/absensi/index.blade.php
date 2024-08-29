@extends('admin.dashboard')

@section('content')
    <div class="container mx-auto px-6">

        <!-- New Input Form -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-700 mb-4">Tambah Semester</h3>
            <form method="POST" action="{{ route( 'semester.store' ) }}" class="space-y-6">
                @csrf

                <div class="flex items-center space-x-4 mb-6">
                    <input
                        name="semester"
                        type="text"
                        class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter new value"
                        required
                    />
                    <button
                        type="submit"
                        class="btn bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded transition duration-300 ease-in-out"
                    >
                        Add
                    </button>
                </div>
            </form>

            <!-- Display Submitted Inputs -->
            <div class="mt-6">
                <h4 class="text-xl font-semibold text-gray-600 mb-2">Daftar Semester:</h4>
                <ul class="list-disc pl-5">
                    @forelse($semesters as $semester)
                        <li class="flex justify-between items-center text-gray-800 mb-2">
                            {{ $semester->semester }}
                            <form action="{{ route( 'semester.destroy', $semester->id ) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    Delete
                                </button>
                            </form>
                        </li>
                    @empty
                        <li class="text-gray-600">No inputs submitted yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        @foreach($absensi as $semester => $students)
            <h3 class="text-xl font-semibold text-gray-600 my-4">{{ $semester }}</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden mb-6">
                    <thead class="bg-primary text-white uppercase text-sm leading-normal">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Name</th>
                            @foreach($uniqueDates as $date)
                                <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                    {{ \Carbon\Carbon::parse($date)->format('d M Y') }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($students as $name => $dates)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">{{ $name }}</td>
                            @foreach($uniqueDates as $date)
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    @if($dates->contains($date))
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Hadir</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Tidak Hadir</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
@endsection
