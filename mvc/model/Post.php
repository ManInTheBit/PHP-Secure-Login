<?php
/**
 * Created by burakisik at 03.03.2019.
 */

class Post
{
    private $TABLE_NAME = "posts";

    private $id;
    private $title;
    private $category;
    private $date;
    private $body;
    private $author;
    private $keywords;

    private $post_array = [];

    /** @var mysqli $conn */
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function fetch_post()
    {
        $sql = "SELECT * FROM $this->TABLE_NAME"; # database query string
        $result = mysqli_query($this->conn, $sql);

        while ($post = mysqli_fetch_assoc($result)) {
            $this->id = $post['id'];
            $this->title = $post['title'];
            $this->category = $post['category'];
            $this->date = $post['date'];
            $this->body = $post['body'];
            $this->author = $post['author'];
            $this->keywords = $post['keywords'];

            $this->post_array[] = $post;
        }

        if (count($this->post_array) > 0) {
            return $this->post_array;
        } else {
            return null;
        }
    }
}
