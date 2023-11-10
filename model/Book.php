<?php

class Book extends Model
{
    private $table = 'books';

    public function getAll()
    {
        return $this->getArray($this->table);
    }

    public function insertBook($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateBook($data, $id)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteABook($id)
    {
        return $this->delete($this->table, $id);
    }

    public function getAllProductByCategory() {
        $query = "SELECT * FROM {$this->table} JOIN categories ON {$this->table}.category_id = categories.id";
        return $this->query($query);
    }

//"SELECT Categories.CategoryID, Categories.CategoryName, COUNT(Books.BookID) AS NumberOfBooks
//FROM Categories
//LEFT JOIN Books ON Categories.CategoryID = Books.CategoryID
//GROUP BY Categories.CategoryID, Categories.CategoryName;"
}
