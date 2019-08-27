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
        $query ="SELECT * FROM sales";
        $result = mysqli_query($connection, $query);
        $AllSales= mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(mysqli_error($connection)){
            die(mysqli_error($connection));
        }
        return $AllSales;
    } 
    // for deleting category
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
    // for deleting product
    public function DeleteProduct(){

    }

}