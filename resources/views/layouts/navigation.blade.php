<nav x-data="{ open: false }" class="bg-green-600 border-b border-green-700 shadow">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT SIDE -->
            <div class="flex items-center space-x-6">

                <!-- Logo / App Name -->
                <a href="#" class="text-white text-2xl font-bold">
                    🌿 AgriApp
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-4">

                    <a class="text-white hover:bg-green-700 px-3 py-2 rounded">Dashboard</a>
                    <a class="text-white hover:bg-green-700 px-3 py-2 rounded">Products</a>
                    <a class="text-white hover:bg-green-700 px-3 py-2 rounded">Orders</a>
                    <a class="text-white hover:bg-green-700 px-3 py-2 rounded">Customers</a>
                    <a class="text-white hover:bg-green-700 px-3 py-2 rounded">Reports</a>

                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="hidden sm:flex items-center space-x-4">

                <!-- Notifications -->
                <button class="text-white hover:bg-green-700 p-2 rounded">
                    🔔
                </button>

                <!-- User Dropdown -->
                <div class="relative">
                    <button @click="open = ! open"
                        class="flex items-center text-white hover:bg-green-700 px-3 py-2 rounded">

                        <span>{{ Auth::user()->name }}</span>
                        <svg class="ml-2 h-4 w-4 fill-current" viewBox="0 0 20 20">
                            <path d="M5.293 7.293L10 12l4.707-4.707" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open"
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-40 bg-white rounded shadow-lg">

                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- MOBILE BUTTON -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="text-white">
                    ☰
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div x-show="open" class="sm:hidden bg-green-600 px-4 pb-4 space-y-2">
        <a class="block text-white">Dashboard</a>
        <a class="block text-white">Products</a>
        <a class="block text-white">Orders</a>
        <a class="block text-white">Customers</a>
    </div>

</nav>
