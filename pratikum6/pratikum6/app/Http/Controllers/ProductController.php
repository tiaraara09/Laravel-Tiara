<?php

namespace App\Http\Controllers;

use App\Models\Product; // Mengimpor model Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil semua data produk dari database
        $products = Product::all(); 

        // Mengirim data ke file view bernama 'products'
        return view('products', compact('products')); 
    }
}