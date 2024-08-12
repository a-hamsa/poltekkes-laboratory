<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-teal-500">

    <div class="w-full max-w-xs">
        <div class="bg-white shadow-lg rounded-lg px-8 py-10">
            <div class="mb-6 text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto h-12">
                <h2 class="text-xl font-semibold mt-4">Login as Admin</h2>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input type="email" name="email" id="email" required class="border-teal-500 border-2 rounded-full w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-gray-400">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input type="password" name="password" id="password" required class="border-teal-500 border-2 rounded-full w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-gray-400">
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-3 px-4 rounded-full focus:outline-none focus:shadow-outline w-full">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
