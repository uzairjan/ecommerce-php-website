<?php 
require_once("../configuration/config.php");
use Admin\AdminController as Admin;

$adminObj = new Admin();

  // add new user 
  if (isset($_POST['submit'])) {

      $result = $adminObj->addUser($_POST['submit'], $databaseObj->connection);
      if ($result) {
          $msg =" user succesfully added";
      }
      else{
        $msg ="something went wrong";
      }
      header("Location:user.php?msg=$msg");
  }
          //edit category
         if(isset($_POST['cat_id'])){
             echo json_encode($adminObj->getCat($_POST['cat_id'], $databaseObj->connection));
         } 
   /// edit category
   if (isset($_POST['user_id'])) {

      
       echo json_encode( $adminObj->GetUser($_POST['user_id'], $databaseObj->connection));

   }  
   if (isset($_POST['update_pro'])) {
       echo json_encode($adminObj->getProduct($_POST['update_pro'],$databaseObj->connection));
       # code...
   } 
   // update product
   if(isset($_POST['product_id'])){
       $result = $adminObj->updateProduct($_POST['product_id'], $databaseObj->connection);

       if ($result) {
           $msg= "product successfully updated";
       }
       else{
           $msg= "something went wrong";
       }
       header("location:product.php?msg=$msg");
   }
    // putting value from the form into database
   if(isset($_POST['id'])){
    //    $email=$_POST['email'];
    //    $firstname= $_POST['firstname'];
    //    $lastname =$_POST['lastname'];
    //    $password =$_POST['password'];
    //    $address =$_POST['address'];
    //    $contact =$_POST['contactinfo'];

    $result= $adminObj->updateUser($_POST['id'], $databaseObj->connection);
    if ($result) {
           $msg = "successfuly updated";
    }
    else{
        $msg = "something went wrong";

    }
   header("Location:user.php?msg=$msg");
    }
    // add new category
    if (isset($_POST['submit1'])) {
        $result = $adminObj->addCategory($_POST['submit1'], $databaseObj->connection);
        if ($result) {
            $msg= " successfully added";
        }
        else{
            $msg= "something went wrong";
        }
        header("location:category.php?msg=$msg");
    } 
    // update category 
    if(isset($_POST['category_id'])){
        $result = $adminObj->updateCat($_POST['category_id'], $databaseObj->connection);
        if($result){
            $msg =" successfuly updated";
        }
        else{
            $msg= "something went wrong";
        }
        header("Location:category.php?msg=$msg");
    }


    // delete category
    if(isset($_GET['cat_id'])){
        $result = $adminObj->DeleteCategory($_GET['cat_id'], $databaseObj->connection);
        if($result){
            $msg = "successfully deleted";
        }else{
            $msg = "Something went wrong";
        }
        header("Location:category.php");
    }   
          // for delete product
    if(isset($_GET['Prod_id'])){
        $result = $adminObj->DeleteProduct($_GET['Prod_id'],$databaseObj->connection);
        if($result){
            $msg = "successfully deleted";
        }
        else{
            $msg = "something went wrong";
        } 
        header("Location:product.php?msg=$msg");
    }
        // delete User
      if (isset($_GET['dlt_user'])) {
        $result = $adminObj->DeleteUser($_GET['dlt_user'], $databaseObj->connection);
        if ($result) {
                $msg =" Deleted Successfully";
                } 
      else{
                $msg=" something went wrong";
            }
            header("Location:user.php?msg=$msg");



        }

?>