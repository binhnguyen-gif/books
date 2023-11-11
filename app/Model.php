<?php

declare(strict_types=1);

namespace App;

abstract class Model
{
    protected DB $db;

    protected string $tableName;

    public function __construct()
    {
        $this->db = App::db();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id): ?array
    {
        $query = $this->db->prepare("SELECT * FROM {$this->tableName} WHERE id = :id");
        $query->execute(['id' => $id]);

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAll(): array
    {
        $query = $this->db->query("SELECT * FROM {$this->tableName}");

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insert(array $data): bool
    {
        $columns = implode(', ', array_keys($data));
        $values = ':'.implode(', :', array_keys($data));

        $query = $this->db->prepare("INSERT INTO {$this->tableName} ($columns) VALUES ($values)");

        return $query->execute($data);
    }

    public function update(int $id, array $data): bool
    {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= "$key = :$key, ";
        }
        $setClause = rtrim($setClause, ', ');

        $query = $this->db->prepare("UPDATE {$this->tableName} SET $setClause WHERE id = :id");
        $data['id'] = $id;

        return $query->execute($data);
    }

    public function delete(int $id): bool
    {
        $query = $this->db->prepare("DELETE FROM {$this->tableName} WHERE id = :id");

        return $query->execute(['id' => $id]);
    }

    public function getData($q): array
    {
        $query = $this->db->query($q);

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    abstract protected function getTableName(): string;
}
