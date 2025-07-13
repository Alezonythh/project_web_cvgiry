<x-app-layout>
    <!-- Carousel Section -->
    <div class="relative w-full h-screen bg-gray-900">
        <!-- Carousel Container -->
        <div x-data="{
            activeSlide: 1,
            slides: [{
                    id: 1,
                    title: 'Solution',
                    subtitle: 'With CV JAYA GIRY, we are committed to providing innovative healthcare solutions',
                    image: '{{ asset('storage/products/medical-stethoscope-isolated-with-black-background-medical-concept-stethoscope-black-background-with-space-text-health-concept-medical-conceptual.jpg') }}'
                },
                {
                    id: 2,
                    title: 'Innovation',
                    subtitle: 'Advancing medical technology',
                    image: '{{ asset('storage/products/hospital.jpg') }}'
                },
                {
                    id: 3,
                    title: 'Quality',
                    subtitle: 'Ensuring the best for our patients',
                    image: '{{ asset('storage/products/empty-sad-hospital-bed.jpg') }}'
                }
            ],
            loop() {
                setInterval(() => {
                    this.activeSlide = this.activeSlide === this.slides.length ? 1 : this.activeSlide + 1
                }, 5000)
            }
        }" x-init="loop" class="relative h-full overflow-hidden">

            <!-- Slides -->
            <template x-for="slide in slides" :key="slide.id">
                <div x-show="activeSlide === slide.id" x-transition:enter="transition transform duration-1000 ease-out"
                    x-transition:enter-start="translate-x-full opacity-0"
                    x-transition:enter-end="translate-x-0 opacity-100"
                    x-transition:leave="transition transform duration-1000 ease-in"
                    x-transition:leave-start="translate-x-0 opacity-100"
                    x-transition:leave-end="-translate-x-full opacity-0"
                    class="absolute w-full h-full bg-cover bg-center"
                    :style="'background-image: url(' + slide.image + ')'">
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
                        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4" x-text="slide.title"
                            x-transition:enter="transition ease-out duration-1000 delay-200"
                            x-transition:enter-start="opacity-0 translate-y-10"
                            x-transition:enter-end="opacity-100 translate-y-0">
                        </h1>
                        <p class="text-xl md:text-2xl text-white mb-8" x-text="slide.subtitle"
                            x-transition:enter="transition ease-out duration-1000 delay-400"
                            x-transition:enter-start="opacity-0 translate-y-10"
                            x-transition:enter-end="opacity-100 translate-y-0">
                        </p>
                    </div>
                </div>
            </template>

            <!-- Previous Button -->
            <button @click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/50 hover:bg-black/75 rounded-full p-2 text-white transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Next Button -->
            <button @click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/50 hover:bg-black/75 rounded-full p-2 text-white transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Dots -->
            <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 flex space-x-3">
                <template x-for="slide in slides" :key="slide.id">
                    <button @click="activeSlide = slide.id"
                        :class="{ 'bg-green-500': activeSlide === slide.id, 'bg-white': activeSlide !== slide.id }"
                        class="w-3 h-3 rounded-full transition duration-300 hover:bg-green-400">
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Category Cards Section -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-16 relative">
                Our Product Categories
                <span class="block w-24 h-1 bg-green-500 mx-auto mt-4"></span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Bed Patient Card -->
                <div
                    class="flex flex-col items-center bg-white rounded-xl shadow-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-2 hover:shadow-2xl group">
                    <div class="h-72 w-full overflow-hidden">
                        <img src="storage/products/Caretek-Hospital-Bed-Manual-1-Crank-B401.jpg" alt="Bed Patient"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-8 text-center">
                        <h3
                            class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-green-500 transition duration-300">
                            Bed Patient</h3>
                        <p class="text-gray-600 mb-4 text-lg">Advanced beds designed for patient comfort and care</p>
                        <a href="{{ route('products') }}"
                            class="inline-block px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transition duration-300">Learn
                            More</a>
                    </div>
                </div>

                <!-- Table Card -->
                <div
                    class="flex flex-col items-center bg-white rounded-xl shadow-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-2 hover:shadow-2xl group">
                    <div class="h-72 w-full overflow-hidden">
                        <img src="storage/products/hospital-tables-over-bed.jpg" alt="Table"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-8 text-center">
                        <h3
                            class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-green-500 transition duration-300">
                            Table</h3>
                        <p class="text-gray-600 mb-4 text-lg">Durable and functional tables for medical environments</p>
                        <a href="{{ route('products') }}"
                            class="inline-block px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transition duration-300">Learn
                            More</a>
                    </div>
                </div>

                <!-- Cabinet Card -->
                <div
                    class="flex flex-col items-center bg-white rounded-xl shadow-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-2 hover:shadow-2xl group">
                    <div class="h-72 w-full overflow-hidden">
                        <img src="storage/products/table.webp" alt="Cabinet"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-8 text-center">
                        <h3
                            class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-green-500 transition duration-300">
                            Cabinet</h3>
                        <p class="text-gray-600 mb-4 text-lg">Secure and organized storage solutions for healthcare</p>
                        <a href="{{ route('products') }}"
                            class="inline-block px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transition duration-300">Learn
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid Section -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-16 relative">
                Latest Products
                <span class="block w-24 h-1 bg-green-500 mx-auto mt-4"></span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach ($products as $product)
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-2 hover:shadow-2xl group">
                        <div class="h-56 overflow-hidden">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500" />
                        </div>
                        <div class="p-8">
                            <h3
                                class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-green-500 transition duration-300">
                                {{ $product->title }}</h3>
                             <!--<p class="text-gray-600 text-lg mb-6">{{ $product->description }}</p> -->
                            <a href="{{ route('show', $product) }}"
                                class="inline-block bg-green-500 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-600 transition duration-300 shadow-md hover:shadow-lg">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Customer Service Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-semibold text-gray-800 mb-4">Customer Support</h2>
                <p class="text-gray-500 text-lg">Delivering complete healthcare and medical support solutions</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:divide-x lg:divide-gray-200">
                <!-- Service Network -->
                <div class="text-center p-4 transition-all duration-300 cursor-pointer group">
                    <div class="flex justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-12 w-12 sm:h-16 sm:w-16 text-gray-600 group-hover:text-green-500 transition-colors duration-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                    </div>
                    <h3
                        class="text-lg sm:text-xl font-medium text-gray-700 mb-3 group-hover:text-green-500 transition-colors duration-300">
                        Service Coverage</h3>
                    <p class="text-gray-500">Our service network spans 21 provinces and regions nationwide</p>
                </div>

                <!-- Service Policy -->
                <div class="text-center p-4 transition-all duration-300 cursor-pointer group">
                    <div class="flex justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-12 w-12 sm:h-16 sm:w-16 text-gray-600 group-hover:text-green-500 transition-colors duration-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3
                        class="text-lg sm:text-xl font-medium text-gray-700 mb-3 group-hover:text-green-500 transition-colors duration-300">
                        Service Commitment</h3>
                    <p class="text-gray-500">Bringing our services closer to you for greater customer satisfaction</p>
                </div>

                <!-- Repair Process -->
                <div class="text-center p-4 transition-all duration-300 cursor-pointer group">
                    <div class="flex justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-12 w-12 sm:h-16 sm:w-16 text-gray-600 group-hover:text-green-500 transition-colors duration-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <h3
                        class="text-lg sm:text-xl font-medium text-gray-700 mb-3 group-hover:text-green-500 transition-colors duration-300">
                        Maintenance Process</h3>
                    <p class="text-gray-500">We always prioritize a customer-first approach in every service</p>
                </div>

                <!-- Contact Us -->
                <div class="text-center p-4 transition-all duration-300 cursor-pointer group">
                    <div class="flex justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-12 w-12 sm:h-16 sm:w-16 text-gray-600 group-hover:text-green-500 transition-colors duration-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h3
                        class="text-lg sm:text-xl font-medium text-gray-700 mb-3 group-hover:text-green-500 transition-colors duration-300">
                        Reach Out to Us</h3>
                    <p class="text-gray-500">We respond promptly to your needs and provide consistent assistance</p>
                </div>

            </div>
            <hr>
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