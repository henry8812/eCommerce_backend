<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\ProductDAO;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'required|image', // Aseguramos que sea una imagen válida
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            
            // Validar otros campos
        ]);
    
        $image = $request->file('image'); // Obtenemos el archivo de imagen desde la solicitud
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generamos un nombre único para la imagen
    
        // Almacenar la imagen en la carpeta deseada dentro de storage/app/public/images
        $image->storeAs('public/images', $imageName);
    
        
        // Guardar la información del producto con el nombre de la imagen en la base de datos
        $product = $this->productDAO->createProduct(array_merge($validatedData, [
            'image' => $imageName,
            'category_id' => $request->input('category_id'), // Asignar la categoría
        ]));    
        // Devolver la respuesta con el producto creado
        return response()->json($product, 201);
    }
    

    public function update(Request $request, $id)
    {
        $product = $this->productDAO->find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
    
        // Validar los campos recibidos para la actualización
        $validatedData = $request->validate([
            'name' => 'sometimes',
            'price' => 'sometimes',
            'description' => 'sometimes',
            'quantity' => 'sometimes',
            'category_id' => 'sometimes',
            // Otros campos que puedan actualizarse
            // Al menos uno de estos campos debe ser enviado en la solicitud
        ]);
    
        // Imprimir los datos validados para inspección
        
    
        if (empty($validatedData)) {
            return response()->json(['message' => 'No se proporcionaron campos para actualizar'], 400);
        }
    
        // Actualizar solo los campos proporcionados manteniendo los existentes si no se proporciona un campo específico
        $this->productDAO->updateProduct($id, $validatedData);
    
        return response()->json(['message' => 'Producto actualizado correctamente']);
    }
    
    

    public function destroy($id)
    {
        // Eliminar un producto por ID
        print_r("si lelgo");
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
