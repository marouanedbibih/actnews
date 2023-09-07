<?php
require_once('DataBaseController.php');
// include('DataBaseController.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');

class TeamController
{
    private $id;
    private $last_name;
    private $first_name;
    private $email;
    private $phone;
    private $image;
    public function __construct()
    {
        $this->id = 0;
        $this->last_name = "";
        $this->first_name = "";
        $this->email = "";
        $this->phone = "";
        $this->image = "";
    }

    public function getMembreByIdSection($id_section)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            $response = [];
            $query = "SELECT t.id, t.last_name, t.first_name, t.job, t.email, t.phone, t.image
                FROM team t
                JOIN section s ON t.id_section = s.id_section
                WHERE s.id_section = :id_section;
            ";
            $parms = [
                'id_section' => $id_section
            ];
            $membres = $db->fetchQuery($query, $parms);
            if ($membres !== null) {
                $response['membres'] = $membres;
            } else {
                $response['error'] = "Not exist any membres in this section";
            }
            header("Content-Type: application/json");
            echo json_encode(($response));
        }
    }
    public function getMembres()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            $response = [];
            $query = "SELECT
                    t.id,
                    t.last_name,
                    t.first_name,
                    t.job,
                    t.email,
                    t.phone,
                    t.image,
                    s.title AS section_title
                    FROM
                        team AS t
                    JOIN
                        section AS s ON t.id_section = s.id_section
                    ORDER BY t.id DESC;
                    ";
            $result = $db->fetchQuery($query);
            if ($result) {
                $response['data'] = $result;
            } else {
                $response['error'] = "Membre empty";
            }
            header("Content-Type: application/json");
            echo json_encode($response);
        }
    }

    public function getMembreById($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            $response = [];
            $query = "
                    SELECT
                    t.id,
                    t.last_name,
                    t.first_name,
                    t.job,
                    t.email,
                    t.phone,
                    t.image,
                    s.id_section AS section_id
                    FROM
                        team AS t
                    JOIN
                        section AS s ON t.id_section = s.id_section
                    
                    WHERE
                    t.id = :id";
            $parms = [
                'id' => $id
            ];

            $result = $db->fetchQuery($query, $parms);
            if ($result) {
                $response['data'] = $result;
            } else {
                $response['error'] = 'Membre not fund';
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    public function createMembre($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new Database();
            $response = [];
            $parms = [
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'job' => $data['job'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'id_section' => $data['id_section'],
            ];
            if (array_key_exists('image', $data)) {
                $parms['image'] = $data['image'];
                $queryImage = "INSERT INTO team (last_name, first_name, job, email, phone, id_section, image)
                VALUES (:last_name, :first_name, :job, :email, :phone, :id_section, :image);
                ";
                $reult = $db->executeQuery($queryImage, $parms);
            } else {
                $parms['image'] = "profile-image.webp";
                $queryImage = "INSERT INTO team (last_name, first_name, job, email, phone, id_section,image)
                VALUES (:last_name, :first_name, :job, :email, :phone, :id_section,:image);
                ";
                $reult = $db->executeQuery($queryImage, $parms);
            }
            if ($reult) {
                $response['message'] = 'Membre added succufly';
            } else {
                $response['error'] = 'Membre not added ..!';
            }
            header(('Content-Type: application/json'));
            echo json_encode($response);
        }
    }
    public function updateMembre($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new Database();
            $response = [];
            $params = [
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'job' => $data['job'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'id_section' => $data['id_section'],
                'id' => $data['id'] // Assuming you provide the member's ID
            ];
            if (array_key_exists('image', $data)) {
                $params['image'] = $data['image'];
                $query = "UPDATE team
                    SET last_name = :last_name,
                        first_name = :first_name,
                        job = :job,
                        email = :email,
                        phone = :phone,
                        id_section = :id_section,
                        image = :image
                    WHERE id = :id";
                $result = $db->executeQuery($query, $params);
            } else {
                $query = "UPDATE team
                SET last_name = :last_name,
                    first_name = :first_name,
                    job = :job,
                    email = :email,
                    phone = :phone,
                    id_section = :id_section
                WHERE id = :id;
                ";
                $result = $db->executeQuery($query, $params);
            }
            if ($result) {
                $response['message'] = 'Membre updated successfully';
            } else {
                $response['error'] = 'Membre not updated.';
            }

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    public function getMembreImageById($membreId)
    {
        $db = new Database();
        $response = [];
        $query = "SELECT image FROM team WHERE id = :membreId";
        $params = ['membreId' => $membreId];
        $result = $db->fetchQuery($query, $params);

        if ($result) {

            return json_encode($result[0]);
        }
    }
    public function deleteMembre($membreId)
    {
        $db = new Database();
        $response = [];

        // Retrieve the image filename before deleting
        $oldImage = $this->getMembreImageById($membreId);

        $query = "DELETE FROM team WHERE id = :membreId";
        $params = ['membreId' => $membreId];

        $result = $db->executeQuery($query, $params);

        if ($result) {
            // Delete the associated image file if it exists
            if ($oldImage) {
                $uploadDir = 'C:/xampp/htdocs/ActNews/backend/uploads/img/team/';
                $oldImagePath = $uploadDir . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $response['message'] = 'Membre deleted successfully';
        } else {
            $response['error'] = 'Membre not deleted.';
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
