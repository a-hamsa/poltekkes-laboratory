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
        <div class="flex justify-end items-center py-4">
            <!-- Search Form -->
            <form action="{{ route('klinik.stock') }}" method="GET" class="flex">
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
                    <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                    <!-- Sort by name -->
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                        <a
                            href="{{ route('klinik.stock', ['sort_by' => 'name', 'sort_direction' => request('sort_direction') == 'asc' ? 'desc' : 'asc']) }}">
                            Nama
                            @if (request('sort_by') == 'name')
                                {{ request('sort_direction') == 'asc' ? '↑' : '↓' }}
                            @endif
                        </a>
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Jumlah</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Keterangan</th>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($stocks as $stock)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">
                            {{ $stock->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $stock->amount }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{ $stock->description }}</td>
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
                @if ($stocks->onFirstPage())
                    <span class="px-4 py-2 text-gray-500 bg-gray-100 rounded cursor-not-allowed">Prev</span>
                @else
                    <a href="{{ $stocks->previousPageUrl() }}&search={{ request('search') }}&condition={{ request('condition') }}&sort_by={{ request('sort_by') }}&sort_direction={{ request('sort_direction') }}"
                        class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 transition duration-150 ease-in-out">Prev</a>
                @endif

                <!-- Page Numbers -->
                @for ($i = 1; $i <= $stocks->lastPage(); $i++)
                    @if ($i == $stocks->currentPage())
                        <span class="px-4 py-2 text-white bg-primary rounded">{{ $i }}</span>
                    @else
                        <a href="{{ $stocks->url($i) }}&search={{ request('search') }}&condition={{ request('condition') }}&sort_by={{ request('sort_by') }}&sort_direction={{ request('sort_direction') }}"
                            class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 transition duration-150 ease-in-out">{{ $i }}</a>
                    @endif
                @endfor

                <!-- Next -->
                @if ($stocks->hasMorePages())
                    <a href="{{ $stocks->nextPageUrl() }}&search={{ request('search') }}&condition={{ request('condition') }}&sort_by={{ request('sort_by') }}&sort_direction={{ request('sort_direction') }}"
                        class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 transition duration-150 ease-in-out">Next</a>
                @else
                    <span class="px-4 py-2 text-gray-500 bg-gray-100 rounded cursor-not-allowed">Next</span>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
