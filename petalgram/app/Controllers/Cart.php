<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Cart extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $cart = session()->get('cart') ?? [];
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $data = [
            'title' => 'Cart - Petalgram',
            'cart' => $cart,
            'total' => $total,
            'content' => 'cart/index'
        ];
        return view('layouts/main', $data);
    }

    public function add()
    {
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity') ?? 1;

        $product = $this->productModel->getById($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $cart = session()->get('cart') ?? [];
        $found = false;

        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        unset($item);

        if (!$found) {
            $cart[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity
            ];
        }

        session()->set('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function update($id)
    {
        $quantity = $this->request->getPost('quantity');
        $cart = session()->get('cart') ?? [];

        foreach ($cart as $key => &$item) {
            if ($item['id'] == $id) {
                if ($quantity <= 0) {
                    unset($cart[$key]);
                } else {
                    $item['quantity'] = $quantity;
                }
                break;
            }
        }
        unset($item);

        session()->set('cart', array_values($cart));
        return redirect()->to('/cart')->with('success', 'Cart updated');
    }

    public function remove($id)
    {
        $cart = session()->get('cart') ?? [];
        $cart = array_filter($cart, function ($item) use ($id) {
            return $item['id'] != $id;
        });
        $cart = array_values($cart);

        session()->set('cart', $cart);
        return redirect()->to('/cart')->with('success', 'Item removed from cart');
    }

    public function empty()
    {
        session()->set('cart', []);
        return redirect()->to('/cart')->with('success', 'Cart emptied');
    }
}
