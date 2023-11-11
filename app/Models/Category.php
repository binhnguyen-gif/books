<?php

namespace App\Models;

use App\Model;
class Category extends Model
{
    protected $table = 'categories';

    public function getAllProductByCategory()
    {
        $query = "SELECT c.*, CASE WHEN COUNT(b.id) > 0 
                        THEN JSON_ARRAYAGG(JSON_OBJECT('id', b.id, 'name', b.name, 'price', b.price, 'old_price', b.old_price, 'image', b.image))
                        ELSE NULL 
                    END AS books 
                  FROM {$this->table} c
                  LEFT JOIN books b ON c.id = b.category_id
                  GROUP BY c.id, c.name";
        return $this->getData($query);
    }

    public function getCountBookById()
    {
        $query = "SELECT categories.id, categories.name, COUNT(books.id) AS NumberOfBooks FROM {$this->table} 
                  LEFT JOIN books ON {$this->table}.id = books.category_id GROUP BY categories.id, categories.name";
        return $this->query($query);
    }

    protected function getTableName(): string
    {
        return $this->table;
    }
}
