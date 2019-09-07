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

if (isset($_POST['submit'])) {

    $result = $adminObj->addUser($_POST['submit'], $databaseObj->connection);
    if ($result) {
        $msg = " user succesfully added";
    } else {
        $msg = "something went wrong";
    }
    header("Location:user.php?msg=$msg");
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
    header("Location:user.php?msg=$msg");
}

// delete User
if (isset($_GET['dlt_user'])) {
    $result = $adminObj->DeleteUser($_GET['dlt_user'], $databaseObj->connection);
    if ($result) {
        $msg = " Deleted Successfully";
    } else {
        $msg = " something went wrong";
    }
    header("Location:user.php?msg=$msg");
}

// add new category
if (isset($_POST['submit1'])) {
    $result = $adminObj->addCategory($_POST['submit1'], $databaseObj->connection);
    if ($result) {
        $msg = " successfully added";
    } else {
        $msg = "something went wrong";
    }
    header("location:category.php?msg=$msg");
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
    header("Location:category.php?msg=$msg");
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
    header("Location:product.php?msg=$msg");
}

// fetch value of product from the database and put it to update product module
if (isset($_POST['update_pro'])) {
    echo json_encode($adminObj->getProduct($_POST['update_pro'], $databaseObj->connection));
    # code...
}
// getting product description
if (isset($_POST['pro_descr'])) {
    echo json_encode($adminObj->getproductDesc($_POST['pro_descr'], $databaseObj->connection));
}

// push product update form data to database
if (isset($_POST['product_id'])) {
    $result = $adminObj->updateProduct($_POST['product_id'], $databaseObj->connection);

    if ($result) {
        $msg = "product successfully updated";
    } else {
        $msg = "something went wrong";
    }
    header("location:product.php?msg=$msg");
}

// for delete product
if (isset($_GET['Prod_id'])) {
    $result = $adminObj->DeleteProduct($_GET['Prod_id'], $databaseObj->connection);
    if ($result) {
        $msg = "successfully deleted";
    } else {
        $msg = "something went wrong";
    }
    header("Location:product.php?msg=$msg");
}
