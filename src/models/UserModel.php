<?php

namespace Models;

use Core\Model;

class UserModel extends Model
{
    public function createUser($data)
    {
        $stmt = $this->db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        return $stmt->execute($data);
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function updateLoginTime($userId)
    {
        $stmt = $this->db->prepare('UPDATE users SET logged_at = NOW() WHERE id = :id');
        return $stmt->execute(['id' => $userId]);
    }
}
?>
