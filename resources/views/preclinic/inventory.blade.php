<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'KoHo', sans-serif;
        }
    </style>
</head>

<body>
    {{-- navbar --}}
    <div class="flex m-4 w-24 lg:w-32">
        <a href="{{ route('preklinik') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-full h-auto">
        </a>
    </div>
    <div class="container mx-auto px-6 pb-4">
        {{-- filter & search bar --}}
        <div class="flex justify-between items-center py-4">
            <!-- Filter by Condition -->
            <form action="{{ route('klinik.inventory') }}" method="GET"
                class="flex items-center space-x-4 bg-white shadow-md rounded-full p-2 px-6">
                <label for="condition" class="text-gray-600 font-medium">Filter:</label>
                <select name="condition" id="condition" onchange="this.form.submit()"
                    class="w-48 bg-gray-100 px-4 py-2 border border-transparent rounded-full text-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="" class="text-gray-400">Semua</option>
                    <option value="Berfungsi" {{ request('condition') == 'Berfungsi' ? 'selected' : '' }}>Berfungsi
                    </option>
                    <option value="Rusak" {{ request('condition') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
                <input type="hidden" name="search" value="{{ request('search') }}">
            </form>
            <!-- Search Form -->
            <form action="{{ route('klinik.inventory') }}" method="GET" class="flex">
                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                    class="px-4 py-2 border rounded-l-md">
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-r-md">Search</button>
                <input type="hidden" name="condition" value="{{ request('condition') }}">
            </form>
        </div>

        {{-- Table --}}
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-primary text-white uppercase text-sm leading-normal">
                <tr>
                    <!-- Sort by name -->
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Gambar</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                        <a
                            href="{{ route('klinik.inventory', ['sort_by' => 'name', 'sort_direction' => request('sort_direction') == 'asc' ? 'desc' : 'asc']) }}">
                            Nama
                            @if (request('sort_by') == 'name')
                                {{ request('sort_direction') == 'asc' ? '↑' : '↓' }}
                            @endif
                        </a>
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Jumlah</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Kondisi</th>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($inventories as $inventory)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center flex items-center justify-center">
                            <img src="{{ asset('storage/' . $inventory->image) }}" alt="Inventory Image"
                                class="w-12 h-12 object-cover rounded">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                            {{ $inventory->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $inventory->amount }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ $inventory->condition == 'Berfungsi' ? 'bg-green-100 text-green-800' : ($inventory->condition == 'Rusak' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ $inventory->condition }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="container mx-auto px-6 pb-4">
            <!-- Existing search and filter forms -->

            <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Table headers and rows -->
            </table>

            <!-- Pagination Links with Filters -->
            <div class="mt-4 flex justify-center space-x-2">
                <!-- Prev -->
                @if ($inventories->onFirstPage())
                    <span class="px-4 py-2 text-gray-500 bg-gray-100 rounded cursor-not-allowed">Prev</span>
                @else
                    <a href="{{ $inventories->previousPageUrl() }}&search={{ request('search') }}&condition={{ request('condition') }}&sort_by={{ request('sort_by') }}&sort_direction={{ request('sort_direction') }}"
                        class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 transition duration-150 ease-in-out">Prev</a>
                @endif

                <!-- Page Numbers -->
                @for ($i = 1; $i <= $inventories->lastPage(); $i++)
                    @if ($i == $inventories->currentPage())
                        <span class="px-4 py-2 text-white bg-primary rounded">{{ $i }}</span>
                    @else
                        <a href="{{ $inventories->url($i) }}&search={{ request('search') }}&condition={{ request('condition') }}&sort_by={{ request('sort_by') }}&sort_direction={{ request('sort_direction') }}"
                            class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 transition duration-150 ease-in-out">{{ $i }}</a>
                    @endif
                @endfor

                <!-- Next -->
                @if ($inventories->hasMorePages())
                    <a href="{{ $inventories->nextPageUrl() }}&search={{ request('search') }}&condition={{ request('condition') }}&sort_by={{ request('sort_by') }}&sort_direction={{ request('sort_direction') }}"
                        class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 transition duration-150 ease-in-out">Next</a>
                @else
                    <span class="px-4 py-2 text-gray-500 bg-gray-100 rounded cursor-not-allowed">Next</span>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
