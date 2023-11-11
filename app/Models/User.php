<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    protected $table = 'users';

    public function login($username, $password)
    {
        $query = "SELECT * FROM {$this->table} WHERE username = :username AND password = :password LIMIT 1";

        return $this->getDateByQuery($query, ['username' => $username, 'password' => $password]);
    }

    public function register($info)
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
