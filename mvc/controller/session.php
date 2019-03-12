<?php
/**
 * Created by burakisik at 03.03.2019.
 */

   include('app_defines.php');
   session_start();

   if(!isset($_SESSION['login_user'])){
       header("location:login.php");
       die();
   }
?>