<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\OrderItemModel;

class Orders extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
    }

    public function index()
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Manage Orders - Petalgram',
            'orders' => $this->orderModel->getAll(),
            'content' => 'admin/orders'
        ];
        return view('layouts/main', $data);
    }

    public function view($id)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }

        $order = $this->orderModel->getById($id);
        $items = $this->orderItemModel->getByOrderId($id);

        $data = [
            'title' => 'Order #' . $id . ' - Petalgram',
            'order' => $order,
            'items' => $items,
            'content' => 'admin/orders'
        ];
        return view('layouts/main', $data);
    }

    public function update($id)
    {
        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/login');
        }
        $status = $this->request->getPost('status');
        $this->orderModel->updateStatus($id, $status);
        return redirect()->to('/admin/orders')->with('success', 'Order status updated');
    }
}
