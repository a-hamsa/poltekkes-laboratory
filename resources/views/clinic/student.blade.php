@extends('admin.dashboard')

@section('content')
    <div class="container mx-auto px-6 pb-4">
        <div class="flex justify-between items-center space-x-6 space-y-4 w-full">
            <!-- Left: Add New Data Button -->
            {{-- <a href="{{ route('student.create') }}"
                class="btn bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded transition duration-300 ease-in-out">
                Tambah Data Baru
            </a> --}}

            <!-- Right: Filter Form and Import File Form -->
            <div class="flex space-x-6 items-center">
                <!-- Filter Form -->
                <form method="GET" action="{{ route('student.index') }}" class="flex items-center space-x-6">
                    <!-- Class Filter -->
                    <div class="flex flex-col space-y-2">
                        <label for="class" class="text-sm font-medium text-gray-700">Class</label>
                        <select name="class" id="class"
                            class="form-select px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                            <option value="">All Classes</option>
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
                            @foreach ($tk_smt_list as $index => $tk_smt)
                                <option value="{{ $index }}" {{ request('tk_smt') == $index ? 'selected' : '' }}>
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

                <!-- Import File Form -->
                <button
                    class="btn bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded transition duration-300 ease-in-out"
                    onclick="toggleModal()">
                    Import Data
                </button>

            </div>
        </div>

        <!-- Modal Background -->
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
            <!-- Modal Content -->
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Import Student Data</h3>
                    <button class="text-gray-500 hover:text-gray-700 focus:outline-none" onclick="toggleModal()">
                        ✕
                    </button>
                </div>

                <!-- Form -->
                <form action="{{ route('student.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="file" class="block text-gray-700 font-medium mb-2">Upload File:</label>
                        <input type="file" name="file" id="file" required
                            class="block w-full border-gray-300 rounded focus:ring focus:ring-blue-200">
                    </div>
                    <div class="mb-4">
                        <label for="table" class="block text-gray-700 font-medium mb-2">Select Table:</label>
                        <select name="table" id="table" required
                            class="block w-full border-gray-300 rounded focus:ring focus:ring-blue-200">
                            <option value="student_list_for_d3_t1">D3/T1</option>
                            <option value="student_list_for_d3_t2">D3/T2</option>
                            <option value="student_list_for_d4_t1">D4/T1</option>
                            <option value="student_list_for_d4_t2">D4/T2</option>
                            <option value="student_list_for_d4_t3">D4/T3</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            // Function to toggle the modal
            function toggleModal() {
                const modal = document.getElementById('modal');
                modal.classList.toggle('hidden');
            }
        </script>



        <!-- Student Table -->
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-primary text-white uppercase text-sm leading-normal">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">NIM</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">TK./SMT</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($students as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">
                            {{ $student->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $student->nim }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $student->class }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $student->tk_smt }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <a href="{{ route('student.edit', $student->id) }}"
                                class="inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded hover:bg-yellow-200">
                                Edit
                            </a>
                            <form action="{{ route('student.destroy', $student->id) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded hover:bg-red-200">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $students->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
