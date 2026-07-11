<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class Products extends BaseController
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
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Manage Products - Petalgram',
            'products' => $this->productModel->getAll(),
            'content' => 'admin/products'
        ];
        return view('layouts/main', $data);
    }

    public function add()
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() === 'post') {
            $image = $this->request->getFile('image');
            $imageName = '';
            if ($image && $image->isValid()) {
                $imageName = $image->getRandomName();
                $image->move(WRITEPATH . 'uploads', $imageName);
            }

            $this->productModel->insert([
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'image' => $imageName,
                'stock' => $this->request->getPost('stock'),
                'category_id' => $this->request->getPost('category_id')
            ]);
            return redirect()->to('/admin/products')->with('success', 'Product added');
        }

        $data = [
            'title' => 'Add Product - Petalgram',
            'categories' => $this->categoryModel->getAll(),
            'content' => 'admin/products'
        ];
        return view('layouts/main', $data);
    }

    public function edit($id)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }

        $product = $this->productModel->getById($id);

        if ($this->request->getMethod() === 'post') {
            $image = $this->request->getFile('image');
            $imageName = $product->image;
            if ($image && $image->isValid()) {
                $imageName = $image->getRandomName();
                $image->move(WRITEPATH . 'uploads', $imageName);
            }

            $this->productModel->update($id, [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'image' => $imageName,
                'stock' => $this->request->getPost('stock'),
                'category_id' => $this->request->getPost('category_id')
            ]);
            return redirect()->to('/admin/products')->with('success', 'Product updated');
        }

        $data = [
            'title' => 'Edit Product - Petalgram',
            'product' => $product,
            'categories' => $this->categoryModel->getAll(),
            'content' => 'admin/products'
        ];
        return view('layouts/main', $data);
    }

    public function delete($id)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }
        $this->productModel->delete($id);
        return redirect()->to('/admin/products')->with('success', 'Product deleted');
    }
}
