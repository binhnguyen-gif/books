<?php

namespace App\Models;

use App\Model;

class Customer extends Model
{
    protected string $table = 'customers';

    public function login($email, $password): array
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :email AND password = :password LIMIT 1";

        return $this->getData($query, ['email' => $email, 'password' => $password]);
    }

    public function register($info): bool
    {
        return $this->insert($info);
    }

    public function create($info)
    {
        return $this->insertAndGet($info);
    }

    public function getCustomerByEmail(string $email)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->tableName} WHERE email = :email LIMIT 1");
        $query->execute(['email' => $email]);

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    protected function getTableName(): string
    {
        return $this->table;
    }
}
