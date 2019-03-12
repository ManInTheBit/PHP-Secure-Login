<?php
/**
 * Created by burakisik at 03.03.2019.
 */

include("../../mvc/view/header.html");


include('../../mvc/model/Post.php'); # include post model
include('../../includes/db_helper.php'); # include db connection

session_start();

$response = null;

$post_array = [];

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php
                echo "<br><br>";
                echo "<h3>";
                echo "hello ".$_SESSION['username'];
                echo "</h3>";
                echo "<br>";


                $db = new SecureDatabase();
                $mysql_conn = $db->getMysqlConnection();

                if ($mysql_conn == null) {

                    $response = array(
                        "statusCode" => 521,
                        "errorMessage" => "Something is wrong!"
                    );
                    print_r(json_encode($response));
                } else {

                    $post = new Post($mysql_conn);
                    $post_array = $post->fetch_post();
                    $db->closeMysqlConnection();


                    if (count($post_array) > 0) {

                        foreach ($post_array as $post) {
                            echo "<h3>".$post['title']."</h3>";
                            echo "<br>";
                            echo $post['body'];
                            echo $post['date'];
                            echo "<hr><br>";
                        }
                    }
                    else {

                        $response = array(
                            "statusCode" => 404,
                            "errorMessage" => "Post not found"
                        );
                        print_r(json_encode($response));
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php
   include("../../mvc/view/footer.html");
?>
