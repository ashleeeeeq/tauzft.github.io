<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $allowedFields = ['name', 'description'];

    public function getAll()
    {
        return $this->orderBy('name', 'ASC')->findAll();
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function createCategory($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function updateCategory($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->delete($id);
    }
}
