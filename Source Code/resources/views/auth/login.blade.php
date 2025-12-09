<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Added animations for login page elements */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease-out;
        }

        .animate-scale-in {
            animation: scaleIn 0.5s ease-out;
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }

        /* Added button hover animation */
        button {
            transition: all 0.3s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-blue-900 shadow-xl rounded-2xl p-8 w-full max-w-md border border-blue-800 relative animate-slide-up">
        <!-- Icon Circle -->
        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-16 h-16 bg-blue-200 rounded-full flex items-center justify-center animate-scale-in">
            <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
        </div>

        <h2 class="text-3xl font-bold text-center text-white mb-8 mt-6 animate-fade-in delay-100">Login Akun</h2>
        
        @if(session('error'))
            <p class="text-red-300 text-center mb-3 animate-fade-in">{{ session('error') }}</p>
        @endif
        
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="animate-slide-up delay-200">
                <input type="email" name="email"
                       class="w-full p-3 rounded-lg bg-white text-blue-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                       placeholder="Username" required>
            </div>
            
            <div class="animate-slide-up delay-300">
                <input type="password" name="password"
                       class="w-full p-3 rounded-lg bg-white text-blue-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-200 transition"
                       placeholder="Password" required>
            </div>

            <div class="flex items-center animate-slide-up delay-400">
                <input type="checkbox" id="showPassword" class="w-4 h-4 text-blue-200">
                <label for="showPassword" class="ml-2 text-white text-sm">Show Password</label>
            </div>
            
            <button type="submit"
                    class="w-full bg-white hover:bg-gray-100 text-blue-900 font-semibold py-3 rounded-lg transition animate-slide-up delay-400">
                Sign In
            </button>
            
            <p class="text-center text-blue-200 mt-4 text-sm animate-fade-in delay-300">
                <a href="/register" class="hover:underline">Register here</a>
            </p>

        </form>
    </div>

    <script>
        document.getElementById('showPassword').addEventListener('change', function () {
            const passwordInput = document.querySelector('input[name="password"]');
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>

</body>
</html>
