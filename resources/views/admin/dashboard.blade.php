<x-app-layout>
    <div class="bg-white">
        <div class="bg-white min-h-screen">
            <div class="max-w-7xl mx-auto px-4 py-20 sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold mt-16 mb-8 text-gray-800">Admin Dashboard</h1>

                <!-- Alert Success Message -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

<!-- Search Bar and Category Filter -->
<div class="mb-6 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
    <!-- Search Form -->
    <div class="w-full sm:w-1/3">
        <form action="{{ route('admin.dashboard') }}" method="GET" class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
            <input type="text" name="search" placeholder="Search by title" value="{{ request('search') }}"
                class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-400 w-full">
            <button type="submit" class="w-full sm:w-auto bg-green-400 text-white px-4 py-2 rounded-md hover:bg-green-500 transition">
                Search
            </button>
        </form>
    </div>

    <!-- Right Buttons -->
    <div class="w-full sm:w-auto flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
        <!-- Add Product Button -->
        <div>
            <button data-modal-target="productModal" data-modal-toggle="productModal"
                class="bg-green-400 text-white px-6 py-3 rounded-lg hover:bg-green-500 transition duration-300 ease-in-out shadow-md flex items-center justify-center w-full sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add Product
            </button>
        </div>
        <!-- Logout Button -->
<div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="bg-red-600 bg-opacity-100 text-white font-semibold border border-red-700 px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300 ease-in-out shadow-md flex items-center justify-center z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M3 10a1 1 0 011-1h8.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 11-1.414-1.414L12.586 11H4a1 1 0 01-1-1z"
                    clip-rule="evenodd" />
            </svg>
            Logout
        </button>
    </form>
</div>
   
    </div>
</div>

<!-- Konfirmasi Hapus Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('form[action*="products"]');

        deleteForms.forEach(form => {
            const deleteButton = form.querySelector('button[type="submit"]');
            if (deleteButton) {
                deleteButton.addEventListener('click', function (e) {
                    const confirmed = confirm('Apakah Anda yakin ingin menghapus produk ini?');
                    if (!confirmed) {
                        e.preventDefault();
                    }
                });
            }
        });
    });
