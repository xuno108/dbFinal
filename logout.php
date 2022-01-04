<?php
   session_start();
   unset($_SESSION['login']);
   unset($_SESSION['uID']);
   unset($_SESSION['username']);
   unset($_SESSION['password']);
   unset($_SESSION['uName']);
   unset($_SESSION['uPhone']);
   unset($_SESSION['uEmail']);
   header("Location: index.php");
   
?>