<?php

namespace App\Models;

use App\Model;

class Contact extends Model
{
    protected string $table = 'contacts';


    protected function getTableName(): string
    {
        return $this->table;
    }
}
