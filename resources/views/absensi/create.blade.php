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
    {{-- navbar --}}
    <div class="flex m-4 w-24 lg:w-32">
        <a id="goBackLink" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-full h-auto">
        </a>
    </div>
    <div class="container mx-auto px-6 py-8">
        <!-- Content Wrapper -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-gray-700 mb-4">Pengisian Absensi</h3>
            <form method="POST" action="{{ route('absensi.store') }}" class="space-y-6">
                @csrf

                <div class="space-y-4">

                    {{-- <!-- NIM Dropdown -->
                    <div>
                        <label for="nim" class="block text-sm font-medium text-gray-700">Name</label>
                        <select name="nim" id="nim"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onchange="populateFields(this)" required>
                            <option value="">Pilih NIM</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->name }}" data-nim="{{ $student->nim }}"
                                    data-class="{{ $student->class }}" data-semester="{{ $student->semester }}"
                                    data-absent_status="{{ $student->absent_status }}">
                                    {{ $student->nim }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input name="name" type="text" id="name"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukan nama" value="{{ old('name') }}" required />
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIM Input -->
                    <div>
                        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                        <input name="nim" type="text" id="nim"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukan NIM" value="{{ old('name') }}" required />
                        @error('nim')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="class" class="block text-sm font-medium text-gray-700">Kelas</label>
                        <select name="class" id="class"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onchange="populateFields(this)" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>

                    <div>
                        <label for="meet" class="block text-sm font-medium text-gray-700">Pertemuan</label>
                        <select name="meet" id="meet"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onchange="populateFields(this)" required>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="pertemuan_{{ $i }}">
                                    Pertemuan {{ $i }}
                                </option>
                            @endfor 
                        </select>
                    </div>

                    <div>
                        <label for="room" class="block text-sm font-medium text-gray-700">Ruangan</label>
                        <select name="room" id="room"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onchange="populateFields(this)" required>
                            <option value="klinik">Klinik</option>
                            <option value="preklinik">Preklinik</option>
                    </div>

                    <div>
                        <label for="absent_status" class="block text-sm font-medium text-gray-700">Absent Status</label>
                        <select name="absent_status" id="absent_status"
                            class="form-control border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="Menunggu Konfirmasi">Hadir</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                        @error('absent_status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                    class="btn bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded transition duration-300 ease-in-out">
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
            }
        }
    </script>
    <script>
        document.getElementById('goBackLink').addEventListener('click', function(event) {
            event.preventDefault();
            window.history.back();
        });
    </script>
</body>

</html>
