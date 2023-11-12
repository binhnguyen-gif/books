<?php

namespace App\Models;

use App\Model;

class OrderDetail extends Model
{
    private $table = 'order_detail';

    public function getOrderDetailsByCustomer($order_id)
    {
        $data = ['order_id' => $order_id];
        $query = "SELECT {$this->table}.quantity, {$this->table}.total_price, b.name, b.price FROM {$this->table} JOIN books b ON {$this->table}.book_id = b.id WHERE order_id = :order_id";

        return $this->getDataByQuery($query, $data);
    }

    public function create(array $order)
    {
        return $this->insertAndGet($order);
    }


    protected function getTableName(): string
    {
        return $this->table;
    }
}
