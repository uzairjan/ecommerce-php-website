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
                $_SESSION['id'] = $user_id;
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
        session_start();
        $_SESSION['success_addcategory'] ="<b> Category is successfully added</b>";
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
     // get all product all data and put it to some update product modal
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
    // will get user data on provided id and append it on updateprofile modal
    public function getuserProfile($id,$connection){
        $query = "SELECT * FROM users where id ='" . $id . "' ";
        // mysqli query
        $result = mysqli_query($connection, $query);
        //return user;
        $UserProfile = mysqli_fetch_assoc($result);
        return $UserProfile;
    }
     public function updateuserProfile(){

     }
    // get all user modal for and push it to update user modal
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
        session_start();
        $_SESSION['success_updatecategory'] ="<b> Category is successfully Updated</b>";
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
        session_start();
        $_SESSION['success_deletecategory'] ="<b> Category is successfully deleted</b>";
           if($result){
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
        $product_description = $_POST['description'];
        $fileName =  $_FILES['add_photo']['name'];
        $target = "assets/img/";          
        $fileTarget = $target.$fileName;     
        $tempFileName = $_FILES["add_photo"]["tmp_name"];
            
        $result = move_uploaded_file($tempFileName,$fileTarget);  

        if ($result) {
        $query = "INSERT INTO products (name, price,photo, description) VALUES('$product_name', '$product_price','$fileName','$product_description')";
        $result = mysqli_query($connection, $query);
        session_start();
        $_SESSION ['success_addproduct'] = "<b> Product is Successfully Added!</b>";
        if (mysqli_error($connection)) {
            die(mysqli_error($connection));
        } else if ($result) {
            return true;
        } else {
            return false;
            
        }
    } else{
        session_start();
        $_SESSION['proimage_error']= "<b style='color:white;'> there is problem </b>";
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
        session_start();
        $_SESSION ['success_updateproduct'] = "<b> Product is Successfully Updated!</b>";
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

     // fetch product for product image modal
     public function getproductImage($id,$connection)
     {   
        $query = "SELECT * FROM products where id=' " . $id ."' " ;
        $result = mysqli_query($connection, $query);
        $productImage = mysqli_fetch_assoc($result);
        if(mysqli_error($connection)){
            die(mysqli_error($connection));
        }
        else{
          return $productImage; 
        }
     }
     // update product image
     public function updateProductImage($id,$connection)
        {
       
        $fileName =  $_FILES['photo']['name'];

            $target = "assets/img/";          
            $fileTarget = $target.$fileName;     
            $tempFileName = $_FILES["photo"]["tmp_name"];

            $result = move_uploaded_file($tempFileName, $fileTarget);
            if($result){
              $query = "UPDATE products SET photo= '$fileName'   where id='$id' ";
              $response =mysqli_query($connection, $query);
              session_start();
              $_SESSION['success_updateimage'] ="<b style='color:white;'> product Image is successfully updated!</b>";
              if(mysqli_error($connection)){
                  die(mysqli_error($connection));
              }
              if($response){
                  return true;
              }else {
                  return false;
               }

            }
            else{
                session_start();
                $_SESSION['error_updateimage'] ="<b style='color:white;'> Some problem occur while Updating product image!</b>";
            }
    

     }
      // fetch decription product
    public function  getproductDesc($id, $connection)
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
        session_start();
        $_SESSION['success_deleteproduct']= "<b> Product is sucessfully deleted! </b>";
        
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
        session_start();
        $_SESSION['success_deleteuser']= "<b style='color:white;'> User is successfully deleted ! </b>";
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
        $fileName =$_FILES['add_photo']['name'];
        $target = "../assets/client/images/";          
        $fileTarget = $target.$fileName;     
        $tempFileName = $_FILES["add_photo"]["tmp_name"];
            
        $result = move_uploaded_file($tempFileName,$fileTarget);
        if($result){
            $query = " INSERT INTO users (email, firstname,lastname, address , contact_info, password ,photo) VALUES('$email', '$firstname', '$lastname', '$address', '$contact','$password', '$fileName') ";

                $result = mysqli_query($connection, $query);
                session_start();
                $_SESSION['success_adduser'] ="<b> User is successfully added !</b>";
                if(mysqli_error($connection)) {
                    die(mysqli_error($connection));
                }

                if ($result) {
                    return true;
                } else {
                    return false;
                }
    
         } else{
             session_start();
             $_SESSION['error_adduser']="<b style='color:white;'> Something went wrong while adding user!</b>"; 
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
    // get user for  for changing user picture
    public function getuserImage($id, $connection){
         //select * from where id  = id
         $query = "SELECT * FROM users where id ='" . $id . "' ";
         // mysqli query
         $result = mysqli_query($connection, $query);
         //return user;
         $UserImage = mysqli_fetch_assoc($result);
         return $UserImage;

    }
    // update user image 
    public function updateuserImage($id, $connection){
        $fileName =$_FILES['update_photo']['name'];
        $target = "../assets/client/images/";          
        $fileTarget = $target.$fileName;     
        $tempFileName = $_FILES["update_photo"]["tmp_name"];
            
        $result = move_uploaded_file($tempFileName , $fileTarget);
        if($result)
            {
            $query =" UPDATE users SET photo = '$fileName'   where id='$id' ";
            $response =mysqli_query($connection, $query);
            session_start();
            $_SESSION['success_updateuserimage'] = "<b style='color:white;'> User image is successfully updated!</b>";
           
            if(mysqli_error($connection))
            {
                die(mysqli_error($connection));
            } 
            
             if($response){
              
                 return true;
             }else{
                 return false;
             }

        } else{
            session_start();
            $_SESSION['error_updateuserimage']= "<b style='color:white;'>Something went wrong while Updating user image!</b>";
        }

    }

    // update User
    public function updateUser($id, $connection)
    {
        $email = $_POST['edit_email'];
        $firstname = $_POST['edit_firstname'];
        $lastname = $_POST['edit_lastname'];
        $password = $_POST['edit_password'];
        $address = $_POST['edit_address'];
        $contact = $_POST['edit_contactinfo'];
        $query = " UPDATE Users
         SET  email='$email', firstname ='$firstname', lastname= '$lastname', contact_info='$contact', address= '$address'
         WHERE id='$id' ";
        //  $result = mysqli_query($connection,)
        session_start();
        $_SESSION['success_edituser']= "<b style='color:white;'> User is successfully Updated ! </b>";
        $result = mysqli_query($connection, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

}
