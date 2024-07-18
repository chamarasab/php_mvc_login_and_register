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

    /*
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
    */
    public function login()
    {
        $input = $this->getInput();
        $userModel = new UserModel();
        $user = $userModel->getUserByEmail($input['email']);

        if ($user && password_verify($input['password'], $user['password'])) {
            $userModel->updateLoginTime($user['id']);
            
            // Filter the user data to remove unnecessary indexed elements
            $filteredUser = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'logged_at' => date('Y-m-d H:i:s')
            ];

            return $this->jsonResponse(['message' => 'Login successful', 'user' => $filteredUser]);
        } else {
            return $this->jsonResponse(['message' => 'Invalid email or password'], 401);
        }
    }
}
?>
