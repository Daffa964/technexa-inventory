<?php
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('filament.admin.auth.login');
});

Route::get('/print-stock/{product}', function (Product $product) {
    return view('print-stock', compact('product'));
})->name('print.stock')->middleware(['auth', 'role:kepala_gudang']);

Route::get('/print-all-stocks', function () {
    $products = Product::with('category')->get();
    return view('print-all-stocks', compact('products'));
})->name('print.all.stocks')->middleware(['auth', 'role:kepala_gudang']);