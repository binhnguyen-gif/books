<?php

class dbHelper
{
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $db = "books";
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function connect()
    {
        return $this->connection;
    }

    public function returnAllRecords($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            die($this->connection->error);
        }

        $books = array();

        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }

        return $books;
    }

    public function returnSingleRow($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            die($this->connection->error);
        }

        return $result->fetch_row();
    }

    public function login($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            die($this->connection->error);
        }

        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function makePurchase($query)
    {
        $result = $this->connection->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllMadePurchases($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            die($this->connection->error);
        }

        $books = array();

        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }

        return $books;
    }

    public function deleteFromPurchases($query)
    {
        $result = $this->connection->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteABook($query)
    {
        $result = $this->connection->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function returnNumRows($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            die($this->connection->error);
        }

        return $result->num_rows;
    }

    public function submitABook($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            die($this->connection->error);
        }
    }

    public function disconnect()
    {
        $this->connection->close();
        unset($this->connection);
    }

}
