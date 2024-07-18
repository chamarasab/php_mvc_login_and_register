<?php

namespace Controllers;

use Core\Controller;
use Models\UserModel;

class UserController extends Controller
{
    public function register()
    {
        $input = $this->getInput();
        $userModel = new UserModel();

        $hashedPassword = password_hash($input['password'], PASSWORD_DEFAULT);
        $input['password'] = $hashedPassword;

        $result = $userModel->createUser($input);
        return $this->jsonResponse($result);
    }

    public function login()
    {
        $input = $this->getInput();
        $userModel = new UserModel();
        $user = $userModel->getUserByEmail($input['email']);

        if ($user && password_verify($input['password'], $user['password'])) {
            $userModel->updateLoginTime($user['id']);
            return $this->jsonResponse(['message' => 'Login successful', 'user' => $user]);
        } else {
            return $this->jsonResponse(['message' => 'Invalid email or password'], 401);
        }
    }
}
?>
