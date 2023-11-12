<?php

namespace App\Models;

use App\Model;

class Order extends Model
{

    const STAFF = 0;
    const PENDING = 0;
    const PREPARE = 1;
    const DELIVERING = 2;
    const DELIVERED = 3;
    const CUSTOMER_CANCEL = 4;
    const STAFF_CANCEL = 5;
    const PAID = 1;
    const UNPAID = 0;
    private $table = 'orders';

    public function getOrdersByCustomer($customer_id)
    {
        $data = ['customer_id' => $customer_id];
        $query = "SELECT * FROM {$this->table} WHERE customer_id = :customer_id";

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
