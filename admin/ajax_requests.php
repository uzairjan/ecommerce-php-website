<?php
require_once "../configuration/config.php";
use Admin\AdminController as Admin;

$adminObj = new Admin();

// registration of new user
if (isset($_POST['reg_user'])) {
    $result = $adminObj->registerUser($_POST['reg_user'], $databaseObj->connection);

}
// login user
if (isset($_POST['login_user'])) {
    $result = $adminObj->loginUser($_POST['login_user'], $databaseObj->connection);

    if ($result) {
        return false;
    } else {
        return true;
    }
    // header("location:admin/index.php");
}

if (isset($_POST['submit2'])) {

    $result = $adminObj->addUser($_POST['submit2'], $databaseObj->connection);
    if ($result) {
        $msg = " user succesfully added";
    } else {
        $msg = "something went wrong";
    }
    header("Location:user.php");
}
// fetch user data from database and place it in edit user modal
if (isset($_POST['user_id'])) {

    echo json_encode($adminObj->GetUser($_POST['user_id'], $databaseObj->connection));

}
// sending all atrubutes value of user to database for upadation
// putting value from the form into database
if (isset($_POST['id'])) {
    $result = $adminObj->updateUser($_POST['id'], $databaseObj->connection);
    if ($result) {
        $msg = "successfuly updated";
    } else {
        $msg = "something went wrong";

    }
    header("Location:user.php");
}

// delete User
if (isset($_GET['dlt_user'])) {
    $result = $adminObj->DeleteUser($_GET['dlt_user'], $databaseObj->connection);
    if ($result) {
        $msg = " Deleted Successfully";
    } else {
        $msg = " something went wrong";
    }
    header("Location:user.php");
}

// add new category
if (isset($_POST['submit1'])) {
    $result = $adminObj->addCategory($_POST['submit1'], $databaseObj->connection);
    if ($result) {
        $msg = " successfully added";
    } else {
        $msg = "something went wrong";
    }
    header("location:category.php");
}

//
//fetch category from database place it to edit category modal
if (isset($_POST['cat_id'])) {
    echo json_encode($adminObj->getCat($_POST['cat_id'], $databaseObj->connection));
}

// push data from edit category modal to database
if (isset($_POST['category_id'])) {
    $result = $adminObj->updateCat($_POST['category_id'], $databaseObj->connection);
    if ($result) {
        $msg = " successfuly updated";
    } else {
        $msg = "something went wrong";
    }
    header("Location:category.php");
}

// delete category (remove category name from database)
if (isset($_GET['cat_id'])) {
    $result = $adminObj->DeleteCategory($_GET['cat_id'], $databaseObj->connection);
    if ($result) {
        $msg = "successfully deleted";
    } else {
        $msg = "Something went wrong";
    }
    header("Location:category.php");
}

//add new product
if (isset($_POST['add_product'])) {

    $result = $adminObj->addProduct($_POST['add_product'], $databaseObj->connection);
    if ($result) {

        $msg = "Product is successfully added";
    } else {
        $msg = "something went Wrong";
    }
    header("Location:product.php");
}

// fetch value of product from the database and put it to update product module
if (isset($_POST['update_pro'])) {
    echo json_encode($adminObj->getProduct($_POST['update_pro'], $databaseObj->connection));
    # code...
}
if(isset($_POST['update_profile'])){
    echo json_encode($adminObj->getuserProfile($_POST['update_profile'], $databaseObj->connection));
}
 if(isset($_POST['userprofile_id'])){
     $result = $adminObj->updateuserProfile($_POST['userprofile_id'],$databaseObj->connection);
       header("location:index.php");
 }
// getting product description
if (isset($_POST['pro_descr'])) {
     echo json_encode($adminObj->getproductDesc($_POST['pro_descr'], $databaseObj->connection));
}
//fetch record of product for update product image modal 
if(isset($_POST['update_prod_image'])){
    echo json_encode($adminObj->getproductImage($_POST['update_prod_image'], $databaseObj->connection));
}
// push image of product from update product image modal to database and update it with previous data
if(isset($_POST['product_image_id'])){
    $result = $adminObj->updateProductImage($_POST['product_image_id'],$databaseObj->connection);
   
    header("location:product.php");
    

} 
// fetch user image fro update user image modal 
if(isset($_POST['user_update_image'])){
    echo json_encode($adminObj->getuserImage($_POST['user_update_image'],$databaseObj->connection));

}
// update User image
if(isset($_POST['user_image_id'])){
    $result = $adminObj->updateuserImage($_POST['user_image_id'], $databaseObj->connection);
    
    header("location:user.php");
}


 
// push product update form data to database
if (isset($_POST['product_id'])) {
    $result = $adminObj->updateProduct($_POST['product_id'], $databaseObj->connection);

    if ($result) {
        $msg = "product successfully updated";
    } else {
        $msg = "something went wrong";
    }
    header("location:product.php");
}

// for delete product
if (isset($_GET['Prod_id'])) {
    $result = $adminObj->DeleteProduct($_GET['Prod_id'], $databaseObj->connection);
    if ($result) {
        $msg = "successfully deleted";
    } else {
        $msg = "something went wrong";
    }
    header("Location:product.php");
}
