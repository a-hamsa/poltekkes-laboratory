<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Include KoHo Font -->
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'KoHo', sans-serif;
        }

        .sidebar {
            background-color: #11AAB8;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-6 py-8">
        <!-- Content Wrapper -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-700 mb-4">Tambah Absen</h3>
            <form method="POST" action="{{ route('absensi.store') }}" class="space-y-6">
                @csrf

                <div class="space-y-4">
                    <!-- Semester Dropdown -->
                    <div>
                        <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                        <select
                            name="semester"
                            id="semester"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onchange="populateFields(this)"
                            required
                        >
                            <option value="">Select Semester</option>
                            @foreach($semesters as $semester)
                                <option value="{{ $semester->id }}" data-semester="{{ $semester->name }}">
                                    {{ $semester->semester }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Name Dropdown -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <select
                            name="name"
                            id="name"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onchange="populateFields(this)"
                            required
                        >
                            <option value="">Select Name</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" data-nim="{{ $student->nim }}" data-class="{{ $student->class }}" data-semester="{{ $student->semester }}" data-absent_status="{{ $student->absent_status }}">
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                        <input
                            name="nim"
                            type="text"
                            id="nim"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter NIM"
                            value="{{ old('nim') }}"
                            required
                        />
                        @error('nim')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
                        <input
                            name="class"
                            type="text"
                            id="class"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter class"
                            value="{{ old('class') }}"
                            required
                        />
                        @error('class')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="absent_status" class="block text-sm font-medium text-gray-700">Absent Status</label>
                        <select
                            name="absent_status"
                            id="absent_status"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                            <option value="">Select Status</option>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                            <option value="Excused">Excused</option>
                        </select>
                        @error('absent_status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button
                    type="submit"
                    class="btn bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded transition duration-300 ease-in-out"
                >
                    Save
                </button>
            </form>
        </div>
    </div>

    <script>
        function populateFields(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            if (selectElement.id === 'name') {
                document.getElementById('nim').value = selectedOption.getAttribute('data-nim');
                document.getElementById('class').value = selectedOption.getAttribute('data-class');
                document.getElementById('absent_status').value = selectedOption.getAttribute('data-absent_status');
            } else if (selectElement.id === 'semester') {
                // Optional: Handle semester specific logic if needed
                // For now, just set an example value
                console.log('Semester selected:', selectedOption.getAttribute('data-semester'));
            }
        }
    </script>
</body>
</html>
