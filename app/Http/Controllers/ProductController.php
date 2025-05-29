<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProductController extends \Illuminate\Routing\Controller
{
    // Listar todos os produtos
    public function index()
    {
        $products = Produto::all();
        return response()->json($products);
    }

    // Criar um novo produto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|string',
        ]);

        $product = Produto::create($validated);

        return response()->json($product, 201);
    }

    // Detalhes de um produto
    public function show($id)
    {
        $product = Produto::findOrFail($id);
        return response()->json($product);
    }

    // Atualizar um produto
    public function update(Request $request, $id)
    {
        $product = Produto::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|string',
        ]);

        $product->update($validated);

        return response()->json($product);
    }

    // Deletar um produto
    public function destroy($id)
    {
        $product = Produto::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }
}