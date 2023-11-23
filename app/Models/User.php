<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    protected $table = 'users';

    public function login($username, $password)
    {
        $query = "SELECT * FROM {$this->table} WHERE username = :username AND password = :password LIMIT 1";

        return $this->getData($query, ['username' => $username, 'password' => $password]);
    }

    public function register($info)
    {
        return $this->insert($info);
    }

    public function create($info)
    {
        return $this->insertAndGet($info);
    }

    public function getUserByEmail(string $email)
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
