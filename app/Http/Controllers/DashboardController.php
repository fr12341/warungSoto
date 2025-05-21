<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transactions;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $products = Product::all();

    return view('product.dashboard', [
        'totalProducts' => $products->count(),
        'totalStock' => $products->sum('stock'),
        'categoryCounts' => $products->groupBy('category')->map->count(),
    ]);
}

public function transaction()
{
    $transactions = Transactions::with(['user', 'product'])->get();

    return view('product.transaction', compact('transactions'));
}

}
