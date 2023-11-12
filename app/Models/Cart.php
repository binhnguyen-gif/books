<?php

namespace App\Models;

use App\Model;

class Cart extends Model
{
    private $table = 'cart';

    public function getCartByCustomer($customer_id)
    {
        $data = ['customer_id' => $customer_id];
        $query = "SELECT * FROM {$this->table} JOIN books ON {$this->table}.book_id = books.id WHERE customer_id = :customer_id";

        return $this->getDataByQuery($query, $data);
    }

    public function getCart($book_id, $customer_id)
    {
        $data = ['book_id' => $book_id, 'customer_id' => $customer_id];
        $query = "SELECT * FROM {$this->table} WHERE book_id = :book_id AND customer_id = :customer_id";

        return $this->getData($query, $data);
    }

    public function getAmount($customer_id)
    {
        $data = ['customer_id' => $customer_id];
        $query = "SELECT sum({$this->table}.total) as amount FROM {$this->table} WHERE customer_id = :customer_id";

        return $this->getData($query, $data);
    }

    public function deleteCart($customer_id)
    {
        $data = ['customer_id' => $customer_id];
        $query = "DELETE FROM {$this->table} WHERE customer_id = :customer_id";

        return $this->deleteMulti($query, $data);
    }

    protected function getTableName(): string
    {
        return $this->table;
    }
}
