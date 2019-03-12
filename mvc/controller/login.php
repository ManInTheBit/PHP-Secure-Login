<?php
/**
 * Created by burakisik at 02.03.2019.
 */

include("../../mvc/view/login.html"); # include view
include('../../includes/db_helper.php'); # include db connection
include('../../mvc/model/User.php'); # include user model
include('../../includes/secure_login_helper.php'); # include user model
session_start();
?>

<?php
if (isset($_POST['login'])) {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];


        $username = SecureLoginHelper::my_strip_tags($username);
        $password = SecureLoginHelper::my_strip_tags($password);

        $username = $_POST['username'];
        $encryptedPassword = md5($_POST['password']);

        /**
         * The connection will be created with default values which is in db_helper.php file
         * you can change default connection parameters with $db->setConnectionParameters($HOST, $DB_NAME, $DB_USERNAME, $DB_PASS);
         */
        $db = new SecureDatabase();
        $mysql_conn = $db->getMysqlConnection();

        if ($mysql_conn == null) {
            $response = array(
                "statusCode" => 521,
                "errorMessage" => "Something is wrong!"
            );
        } else {
            $user = new User($mysql_conn);
            $user_arr = $user->login($username, $encryptedPassword);
            $db->closeMysqlConnection();

            if ($user_arr != null) {
                $_SESSION['username'] = $user_arr[0];
                header("location:../../mvc/controller/index.php");
                /*
                 $response =  array (
                    "statusCode" => 200,
                    "message" => "success"
                 );
                */
            } else {
                $response = array(
                    "statusCode" => 404,
                    "errorMessage" => "User not found"
                );
            }
        }

        print_r(json_encode($response));
    }
}
?>

