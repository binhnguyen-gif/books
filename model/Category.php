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
        $query = "SELECT * FROM {$this->table} 
                  LEFT JOIN books ON {$this->table}.id = books.category_id";
        return $this->query($query);
    }

    public function getCountBookById()
    {
        $query = "SELECT categories.id, categories.name, COUNT(books.id) AS NumberOfBooks FROM {$this->table} 
                  LEFT JOIN books ON {$this->table}.id = books.category_id GROUP BY categories.id, categories.name";
        return $this->query($query);
    }


}
