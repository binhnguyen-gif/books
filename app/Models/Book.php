<?php

namespace App\Models;

use App\Model;

class Book extends Model
{
    private string $table = 'books';

    const ACTIVATED = 1;
    const NOT_ACTIVATED = 0;

    const STATUS = [
        1 => 'Đăng',
        0 => 'Ngừng đăng'
    ];

    public function getBooksByKey($search): ?array
    {
        $query = "SELECT * FROM {$this->table} WHERE status <> 0";

        if (!empty($search)) {
            $data = ['key' => "%{$search}%"];
            $query = "SELECT * FROM {$this->table} WHERE name LIKE :key AND status <> 0";
        }

        return $this->getDataByQuery($query, $data ?? []);
    }

    public function getAllProductByCategory($id): ?array
    {
        $data = ['category_id' => $id];
        $query = "SELECT * FROM {$this->table} WHERE category_id = :category_id";
        return $this->getDataByQuery($query, $data);
    }

    public function getRelatedProducts($id, $category_id): ?array
    {
        $data = ['id' => $id, 'category_id' => $category_id];
        $query = "SELECT * FROM {$this->table} WHERE id <> :id AND category_id = :category_id";
        return $this->getDataByQuery($query, $data);
    }

    public function getBooksByCondition($column, $condition): ?array
    {
        $query = "SELECT * FROM {$this->table} ORDER BY {$column} {$condition}";

        return $this->getDataByQuery($query, $data ?? []);
    }

    public function getListBook(): array
    {
        $query = "SELECT {$this->table}.*, c.name as name_category, p.name as name_publish FROM {$this->table} 
                  JOIN categories c ON {$this->table}.category_id = c.id JOIN publish p ON {$this->table}.publish_id = p.id";

        return $this->getAllData($query, $data ?? []);
    }

    public function getCount()
    {
        return $this->count();
    }

    protected function getTableName(): string
    {
        return $this->table;
    }
}
