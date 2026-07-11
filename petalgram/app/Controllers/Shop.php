<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Shop extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $categoryId = $this->request->getGet('category');
        $search = $this->request->getGet('q');

        if ($search) {
            $products = $this->productModel->search($search);
        } elseif ($categoryId) {
            $products = $this->productModel->getByCategory($categoryId);
        } else {
            $products = $this->productModel->getAll();
        }

        $categories = $this->categoryModel->getAll();

        $data = [
            'title' => 'Shop - Petalgram',
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $categoryId,
            'searchQuery' => $search,
            'content' => 'shop/index'
        ];
        return view('layouts/main', $data);
    }

    public function product($id)
    {
        $product = $this->productModel->getById($id);
        if (!$product) {
            return redirect()->to('/shop')->with('error', 'Product not found');
        }

        $data = [
            'title' => $product->name . ' - Petalgram',
            'product' => $product,
            'content' => 'shop/product'
        ];
        return view('layouts/main', $data);
    }

    public function category($id)
    {
        return redirect()->to('/shop?category=' . $id);
    }

    public function search()
    {
        return redirect()->to('/shop?q=' . $this->request->getGet('q'));
    }
}
