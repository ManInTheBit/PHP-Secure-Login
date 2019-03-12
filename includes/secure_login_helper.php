<?php
/**
 * Created by burakisik at 03.03.2019.
 */

class SecureLoginHelper
{
    //prevent to xss
    public static function my_strip_tags($variable) {
        return strip_tags($variable);   # The strip_tags() function strips a string from HTML, XML, and PHP tags.
    }

    public static function my_trim($variable) {
        return trim($variable); # The method removes whitespace from both sides of a string.
    }

    public static function my_filter_var($variable) {
        return filter_var($variable, FILTER_SANITIZE_STRING);
    }


    public static function my_htmlspecialchars($variable)
    {
        return htmlspecialchars($variable); # The method converts some predefined characters to HTML entities.
    }

    public static function my_utf8_decode($variable) {
        return utf8_decode($variable); # The method decodes a UTF-8 string to ISO-8859-1.
    }

    public static function my_htmlentities($variable) {
        return htmlentities($variable); # Reserved characters in HTML replaced with character entities.
    }

    public static function my_stripslashes($variable) {
        return stripslashes($variable); # The method removes backslashes.
    }

    public static function my_addslashes($variable) {
        return addslashes($variable); # The method returns a string with backslashes in front of predefined characters.
    }

    public static function my_get_magic_quotes_gpc() {
        return get_magic_quotes_gpc();
    }

    // preventing sql injection
    public static function my_mysqli_real_escape_string($conn, $variable) {
        /*
            if coder does not check $_POST['password'], it could be anything! For example:
            $_POST['username'] = 'burak';
            $_POST['password'] = "' OR ''='";

            the sql query is sent to MySQL and a black hat can send a query like:
            SELECT * FROM users WHERE user='burak' AND password='' OR ''=''
            This state allows anyone to sign-in without a valid password.
         */
        return mysqli_real_escape_string($conn, $variable);
    }
}

