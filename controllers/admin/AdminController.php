<?php

namespace Admin;

use Client\DatabaseController as Database;

class AdminController extends Database
{
    function __construct()
    {
    //    $this->help();
    }

    /**
     * 0 params 
     * categories
     */
     
     // add new category
     public function addCategory($id,$connection){
         $cat_name = $_POST['name'];
         $query = "INSERT INTO category (name) VALUES('$cat_name')";
         $result =mysqli_query($connection, $query);
         if(mysqli_error($connection)){
             die(mysqli_error($connection));
         }
         if($result){
             return true;
         }
         else {
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
        $query ="SELECT * FROM products";
        $result = mysqli_query($connection,$query);
        $AllProducts =mysqli_fetch_all($result,MYSQLI_ASSOC);
        if (mysqli_error($connection)) {

            die(mysqli_error($connection));
        }
        return $AllProducts;

    }
    public function GetUsers($connection){
        $query ="SELECT * FROM users";
        $result =mysqli_query($connection,$query);
        $AllUsers = mysqli_fetch_all($result,MYSQLI_ASSOC);
        if (mysqli_error($connection)) {
            die(mysqli_error($connection));
            
        }
        return $AllUsers;
    
    }
     
    public function GetSales($connection) {
        $query ="SELECT * FROM  users INNER JOIN sales on user_id = sales.user_id";
        $result = mysqli_query($connection, $query);
        $AllSales= mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(mysqli_error($connection)){
            die(mysqli_error($connection));
        }
        return $AllSales;
     } 
     //edit  category function
    //   geting single category for editing using id
     public function getCat($id,$connection)
      {   
          $query = "SELECT * FROM category where id ='".$id."' ";
          $result = mysqli_query($connection , $query);
            //return category;
           $category = mysqli_fetch_assoc($result);
            return $category;
       
     } 
      // update category
       public function updateCat($id, $connection){
        $name=$_POST['name'];
        $query =" UPDATE category SET name= '$name'
        WHERE id='$id' ";   
        // $result = mysqli_query($connection,)
       $result = mysqli_query($connection, $query);
       if ($result) {
           return true;
       }
       else{
           return false;
       }
       }

    // for deleting category function
    public function DeleteCategory($id, $connection){
        $query = "DELETE FROM category where id = '".$id."' ";
        $result = mysqli_query($connection, $query);
        if($result)
        {
            return true;
        }else{
            return false;
        }

    } 
    // update product function
    public function updateProduct($id,$connection){
        $id =$_POST['product_id'];
        $name=$_POST['pro_name'];
        $price=$_POST['pro_price'];
        $description= $_POST['editor1'];
       $query ="UPDATE products SET name='$name', price='$price', description='$description' WHERE id='$id' ";
       $result = mysqli_query($connection,$query);
       if(mysqli_error($connection))
       {
           die(mysqli_error($connection));
       }
       if($result){
           return true;
       }
       else{
           return false;
       }
    }


    public function getProduct($id, $connection) {
     $query = "SELECT * FROM products where id ='".$id."' ";
     $result = mysqli_query($connection, $query);
     $product = mysqli_fetch_assoc($result);
        
       
      return $product;
     }


    
    // for deleting product function
    public function DeleteProduct($id,$connection){
        $query = "DELETE FROM products where id = '".$id."' ";
        $result =mysqli_query($connection,$query);
        if ($result) {
            return true;
        } else{
            return false;
        }

    }
    // delete User function
    public function DeleteUser($id, $connection){
        $query =  "DELETE FROM users where id= '".$id."' ";
        $result = mysqli_query($connection,$query);
        if ($result) {
            return true;
        }
        else{
            return false;
        }
    }

    // add new users
       public function addUser($id,$connection){
        $email=$_POST['email'];
        $firstname= $_POST['firstname'];
        $lastname =$_POST['lastname'];
        $password =$_POST['password'];
        $address =$_POST['address'];
        $contact =$_POST['contact'];
        $query =" INSERT INTO users (email, firstname,lastname,address, contact_info, password) VALUES('$email', '$firstname', '$lastname', '$address', '$contact','$password' ) ";
       
        $result =mysqli_query($connection, $query);
        if(mysqli_error($connection))
        {
            die(mysqli_error($connection));
        }
        if ($result) {
           return true;
        }
        else{
          return false;
        }
        
    }
      // geting single user for updation
    public function GetUser($id, $connection)
    {
        //select * from where id  = id
    $query = "SELECT * FROM users where id ='".$id."' ";
   // mysqli query
    $result = mysqli_query($connection , $query);
     //return user;
     $User = mysqli_fetch_assoc($result);
     return $User;

    }
    
    // update User
    public function updateUser($id, $connection)
    {
        $email=$_POST['email'];
           $firstname= $_POST['firstname'];
           $lastname =$_POST['lastname'];
           $password =$_POST['password'];
           $address =$_POST['address'];
           $contact =$_POST['contactinfo'];
         $query =" UPDATE Users
         SET  email='$email', firstname ='$firstname', lastname= '$lastname', contact_info='$contact', address= '$address'
         WHERE id='$id' ";   
        //  $result = mysqli_query($connection,)
        $result = mysqli_query($connection, $query);
        if ($result) {
            return true;
        }
        else{
            return false;
        }
        

    }



}