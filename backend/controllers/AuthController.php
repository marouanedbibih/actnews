<?php
require_once("DataBaseController.php");

class AuthController extends UserController {
    public function login($data) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Check if the request method is POST
            $db = new Database();
            $response = [];

            $email = $data['email'];
            $password = $data['password'];

            // Use placeholders in the SQL query and correct the syntax
            $query = "SELECT COUNT(*) as count FROM user WHERE email=:email AND password=:password";
            $params = [
                'email' => $email,
                'password' => $password
            ];

            $result = $db->fetchQuery($query, $params);

            if ($result[0]['count'] === 0) { // Compare with string '0' instead of integer 0
                $response['error'] = 'Email or password incorrect';
            } else {
                $response['message'] = "User exists";
            }

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}

