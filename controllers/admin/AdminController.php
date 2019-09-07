<?php

namespace Admin;

use Client\DatabaseController as Database;

class AdminController extends Database
{
    public function __construct()
    {
        //    $this->help();
    }

    /**
     * 0 params
     * categories
     */

    // register user
    public function registerUser($id, $connection)
    {
        $errors = array();
        // receive all input values from the form
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($username)) {array_push($errors, "Username is required");}
        if (empty($email)) {array_push($errors, "Email is required");}
        if (empty($password_1)) {array_push($errors, "Password is required");}
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

// first check the database to make sure
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM users WHERE firstname='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($connection, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['firstname'] === $username) {
                array_push($errors, "Username already exists");
            }

            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }

// Finally, register user if there are no errors in the form

        if (count($errors) == 0) {
            $password = md5($password_1); //encrypt the password before saving in the database

            $query = "INSERT INTO users (firstname, email, password)
              VALUES('$username', '$email', '$password')";
            mysqli_query($connection, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../new_login.php');
        }

    }

    // login user
    public function loginUser($id, $connection)
    {
        session_start();
        $errors = array();
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        //   $firstname=mysqli_real_escape_string($connection,$_POST['firstname'])
        if (empty($username)) {
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) > 0) {
            $_SESSION['errors'] = $errors;
            header("Location:../new_login.php");
        }else{
            $password = md5($password);
            $query = "SELECT * FROM users WHERE firstname='$username' AND password='$password'";
            $results = mysqli_query($connection, $query);
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";

                if (isset($_SESSION['username'])) {
                    header('location:../admin/index.php');
                }
            }else{
                array_push($errors, "Wrong username/password combination");
                $_SESSION['errors'] = $errors;
                header("Location:../new_login.php");
            }
        }
    }

    // add new category
    public function addCategory($id, $connection)
    {
        $cat_name = $_POST['name'];
        $query = "INSERT INTO category (name) VALUES('$cat_name')";
        $result = mysqli_query($connection, $query);
        if (mysqli_error($connection)) {
            die(mysqli_error($connection));
        }
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function GetCategories($connection)
    {
        $query = "SELECT * FROM category";
        $result = mysqli_query($connection, $query);
        $AllCategories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (mysqli_error($connection)) {
            die(mysqli_error($connection));
        }
        return $AllCategories;
    }

    public function GetProducts($connection)
    {
        $query = "SELECT * FROM products";
        $result = mysqli_query($connection, $query);
        $AllProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (mysqli_error($connection)) {

            die(mysqli_error($connection));
        }
        return $AllProducts;

    }
    public function GetUsers($connection)
    {
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);
        $AllUsers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (mysqli_error($connection)) {
            die(mysqli_error($connection));

        }
        return $AllUsers;

    }

    public function GetSales($connection)
    {
        $query = "SELECT * FROM  users INNER JOIN sales on user_id = sales.user_id";
        $result = mysqli_query($connection, $query);
        $AllSales = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (mysqli_error($connection)) {
            die(mysqli_error($connection));
        }
        return $AllSales;
    }
    //edit  category function
    //   geting single category for editing using id
    public function getCat($id, $connection)
    {
        $query = "SELECT * FROM category where id ='" . $id . "' ";
        $result = mysqli_query($connection, $query);
        //return category;
        $category = mysqli_fetch_assoc($result);
        return $category;

    }
    // update category
    public function updateCat($id, $connection)
    {
        $name = $_POST['name'];
        $query = " UPDATE category SET name= '$name'
        WHERE id='$id' ";
        // $result = mysqli_query($connection,)
        $result = mysqli_query($connection, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // for deleting category function
    public function DeleteCategory($id, $connection)
    {
        $query = "DELETE FROM category where id = '" . $id . "' ";
        $result = mysqli_query($connection, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    // add new products++
    public function addProduct($id, $connection)
    {
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $filename = $_FILES["photo"]["name"];
        $imagetmp = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        // $product_description= $_POST['editor2'];
        // File upload path
        // $targetDir = "assets/img/";
        // $fileName = basename($_FILES["photo"]["name"]);
        // $targetFilePath = $targetDir . $fileName;
        // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        // $allowTypes = array('jpg','png','jpeg','gif','pdf');
        // if(in_array($fileType, $allowTypes)){
        //     if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)){

        $query = "INSERT INTO products (name, price,photo) VALUES('$product_name', '$product_price','$filename')";
        $result = mysqli_query($connection, $query);
        if (mysqli_error($connection)) {
            die(mysqli_error($connection));
        } else if ($result) {
            return true;
        } else {
            return false;
            //     }
            // }
        }
    }
    // update product function
    public function updateProduct($id, $connection)
    {
        $id = $_POST['product_id'];
        $name = $_POST['pro_name'];
        $price = $_POST['pro_price'];
        $description = $_POST['editor1'];
        $query = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id='$id' ";
        $result = mysqli_query($connection, $query);
        if (mysqli_error($connection)) {
            die(mysqli_error($connection));
        }
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getProduct($id, $connection)
    {
        $query = "SELECT * FROM products where id ='" . $id . "' ";
        $result = mysqli_query($connection, $query);
        $product = mysqli_fetch_assoc($result);

        return $product;
    }

    //  // fetch decription product
    public function getproductDesc($id, $connection)
    {
        $query = "SELECT * FROM products where id='" . $id . "'";
        $result = mysqli_query($connection, $query);
        $product = mysqli_fetch_assoc($result);
        if (mysqli_error($connection)) {
            die($mysqli_error($connection));
        } else {
            return $product;
        }
    }

    // for deleting product function
    public function DeleteProduct($id, $connection)
    {
        $query = "DELETE FROM products where id = '" . $id . "' ";
        $result = mysqli_query($connection, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }
    // delete User function
    public function DeleteUser($id, $connection)
    {
        $query = "DELETE FROM users where id= '" . $id . "' ";
        $result = mysqli_query($connection, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // add new users
    public function addUser($id, $connection)
    {
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $query = " INSERT INTO users (email, firstname,lastname,address, contact_info, password) VALUES('$email', '$firstname', '$lastname', '$address', '$contact','$password' ) ";

        $result = mysqli_query($connection, $query);
        if (mysqli_error($connection)) {
            die(mysqli_error($connection));
        }
        if ($result) {
            return true;
        } else {
            return false;
        }

    }
    // geting single user for updation
    public function GetUser($id, $connection)
    {
        //select * from where id  = id
        $query = "SELECT * FROM users where id ='" . $id . "' ";
        // mysqli query
        $result = mysqli_query($connection, $query);
        //return user;
        $User = mysqli_fetch_assoc($result);
        return $User;

    }

    // update User
    public function updateUser($id, $connection)
    {
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $contact = $_POST['contactinfo'];
        $query = " UPDATE Users
         SET  email='$email', firstname ='$firstname', lastname= '$lastname', contact_info='$contact', address= '$address'
         WHERE id='$id' ";
        //  $result = mysqli_query($connection,)
        $result = mysqli_query($connection, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

}
