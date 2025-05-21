<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    // public function showProductsToUser()
    // {
    //     $products = Product::where('stock', '>', 0)->paginate(8);
    //     // $products = Product::where('stock', '>', 0)->get();
    //     return view('themes.warungSoto.home', compact('products')); // View khusus user
    // }
    public function showProductsToUser()
    {
        // Produk populer berdasarkan stock terbanyak
        $popularProducts = Product::orderByDesc('stock')
            ->take(8) // ambil 8 produk teratas
            ->paginate(8);

        // Produk terbaru
        $latestProducts = Product::orderByDesc('created_at')->take(8)->paginate(8);

        return view('themes.warungSoto.home', compact('popularProducts', 'latestProducts'));
    }

    public function show($slug)
    {
        $detail_product = Product::where('slug', $slug)->firstOrFail();
        return view('detail_products', compact('detail_product'));
    }
}
