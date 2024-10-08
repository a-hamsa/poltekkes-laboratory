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
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-full h-auto">
        </a>
    </div>
    <div class="flex">
        <!-- Sidebar -->
        <div class="hidden md:flex flex-none sidebar w-60 text-gray-200 min-h-screen">
            <nav class="flex flex-col flex-grow mt-10">
                <a href="{{ route('dashboard') }}"
                    class="block py-2.5 px-4 rounded font-bold transition duration-200 {{ session('header') == 'Dashboard' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">Home</a>
                <a href="{{ route('student.index') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Daftar Nama Siswa' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">Daftar
                    Mahasiswa</a>
                <a href="{{ route('absensi.index') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Rekap Absensi' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">Rekap
                    Absensi</a>
                <a href="{{ route('sop.index') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'SOP dan Instruksi Kerja' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">SOP
                    & IK</a>
                <a href="{{ route('schedules.index') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Jadwal Penggunaan Lab' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">
                    Jadwal
                </a>
                <div x-data="{
                    open: JSON.parse(localStorage.getItem('open_klinik')) || false,
                    toggleOpen() {
                        this.open = !this.open;
                        localStorage.setItem('open_klinik', JSON.stringify(this.open));
                    }
                }" x-init="open = JSON.parse(localStorage.getItem('open_klinik')) || false" class="space-y-2" x-cloack>

                    <button @click="toggleOpen()"
                        class="block py-2.5 px-4 rounded transition duration-200 font-bold hover:bg-primary-dark hover:text-white w-full text-left flex items-center justify-between">
                        <span>Klinik</span>
                        <svg :class="open ? 'transform rotate-180' : 'transform rotate-0'"
                            class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" class="space-y-2 ml-3" x-cloak>
                        <a href="{{ route('dashboardbanner') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Banner Klinik' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">
                            Banner
                        </a>
                        <a href="{{ route('dashboarddesc') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Deskripsi Klinik' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">
                            Deskripsi
                        </a>
                        <a href="{{ route('inventory.index') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Daftar Inventaris' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">Inventaris</a>
                        <a href="{{ route('stok.index') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Stok Bahan Habis Pakai' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">Stok
                            Bahan</a>
                        <a href="{{ route('dashboarddosen') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Daftar Nama Dosen' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">
                            Dosen
                        </a>
                        <a href="{{ route('dashboardtatib') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Tata tertib lab' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">
                            Tatib
                        </a>
                    </div>
                </div>
                <div x-data="{
                    open: JSON.parse(localStorage.getItem('open_preklinik')) || false,
                    toggleOpen() {
                        this.open = !this.open;
                        localStorage.setItem('open_preklinik', JSON.stringify(this.open));
                    }
                }" x-init="open = JSON.parse(localStorage.getItem('open_preklinik')) || false" class="space-y-2" x-cloack>
                    <button @click="toggleOpen()"
                        class="block py-2.5 px-4 rounded transition duration-200 font-bold hover:bg-primary-dark hover:text-white w-full text-left flex items-center justify-between">
                        <span>Pre-Klinik</span>
                        <svg :class="open ? 'transform rotate-180' : 'transform rotate-0'"
                            class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" class="space-y-2 ml-3" x-cloak>
                        <a href="{{ route('prebanner') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Banner Pre-Klinik' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">
                            Banner
                        </a>
                        <a href="{{ route('predesc') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Deskripsi Pre-Klinik' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">
                            Deskripsi
                        </a>
                        <a href="{{ route('preinventory.index') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Daftar Inventaris Pre-Klinik' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">Inventaris</a>
                        <a href="{{ route('prestok.index') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Stok Bahan Habis Pakai' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">Stok
                            Bahan</a>
                        <a href="{{ route('predosen') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Daftar Nama Dosen Pre-Klinik' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">
                            Dosen
                        </a>
                        <a href="{{ route('pretatib') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 {{ session('header') == 'Tata Tertib lab' ? 'bg-primary-dark text-white' : 'hover:bg-primary-dark hover:text-white' }}">
                            Tatib
                        </a>
                    </div>
                </div>
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
    <!-- Mobile Navigation Bar -->
    <div
        class="md:hidden mobile-navbar fixed inset-x-0 bottom-0 bg-gray-800 text-gray-200 flex justify-around py-3 shadow-lg z-50">
        <a href="{{ route('dashboard') }}"
            class="flex flex-col items-center transition duration-200 hover:bg-gray-700 hover:text-white py-2 px-3 rounded">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l-7 7-7-7m14 0v10a1 1 0 01-1 1h-3m-10 0a1 1 0 01-1-1V10" />
            </svg>
            <span class="text-xs">Home</span>
        </a>

        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open"
                class="flex flex-col items-center transition duration-200 hover:bg-gray-700 hover:text-white py-2 px-3 rounded">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
                <span class="text-xs">Klinik</span>
            </button>
            <!-- Dropdown for Klinik -->
            <div x-show="open" @click.away="open = false"
                class="absolute bottom-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-gray-200 rounded shadow-lg z-10 py-2 w-48">
                <a href="{{ route('dashboardbanner') }}"
                    class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Banner</a>
                <a href="{{ route('dashboarddesc') }}"
                    class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Deskripsi</a>
                <a href="{{ route('schedules.index') }}"
                    class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Jadwal</a>
                <a href="{{ route('inventory.index') }}"
                    class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Inventaris</a>
            </div>
        </div>

        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open"
                class="flex flex-col items-center transition duration-200 hover:bg-gray-700 hover:text-white py-2 px-3 rounded">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
                <span class="text-xs">Pre-Klinik</span>
            </button>
            <!-- Dropdown for Pre-Klinik -->
            <div x-show="open" @click.away="open = false"
                class="absolute bottom-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-gray-200 rounded shadow-lg z-10 py-2 w-48">
                <a href="{{ route('prebanner') }}"
                    class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Banner</a>
                <a href="{{ route('predesc') }}"
                    class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Deskripsi</a>
                <a href="{{ route('preschedule') }}"
                    class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Jadwal</a>
                <a href="{{ route('preinventory.index') }}"
                    class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Inventaris</a>
            </div>
        </div>
    </div>


    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let lastScrollTop = 0;
            const navbar = document.querySelector('.mobile-navbar');

            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (scrollTop > lastScrollTop) {
                    // Downscroll - hide navbar
                    navbar.classList.add('translate-y-full');
                } else {
                    // Upscroll - show navbar
                    navbar.classList.remove('translate-y-full');
                }

                lastScrollTop = scrollTop;
            });
        });
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
