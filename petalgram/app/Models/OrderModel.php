<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = ['user_id', 'total', 'status', 'shipping_address', 'contact_info'];

    public function getAll()
    {
        return $this->select('orders.*, users.name as customer_name')
            ->join('users', 'users.id = orders.user_id', 'left')
            ->orderBy('orders.created_at', 'DESC')
            ->findAll();
    }

    public function getById($id)
    {
        return $this->select('orders.*, users.name as customer_name')
            ->join('users', 'users.id = orders.user_id', 'left')
            ->where('orders.id', $id)
            ->first();
    }

    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    public function createOrder($data)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $orderData = [
            'user_id' => $data['user_id'],
            'total' => $data['total'],
            'status' => 'pending',
            'shipping_address' => json_encode($data['shipping_address']),
            'contact_info' => json_encode($data['contact_info'])
        ];
        $orderId = $this->insert($orderData);

        $builder = $db->table('order_items');
        foreach ($data['items'] as $item) {
            $builder->insert([
                'order_id' => $orderId,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        $productModel = new ProductModel();
        foreach ($data['items'] as $item) {
            $productModel->updateStock($item['product_id'], $item['quantity']);
        }

        $db->transComplete();
        return $orderId;
    }

    public function updateStatus($id, $status)
    {
        return $this->update($id, ['status' => $status]);
    }
}
