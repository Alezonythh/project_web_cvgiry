<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
  public function dashboard(Request $request)
{
    // Get all categories with their associated products
    $categories = Category::with('products')->get();

    // Check if a category is selected, if so, filter products by category
    $categoryId = $request->get('category_id');
    $search = $request->get('search');

    $productsQuery = Product::with('category');

    // Apply category filter if selected
    if ($categoryId) {
        $productsQuery->where('category_id', $categoryId);
    }

    // Apply search filter if there's a search term
    if ($search) {
        $productsQuery->where('title', 'like', '%' . $search . '%');
    }

    // Get filtered products with pagination
    $products = $productsQuery->paginate(10); // Menampilkan 10 item per halaman

    return view('admin.dashboard', compact('products', 'categories'));
}   


    public function store(Request $request)
    {
        // Validation for storing a product
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'spesifikasi_1' => 'nullable|image|mimes:jpeg,png,jpg',
            'spesifikasi_2' => 'nullable|image|mimes:jpeg,png,jpg',
            'spesifikasi_3' => 'nullable|image|mimes:jpeg,png,jpg',
            'spesifikasi_4' => 'nullable|image|mimes:jpeg,png,jpg',
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Store files
        $data['image'] = $request->file('image')->store('products', 'public');
        

        if ($request->hasFile('spesifikasi_1')) {
            $data['spesifikasi_1'] = $request->file('spesifikasi_1')->store('products/specifications', 'public');
        }

        if ($request->hasFile('spesifikasi_2')) {
            $data['spesifikasi_2'] = $request->file('spesifikasi_2')->store('products/specifications', 'public');
        }

        if ($request->hasFile('spesifikasi_3')) {
            $data['spesifikasi_3'] = $request->file('spesifikasi_3')->store('products/specifications', 'public');
        }

        if ($request->hasFile('spesifikasi_4')) {
            $data['spesifikasi_4'] = $request->file('spesifikasi_4')->store('products/specifications', 'public');
        }

        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('products/pdfs', 'public');
        }


        Product::create($data);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function update(Request $request, Product $product)
    {
        // Validation for updating a product
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'spesifikasi_1' => 'nullable|image|mimes:jpeg,png,jpg',
            'spesifikasi_2' => 'nullable|image|mimes:jpeg,png,jpg',
            'spesifikasi_3' => 'nullable|image|mimes:jpeg,png,jpg',
            'spesifikasi_4' => 'nullable|image|mimes:jpeg,png,jpg',
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Update files if provided
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('spesifikasi_1')) {
            if ($product->spesifikasi_1) {
                Storage::disk('public')->delete($product->spesifikasi_1);
            }
            $data['spesifikasi_1'] = $request->file('spesifikasi_1')->store('products/specifications', 'public');
        }

        if ($request->hasFile('spesifikasi_2')) {
            if ($product->spesifikasi_2) {
                Storage::disk('public')->delete($product->spesifikasi_2);
            }
            $data['spesifikasi_2'] = $request->file('spesifikasi_2')->store('products/specifications', 'public');
        }

        if ($request->hasFile('spesifikasi_3')) {
            if ($product->spesifikasi_3) {
                Storage::disk('public')->delete($product->spesifikasi_3);
            }
            $data['spesifikasi_3'] = $request->file('spesifikasi_3')->store('products/specifications', 'public');
        }

        if ($request->hasFile('spesifikasi_4')) {
            if ($product->spesifikasi_4) {
                Storage::disk('public')->delete($product->spesifikasi_4);
            }
            $data['spesifikasi_4'] = $request->file('spesifikasi_4')->store('products/specifications', 'public');
        }

        if ($request->hasFile('pdf')) {
            if ($product->pdf) {
                Storage::disk('public')->delete($product->pdf);
            }
            $data['pdf'] = $request->file('pdf')->store('products/pdfs', 'public');
        }

        $product->update($data);

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete associated files
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        if ($product->spesifikasi_1) {
            Storage::disk('public')->delete($product->spesifikasi_1);
        }

        if ($product->spesifikasi_2) {
            Storage::disk('public')->delete($product->spesifikasi_2);
        }

        if ($product->spesifikasi_3) {
            Storage::disk('public')->delete($product->spesifikasi_3);
        }

        if ($product->spesifikasi_4) {
            Storage::disk('public')->delete($product->spesifikasi_4);
        }

        if ($product->pdf) {
            Storage::disk('public')->delete($product->pdf);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
