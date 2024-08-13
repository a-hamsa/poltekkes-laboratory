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

<body class="bg-gray-100 text-gray-800">
    <div class="flex m-4 w-24 lg:w-32">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-full h-auto">
    </div>
    <div class="flex">
        <!-- Sidebar -->
        <div class="hidden flex md:flex sidebar w-64 text-gray-200 min-h-screen">
            <nav class="flex flex-col flex-grow mt-10">
                <a href="{{ route('dashboard') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-primary-dark hover:text-white">Home</a>
                <a href="{{ route('dashboarddesc') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-primary-dark hover:text-white">Description</a>
                <a href="{{ route('dashboardbanner') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-primary-dark hover:text-white">Banner</a>
                <a href="{{ route('dashboardschedule') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-primary-dark hover:text-white">Schedule</a>
                <a href="{{ route('inventory.index') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-primary-dark hover:text-white">Inventory</a>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex flex-grow flex-col">
            <div class="flex-2 px-5 pb-6">
                <header
                    class="card flex flex-row bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden items-center justify-between p-4">
                    <h2 class="text-2xl font-semibold">{{ session('header') }}</h2>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark transition duration-300 ease-in-out">Logout</button>
                    </form>
                </header>
            </div>
            @yield('content')
        </div>

    </div>

    <!-- Popup container for success -->
    <div id="success-popup"
        class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50 transition-opacity duration-300 ease-out"
        onclick="closePopup(event)">
        <div id="popup-content"
            class="bg-white border border-green-300 text-green-800 px-6 py-4 rounded-lg shadow-lg transform transition-transform transition-opacity duration-300 ease-out scale-50 opacity-0"
            onclick="event.stopPropagation()">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <strong class="font-bold">Success!</strong>
            </div>
            <span class="block mt-2">{{ session('success') }}</span>
            <button onclick="closePopup(event)" class="absolute top-2 right-2 text-green-800 hover:text-green-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Popup container for error -->
    <div id="error-popup"
        class="fixed inset-0 flex items-center justify-center z-50 hidden bg-black bg-opacity-50 transition-opacity duration-300 ease-out"
        onclick="closePopup(event)">
        <div id="error-content"
            class="bg-white border border-red-300 text-red-800 px-6 py-4 rounded-lg shadow-lg transform transition-transform transition-opacity duration-300 ease-out scale-50 opacity-0"
            onclick="event.stopPropagation()">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12">
                    </path>
                </svg>
                <strong class="font-bold">Error!</strong>
            </div>
            <span class="block mt-2">{{ session('error') }}</span>
            <button onclick="closePopup(event)" class="absolute top-2 right-2 text-red-800 hover:text-red-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = '{{ session('success') }}';
            const errorMessage = '{{ session('error') }}';

            if (successMessage) {
                const popup = document.getElementById('success-popup');
                const popupContent = document.getElementById('popup-content');
                popup.classList.remove('hidden');
                setTimeout(() => {
                    popupContent.classList.remove('scale-50', 'opacity-0');
                    popupContent.classList.add('scale-100', 'opacity-100');
                }, 10); // Slight delay to trigger the transition
            } else if (errorMessage) {
                const popup = document.getElementById('error-popup');
                const popupContent = document.getElementById('error-content');
                popup.classList.remove('hidden');
                setTimeout(() => {
                    popupContent.classList.remove('scale-50', 'opacity-0');
                    popupContent.classList.add('scale-100', 'opacity-100');
                }, 10); // Slight delay to trigger the transition
            }
        });

        function closePopup(event) {
            if (event) {
                event.stopPropagation(); // Prevent event bubbling if this function is called by clicking on the content
            }
            const successPopup = document.getElementById('success-popup');
            const errorPopup = document.getElementById('error-popup');
            const successContent = document.getElementById('popup-content');
            const errorContent = document.getElementById('error-content');

            if (successPopup && !successPopup.classList.contains('hidden')) {
                successContent.classList.remove('scale-100', 'opacity-100');
                successContent.classList.add('scale-50', 'opacity-0');
                setTimeout(() => successPopup.classList.add('hidden'), 300); // Match the transition duration
            } else if (errorPopup && !errorPopup.classList.contains('hidden')) {
                errorContent.classList.remove('scale-100', 'opacity-100');
                errorContent.classList.add('scale-50', 'opacity-0');
                setTimeout(() => errorPopup.classList.add('hidden'), 300); // Match the transition duration
            }
        }
    </script>
</body>

</html>
