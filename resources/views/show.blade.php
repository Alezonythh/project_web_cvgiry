<x-app-layout>
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    
                    <!-- Tombol Kembali -->
                    <div class="mb-6">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back
                        </a>
                    </div>

                    <!-- Judul Produk -->
                    <h1 class="text-4xl font-bold mb-6 text-gray-800">{{ $product->title }}</h1>

                    <!-- Gambar Produk -->
                    <div class="mb-8">
                       <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="w-full h-full object-cover rounded-lg shadow-md">
                    </div>

                    <!-- Spesifikasi dalam Grid 2x2 dengan gambar besar -->
                    <div class="mt-8">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Spesifikasi</h2>
                        <div class="grid grid-cols-2 gap-4">
                            @for ($i = 1; $i <= 4; $i++)
                                @php $specVar = "spesifikasi_$i"; @endphp
                                @if ($product->$specVar)
                                    <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                        <a href="{{ asset('storage/' . $product->$specVar) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $product->$specVar) }}" alt="Spesifikasi {{ $i }}" class="w-full h-64 object-cover rounded-md transition-transform duration-300 hover:scale-105">
                                        </a>
                                    </div>
                                @else
                                    <div class="bg-gray-100 p-4 rounded-lg shadow-md flex justify-center items-center h-64">
                                        <span class="text-gray-500">No Spec</span>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>

                    <!-- Deskripsi Produk -->
                    <div class="space-y-6 mt-8">
                        <h2 class="text-2xl font-semibold text-gray-800">Deskripsi</h2>
                        <p class="text-gray-700 text-xl leading-relaxed">{{ $product->description }}</p>
                    </div>

                    <!-- Tombol View PDF -->
                    <div class="mt-8 text-center">
                        @if ($product->pdf)
                            <a href="{{ asset('storage/' . $product->pdf) }}" target="_blank" 
                               class="px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                                📄 View More Spesifikation
                            </a>
                        @else
                            <span class="text-gray-500 text-lg">No More Spesifikation available</span>
                        @endif
                    </div>
                </div>
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


</x-app-layout>
    @include('layouts.footer')