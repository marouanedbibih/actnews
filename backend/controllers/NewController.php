<?php
require_once('DataBaseController.php');
// include('DataBaseController.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
class NewController
{
    private $id;
    private $title;
    private $data_created;

    public function __construct()
    {
        $this->id = 0;
        $this->title = "";
        $this->data_created = "";
    }
    /**
     * Create new and send to database
     *
     * @param [type] $data
     * @return void
     */
    public function createNew($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new Database();
            $response = [];
            $query = "INSERT INTO new (title,date_created,id_section) VALUES(:title,:date_created,:id_section)";
            $parms = [
                'title' => $data['title'],
                'date_created' => date('Y-m-d H:i:s'),
                'id_section' => $data['id_section'],
            ];
            if ($db->executeQuery($query, $parms)) {
                $response['message'] = 'New created succufly';
            } else {
                $response['error'] = 'Create new faild !!';
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    /**
     * Get all information about new and the section id, title
     *
     * @return void
     */
    public function getNew()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            $response = [];
            $query = "SELECT n.*,s.id_section,s.title as section_title FROM new as n JOIN section as s on s.id_section = n.id_section ORDER BY n.date_created DESC,n.id;";
            $result = $db->fetchQuery($query);
            if ($result) {
                $response['data'] = $result;
                $response['message'] = "Get infos new succufly";
            } else {
                $response['error'] = "Not fund any news";
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    /**
     * Get all news by section
     *
     * @param [type] $id_section
     * @return void
     */
    public function getNewBySection($id_section)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            $response = [];
            $query = "SELECT n.id as new_id,n.title,n.date_created,s.title as section_title 
                    FROM new as n JOIN section as s 
                    on s.id_section = n.id_section 
                    WHERE s.id_section=:id_section 
                    ORDER BY n.date_created DESC,n.id DESC;";
            $result = $db->fetchQuery($query, ['id_section' => $id_section]);
            if ($result) {
                $response['data'] = $result;
                $response['message'] = 'Get news by Section succufly';
            } else {
                $response['error'] = 'Not news in this section';
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    /**
     * get Last 5 news
     *
     * @return void
     */
    public function getLastNew()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            $response = [];
            $query = "SELECT n.*,s.id_section,s.title as section_title 
                    FROM new as n JOIN section as s 
                    on s.id_section = n.id_section 
                    ORDER BY n.date_created DESC,n.id DESC
                    LIMIT 5;";
            $result = $db->fetchQuery($query);
            if ($result) {
                $response['data'] = $result;
                $response['message'] = "Get infos new succufly";
            } else {
                $response['error'] = "Not fund any news";
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    public function getNewById($id_new)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            $response = [];
            $query = "SELECT n.title,s.id_section 
                    FROM new as n JOIN section as s 
                    on s.id_section = n.id_section 
                    WHERE n.id=:id_new ;";
            $result = $db->fetchQuery($query, ['id_new' => $id_new]);
            if ($result) {
                $response['data'] = $result;
                $response['message'] = 'Get news by Id succufly';
            } else {
                $response['error'] = 'Get news by Id Faild';
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    /**
     * Update new 
     *
     * @param [type] $data
     * @return void
     */
    public function updateNew($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new Database();
            $response = [];
            $query = "UPDATE new SET 
                    title = :title, date_created =:date_created, id_section =:id_section 
                    WHERE id = :id;";
            $parms = [
                'id' => $data['id'],
                'title' => $data['title'],
                'date_created' => date('Y-m-d H:i:s'),
                'id_section' => $data['id_section'],
            ];
            if ($db->executeQuery($query, $parms)) {
                $response['message'] = 'New update succfuly';
            } else {
                $response['error'] = 'New not update !!';
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function deleteNew($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new Database();
            $response = [];
            $query = "DELETE FROM new WHERE id=:id";
            if ($db->executeQuery($query, ['id' => $data['id']])) {
                $response['message'] = "Delete new succufly";
            } else {
                $response['error'] = "New not delete";
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}
