<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Include KoHo Font -->
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'KoHo', sans-serif;
            background-image: url('/images/building.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            margin: 0;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Dark overlay with 50% opacity */
            z-index: -1;
            /* Places the overlay behind the content */
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        a {
            cursor: default;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-xl px-8 py-10 max-w-xl w-full fade-in-up">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16">
        </div>
        <h1 class="text-2xl font-bold text-primary text-center mb-3">Selamat Datang</h1>
        <p class="text-center font-bold text-primary mb-6">Klik untuk Memulai Perjalanan Anda</p>
        <div class="flex justify-center gap-20">
            <a href="{{ route('klinik') }}"
                class="bg-primary hover:bg-primary-dark transition duration-200 ease-in-out text-white text-center font-bold py-2 px-4 w-48 rounded-xl">Klinik</a>
            <a href="{{ route('preklinik') }}"
                class="bg-primary hover:bg-primary-dark transition duration-200 ease-in-out text-white text-center font-bold py-2 px-4 w-48 rounded-xl">Pre-Klinik</a>
        </div>
    </div>
</body>

</html>
