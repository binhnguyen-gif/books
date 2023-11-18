<?php

namespace App\Models;

use App\Model;

class Order extends Model
{

    private string $table = 'orders';

    const STAFF = 0;
    const PENDING = 0;
    const PREPARE = 1;
    const DELIVERING = 2;
    const DELIVERED = 3;
    const CUSTOMER_CANCEL = 4;
    const STAFF_CANCEL = 5;
    const PAID = 1;
    const UNPAID = 0;

    public function getOrdersByCustomer($customer_id): ?array
    {
        $data = ['customer_id' => $customer_id];
        $query = "SELECT * FROM {$this->table} WHERE customer_id = :customer_id";

        return $this->getDataByQuery($query, $data);
    }

    public function create(array $order)
    {
        return $this->insertAndGet($order);
    }

    public function sum($status = null): array
    {
        $sql = "SELECT SUM(total_price) as total FROM {$this->tableName}";

        if (!empty($status)) {
            $sql .= " WHERE status = :status";
        }
        $query = $this->db->prepare($sql);
        $query->execute($status ?? []);

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function temporary() {
        try {
            $createTableQuery = "CREATE TEMPORARY TABLE all_months (month INT)";
            $this->db->exec($createTableQuery);

            $insertDataQuery = "INSERT INTO all_months VALUES (1), (2), (3), (4), (5), (6), (7), (8), (9), (10), (11), (12)";
            $this->db->exec($insertDataQuery);

            return $this->getTotalIncome();


        } catch (\PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function getTotalIncome($year = null) {
        $year = ['year' => $year ?? 2023];
        $query_d = "SELECT all_months.month AS y,
                           CAST(COALESCE(SUM(total_price), 0) AS UNSIGNED) AS a
                    FROM all_months
                    LEFT JOIN {$this->table} ON MONTH(booking_date) = all_months.month AND YEAR(booking_date) = :year AND status = 3
                    GROUP BY all_months.month";

        $query = $this->db->prepare($query_d);
        $query->execute($year ?? []);

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }


    protected function getTableName(): string
    {
        return $this->table;
    }
}
