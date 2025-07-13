<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::latest()->take(3)->get();
        return view('home', compact('products'));    }

    public function about() { return view('about'); }
    public function service() { return view('service'); }
    public function news(Request $request)
    {
        $apiKey = '9536dead719b403589db467e78f903d5';
        $client = new Client([
            'verify' => false // Menonaktifkan verifikasi SSL
        ]);
    
        // Mengambil berita dari API
        $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines', [
            'query' => [
                'country' => 'us',
                'category' => 'health', // Atur kategori berita di sini jika perlu
                'apiKey' => $apiKey,
                'pageSize' => 100, // Mengambil maksimum 100 item (batas API)
            ]
        ]);
    
        $newsData = json_decode($response->getBody(), true)['articles'] ?? [];
    
        // Membuat paginasi manual
        $page = $request->get('page', 1);
        $perPage = 10; // Jumlah item per halaman
    
        $news = new LengthAwarePaginator(
            array_slice($newsData, ($page - 1) * $perPage, $perPage),
            count($newsData),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('news', compact('news')); // Kirim berita ke view
    }  
    public function products(Request $request)
    {
        $categoryId = $request->input('category_id');
        $categories = Category::all();
        $productsByCategory = Product::with('category')
            ->when($categoryId, function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->paginate(12); // Paginate with 12 products per page
    
        return view('products', compact('productsByCategory', 'categories', 'categoryId'));  // Kirim categoryId hanya ke halaman produk
    }

    
    public function show(Product $product)
    {
        return view('show', compact('product'));
    }

}
