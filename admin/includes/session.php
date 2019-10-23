<?php 
  session_start(); 

  if(!isset($_SESSION ['username'])){
    header('location:../new_login.php');
   }
   
?>
