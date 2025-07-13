<x-app-layout>
    <style>
        /* Animasi ketika kategori berubah */
        .product-grid {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .product-grid.hidden {
            opacity: 0;
            transform: translateY(20px);
        }

        /* Hover effect on product cards */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            transform: scale(1);  /* Default scale */
        }

        .product-card:hover {
            transform: scale(1.1);  /* Slightly scale the card on hover */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);  /* Add shadow on hover */
        }

        /* Increased padding inside the cards */
        .product-card .p-8 {
            padding: 24px;  /* More padding to create space inside the card */
        }

        /* Category card layout adjustment */
        .product-card {
            margin-bottom: 20px;  /* Add space between cards */
        }

        /* Increased grid card size */
        .product-card {
            max-width: 100%;
            width: 100%;
        }

        /* Grid layout with more space for cards */
        .product-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));  /* Larger cards */
        }

        /* Mobile Navbar Fix */
        @media (max-width: 1024px) {
            .category-nav {
                flex-wrap: wrap;
                justify-center;
            }
            .hamburger {
                display: block !important;
            }
        }

        /* Hamburger menu visibility for smaller screens */
        .hamburger {
            display: none;
        }
    </style>

    <script>
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', e => {
                const grids = document.querySelectorAll('.product-grid');
                grids.forEach(grid => {
                    grid.classList.add('hidden');  // Menambahkan kelas "hidden" untuk memulai transisi
                });
                
                // Delay untuk menunggu transisi selesai sebelum berpindah ke halaman baru
                setTimeout(() => {
                    location.href = e.target.href;
                }, 300);  // 300ms delay sesuai dengan durasi animasi
                e.preventDefault();
            });
        });
    </script>

    <!-- Hero Banner Section -->
    <div class="relative h-[400px] bg-gradient-to-r from-green-500 to-green-700 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://photos.idnfinancials.com/static/web/2025/hospital.jpg')] bg-cover bg-center bg-no-repeat opacity-50 w-full h-full"></div>
        <div class="relative max-w-7xl mx-auto px-4 h-full flex items-center">
            <div class="text-white">
                <h1 class="text-5xl font-bold mb-4">
                    {{ $categoryId ? $categories->firstWhere('id', $categoryId)->name : 'All Categories' }}
                </h1>
                <div class="flex gap-4">
                    <span class="bg-white bg-opacity-20 px-6 py-2 rounded-full">powerful</span>
                    <span class="bg-white bg-opacity-20 px-6 py-2 rounded-full">pioneer</span>
                    <span class="bg-white bg-opacity-20 px-6 py-2 rounded-full">practical</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Navigation -->
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto">
            <nav class="flex justify-between items-center py-4">
                <div class="flex gap-8 category-nav w-full justify-center lg:w-auto">
                    <a href="{{ route('products') }}" 
                       class="text-gray-600 hover:text-green-500 {{ !$categoryId ? 'text-green-500 font-bold' : '' }}">
                        All
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('products', ['category_id' => $category->id]) }}" 
                           class="text-gray-600 hover:text-green-500 {{ $categoryId == $category->id ? 'text-green-500 font-bold' : '' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>

                <!-- Hamburger Menu -->
                <div class="lg:hidden">
                    <button class="hamburger text-gray-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </nav>
        </div>
    </div>


    <!-- Product Sections -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            @if ($categoryId)
                <!-- Display products only for the selected category -->
                <div class="mb-16">
                    <h2 class="text-xl font-bold mb-8">{{ $categories->firstWhere('id', $categoryId)->name }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 product-grid">
                        @foreach ($productsByCategory as $product)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden product-card">
                                <div class="h-56 overflow-hidden">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" 
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="p-8">
                                    <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $product->title }}</h3>
                                    <a href="{{ route('show', $product) }}" 
                                       class="text-green-500 hover:underline">View Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <!-- Display all categories -->
                @foreach ($categories as $category)
                    <div class="mb-16" id="{{ Str::slug($category->name) }}">
                        <h2 class="text-xl font-bold mb-8">{{ $category->name }}</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 product-grid">
                            @foreach ($category->products as $product)
                                <div class="bg-white rounded-xl shadow-lg overflow-hidden product-card">
                                    <div class="h-56 overflow-hidden">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-8">
                                        <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $product->title }}</h3>
                                        <a href="{{ route('show', $product) }}" 
                                           class="text-green-500 hover:underline">View Details</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
       <!-- Contact Us Section -->
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Get in Touch with Us</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                We're here to help! Contact us through any of these channels and we'll respond as soon as possible.
            </p>
        </div>

        <div class="flex justify-center">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 w-full max-w-6xl">
                <!-- Card 1 -->
                <div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-center mb-4">
                        <div class="bg-green-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">Training & Service Centre</h3>
                    </div>
                    <div class="space-y-4 text-center">
                        <a href="https://wa.me/6281219993302"
                            class="flex items-center justify-center space-x-2 p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163..."></path>
                            </svg>
                            <span class="font-medium text-green-500">Training: +62 812-1999-3302</span>
                        </a>
                        <a href="https://wa.me/6281219993301"
                            class="flex items-center justify-center space-x-2 p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163..."></path>
                            </svg>
                            <span class="font-medium text-green-500">Service: +62 812-1999-3301</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-center mb-4">
                        <div class="bg-green-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">Office Contact</h3>
                    </div>
                    <div class="space-y-4 text-center">
                        <div class="flex items-center justify-center space-x-2 p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-all duration-300">
                         
                            <a href="tel:" class="font-medium text-green-500">(0266) 2500130</a>
                        </div>
                        <div class="flex items-center justify-center space-x-2 p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-all duration-300">
                           
                            <div class="font-medium text-green-500">
                                <a href="mailto:jg.alkes@gmail.com">jg.alkes@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</x-app-layout>
    @include('layouts.footer')