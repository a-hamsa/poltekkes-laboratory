<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorium</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Include KoHo Font -->
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'KoHo', sans-serif;
        }

        .hero {
            background: rgba(0, 0, 0, .65) url('{{ asset('images/building.png') }}');
            background-blend-mode: darken;
            height: 80vh;
            background-size: cover;
            background-position: center;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 1s ease-out;
        }

        .fade-in-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="flex m-4 w-24 lg:w-32">
        <img src="{{ asset('images/logo-kemenkes.png') }}" alt="Logo" class="max-w-full h-auto">
    </div>
    <div class="hero flex items-center justify-center text-center py-24 text-white fade-in">
        <div>
            <h1 class="text-5xl font-bold mb-4">Laboratorium</h1>
            <p class="text-xl">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua.</p>
        </div>
    </div>

    <div class="content text-center py-16 fade-in">
        <div class="description mb-12">
            <h2 class="text-3xl font-bold mb-4">Deskripsi</h2>
            <p class="text-lg leading-relaxed max-w-3xl mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing
                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem
                ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua.</p>
        </div>

        <div class="standards fade-in">
            <div class="title text-2xl font-bold mb-8">Standart & Formulir Kegiatan Laboratorium</div>
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700">IK -
                        Alat Laboratorium</a>
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700">SOP
                        Laboratorium</a>
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700">SOP
                        Peralatan Workshop</a>
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700">Tata
                        Tertib Lab</a>
                    <a href="#"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700">Inventaris Lab</a>
                    <a href="#"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700">Absensi Lab</a>
                    <a href="#"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700">Absensi
                        Praktikum</a>
                    <a href="#"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700">Pemakaian Lab untuk
                        praktek</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer bg-lime-500 py-4 text-center">
        <p class="mb-2">Quick Link</p>
        <div class="space-x-4">
            <a href="#" class="text-black hover:underline">Maps</a>
            <a href="#" class="text-black hover:underline">Feedback</a>
            <a href="#" class="text-black hover:underline">Link 1</a>
            <a href="#" class="text-black hover:underline">Link 2</a>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const revealElements = document.querySelectorAll('.fade-in');
    
            const handleScroll = () => {
                revealElements.forEach(element => {
                    const contentPosition = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
    
                    if (contentPosition < windowHeight - 100) {
                        element.classList.add('fade-in-visible');
                    }
                });
            };
    
            window.addEventListener('scroll', handleScroll);
            handleScroll(); // Check position on page load
        });
    </script>
</body>


</html>
