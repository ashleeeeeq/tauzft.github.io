<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Access denied');
        }

        $productModel = new ProductModel();
        $orderModel = new OrderModel();
        $userModel = new UserModel();

        $data = [
            'title' => 'Admin Dashboard - Petalgram',
            'totalProducts' => $productModel->countAllResults(),
            'totalOrders' => $orderModel->countAllResults(),
            'totalUsers' => $userModel->countAllResults(),
            'content' => 'admin/dashboard'
        ];
        return view('layouts/main', $data);
    }
}
