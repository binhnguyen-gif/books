<?php

class Category extends Model
{
    private $table = 'categories';

    public function getAll()
    {
        return $this->getArray($this->table);
    }

    public function insertCategory($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateCategory($data, $id)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteACategory($id)
    {
        return $this->delete($this->table, $id);
    }

    public function getAllProductByCategory()
    {
        $query = "SELECT c.*, JSON_ARRAYAGG(JSON_OBJECT('id', b.id, 'name', b.name, 'price', b.price, 'image', b.image)) AS books 
                  FROM {$this->table} c
                  LEFT JOIN books b ON c.id = b.category_id
                  GROUP BY c.id, c.name";
        return $this->query($query);
    }

    public function getCountBookById()
    {
        $query = "SELECT categories.id, categories.name, COUNT(books.id) AS NumberOfBooks FROM {$this->table} 
                  LEFT JOIN books ON {$this->table}.id = books.category_id GROUP BY categories.id, categories.name";
        return $this->query($query);
    }

}
