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
        <div class="flex-1 p-6">
            <header class="flex items-center justify-between p-4 bg-white shadow-sm">
                <h2 class="text-2xl font-semibold">Dashboard</h2>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Logout</button>
                </form>
            </header>
            <main class="mt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-4 shadow-sm rounded">
                        <h3 class="text-xl font-semibold">Card 1</h3>
                        <p class="mt-2 text-gray-600">Content goes here...</p>
                    </div>
                    <div class="bg-white p-4 shadow-sm rounded">
                        <h3 class="text-xl font-semibold">Card 2</h3>
                        <p class="mt-2 text-gray-600">Content goes here...</p>
                    </div>
                    <div class="bg-white p-4 shadow-sm rounded">
                        <h3 class="text-xl font-semibold">Card 3</h3>
                        <p class="mt-2 text-gray-600">Content goes here...</p>
                    </div>
                </div>
                <!-- Mobile Sidebar -->
                <div class="md:hidden fixed inset-x-0 bottom-0 bg-gray-800 text-gray-200 flex justify-around py-2">
                    <a href="#"
                        class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Home</a>
                    <a href="#"
                        class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Profile</a>
                    <a href="#"
                        class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Settings</a>
                    <a href="#"
                        class="block py-2 px-4 transition duration-200 hover:bg-gray-700 hover:text-white">Logout</a>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
