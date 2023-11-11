<?php

namespace App\Models;

use App\Model;

class Book extends Model
{
    private $table = 'books';

//    public function getAllProductByCategory()
//    {
//        $query = "SELECT * FROM {$this->table} JOIN categories ON {$this->table}.category_id = categories.id";
//        return $this->query($query);
//    }


    protected function getTableName(): string
    {
        return $this->table;
    }
}
