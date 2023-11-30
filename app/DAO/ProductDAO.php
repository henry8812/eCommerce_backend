<?php

namespace App\DAO;

use App\Models\Product;

class ProductDAO
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function createProduct($data)
    {
        return Product::create($data);
    }

    public function updateProduct($id, $data)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }
}
