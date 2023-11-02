<?php require 'dbconnect.php';?>
<?php
 $showerror = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['signupemail'];
    $pass= $_POST['signuppassword'];
    $cpass= $_POST['signupcpassword'];
    
   $existsql = "SELECT * FROM `users` WHERE user_email= '$email'";
   $result= mysqli_query($conn,$existsql);
   $numrows=mysqli_num_rows($result);
   if($numrows>0){
       $showerror = "Email has already used. please use another Email to Signup";

   }
   else{
    if($pass==$cpass){
        // $hass = password_hash($pass, PASSWORD_DEFAULT);
        $sql= "INSERT INTO `users` (`user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_dt`) VALUES ('$first_name','$last_name','$email', '$pass', current_timestamp());";
        $result= mysqli_query($conn,$sql);
        if($result){
            header("Location: /index.php?signupsuccess=true");
            exit();
        }

    }
    else{
        $showerror = "Password do not match";
    }
    
    }
    header("Location: /index.php?signupsuccess=false&error=$showerror");
}
    
?>