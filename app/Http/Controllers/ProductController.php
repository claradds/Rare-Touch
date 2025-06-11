<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    // Listar todos os produtos
    public function index()
    {
        return response()->json(Produto::all());
    }

    // Exibir detalhes de um produto
    public function show($id)
    {
        $product = Produto::find($id);

        if (!$product) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        return response()->json($product);
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

    // Atualizar um produto existente
    public function update(Request $request, $id)
    {
        $product = Produto::find($id);

        if (!$product) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|string',
        ]);

        $product->update($validated);

        return response()->json($product);
    }

    // Excluir um produto
    public function destroy($id)
    {
        $product = Produto::find($id);

        if (!$product) {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }

        $product->delete();

        return response()->json(null, 204);
    }
}