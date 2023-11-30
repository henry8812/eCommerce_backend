<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\ProductDAO;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productDAO;

    public function __construct(ProductDAO $productDAO)
    {
        $this->productDAO = $productDAO;
    }

    public function index()
    {
        // Obtener todos los productos
        $products = $this->productDAO->getAllProducts();
        return response()->json($products);
    }

    public function show($id)
    {
        // Obtener un producto por ID
        $product = $this->productDAO->getProductById($id);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($product);
    }

    public function store(Request $request)
    {
        // Validar y crear un nuevo producto
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            // Validar otros campos
        ]);

        $product = $this->productDAO->createProduct($validatedData);
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        // Validar y actualizar un producto existente
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            // Validar otros campos
        ]);

        $product = $this->productDAO->updateProduct($id, $validatedData);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($product);
    }

    public function destroy($id)
    {
        // Eliminar un producto por ID
        $result = $this->productDAO->deleteProduct($id);
        if (!$result) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json(['message' => 'Producto eliminado']);
    }

    public function getFilteredProducts(Request $request)
    {
        $query = Product::query();
    
        // Aplicar filtros si existen en la solicitud
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
    
        if ($request->filled('minPrice')) {
            $minPrice = $request->minPrice;
            $query->where('price', '>=', $minPrice);
        }
    
        if ($request->filled('maxPrice')) {
            $maxPrice = $request->maxPrice;
            $query->where('price', '<=', $maxPrice);
        }
    
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
    
            $filteredProducts = $query->get();
    
        return response()->json($filteredProducts);
    }
    
}
