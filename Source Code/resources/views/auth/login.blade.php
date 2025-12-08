<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-blue-900 shadow-xl rounded-2xl p-8 w-full max-w-md border border-blue-800 relative">
        <!-- Icon Circle -->
        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-16 h-16 bg-blue-200 rounded-full flex items-center justify-center">
            <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
        </div>

        <h2 class="text-3xl font-bold text-center text-white mb-8 mt-6">Login Akun</h2>
        
        @if(session('error'))
            <p class="text-red-300 text-center mb-3">{{ session('error') }}</p>
        @endif
        
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <input type="email" name="email"
                       class="w-full p-3 rounded-lg bg-white text-blue-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-200"
                       placeholder="Username" required>
            </div>
            
            <div>
                <input type="password" name="password"
                       class="w-full p-3 rounded-lg bg-white text-blue-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-200"
                       placeholder="Password" required>
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="showPassword" class="w-4 h-4 text-blue-200">
                <label for="showPassword" class="ml-2 text-white text-sm">Show Password</label>
            </div>
            
            <button type="submit"
                    class="w-full bg-white hover:bg-gray-100 text-blue-900 font-semibold py-3 rounded-lg transition">
                Sign In
            </button>
            
            <p class="text-center text-blue-200 mt-4 text-sm">
                <a href="/register" class="hover:underline">Register here</a>
            </p>

        </form>
    </div>
</body>
</html>