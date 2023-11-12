<?php

namespace App\Models;

use App\Model;

class OrderDetail extends Model
{
    private $table = 'order_detail';

//    public function getOrdersByCustomer($customer_id)
//    {
//        $data = ['customer_id' => $customer_id];
//        $query = "SELECT * FROM {$this->table} WHERE customer_id = :customer_id";
//
//        return $this->getDataByQuery($query, $data);
//    }

    public function create(array $order)
    {
        return $this->insertAndGet($order);
    }


    protected function getTableName(): string
    {
        return $this->table;
    }
}
