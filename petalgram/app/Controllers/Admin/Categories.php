<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Manage Categories - Petalgram',
            'categories' => $this->categoryModel->getAll(),
            'content' => 'admin/categories'
        ];
        return view('layouts/main', $data);
    }

    public function add()
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }
        $this->categoryModel->createCategory([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->to('/admin/categories')->with('success', 'Category added');
    }

    public function edit($id)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }
        $this->categoryModel->updateCategory($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->to('/admin/categories')->with('success', 'Category updated');
    }

    public function delete($id)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }
        $this->categoryModel->deleteCategory($id);
        return redirect()->to('/admin/categories')->with('success', 'Category deleted');
    }
}
