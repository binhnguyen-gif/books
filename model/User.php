<?php

class User extends Model
{
    private $table = 'users';

    public function getAll()
    {
        return $this->getArray($this->table);
    }

    public function insertUser($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateUser($data, $id)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteAUser($id)
    {
        return $this->delete($this->table, $id);
    }

    public function login($username, $password)
    {
        $query = 'SELECT * FROM users WHERE username = "'.$username.'" AND password = "'
            .$password.'"';
        return $this->query($query);
    }

    public function getUserGroup($user)
    {
        $query = 'SELECT `group` FROM users WHERE username = "'.$user.'"';

        return $this->query($query);
    }
}
