<?php 
require_once("../configuration/config.php");
use Admin\AdminController as Admin;

$adminObj = new Admin();

if(isset($_GET['cat_id'])){
    $result = $adminObj->DeleteCategory($_GET['cat_id'], $databaseObj->connection);
    if($result){
        $msg = "successfully deleted";
    }else{
        $msg = "Something went wrong";
    }
    header("Location:category.php?msg=$msg");
}   