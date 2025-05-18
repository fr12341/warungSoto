<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk melanjutkan pembelian.');
        }
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($data['product_id']);

        // Hitung total harga
        $totalPrice = $product->price * $data['quantity'];

        $transaction = Transactions::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $data['quantity'],
            'price' => $totalPrice,
            'status' => 'pending',
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => (int) $totalPrice,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();

        return redirect()->route('checkout', $transaction->id);
    }
    public function checkout(Transactions $transaction)
    {
        $product = $transaction->product; // langsung ambil lewat relasi

        return view('checkout', compact('transaction', 'product'));
    }
        public function success(Transactions $transaction) {
        $transaction->status = 'success';
        $transaction->save();

        return view('success');
    }
}
