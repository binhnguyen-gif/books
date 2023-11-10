<?php

class Publish extends Model
{
    private $table = 'publish';

    public function getAll()
    {
        return $this->getArray($this->table);
    }

    public function insertPublish($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updatePublish($data, $id)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteAPublish($id)
    {
        return $this->delete($this->table, $id);
    }
}
