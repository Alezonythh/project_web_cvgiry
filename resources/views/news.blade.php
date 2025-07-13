<x-app-layout>
    <!-- Hero Banner Section -->
    <div class="relative h-[400px] bg-gradient-to-r from-green-600 to-purple-600 overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-green-900 opacity-50"></div>
            <div
                class="absolute inset-0 bg-[radial-gradient(white_1px,transparent_1px)] bg-[length:20px_20px] opacity-30">
            </div>
        </div>
        <div class="relative h-full flex items-center justify-center">
            <h1 class="text-6xl font-bold text-white">NEWS</h1>
        </div>
    </div>
    <!-- News Navigation -->
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="flex space-x-4 py-4 overflow-x-auto">
                <a href="#" class="px-4 py-2 bg-green-500 text-white rounded-md whitespace-nowrap">Latest News</a>
                <a href="#" class="px-4 py-2 text-gray-600 hover:text-green-500 whitespace-nowrap">Company
                    news</a>
                <a href="#" class="px-4 py-2 text-gray-600 hover:text-green-500 whitespace-nowrap">Exhibition
                    information</a>
                <a href="#" class="px-4 py-2 text-gray-600 hover:text-green-500 whitespace-nowrap">Video
                    Center</a>
            </nav>
        </div>
    </div>

    <!-- News Content -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid gap-8">
                @foreach ($news as $item)
                    <div
                        class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col md:flex-row">
                        <div class="md:w-1/3">
                            <img src="{{ $item['urlToImage'] ?? 'https://via.placeholder.com/300x200' }}"
                                alt="{{ $item['title'] }}" class="w-full h-48 md:h-full object-cover">
                        </div>
                        <div class="md:w-2/3 p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-2">
                                {{ $item['title'] }}
                            </h2>
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit($item['description'], 150) }}
                            </p>
                            <a href="{{ $item['url'] }}" target="_blank"
                                class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition-colors duration-200">
                                View Details >
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-8">
                @if ($news->hasPages())
                    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center">
                        <div class="flex items-center space-x-2">
                            {{-- Previous Page Link --}}
                            @if ($news->onFirstPage())
                                <span class="px-4 py-2 text-gray-400 cursor-not-allowed rounded-md">
                                    Previous
                                </span>
                            @else
                                <a href="{{ $news->previousPageUrl() }}"
                                   class="px-4 py-2 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors duration-200">
                                    Previous
                                </a>
                            @endif

                            {{-- Page Numbers --}}
                            <div class="flex items-center">
                                @foreach ($news->getUrlRange(max($news->currentPage() - 1, 1), min($news->currentPage() + 1, $news->lastPage())) as $page => $url)
                                    <a href="{{ $url }}"
                                       class="px-4 py-2 mx-1 {{ $page == $news->currentPage()
                                           ? 'bg-green-500 text-white'
                                           : 'bg-white border border-gray-300 hover:bg-gray-50' }} rounded-md transition-colors duration-200">
                                        {{ $page }}
                                    </a>
                                @endforeach
                            </div>

                            {{-- Next Page Link --}}
                            @if ($news->hasMorePages())
                                <a href="{{ $news->nextPageUrl() }}"
                                   class="px-4 py-2 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors duration-200">
                                    Next
                                </a>
                            @else
                                <span class="px-4 py-2 text-gray-400 cursor-not-allowed rounded-md">
                                    Next
                                </span>
                            @endif
                        </div>
                    </nav>
                @endif
            </div>
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
<!-- News Filter Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navLinks = document.querySelectorAll('nav.flex.space-x-4 a');
        const newsCards = document.querySelectorAll('.grid.gap-8 > div');

        // Example categories, adjust as needed
        const categories = [
            { text: 'Latest News', key: 'latest' },
            { text: 'Company news', key: 'company' },
            { text: 'Exhibition information', key: 'exhibition' },
            { text: 'Video Center', key: 'video' }
        ];

        // Assign data-category to each card (you should set this from backend for real data)
        newsCards.forEach((card, idx) => {
            // Example: assign categories in order, for demo only
            card.dataset.category = categories[idx % categories.length].key;
        });

        navLinks.forEach((link, idx) => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                // Remove active class from all
                navLinks.forEach(l => l.classList.remove('bg-green-500', 'text-white'));
                // Add active class to current
                this.classList.add('bg-green-500', 'text-white');

                const selected = categories[idx].key;
                newsCards.forEach(card => {
                    if (selected === 'latest' || card.dataset.category === selected) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>

</x-app-layout>
    @include('layouts.footer')