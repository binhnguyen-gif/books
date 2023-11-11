<?php

namespace App\Models;

use App\Model;
class User extends Model
{
    protected $table = 'users';
    protected function getTableName(): string
    {
        return $this->table;
    }
}
