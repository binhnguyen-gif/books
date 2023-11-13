<?php

namespace App\Models;

use App\Model;

class Customer extends Model
{
    protected string $table = 'customers';

    public function login($username, $password): array
    {
        $query = "SELECT * FROM {$this->table} WHERE username = :username AND password = :password LIMIT 1";

        return $this->getData($query, ['username' => $username, 'password' => $password]);
    }

    public function register($info): bool
    {
        return $this->insert($info);
    }

    public function create($info)
    {
        return $this->insertAndGet($info);
    }

    protected function getTableName(): string
    {
        return $this->table;
    }
}
