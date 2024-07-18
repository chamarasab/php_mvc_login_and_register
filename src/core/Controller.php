<?php

namespace Core;

class Controller
{
    protected function jsonResponse($data, $statusCode = 200)
    {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
    }

    protected function getInput()
    {
        return json_decode(file_get_contents('php://input'), true);
    }
}
?>
