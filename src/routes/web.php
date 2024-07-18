<?php

use Core\Router;

$router->addRoute('POST', '/register', 'UserController', 'register');
$router->addRoute('POST', '/login', 'UserController', 'login');
?>
