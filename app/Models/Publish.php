<?php

namespace App\Models;

use App\Model;
class Publish extends Model
{

    protected $table = 'publish';
    protected function getTableName(): string
    {
        return $this->table;
    }
}
