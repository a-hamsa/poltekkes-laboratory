<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorium</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'KoHo', sans-serif;
        }

        .hero {
            background: rgba(0, 0, 0, .65) url('{{ asset($banner) }}');
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

        /* Modal styles */
        .modal-open {
            overflow: hidden;
        }

        #pdf-popup {
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        /* Popup Styles */
        .popup-overlay {
            backdrop-filter: blur(5px);
        }

        .popup-content {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            padding: 20px;
            width: 90%;
            max-width: 90vw;
            height: 90vh;
            overflow: hidden;
            position: relative;
            animation: scaleIn 0.5s ease-out;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.3);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .popup-close:hover {
            background: rgba(0, 0, 0, 0.5);
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="flex justify-between items-center m-4">
        <div class="w-24 lg:w-32">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-full h-auto">
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('home') }}" class="text-primary hover:text-gray-900 font-bold">Home</a>
            <a href="{{ route('dashboard') }}" class="text-primary hover:text-gray-900 font-bold">Dasboard</a>
        </div>
    </div>
    <div class="hero flex items-center justify-center text-center py-24 text-white fade-in">
        <div>
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/kemen.png') }}" alt="Logo 2" class="w-12 h-12 mr-4">
                <img src="{{ asset('images/blu.png') }}" alt="Logo 1" class="w-12 h-12">
            </div>
            <h1 class="text-5xl font-bold mb-4">Laboratorium</h1>
            <p class="text-xl">Selamat Datang</p>
        </div>
    </div>

    <div class="content text-center py-16">
        <div class="description mb-12 fade-in">
            <h2 class="text-3xl font-bold mb-4">{{ $title }}</h2>
            <p class="text-lg leading-relaxed max-w-3xl mx-auto">{{ $description }}</p>
        </div>

        <div class="standards fade-in">
            <div class="title text-2xl font-bold mb-8">Standart & Formulir Kegiatan Laboratorium</div>
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
                    <button id="open-popup" data-pdf="{{ $dosen }}"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 duration-200 flex flex-col items-center col-span-2">
                        <i class="fas fa-flask mb-2"></i>
                        Daftar Dosen
                    </button>
                    <a href="{{ route('sop') }}"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 duration-200 flex flex-col items-center col-span-2">
                        <i class="fas fa-file-alt mb-2"></i>
                        SOP dan Instruksi Kerja
                    </a>
                    {{-- <a href="{{ route('jadwal') }}"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 duration-200 flex flex-col items-center col-span-2">
                        <i class="fas fa-tools mb-2"></i>
                        Jadwal Pemakaian Lab
                    </a> --}}
                    <button id="open-popup" data-pdf="{{ $tatib }}"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 duration-200 flex flex-col items-center col-span-2">
                        <i class="fas fa-gavel mb-2"></i>
                        Tata Tertib
                    </button>
                    {{-- <a href="{{ route('preklinik.inventory') }}"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 duration-200 flex flex-col items-center col-span-2 lg:col-start-2">
                        <i class="fas fa-clipboard-list mb-2"></i>
                        Inventarisasi Alat
                    </a> --}}
                    {{-- <a href=" {{ route('absensi.create') }}"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 duration-200 flex flex-col items-center col-span-2">
                        <i class="fas fa-user-check mb-2"></i>
                        Absensi Mahasiswa
                    </a> --}}
                    {{-- <a href="{{ route('preklinik.stock') }}"
                        class="px-8 py-4 bg-teal-600 text-white rounded-lg shadow hover:bg-teal-700 duration-200 flex flex-col items-center col-span-2 md:col-start-2 lg:col-start-auto">
                        <i class="fas fa-user-clock mb-2"></i>
                        Stok Bahan Habis Pakai
                </a> --}}

                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Floating Button -->
    <div class="floating-button">
        <a href="https://wa.me/62895360674654"
            class="px-4 py-2 bg-teal-600 text-white rounded-full shadow-lg hover:bg-teal-700 flex items-center justify-center fas fa-headset mr-2"></a>
    </div> --}}

    <!-- Footer -->
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
            {{-- <div class="quick-links mb-4">
                <h3 class="text-lg font-semibold mb-2">Quick Links</h3>
                <div class="flex flex-col space-y-2">
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out">Maps</a>
                    <a href="#"
                        class="text-white hover:text-black transition duration-300 ease-in-out">Feedback</a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out">Link 1</a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out">Link 2</a>
                </div>
            </div> --}}
            <!-- Social Media Section -->
            <div class="social-media mb-4">
                <h3 class="text-lg font-semibold mb-2">Follow Us</h3>
                <div class="flex space-x-4 justify-center">
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out"><i
                            class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white hover:text-black transition duration-300 ease-in-out"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="bg-lime-600 py-2 text-center text-xs text-white">
        <p>&copy; 2024 Poltekkes Kemenkes Makassar. All rights reserved.</p>
        <p>Designed by Code Lab UH</p>
    </div>

    <!-- Popup Modal -->
    <div id="pdf-popup"
        class="fixed inset-0 popup-overlay flex items-center justify-center opacity-0 invisible transition-opacity duration-300 transform scale-75">
        <div class="popup-content">
            <button id="close-popup" class="popup-close">
                &times;
            </button>
            <iframe id="pdf-frame" src="" class="w-full h-full" frameborder="0"></iframe>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openPopupButtons = document.querySelectorAll('#open-popup');
            const closePopup = document.getElementById('close-popup');
            const pdfPopup = document.getElementById('pdf-popup');
            const pdfFrame = document.getElementById('pdf-frame');

            // Open popup for each button
            openPopupButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    console.log("Button clicked"); // Add this log
                    const pdfUrl = this.getAttribute('data-pdf');
                    pdfFrame.src = pdfUrl; // Set the PDF source
                    event.preventDefault(); // Prevent default anchor behavior
                    console.log("Opening popup with URL:", pdfUrl); // Add this log
                    pdfPopup.classList.remove('opacity-0', 'invisible', 'scale-75');
                    pdfPopup.classList.add('opacity-100', 'visible', 'scale-100');
                    document.body.classList.add('modal-open');
                });
            });

            // Close popup
            closePopup.addEventListener('click', function() {
                console.log("Close button clicked"); // Add this log
                pdfPopup.classList.remove('opacity-100', 'visible', 'scale-100');
                pdfPopup.classList.add('opacity-0', 'invisible', 'scale-75');
                document.body.classList.remove('modal-open');
            });

            // Fade-in and lift effect on scroll
            const fadeInElements = document.querySelectorAll('.fade-in');

            const handleScroll = () => {
                fadeInElements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;

                    if (elementPosition < windowHeight - 100) {
                        element.classList.add('fade-in-visible');
                    } else {
                        element.classList.remove('fade-in-visible');
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
