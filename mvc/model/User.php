<?php
/**
 * Created by burakisik at 02.03.2019.
 */
class User
{
    # mysql connection info
    private $TABLE_NAME = "users";

    #user object fields
    private $username;
    private $password;

    /** @var mysqli $conn */
    private $conn;

    private $user_arr = array();


    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUserName() {
        return $this->username;
    }

    public function login( $username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $sql = "SELECT * FROM $this->TABLE_NAME 
                WHERE username = '" . $this->username . "' and password = '" . $this->password . "'"; #database query string

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            array_push($this->user_arr, $user['username']);
            return $this->user_arr;
        }else {
            return null;
        }
    }
}