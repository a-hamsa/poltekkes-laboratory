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
        <div class="hidden md:flex sidebar w-64 text-gray-200 min-h-screen">
            <nav class="mt-10">
                <a href="#"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">Home</a>
                <a href="#"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">Profile</a>
                <a href="#"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">Settings</a>
                <a href="#"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">Logout</a>
            </nav>
        </div>
        <!-- Main Content -->
        @yield('content')
        
    </div>
</body>

</html>
