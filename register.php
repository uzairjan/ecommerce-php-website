<?php
if(isset($_POST['reg_user1'])){

        $username= $_POST['full_name'];
         $email = $_POST['email'];
         $password_1 =$_POST['password'];
         $password=md5($password_1);
         $query ="INSERT INTO users (name,email,password) VALUES('$username' ,'$email' ,'$password')";
         mysqli_query( $query);
        
         $_SESSION['username'] = $username;
         $_SESSION['success'] = "You are now logged in";
}
         ?>