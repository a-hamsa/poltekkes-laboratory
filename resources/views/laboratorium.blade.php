<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorium</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Include KoHo Font -->
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
        .floating-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
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
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 flex flex-col items-center">
                        <i class="fas fa-flask mb-2"></i>
                        IK - Alat Laboratorium
                    </a>
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 flex flex-col items-center">
                        <i class="fas fa-file-alt mb-2"></i>
                        SOP Laboratorium
                    </a>
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 flex flex-col items-center">
                        <i class="fas fa-tools mb-2"></i>
                        SOP Peralatan Workshop
                    </a>
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 flex flex-col items-center">
                        <i class="fas fa-gavel mb-2"></i>
                        Tata Tertib Lab
                    </a>
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 flex flex-col items-center">
                        <i class="fas fa-clipboard-list mb-2"></i>
                        Inventaris Lab
                    </a>
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 flex flex-col items-center">
                        <i class="fas fa-user-check mb-2"></i>
                        Absensi Lab
                    </a>
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 flex flex-col items-center">
                        <i class="fas fa-user-clock mb-2"></i>
                        Absensi Praktikum
                    </a>
                    <a href="#" class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 flex flex-col items-center">
                        <i class="fas fa-chalkboard-teacher mb-2"></i>
                        Pemakaian Lab untuk praktek
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="floating-button">
        <a href="https://wa.me/62895360674654" class="px-4 py-2 bg-teal-600 text-white rounded-full shadow-lg hover:bg-teal-700 flex items-center justify-center fas fa-headset mr-2"></a>
    </div>

    <div class="footer bg-lime-500 py-8 text-center text-white">
        <div class="container mx-auto flex flex-wrap justify-around">
            <!-- Address Section -->
            <div class="address text-left mb-4">
                <h3 class="text-lg font-semibold mb-2">Alamat Kami</h3>
                <p class="text-sm">Jl. Wijaya Kusuma No.46, Banta-Bantaeng</p>
                <p class="text-sm">Kec. Rappocini, Kota Makassar, Sulawesi Selatan 90222</p>
                <p class="text-sm">Phone: (123) 456-7890</p>
                <p class="text-sm">Email: info@yourcompany.com</p>
            </div>
            <!-- Quick Links Section -->
            <div class="quick-links mb-4">
                <h3 class="text-lg font-semibold mb-2">Quick Links</h3>
                <div class="flex flex-col space-y-2">
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out">Maps</a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out">Feedback</a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out">Link 1</a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out">Link 2</a>
                </div>
            </div>
            <!-- Social Media Section -->
            <div class="social-media mb-4">
                <h3 class="text-lg font-semibold mb-2">Follow Us</h3>
                <div class="flex space-x-4 justify-center">
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="bg-lime-600 py-2 text-center text-xs text-white">
        <p>&copy; 2024 Poltekkes Kemenkes Makassar. All rights reserved.</p>
        <p>Designed by Code Lab UH</p>
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>


</html>
