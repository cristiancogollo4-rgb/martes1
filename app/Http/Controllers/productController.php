<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $producttList = Product::all();
        return view('product.index',[
            "productList" => $producttList
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view("product.create", [
            'categories' => $categories
        ]);
    }
    public function show($id, $categoria = null)
    {
        if ($categoria == null) {
            return "producto: $id";
        } else {
            return "producto: $id categoria $categoria";
        }
    }

    /**
     * Store a newly created product in storage.
     */
   public function store(Request $request)
{
    // 1. Validar los datos
    // Usamos 'nombre' y 'descripcion' porque así están en tu HTML (el de tu compañero)
    $request->validate([
        'nombre' => 'required',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'descripcion' => 'required', 
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // 2. Crear el objeto producto
    $product = new Product(); // Ya tienes el 'use App\Models\Product;' arriba, no hace falta el \App...
    
    // IMPORTANTE: Asegúrate de que en tu base de datos la columna se llame 'name'
    $product->name = $request->nombre; 
    $product->category_id = $request->category_id;
    $product->price = $request->price;
    $product->stock = $request->stock;
    $product->description = $request->descripcion; // Aquí estaba el error, faltaba asignar la descripción

    // 3. Lógica para guardar la imagen
    if ($request->hasFile('image')) {
        // Guarda el archivo físico en storage/app/public/products
        $path = $request->file('image')->store('products', 'public');
        
        // Guardamos la ruta que el navegador SÍ puede leer
        $product->image = 'storage/' . $path; 
    }

    // 4. Guardar en la base de datos
    $product->save();

    return redirect()->route('product.index')->with('success', 'Producto creado con éxito');
}

public function shop()
{
    // Traemos todos los productos de la base de datos
    $productList = \App\Models\Product::all(); 
    
    // Se los enviamos a la vista 'tienda'
    return view('product.tienda', compact('productList'));
}
}
