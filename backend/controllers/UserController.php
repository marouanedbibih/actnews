<?php
include('DataBaseController.php');

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
class UserController
{
    protected $id;
    protected $last_name;
    protected $first_name;
    protected $email;
    protected $phone;
    protected $password;
    protected $confirm_password;
    protected $birthday;
    protected $role;
    protected $image;


    // construct
    public function __construct()
    {
        $this->id = 0;
        $this->last_name = "";
        $this->first_name = "";
        $this->email = "";
        $this->phone = "";
        $this->password = "";
        $this->confirm_password = "";
        $this->role = "";
        $this->birthday = "";
        $this->image = "";
    }


    // Function to display all user information
    public function readUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            // SQL query to get all user data
            $query = "SELECT * FROM user";
            // Fetch data from the database
            $userData = $db->fetchQuery($query);
            header('Content-Type: application/json'); // Set the response content type to JSON
            echo json_encode($userData); // Encode the data as JSON and send it in the response
        }
    }
    public function readUserById($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            $this->id = $id;
            // SQL querry to get user infor by id
            $query = "SELECT * FROM user WHERE id= :id";
            $userData = $db->fetchQuery($query, ['id' => $this->id]);
            header('Content-Type: application/json');
            if (!$userData) {
                return ['error' => 'user not exist'];
            } else {
                echo json_encode($userData);
            }
        }
    }

    public function addUser($data)
    {
        // Declare variables
        $db = new Database();
        $response = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if data is empty
            if (empty($data)) {
                $response['error'] = 'Your data is empty';
            } else {
                // Confirm the password
                if ($data['password'] !== $data['confirm_password']) {
                    $response['error'] = 'Your password is not confirmed';
                } else {
                    // Check email exists
                    $emailQuery = 'SELECT COUNT(*) FROM user WHERE email = :email;';
                    $count = $db->executeQuery($emailQuery, ['email' => $data['email']])->fetchColumn();
                    if ($count !== 0) {
                        $response['error'] = 'Email already exists';
                    } else {
                        // Check username exists
                        $usernameQuery = 'SELECT COUNT(*) FROM user WHERE last_name = :last_name AND first_name= :first_name';
                        $count = $db->executeQuery($usernameQuery, [
                            'last_name' => $data['last_name'],
                            'first_name' => $data['first_name'],
                        ])->fetchColumn();
                        if ($count !== 0) {
                            $response['error'] = 'Last name & First name already exists';
                        } else {
                            $this->last_name = $data['last_name'];
                            $this->first_name = $data['first_name'];
                            $this->email = $data['email'];
                            $this->phone = $data['phone'];
                            $this->birthday = $data['birthday'];
                            $this->role = $data['role'];
                            $this->password = $data['password'];

                            // SQL query to insert a new user
                            $query = "INSERT INTO user (last_name, first_name, email, phone, password, role, birthday) 
                                    VALUES (:last_name, :first_name, :email, :phone, :password, :role, :birthday)";
                            // Prepare data for query
                            $queryData = [
                                'last_name' => $this->last_name,
                                'first_name' => $this->first_name,
                                'email' => $this->email,
                                'phone' => $this->phone,
                                'password' => $this->password,
                                'role' => $this->role,
                                'birthday' => $this->birthday
                            ];
                            // Execute add user query
                            if ($db->executeQuery($query, $queryData)) {
                                $selectQuery = "SELECT id FROM user WHERE email = :email AND last_name = :last_name AND first_name = :first_name";
                                $selectData = [
                                    'last_name' => $this->last_name,
                                    'first_name' => $this->first_name,
                                    'email' => $this->email,
                                ];
                                $this->id = $db->executeQuery($selectQuery, $selectData)->fetchColumn();
                                $response['message'] = "User added successfully.";
                                $response['id'] = $this->id;
                            } else {
                                $response['error'] = "Failed to add user";
                            }
                        }
                    }
                }
            }
        }
        // Set response header and send JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function updateUser($data)
    {
        // Initalize Database
        $db = new Database();
        $response = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check existin data
            if ($data) {
                // insert data into the object 
                $this->id = $data['id'];
                $this->last_name = $data['last_name'];
                $this->first_name = $data['first_name'];
                $this->email = $data['email'];
                $this->phone = $data['phone'];
                $this->password = $data['password'];
                $this->confirm_password = $data['confirm_password'];
                $this->birthday = $data['birthday'];
                $this->role = $data['role'];
                if ($this->password === $this->confirm_password) {
                    // SQL query for update
                    $query = "UPDATE user 
                    SET last_name = :last_name,
                        first_name = :first_name,
                        email = :email,
                        phone = :phone,
                        password= :password,
                        birthday = :birthday,
                        role = :role
                    WHERE id = :id";
                    // SQL Parametres
                    $parameters = [
                        'id' => $this->id,
                        'last_name' => $this->last_name,
                        'first_name' => $this->first_name,
                        'email' => $this->email,
                        'phone' => $this->phone,
                        'password' => $this->password,
                        'birthday' => $this->birthday,
                        'role' => $this->role,
                    ];
                    // Prepare and execute the query
                    if ($db->executeQuery($query, $parameters)) {
                        $response['message'] = "User update successfully.";
                        $response['id'] = $this->id;
                    }
                } else {
                    $response['error'] = 'Confirm password not mutch with the password';
                }
            } else {
                return $response['error'] = 'Data not exist';
            }
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
 
    public  function deleteUser($data)
    {
        // Initialize the Database class
        $db = new Database();
        $response = [];
        $this->id = $data->id;
        // SQL query to delete the user
        $query = "DELETE FROM user WHERE id = :id";
        // Execute the query
        if ($db->executeQuery($query, ['id' => $this->id])) {
            $response['message'] = ' User has deleted';
        } else {
            $response['error'] = ' User not deleted';
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function uploadImage($imageName, $id)
    {
        $db = new Database();
        $response = [];
        $this->id = $id;
        $this->image = $imageName;
        $query = "UPDATE user
        SET image = :image
        WHERE id = :id
        ";
        $data = [
            'id' => $this->id,
            'image' => $this->image,
        ];
        if ($db->executeQuery($query, $data)) {
            $response['message'] = 'Image User add succefly';
        } else {
            $response['error'] = 'Failed to add user profile';
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function getOldImage($id) {
        $db = new Database();
        $query = "SELECT image FROM user WHERE id=:id";
        $result = $db->fetchQuery($query, ['id' => $id]);
        
        if (!empty($result) && isset($result[0]['image'])) {
            return $result[0]['image'];
        } else {
            return ''; // Return an empty string or handle the case when no image is found
        }
    }
    
}
