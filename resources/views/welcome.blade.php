<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            dark: 'class',
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
</head>

<body class="dark bg-[#0a0a0a] min-h-screen overflow-hidden">
    <!-- Background image with overlay -->
    <div class="fixed inset-0 -z-30 bg-cover bg-center opacity-70"
        style="background-image: url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80')">
    </div>
    <div class="fixed inset-0 -z-20 bg-black/70"></div>

    <!-- Animated background elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden ">
        <!-- Floating circles -->
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-green-600/30 rounded-full animate-float"></div>
        <div
            class="absolute top-1/3 right-1/4 w-48 h-48 bg-green-700/30 rounded-full animate-float animation-delay-1000">
        </div>
        <div
            class="absolute bottom-1/4 left-1/3 w-56 h-56 bg-green-800/30 rounded-full animate-float animation-delay-2000">
        </div>

        <!-- Pulse elements -->
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 border border-green-600/30 rounded-full animate-pulse">
        </div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 border border-green-700/30 rounded-full animate-pulse animation-delay-2000">
        </div>
    </div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen p-6 lg:p-8">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
            <nav class="flex flex-col items-center justify-end gap-4">
                <h1 class="font-light text-8xl text-green-500 mb-6 animate-float drop-shadow-lg">MyGym</h1>
                <a href="/login"
                    class="inline-block px-5 py-1.5 text-[#EDEDEC] border-[#3E3E3A] hover:border-[#62605b] border rounded-sm text-sm leading-normal transition-all duration-300 hover:scale-105 bg-black/30 backdrop-blur-sm">
                    Log in
                </a>
            </nav>
        </header>

        <!-- Subtle tagline -->
        <p class="text-[#EDEDEC] text-center mt-8 max-w-md opacity-80 text-lg font-light">Transform your body. Transform
            your life.</p>
    </div>

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.05);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-pulse {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .animation-delay-1000 {
            animation-delay: 1s;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
</body>

</html>
