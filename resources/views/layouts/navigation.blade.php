
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Add smooth transitions */
        .mobile-menu-overlay {
            transition: opacity 0.3s ease-in-out;
        }

        .mobile-menu-container {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <nav x-data="{
        open: false,
        atTop: true,
        isHome: {{ request()->is('/') ? 'true' : 'false' }},
        isProductPage: {{ request()->is('products*') ? 'true' : 'false' }},
        mobileMenuOpen: false,
        scrolled: false,
        productCategories: [
            { name: 'All Products', route: '/products' },
            { name: 'Category 1', route: '/products/category-1' },
            { name: 'Category 2', route: '/products/category-2' },
            { name: 'Category 3', route: '/products/category-3' }
        ],
        closeMobileMenu() {
            this.mobileMenuOpen = false;
        },
        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen;
        },
        resetDropdowns() {
            this.open = false;
            this.mobileMenuOpen = false;
        }
    }"
    x-init="() => {
        window.addEventListener('scroll', () => {
            atTop = (window.pageYOffset < 50);
            scrolled = window.pageYOffset > 10;
        });

        // Reset dropdowns on navigation
        window.addEventListener('popstate', () => {
            resetDropdowns();
        });

        // Reset dropdowns when clicking internal links
        document.addEventListener('click', (e) => {
            if (e.target.tagName === 'A' && e.target.href && e.target.href.startsWith(window.location.origin)) {
                resetDropdowns();
            }
        });
    }"
    :class="{
        'bg-white shadow-md': scrolled,
        'bg-transparent': !scrolled && isHome,
        'bg-white': !scrolled && !isHome
    }"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="shrink-0 flex items-center space-x-2">
                    <a href="/" class="flex items-center">
                        <!-- Logo Image -->
                        <img src="{{ asset('storage/products/logo 2.png') }}" alt="Logo" class="h-8 transition-opacity duration-300">

                        <!-- Logo Text -->
                        <span
                            class="ml-2 text-lg font-bold text-gray-900 md:text-lg"
                            :class="{
                                'text-gray-900': scrolled || !isHome,
                                'text-white': !scrolled && isHome
                            }"
                        >
                            <span class="hidden md:inline">CV JAYA GIRY</span>
                            <span class="md:hidden">JG</span>
                        </span>
                    </a>
                </div>
                <!-- Desktop Navigation -->
                <div class="hidden md:flex flex-1 justify-center">
                    @php
                        $navItems = [
                            '/' => 'HOME',
                            '/about' => 'ABOUT US',
                            '/products' => 'PRODUCTS',
                            '/news' => 'NEWS',
                            '/service' => 'SERVICE',
                        ];
                    @endphp

                    <div class="flex items-center space-x-1">
                        @foreach ($navItems as $route => $label)
                            @if (!$loop->first)
                                <div :class="{
                                    'bg-gray-400 bg-opacity-50': !isHome || !atTop,
                                    'bg-gray-400 bg-opacity-25': isHome && atTop
                                }"
                                    class="h-4 w-px mx-1"></div>
                            @endif

                            <!-- Modified Products Menu for Desktop -->
                            @if ($route === '/products')
                                <div class="relative" x-data="{ open: false }" x-init="open = false">
                                    <button @click="open = !open" @click.away="open = false"
                                        :class="{
                                            'text-green-500': isProductPage && !atTop,
                                            'text-white': isHome && atTop,
                                            'text-gray-700': !isProductPage && (!isHome || !atTop),
                                            'text-gray-300': !isProductPage && isHome && atTop,
                                            'hover:text-green-500': !isHome || !atTop,
                                            'hover:text-white': isHome && atTop
                                        }"
                                        class="inline-flex items-center px-1 pt-1 transition duration-150 ease-in-out">
                                        {{ $label }}
                                        <svg :class="{'rotate-180': open}" class="ml-1 h-4 w-4 transform transition-transform duration-200"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <!-- Desktop Product Dropdown -->
                                    <div x-show="open" x-cloak
                                        @click.away="open = false"
                                        x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute z-50 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                        <div class="py-1">
                                            <a href="{{ route('products') }}"
                                                class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100">All Products</a>
                                            @foreach ($categories as $category)
                                                <a href="{{ route('products', ['category_id' => $category->id]) }}"
                                                    class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    {{ $category->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{ $route }}"
                                    :class="{
                                        'text-green-500': (
                                            ('{{ request()->is(ltrim($route, '/')) }}' && !atTop) ||
                                            ('{{ $route }}' === '/' && !atTop && isHome) ||
                                            ('{{ $route }}' === '/news' && '{{ request()->is('news') }}') ||
                                            ('{{ $route }}' === '/about' && '{{ request()->is('about') }}') ||
                                            ('{{ $route }}' === '/service' && '{{ request()->is('service') }}')
                                        ),
                                        'text-white': '{{ $route }}' === '/' && isHome && atTop,
                                        'text-gray-700': (
                                            !'{{ request()->is(ltrim($route, '/')) }}' && (!isHome || !atTop)
                                        ) || ('{{ $route }}' === '/' && !isHome),
                                        'text-gray-300': !'{{ request()->is(ltrim($route, '/')) }}' && isHome && atTop,
                                        'hover:text-green-500': !isHome || !atTop,
                                        'hover:text-white': isHome && atTop
                                    }"
                                    class="inline-flex items-center px-1 pt-1 transition duration-150 ease-in-out">
                                    {{ $label }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

 

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="toggleMobileMenu()" class="text-gray-700 hover:text-gray-900">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-cloak
            x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black bg-opacity-50 z-40 mobile-menu-overlay">
            <div x-show="mobileMenuOpen" x-cloak
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="transform -translate-x-full"
                x-transition:enter-end="transform translate-x-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="transform translate-x-0"
                x-transition:leave-end="transform -translate-x-full"
                class="bg-white w-64 h-full p-6 overflow-y-auto absolute left-0 mobile-menu-container">
                <button @click="toggleMobileMenu()" class="text-gray-700 text-2xl absolute top-4 right-4">×</button>
                <div class="flex flex-col space-y-4 mt-8">
                    <div class="text-lg font-semibold text-gray-800 mb-4">PT Nusantara Alkesindo Berdikari</div>
                    @foreach ($navItems as $route => $label)
                        @if ($route === '/products')
                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="w-full text-left text-gray-700 font-semibold">
                                    {{ $label }}
                                </button>
                                <div x-show="open" x-cloak class="ml-4 space-y-2 mt-2">
                                    <a href="{{ route('products') }}" class="block text-gray-600 hover:text-green-500">All Products</a>
                                   @foreach ($categories as $category)
                                        <a href="{{ route('products', ['category_id' => $category->id]) }}"
                                           @click="resetDropdowns()"
                                           class="block text-gray-600 hover:text-green-500">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ $route }}"
                               @click="resetDropdowns()"
                               class="block text-gray-700 font-semibold hover:text-green-500">
                                {{ $label }}
                            </a>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </nav>
    <!-- Add this script at the end of the body -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Force initial state of mobile menu to be closed
            window.dispatchEvent(new CustomEvent('nav-loaded'));
        });
    </script>
</body>
</html>