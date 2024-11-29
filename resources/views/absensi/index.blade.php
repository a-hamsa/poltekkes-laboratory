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
                            <option value="0" {{ request('tk_smt') == 0 ? 'selected' : '' }}>D3/T1</option>
                            <option value="1" {{ request('tk_smt') == 1 ? 'selected' : '' }}>D3/T2</option>
                            <option value="2" {{ request('tk_smt') == 2 ? 'selected' : '' }}>D3/T3</option>
                            <option value="3" {{ request('tk_smt') == 3 ? 'selected' : '' }}>D4/T1</option>
                            <option value="4" {{ request('tk_smt') == 4 ? 'selected' : '' }}>D4/T2</option>
                            <option value="5" {{ request('tk_smt') == 5 ? 'selected' : '' }}>D4/T3</option>
                            <option value="6" {{ request('tk_smt') == 6 ? 'selected' : '' }}>D4/T4</option>
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
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">NIM</th>
                    @for ($meet = 1; $meet <= 8; $meet++)
                        <th class="border border-gray-300 px-4 py-2">Pertemuan {{ $meet }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($attendanceData as $data)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $data['name'] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $data['nim'] }}</td>
                        @for ($meet = 1; $meet <= 8; $meet++)
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                @if ($data['attendance']['pertemuan_' . $meet] == 'Menunggu Konfirmasi')
                                    <button onclick="confirmAction('{{ $data['name'] }}','{{ $data['nim'] }}', {{ $meet }})"
                                        class="text-blue-500 underline hover:text-blue-700 focus:outline-none">
                                        Confirm
                                    </button>
                                @elseif ($data['attendance']['pertemuan_' . $meet] == 'Hadir')
                                    Hadir
                                @else
                                    No Record
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="confirmationPopup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <p id="confirmationMessage" class="text-lg font-medium text-gray-700 mb-4"></p>
                <div id="formContainer"></div>
                <button onclick="hidePopup()" class="mt-4 text-red-500 hover:text-red-600">
                    Cancel
                </button>
            </div>
        </div>

        <script>
            let selectedMeet = null;
            let selectedStudent = null;

            function confirmAction(name, nim, meet) {
                document.getElementById('confirmationMessage').textContent =
                    `Do you want to confirm attendance for ${name} in Pertemuan ${meet}?`;

                const formContainer = document.getElementById('formContainer');
                formContainer.innerHTML = `
                    <form action="{{ route('absensi.update') }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="nim" value="${nim}">
                        <input type="hidden" name="meet" value="${meet}">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                            Confirm
                        </button>
                    </form>
                `;

                // Show the popup
                document.getElementById('confirmationPopup').classList.remove('hidden');
            }


            function hidePopup() {
                document.getElementById('confirmationPopup').classList.add('hidden');
                selectedMeet = null;
                selectedStudent = null;
            }

            function confirmAttendance() {
                // Handle the confirmed action here, e.g., redirect or perform an action
                console.log(`Attendance confirmed for ${selectedStudent} in Pertemuan ${selectedMeet}`);

                // Hide the popup
                hidePopup();

                // Optional: Perform additional actions (e.g., AJAX request or redirection)
            }
        </script>



    </div>
@endsection