</script>

                <!-- Table -->
                <div class="mt-8 bg-white rounded-lg shadow-md overflow-hidden overflow-x-auto">
                    <div class="min-w-full">

                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gray-50 text-left text-gray-600 uppercase text-sm">
                                    <th class="px-6 py-4 font-semibold">Image</th>
                                    <th class="px-6 py-4 font-semibold">Title</th>
                                    <th class="px-6 py-4 font-semibold">Description</th>
                                    <th class="px-6 py-4 font-semibold">Spesifikasi 1</th>
                                    <th class="px-6 py-4 font-semibold">Spesifikasi 2</th>
                                    <th class="px-6 py-4 font-semibold">Spesifikasi 3</th>
                                    <th class="px-6 py-4 font-semibold">Spesifikasi 4</th>
                                    <th class="px-6 py-4 font-semibold">PDF</th>
                                    <th class="px-6 py-4 font-semibold">Category</th>
                                    <th class="px-6 py-4 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }} "
                                                class="w-16 h-16 object-cover rounded-md shadow">
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ $product->title }}</td>
                                        <td class="px-6 py-4 text-gray-500">{{ Str::limit($product->description, 100) }}</td>
                                        <td class="px-6 py-4">
                                            @if ($product->spesifikasi_1)
                                                <img src="{{ asset('storage/' . $product->spesifikasi_1) }}" alt="Spesifikasi 1"
                                                    class="w-16 h-16 object-cover rounded-md">
                                            @else
                                                <span class="text-gray-500">No Spec</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($product->spesifikasi_2)
                                                <img src="{{ asset('storage/' . $product->spesifikasi_2) }}" alt="Spesifikasi 2"
                                                    class="w-16 h-16 object-cover rounded-md">
                                            @else
                                                <span class="text-gray-500">No Spec</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($product->spesifikasi_3)
                                                <img src="{{ asset('storage/' . $product->spesifikasi_3) }}" alt="Spesifikasi 3"
                                                    class="w-16 h-16 object-cover rounded-md">
                                            @else
                                                <span class="text-gray-500">No Spec</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($product->spesifikasi_4)
                                                <img src="{{ asset('storage/' . $product->spesifikasi_4) }}" alt="Spesifikasi 4"
                                                    class="w-16 h-16 object-cover rounded-md">
                                            @else
                                                <span class="text-gray-500">No Spec</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($product->pdf)
                                                <a href="{{ asset('storage/' . $product->pdf) }}" target="_blank" class="text-green-600">View PDF</a>
                                            @else
                                                <span class="text-gray-500">No PDF</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-gray-500">{{ $product->category->name }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-wrap gap-2">
                                                <button data-modal-target="editProductModal" data-modal-toggle="editProductModal"
                                                    data-product-id="{{ $product->id }}"
                                                    data-title="{{ $product->title }}"
                                                    data-description="{{ $product->description }}"
                                                    data-category-id="{{ $product->category_id }}"
                                                    data-spesifikasi-1="{{ $product->spesifikasi_1 }}"
                                                    data-spesifikasi-2="{{ $product->spesifikasi_2 }}"
                                                    data-spesifikasi-3="{{ $product->spesifikasi_3 }}"
                                                    data-spesifikasi-4="{{ $product->spesifikasi_4 }}"
                                                    data-pdf="{{ $product->pdf }}"
                                                    class="bg-green-400 text-white px-4 py-2 rounded-md hover:bg-green-500 transition duration-300 ease-in-out flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg>
                                                    Edit
                                                </button>
                                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-400 text-white px-4 py-2 rounded-md hover:bg-red-500 transition duration-300 ease-in-out flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="p-6">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for Add/Edit Product -->
            <div id="productModal" tabindex="-1" class="hidden fixed inset-0 flex items-center justify-center z-50 px-4">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-6 overflow-y-auto max-h-[90vh]">
                    <h2 class="text-xl font-semibold mb-4" id="modalTitle">Add Product</h2>
                    <form id="productForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="productId" name="id">

                                <!-- Input for Image -->
                                <div class="mb-4">
                                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                    <input type="file" id="image" name="image" class="mt-1 block w-full" required>
                                </div>

                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                    <input type="text" id="title" name="title" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" class="mt-1 block w-full px-4 py-2 border rounded-md" required></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                                    <select id="category_id" name="category_id" class="mt-1 block w-full px-4 py-2 border rounded-md">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Spesifikasi fields -->
                                <div class="mb-4">
                                    <label for="spesifikasi_1" class="block text-sm font-medium text-gray-700">Spesifikasi 1</label>
                                    <input type="file" id="spesifikasi_1" name="spesifikasi_1" class="mt-1 block w-full">
                                </div>
                                <div class="mb-4">
                                    <label for="spesifikasi_2" class="block text-sm font-medium text-gray-700">Spesifikasi 2</label>
                                    <input type="file" id="spesifikasi_2" name="spesifikasi_2" class="mt-1 block w-full">
                                </div>
                                <div class="mb-4">
                                    <label for="spesifikasi_3" class="block text-sm font-medium text-gray-700">Spesifikasi 3</label>
                                    <input type="file" id="spesifikasi_3" name="spesifikasi_3" class="mt-1 block w-full">
                                </div>
                                <div class="mb-4">
                                    <label for="spesifikasi_4" class="block text-sm font-medium text-gray-700">Spesifikasi 4</label>
                                    <input type="file" id="spesifikasi_4" name="spesifikasi_4" class="mt-1 block w-full">
                                </div>

                                <div class="mb-4">
                                    <label for="pdf" class="block text-sm font-medium text-gray-700">PDF (max:10mb)</label>
                                    <input type="file" id="pdf" name="pdf" class="mt-1 block w-full">
                                </div>


                        <div class="flex justify-end space-x-4">
                            <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded-md" data-modal-toggle="productModal">Cancel</button>
                            <button type="submit" class="bg-green-400 text-white px-6 py-2 rounded-md">Save</button>
                        </div>
                    </form>

                </div>

            </div>

            <!-- Modal for Edit Product -->
            <div id="editProductModal" tabindex="-1" class="hidden fixed inset-0 flex items-center justify-center z-50 px-4">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-6 overflow-y-auto max-h-[90vh]">
                    <h2 class="text-xl font-semibold mb-4">Edit Product</h2>
                    <form id="editProductForm" action="{{ route('admin.products.update', $product->id ?? '') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editProductId" name="id">

                                    <!-- Image -->
                                    <div class="mb-4">
                                        <label for="editImage" class="block text-sm font-medium text-gray-700">Image</label>
                                        <input type="file" id="editImage" name="image" class="mt-1 block w-full">
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Current image:</p>
                                            @if(isset($product) && $product->image)
                                                <img id="editImagePreview" class="w-16 h-16 object-cover mt-2 rounded-md shadow" src="{{ asset('storage/' . $product->image) }}" alt="Current image">
                                            @else
                                                <p class="text-sm text-gray-500">No image uploaded</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Title -->
                                    <div class="mb-4">
                                        <label for="editTitle" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" id="editTitle" name="title" value="{{ isset($product) ? $product->title : '' }}" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-4">
                                        <label for="editDescription" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea id="editDescription" name="description" class="mt-1 block w-full px-4 py-2 border rounded-md" required>{{ isset($product) ? $product->description : '' }}</textarea>
                                    </div>

                                    <!-- Category -->
                                    <div class="mb-4">
                                        <label for="editCategory" class="block text-sm font-medium text-gray-700">Category</label>
                                        <select id="editCategory" name="category_id" class="mt-1 block w-full px-4 py-2 border rounded-md">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Spesifikasi Fields -->
                                    <div class="mb-4">
                                        <label for="editSpesifikasi_1" class="block text-sm font-medium text-gray-700">Spesifikasi 1</label>
                                        <input type="file" id="editSpesifikasi_1" name="spesifikasi_1" class="mt-1 block w-full">
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Current spesifikasi 1:</p>
                                            @if(isset($product) && $product->spesifikasi_1)
                                                <img id="editSpesifikasi_1Preview" class="w-16 h-16 object-cover mt-2 rounded-md shadow" src="{{ asset('storage/' . $product->spesifikasi_1) }}" alt="Current spesifikasi 1">
                                            @else
                                                <p class="text-sm text-gray-500">No image uploaded</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="editSpesifikasi_2" class="block text-sm font-medium text-gray-700">Spesifikasi 2</label>
                                        <input type="file" id="editSpesifikasi_2" name="spesifikasi_2" class="mt-1 block w-full">
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Current spesifikasi 2:</p>
                                            @if(isset($product) && $product->spesifikasi_2)
                                                <img id="editSpesifikasi_2Preview" class="w-16 h-16 object-cover mt-2 rounded-md shadow" src="{{ asset('storage/' . $product->spesifikasi_2) }}" alt="Current spesifikasi 2">
                                            @else
                                                <p class="text-sm text-gray-500">No image uploaded</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="editSpesifikasi_3" class="block text-sm font-medium text-gray-700">Spesifikasi 3</label>
                                        <input type="file" id="editSpesifikasi_3" name="spesifikasi_3" class="mt-1 block w-full">
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Current spesifikasi 3:</p>
                                            @if(isset($product) && $product->spesifikasi_3)
                                                <img id="editSpesifikasi_3Preview" class="w-16 h-16 object-cover mt-2 rounded-md shadow" src="{{ asset('storage/' . $product->spesifikasi_3) }}" alt="Current spesifikasi 3">
                                            @else
                                                <p class="text-sm text-gray-500">No image uploaded</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="editSpesifikasi_4" class="block text-sm font-medium text-gray-700">Spesifikasi 4</label>
                                        <input type="file" id="editSpesifikasi_4" name="spesifikasi_4" class="mt-1 block w-full">
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Current spesifikasi 4:</p>
                                            @if(isset($product) && $product->spesifikasi_4)
                                                <img id="editSpesifikasi_4Preview" class="w-16 h-16 object-cover mt-2 rounded-md shadow" src="{{ asset('storage/' . $product->spesifikasi_4) }}" alt="Current spesifikasi 4">
                                            @else
                                                <p class="text-sm text-gray-500">No image uploaded</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- PDF -->
                                    <div class="mb-4">
                                        <label for="editPdf" class="block text-sm font-medium text-gray-700">PDF (max:10mb)</label>
                                        <input type="file" id="editPdf" name="pdf" class="mt-1 block w-full">
                                        @if(isset($product) && $product->pdf)
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Current PDF: <a href="{{ asset('storage/' . $product->pdf) }}" class="text-green-500 hover:underline" target="_blank">View PDF</a></p>
                                        </div>
                                        @else
                                            <p class="text-sm text-gray-500 mt-2">No PDF uploaded</p>
                                        @endif
                                    </div>

                        <div class="flex justify-end space-x-4">
                            <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded-md" data-modal-toggle="editProductModal">Cancel</button>
                            <button type="submit" class="bg-green-400 text-white px-6 py-2 rounded-md">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </x-app-layout>
    @include('layouts.footer')