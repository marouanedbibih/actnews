<?php
// Header
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://127.0.0.1');

// Controllers
include("../../backend/controllers/UserController.php");
include("../../backend/controllers/ArticleController.php");
include("../../backend/controllers/TeamController.php");
include("../../backend/controllers/NewController.php");
include("../../backend/controllers/AuthController.php");

// Data
// Api
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        /**
         * Authntification
         */
        case 'login':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = json_decode(file_get_contents('php://input'), true);
                $authcontroller = new AuthController();
                $authcontroller->login($data);
            }
            break;
            /**
             * UserController Api
             */
            // read user
        case 'readUser':
            $userController = new UserController();
            $userController->readUser();
            break;
            // read user by id
        case 'readUserbyId':
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['id'])) {
                    $id = intval($_GET['id']);
                    $userController = new UserController();
                    $userController->readUserById($id);
                } else {
                    echo "No ID";
                }
            }
            break;
            // create user
        case 'createUser':
            if (isset($_POST)) {
                $data = json_decode(file_get_contents("php://input"), true);
                if ($data) {
                    $userController = new UserController();
                    $userController->addUser($data);
                }
            }
            break;
            // update user
        case 'updateUser':
            $data = json_decode(file_get_contents("php://input"), true);
            $userController = new UserController();
            $userController->updateUser($data);
            break;
            // delete user
        case 'deleteUser':
            $data = json_decode(file_get_contents("php://input", true));
            $userController = new UserController();
            $userController->deleteUser($data);
            break;
        case 'uploadImage':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && isset($_POST['id'])) {
                $response = [];
                $uploadDir = 'C:/xampp/htdocs/ActNews/backend/uploads/img/profile/'; // Directory where you want to save the uploaded images
                $id = $_POST['id'];
                $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $imageName =  $id . "-" . "profile." . $imageExtension;
                $uploadFile = $uploadDir . $imageName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    $userController = new UserController();
                    $userController->uploadImage($imageName, $id);
                } else {
                    // $response['error'] = 'Failed to upload image';
                }
            } else {
                // $response['error'] = ' Error of request';
            }
            break;
        case 'updateImage':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && isset($_POST['id'])) {
                $response = [];
                $userController = new UserController();
                $uploadDir = 'C:/xampp/htdocs/ActNews/backend/uploads/img/profile/';
                $id = $_POST['id'];
                $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $imageName =  $id . "-" . "profile." . $imageExtension;
                $uploadFile = $uploadDir . $imageName;

                // Delete the old image if it exists
                $oldImagePath = $uploadDir . $userController->getOldImage($id);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {

                    $userController->uploadImage($imageName, $id); // Call your function to update the image name in the database
                    // Respond with success message or data
                } else {
                    // Respond with error message
                }
            } else {
                // Respond with error message
            }
            break;
            /**
             *Article Api
             */
        case 'getArticle':
            if (isset($_GET)) {
                $articleController = new ArticleController();
                $articleController->getArticle();
            }
            break;
        case 'readArticleByIdSection':
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['id'])) {
                    $id_section = $_GET['id'];
                    $articleController = new ArticleController();
                    $articleController->getArticleByIdSection($id_section);
                }
            }
            break;
        case 'getArticleById':
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['id'])) {
                    $id_article = $_GET['id'];
                    $articleController = new ArticleController();
                    $articleController->getArticleById($id_article);
                }
            }
            break;
        case 'createArticle':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && isset($_POST['id_section'])) {
                $uploadDir = 'C:/xampp/htdocs/ActNews/backend/uploads/img/article/'; // Set your upload directory
                $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $imageName = time() . "-" . "article." . $imageExtension;
                $uploadFile = $uploadDir . $imageName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    $articleController = new ArticleController();
                    $data = [
                        'title' => $_POST['title'],
                        'description' => $_POST['description'],
                        'date_published' => date('Y-m-d'),
                        'image' => $imageName,
                        'id_section' => $_POST['id_section']
                    ];
                    $articleController = new ArticleController();
                    $articleController->createArticle($data);
                }
            }
            break;
        case 'updateArticle':
            if (isset($_POST)) {
                $data = [
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'date_published' => date('Y-m-d'),
                    'id_section' => $_POST['id_section'],
                    'id_article' => $_POST['id_article']
                ];
                if (isset($_FILES['image'])) {
                    $uploadDir = 'C:/xampp/htdocs/ActNews/backend/uploads/img/article/'; // Set your upload directory
                    $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $imageName = time() . "-" . "article." . $imageExtension;
                    $uploadFile = $uploadDir . $imageName;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                        $data['image'] = $imageName;
                    };
                }
                $articleController = new ArticleController();
                $articleController->updateArtcile($data);
            }
            break;
        case 'getLastArticle':
            if (isset($_GET)) {
                $articleController = new ArticleController();
                $articleController->getLastArticle();
            }
            break;
        case 'deleteArticle':
            if (isset($_POST)) {
                $data = json_decode(file_get_contents("php://input"), true);
                $articleController = new ArticleController();
                $articleController->deleteArticle($data);
            }
            break;
            /**
             * Membres API
             */
        case 'getMembreByIdSection':
            if (isset($_GET) && isset($_GET['id'])) {
                $id_section = $_GET['id'];
                $teamController = new TeamController();
                $teamController->getMembreByIdSection($id_section);
            }
            break;
        case 'getMembres':
            if (isset($_GET)) {
                $teamController = new TeamController();
                $teamController->getMembres();
            }
            break;
        case 'getMembreById':
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['id']) {
                $id = intval($_GET['id']);
                $teamController = new TeamController();
                $teamController->getMembreById($id);
            }
            break;
        case 'createMembre':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_section'])) {
                $data = [
                    'last_name' => $_POST['last_name'],
                    'first_name' => $_POST['last_name'],
                    'job' => $_POST['job'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'id_section' => $_POST['id_section']
                ];
                $uploadDir = 'C:/xampp/htdocs/ActNews/backend/uploads/img/team/';
                if (isset($_FILES['image'])) {
                    $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $imageName = time() . "-" . "team." . $imageExtension;
                    $uploadFile = $uploadDir . $imageName;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                        $data['image'] = $imageName;
                    }
                }
                $teamController = new TeamController();
                $teamController->createMembre($data);
            }
            break;
        case 'updateMembre':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                $teamController = new TeamController();
                $id = $_POST['id'] + 0;
                $data = [
                    'id' => $id,
                    'last_name' => $_POST['last_name'],
                    'first_name' => $_POST['first_name'],
                    'job' => $_POST['job'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'id_section' => $_POST['id_section']
                ];
                if (isset($_FILES['image'])) {
                    $uploadDir = 'C:/xampp/htdocs/ActNews/backend/uploads/img/team/'; // Set your upload directory
                    $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $imageName = time() . "-" . "team." . $imageExtension;
                    $uploadFile = $uploadDir . $imageName;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                        // $oldImage = $teamController->getMembreImageById($_POST['id']);
                        $data['image'] = $imageName;
                        // if ($oldImage) {
                        //     $oldImagePath = $uploadDir . $oldImage;
                        //     if (file_exists($oldImagePath)) {
                        //         unlink($oldImagePath);
                        //     };
                        // };
                    };
                };
                $teamController->updateMembre($data);
            };
            break;
        case 'deleteMembre':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = json_decode(file_get_contents("php://input"), true);
                $teamController = new TeamController();
                $teamController->deleteMembre($data['id']);
            }
            break;
            /**
             * News Api
             */
        case 'createNew':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = json_decode(file_get_contents("php://input"), true);
                $newController = new NewController();
                $newController->createNew($data);
            }
            break;
        case 'getNew':
            if (isset($_GET)) {
                $newController = new NewController();
                $newController->getNew();
            }
            break;
        case 'getNewBySection':
            if (isset($_GET) && $_GET['id']) {
                $id_section = $_GET['id'];
                $newController = new NewController();
                $newController->getNewBySection($id_section);
            }
            break;
        case 'getNewById':
            if (isset($_GET) && $_GET['id']) {
                $id_new = $_GET['id'];
                $newController = new NewController();
                $newController->getNewById($id_new);
            }
            break;
        case 'getLastNew':
            if (isset($_GET)) {
                $newController = new NewController();
                $newController->getLastNew();
            }
            break;
        case 'updateNew':
            if (isset($_POST)) {
                $data = json_decode(file_get_contents("php://input"), true);
                $newController = new NewController();
                $newController->updateNew($data);
            }
            break;
        case 'deleteNew':
            if (isset($_POST)) {
                $data = json_decode(file_get_contents("php://input"), true);
                $newController = new NewController();
                $newController->deleteNew($data);
            }
            break;


        default:
            echo json_encode(array('error' => 'Invalid action'));
            break;
    }
} else {
    echo json_encode(array('error' => 'Action not specified'));
}
