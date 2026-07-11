<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\PaymentModel;

class Checkout extends BaseController
{
    protected $orderModel;
    protected $paymentModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->paymentModel = new PaymentModel();
    }

    public function index()
    {
        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $data = [
            'title' => 'Checkout - Petalgram',
            'cart' => $cart,
            'total' => $total,
            'content' => 'checkout/index'
        ];
        return view('layouts/main', $data);
    }

    public function payment()
    {
        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $data = [
            'title' => 'Payment - Petalgram',
            'cart' => $cart,
            'total' => $total,
            'content' => 'checkout/payment'
        ];
        return view('layouts/main', $data);
    }

    public function process()
    {
        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $orderId = $this->orderModel->createOrder([
            'user_id' => session()->get('user_id'),
            'items' => array_map(function ($item) {
                return [
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ];
            }, $cart),
            'total' => $total,
            'shipping_address' => [
                'name' => $this->request->getPost('name'),
                'address' => $this->request->getPost('address'),
                'city' => $this->request->getPost('city'),
                'zip_code' => $this->request->getPost('zip_code')
            ],
            'contact_info' => [
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone')
            ]
        ]);

        if ($orderId) {
            $this->paymentModel->createPayment([
                'order_id' => $orderId,
                'amount' => $total,
                'method' => $this->request->getPost('payment_method'),
                'status' => 'completed'
            ]);
            session()->set('cart', []);
            return redirect()->to('/checkout/success/' . $orderId);
        }

        return redirect()->to('/checkout')->with('error', 'Failed to process order');
    }

    public function success($orderId)
    {
        $data = [
            'title' => 'Order Success - Petalgram',
            'orderId' => $orderId,
            'content' => 'checkout/success'
        ];
        return view('layouts/main', $data);
    }
}
