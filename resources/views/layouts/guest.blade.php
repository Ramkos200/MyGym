<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MyGym - Authentication</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600&display=swap');

        body {
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased dark:bg-gray-900">
    <!-- Background image with overlay -->
    <div class="fixed inset-0 -z-30 bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80')">
    </div>
    <div class="fixed inset-0 -z-20 bg-black/60"></div>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Logo -->
        <div class="mb-8">
            <a href="/" class="flex items-center justify-center">
                <div
                    class="w-20 h-20 fill-current text-white flex items-center justify-center bg-green-500/20 backdrop-blur-sm rounded-full p-4 border border-green-400/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
            </a>
            <h1 class="text-3xl font-bold text-center mt-4 text-white">My<span class="text-green-400">Gym</span></h1>
        </div>

        <!-- Auth Card -->
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/95 dark:bg-gray-800/95 backdrop-blur-sm shadow-md overflow-hidden sm:rounded-lg border border-white/20">
            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input id="email" type="email" name="email" required autofocus autocomplete="username"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                </div>

                <div class="mb-4">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                </div>

                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-gray-300 dark:border-gray-600 text-green-600 shadow-sm focus:ring-green-500 dark:bg-gray-700">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">Remember me</span>
                    </label>

                    <a href="{{ route('password.request') }}"
                        class="text-sm text-green-600 dark:text-green-400 hover:text-green-500">
                        Forgot your password?
                    </a>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                        Log in
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <div class="flex flex-col items-center justify-center gap-4 text-center">
                <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account?
                </p>
                <p class="inline-block font-medium text-green-600 dark:text-green-400 hover:text-green-500 text-sm">
                    For registering an account please ask your Gym admin
                </p>
            </div>
        </div>
    </div>
</body>

</html>
