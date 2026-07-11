<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = ['name', 'description', 'price', 'image', 'stock', 'category_id'];

    public function getAll()
    {
        return $this->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->orderBy('products.name', 'ASC')
            ->findAll();
    }

    public function getById($id)
    {
        return $this->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->where('products.id', $id)
            ->first();
    }

    public function getByCategory($categoryId)
    {
        return $this->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->where('products.category_id', $categoryId)
            ->orderBy('products.name', 'ASC')
            ->findAll();
    }

    public function search($query)
    {
        return $this->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->like('products.name', $query)
            ->orLike('products.description', $query)
            ->orderBy('products.name', 'ASC')
            ->findAll();
    }

    public function updateStock($id, $quantity)
    {
        $product = $this->find($id);
        if ($product && $product->stock >= $quantity) {
            $this->update($id, ['stock' => $product->stock - $quantity]);
            return true;
        }
        return false;
    }
}
