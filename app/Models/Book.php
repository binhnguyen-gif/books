<?php

namespace App\Models;

use App\Model;

class Book extends Model
{
    private $table = 'books';

    public function getBooksByKey($search)
    {
        $query = "SELECT * FROM {$this->table}";

        if (!empty($search)) {
            $data = ['key' => "%{$search}%"];
            $query = "SELECT * FROM {$this->table} WHERE name LIKE :key";
        }

        return $this->getDataByQuery($query, $data ?? []);
    }

    public function getAllProductByCategory($id)
    {
        $data = ['category_id' => $id];
        $query = "SELECT * FROM {$this->table} WHERE category_id = :category_id";
        return $this->getDataByQuery($query, $data);
    }

    public function getRelatedProducts($id, $category_id)
    {
        $data = ['id' => $id, 'category_id' => $category_id];
        $query = "SELECT * FROM {$this->table} WHERE id <> :id AND category_id = :category_id";
        return $this->getDataByQuery($query, $data);
    }

    public function getBooksByCondition($column, $condition)
    {
        $query = "SELECT * FROM {$this->table} ORDER BY {$column} {$condition}";

        return $this->getDataByQuery($query, $data ?? []);
    }

    public function getListBook()
    {
        $query = "SELECT {$this->table}.*, c.name as name_category, p.name as name_publish FROM {$this->table} 
                  JOIN categories c ON {$this->table}.category_id = c.id JOIN publish p ON {$this->table}.publish_id = p.id";

        return $this->getAllData($query, $data ?? []);
    }

    protected function getTableName(): string
    {
        return $this->table;
    }
}
