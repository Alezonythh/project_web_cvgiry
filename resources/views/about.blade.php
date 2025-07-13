<x-app-layout>
    <!-- AlpineJS -->
    <script src="https://unpkg.com/alpinejs" defer></script>

    <!-- Hero Banner -->
    <div class="relative h-[400px] overflow-hidden">
        <img src="{{ asset('storage/products/young-man-being-ill-hospital-bed.jpg') }}" alt="Medical Banner" class="absolute inset-0 w-full h-full object-cover">
        <div class="relative h-full flex items-center bg-black bg-opacity-50">
            <div class="max-w-7xl mx-auto px-4 w-full">
                <h1 class="text-5xl font-bold text-white mb-2">Medical Technology</h1>
            </div>
        </div>
    </div>

    <!-- Toggle Tabs -->
    <div class="bg-white border-b" x-data="{ showAbout: true, showHistory: false, showMilestones: false }">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="flex space-x-4 py-6 justify-center">
                <!-- About Us -->
                <button @click="showAbout = !showAbout"
                    :class="showAbout ? 'bg-green-500 text-white' : 'text-gray-600 hover:text-green-500'"
                    class="px-4 py-2 rounded-md font-semibold transition">
                    About Us
                </button>

                <!-- History -->
                <button @click="showHistory = !showHistory"
                    :class="showHistory ? 'bg-green-500 text-white' : 'text-gray-600 hover:text-green-500'"
                    class="px-4 py-2 rounded-md font-semibold transition">
                    History
                </button>

                <!-- Milestones -->
                <button @click="showMilestones = !showMilestones"
                    :class="showMilestones ? 'bg-green-500 text-white' : 'text-gray-600 hover:text-green-500'"
                    class="px-4 py-2 rounded-md font-semibold transition">
                    Milestones
                </button>
            </nav>
        </div>

        <!-- About Us Section -->
        <div class="py-12 bg-white" x-show="showAbout" x-transition x-cloak>
            <div class="max-w-7xl mx-auto px-4 space-y-8">
                <h2 class="text-3xl font-bold text-gray-800">About Us</h2>
                <p class="text-gray-700 leading-relaxed">
                    <span class="font-semibold text-green-800">CV. JAYAGIRY</span> is a company engaged in the medical equipment industry, medical support, and fabrication services, located at Jl. Siliwangi Kp. Padamelang RT. 007 RW. 003 Padaasih Village, Cisaat District, Sukabumi Regency. As a company in the industry sector, CV. JAYAGIRY is the best solution with excellent, reliable, and experienced human resources, resulting in high-quality, innovative products that are able to compete nationally and globally.
                </p>

                <img src="{{ asset('storage/products/company.png') }}" alt="Company Image" class="w-full rounded-lg shadow-lg">

            </div>
        </div>

        <!-- History Section -->
        <div class="py-12 bg-white" x-show="showHistory" x-transition x-cloak>
            <div class="max-w-7xl mx-auto px-4 space-y-6">
                <h2 class="text-3xl font-bold text-gray-800">History</h2>
                <p class="text-gray-700 leading-relaxed">
                    <span class="font-semibold text-green-800">CV. JAYAGIRY</span> is a company in the field of medical equipment industry, medical support, and fabrication services located at Jl. Siliwangi Kp. Padamelang RT. 007 RW. 003 Padaasih Village, Cisaat, Sukabumi. The company relies on excellent and experienced human resources to produce quality and innovative products.
                </p>

                <h3 class="text-2xl font-semibold text-gray-800">Vision</h3>
                <p class="text-gray-700">To become an innovative, creative, and trusted company with continuous innovation that is able to compete nationally and globally.</p>

                <h3 class="text-2xl font-semibold text-gray-800">Mission</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Produce innovative and high-quality products</li>
                    <li>Develop local creativity and human resources</li>
                    <li>Operations follow national standards</li>
                    <li>Improve human resources through continuous training</li>
                </ul>

                <h3 class="text-2xl font-semibold text-gray-800">Goals</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Provide job opportunities</li>
                    <li>Develop surrounding human resources</li>
                    <li>Produce technology-based products</li>
                    <li>Build an environmentally conscious work environment</li>
                </ul>

                <h3 class="text-2xl font-semibold text-gray-800">Principles</h3>
                <ol class="list-decimal list-inside text-gray-700 space-y-1">
                    <li>Failure is a stage of learning</li>
                    <li>Success is a process of growth</li>
                    <li>Mistakes are lessons to be corrected</li>
                    <li>Always remember God to create positive energy</li>
                </ol>
            </div>
        </div>

        <!-- Milestones Section -->
        <div class="py-12 bg-white" x-show="showMilestones" x-transition x-cloak>
            <div class="max-w-7xl mx-auto px-4 space-y-6">
                <h2 class="text-3xl font-bold text-gray-800">Company Milestones</h2>
                <img src="{{ asset('storage/products/milestone.png') }}" alt="Company Milestones Timeline" class="w-full rounded-lg shadow-md">
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



    <!-- Hide pre-rendered content -->
    <style>[x-cloak] { display: none !important; }</style>
</x-app-layout>
@include('layouts.footer')
