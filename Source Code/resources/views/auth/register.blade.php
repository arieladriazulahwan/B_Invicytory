<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-900 min-h-screen flex items-center justify-center">

    <!-- Updated background to solid navy blue and added relative positioning for card wrapper -->
    <div class="relative w-full max-w-md">
        <!-- Added circular avatar with user icon at top center -->
        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-16 h-16 bg-blue-200 rounded-full flex items-center justify-center z-10">
            <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
        </div>

        <!-- Changed card to solid white background with shadow, removed backdrop blur -->
        <div class="bg-white shadow-xl rounded-2xl p-8 w-full pt-12">
            <h2 class="text-3xl font-bold text-center text-blue-900 mb-8">Register Akun</h2>

            <form action="/register" method="POST" class="space-y-4">
                @csrf

                <!-- Removed labels and updated input styling to gray background with darker text -->
                <div>
                    <input type="text" name="name"
                           class="w-full p-3 rounded-lg bg-gray-300 text-gray-700 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-200"
                           placeholder="Username" required>
                </div>

                <div>
                    <input type="password" name="password"
                           class="w-full p-3 rounded-lg bg-gray-300 text-gray-700 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-200"
                           placeholder="Password" required>
                </div>

                <div>
                    <input type="email" name="email"
                           class="w-full p-3 rounded-lg bg-gray-300 text-gray-700 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-200"
                           placeholder="Email" required>
                </div>

                <!-- Changed button from green to dark navy blue -->
                <button type="submit"
                    class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 rounded-lg transition mt-6">
                    Register
                </button>

                <!-- Updated link styling to blue instead of yellow -->
                <p class="text-center text-gray-700 mt-4 text-sm">
                    Sudah punya akun?
                    <a href="/login" class="text-blue-600 hover:underline font-semibold">Login</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>
