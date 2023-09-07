<?php
require_once("DataBaseController.php");
class ArticleController
{
    private $id_article;
    private $title;
    private $description;
    private $date_published;
    private $image;

    public function __construct()
    {
        $this->id_article = 0;
        $this->title = "";
        $this->description = "";
        $this->date_published = "";
        $this->image = "";
    }
    public function getArticle()
    {
        if ($_SERVER['REQUEST_METHOD']) {
            $db = new Database();
            $response = [];
            $query = "SELECT a.*,s.title as section_title 
                    FROM article as a 
                    JOIN section as s 
                    ON a.id_section = s.id_section
                    ORDER BY a.date_published DESC,a.id DESC";
            $result = $db->fetchQuery($query);
            if ($result) {
                $response['data'] = $result;
                $response['message'] = "Get All articles succfuly";
            } else {
                $response['error'] = "Dont have any articles";
            }
            header("Content-Type: application/json");
            echo json_encode($response);
        }
    }

    public function getArticleByIdSection($id_section)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            $response = [];
            $query = "SELECT id, title, description,image,date_published
                        FROM article
                        WHERE id_section = :id_section
                        ORDER BY date_published DESC,id DESC";;
            $param = [
                'id_section' => $id_section
            ];
            $result = $db->fetchQuery($query, $param);
            if ($result) {
                $response['data'] = $result;
            } else {
                $response['error'] = "Error to get articles infos";
            }
            header("Content-Type: application/json");
            echo json_encode($response);
        }
    }
    public function getArticleById($id_article)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new Database();
            $response = [];
            $query = "SELECT a.id, a.title, a.description, a.image, a.date_published, s.title AS section_title,s.id_section
                        FROM article AS a
                        JOIN section AS s ON a.id_section = s.id_section
                        WHERE a.id = :id_article";
            $param = [
                'id_article' => $id_article
            ];
            $result = $db->fetchQuery($query, $param);
            if ($result) {
                $response['data'] = $result;
            } else {
                $response['error'] = "Error to get articles infos";
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getLastArticle()
    {
        $db = new Database();
        $response = [];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $query = "SELECT a.id AS article_id, a.date_published, a.title AS article_title, a.description AS article_description, a.image AS article_image,
                        s.id_section AS section_id, s.title AS section_title
                        FROM article a
                        INNER JOIN section s ON a.id_section = s.id_section
                        ORDER BY a.date_published DESC,a.id DESC
                        LIMIT 2;";
            $result = $db->fetchQuery($query);
            if ($result) {
                $response['data'] = $result;
            } else {
                $response['error'] = "Query not exucuted";
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    public function createArticle($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($data) {
                $db = new Database();
                $response = [];
                $this->title = $data['title'];
                $this->description = $data['description'];
                $this->date_published = $data['date_published'];
                $this->image = $data['image'];
                $id_section = $data['id_section'];
                $query = "INSERT INTO article (title, description, date_published, image, id_section)
                        VALUES (:title,:description,:date_published,:image,:id_section);";
                $param = [
                    'title' => $this->title,
                    'description' => $this->description,
                    'date_published' => $this->date_published,
                    'image' => $this->image,
                    'id_section' => $id_section
                ];
                if ($db->executeQuery($query, $param)) {
                    $response['message'] = "Article add succfuly in section N°" . $id_section;
                } else {
                    $response['error'] = " Article not add ";
                }
            }
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function updateArtcile($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new Database();
            $response = [];
            $queryText = "UPDATE article SET 
                title=:title,
                description=:description,
                id_section =:id_section 
                WHERE id=:id_article;";
            $parmsText = [
                'id_article' => $data['id_article'],
                'title' => $data['title'],
                'description' => $data['description'],
                'id_section' => $data['id_section'],
            ];
            if ($db->executeQuery($queryText, $parmsText)) {
                if (array_key_exists('image', $data)) {
                    $queryImage = "UPDATE article SET
                                image=:image WHERE id=:id_article; ";
                    if ($db->executeQuery($queryImage, [
                        'image' => $data['image'],
                        'id_article' => $data['id_article'],
                    ])) {
                        $response['image'] = "image update succfuly";
                    }
                }
                $response['message'] = "Article infos update succfuly";
            } else {
                $response['error'] = "Article not update";
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    public function deleteArticle($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new Database();
            $response = [];
            $query = "DELETE FROM article WHERE id=:id_article";
            if ($db->executeQuery($query, ['id_article' => $data['id_article']])) {
                $response['message'] = 'Article Deleted succfuly';
            } else {
                $response['error'] = "Article not Deleted";
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}
