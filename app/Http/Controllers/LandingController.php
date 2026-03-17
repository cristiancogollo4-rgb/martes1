<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::latest()->take(8)->get();
        $categories = Category::withCount('products')->orderBy('name')->take(6)->get();

        return view('landing.index', compact('featuredProducts', 'categories'));
    }
}
