<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Added CSS animations -->
    <style>
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

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
                transform: scale(0.95);
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

        .animate-slide-down {
            animation: slideDown 0.6s ease-out;
        }

        .animate-scale-in {
            animation: scaleIn 0.5s ease-out;
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease-out;
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        .input-animate {
            animation: slideUp 0.6s ease-out;
        }

        .input-animate:nth-child(1) { animation-delay: 0.1s; }
        .input-animate:nth-child(2) { animation-delay: 0.2s; }
        .input-animate:nth-child(3) { animation-delay: 0.3s; }

        input:focus {
            animation: none;
        }
    </style>
</head>
<body class="bg-blue-900 min-h-screen flex items-center justify-center">

    <!-- Updated background to solid navy blue and added relative positioning for card wrapper -->
    <div class="relative w-full max-w-md">
        <!-- Added scale-in animation to avatar -->
        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-16 h-16 bg-blue-200 rounded-full flex items-center justify-center z-10 animate-scale-in">
            <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
        </div>

        <!-- Added slide-up animation to card -->
        <div class="bg-white shadow-xl rounded-2xl p-8 w-full pt-12 animate-slide-up">
            <!-- Added fade-in animation to heading -->
            <h2 class="text-3xl font-bold text-center text-blue-900 mb-8 animate-fade-in" style="animation-delay: 0.2s;">Register Akun</h2>

            <form action="/register" method="POST" class="space-y-4">
                @csrf

                <!-- Added staggered slide-up animation to input fields -->
                <div class="input-animate">
                    <input type="text" name="name"
                           class="w-full p-3 rounded-lg bg-gray-300 text-gray-700 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-200"
                           placeholder="Username" required>
                </div>

                <div class="input-animate">
                    <input type="password" name="password"
                           class="w-full p-3 rounded-lg bg-gray-300 text-gray-700 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-200"
                           placeholder="Password" required>
                </div>

                <div class="input-animate">
                    <input type="email" name="email"
                           class="w-full p-3 rounded-lg bg-gray-300 text-gray-700 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-200"
                           placeholder="Email" required>
                </div>

                <!-- Added fade-in animation with delay to button -->
                <button type="submit"
                    class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 rounded-lg transition mt-6 animate-fade-in"
                    style="animation-delay: 0.4s;">
                    Register
                </button>

                <!-- Added fade-in animation to login link -->
                <p class="text-center text-gray-700 mt-4 text-sm animate-fade-in" style="animation-delay: 0.5s;">
                    Sudah punya akun?
                    <a href="/login" class="text-blue-600 hover:underline font-semibold">Login</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>
