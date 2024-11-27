@extends('admin.dashboard')

@section('content')
    <div class="container mx-auto px-6">

        <div class="flex justify-between items-center space-x-6 space-y-4 w-full">
            <div class="flex space-x-6 items-center">
                <!-- Filter Form -->
                <form method="GET" action="{{ route('absensi.index') }}" class="flex items-center space-x-6">
                    <!-- Class Filter -->
                    <div class="flex flex-col space-y-2">
                        <label for="class" class="text-sm font-medium text-gray-700">Class</label>
                        <select name="class" id="class"
                            class="form-select px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                            @foreach ($classes as $class)
                                <option value="{{ $class }}" {{ request('class') == $class ? 'selected' : '' }}>
                                    {{ $class }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- TK./SMT Filter -->
                    <div class="flex flex-col space-y-2">
                        <label for="tk_smt" class="text-sm font-medium text-gray-700">TK./SMT</label>
                        <select name="tk_smt" id="tk_smt"
                            class="form-select px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                            @foreach ($tk_smt_list as $tk_smt)
                                <option value="{{ $tk_smt }}" {{ request('tk_smt') == $tk_smt ? 'selected' : '' }}>
                                    {{ $tk_smt }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filter Button -->
                    <div>
                        <button type="submit"
                            class="btn bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded transition duration-300 ease-in-out">
                            Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Student Table -->
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-primary text-white uppercase text-sm leading-normal">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">NIM</th>
                    <!-- Add columns for Pertemuan 1 to Pertemuan 8 -->
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Pertemuan 1
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Pertemuan 2
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Pertemuan 3
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Pertemuan 4
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Pertemuan 5
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Pertemuan 6
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Pertemuan 7
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Pertemuan 8
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($students as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">
                            {{ $student->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $student->nim }}
                        </td>
                        <!-- Add data for Pertemuan 1 to Pertemuan 8 -->
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            <!-- Example data for Pertemuan 1, adjust according to your actual data -->
                            {{ $student->pertemuan_1 ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $student->pertemuan_2 ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $student->pertemuan_3 ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $student->pertemuan_4 ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $student->pertemuan_5 ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $student->pertemuan_6 ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $student->pertemuan_7 ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $student->pertemuan_8 ?? 'N/A' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
