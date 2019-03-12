<?php
/**
 * Created by burakisik at 03.03.2019.
 */

   session_start();

   if(session_destroy()) {
       header("Location: login.php");
   }
    exit();
?>