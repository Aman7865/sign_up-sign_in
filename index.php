<?php
$salert=false;
$palert= false;
$error= false;
include 'db_conn.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email= $_POST['email'];
    $password= $_POST['password'];

    //first before create new account check whether if user already exist or not
    $existsql= "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn,$existsql);
    $numexistrows = mysqli_num_rows($result);
    if($numexistrows>0){
        $error=true;
    }
    else{
    
    if(($password)){
        $hash= password_hash($password, PASSWORD_DEFAULT); //hash fuction used for security purpose
        $sql= "INSERT INTO `users` (`name`, `phone`, `email`,`password`,`created_at`) VALUES ('$name','$phone','$email', '$hash', current_timestamp())";
        $result= mysqli_query($conn,$sql);
        if($result){
            $salert=true;
        }
    }
    else{
        $palert=true;
    }
  }
}


?>
<?php 
include 'header.php';
?>



<div class="container" id="mainhome">
            <h2>Sign_In & Sign_up</h2>
            <strong class="my-3">Safe & Secure</strong>
           
            <?php
                    if($error){
                    echo '<div class="alert my-3 alert-danger alert-dismissible fade show" role="alert">
                    <strong>There were error(s) in your form:<br></strong> username already exist please choose unique.
                    </div>';
                    }
            ?>
                <?php
                    if($salert){
                    echo '<div class="alert my-3 alert-success alert-dismissible fade show" role="alert">
                    <strong>Successfully!</strong> Your signup complete now you can Log in.
                    </div>';
                    }
                ?>
                 <?php
                    if($palert){
                    echo '<div class="alert my-3 alert-danger alert-dismissible fade show" role="alert">
                    <strong>There were error(s) in your form:<br></strong> A password is required.
                    </div>';
                    }
                ?>
                 <p class="my-3">Interested? Sign up now.</p>
        <form method="post">
        <div class="form-group">
               
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"  placeholder="Your Name" Required>
            </div>
            <div class="form-group">
               
                <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="emailHelp"  placeholder="Your Phone number" Required>
            </div>
            <div class="form-group">
               
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  placeholder="Your Email" Required>
            </div>
            <div class="form-group">
                
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        <b><a href="login.php" class="ml-2">LogIn?</a></b>
    </div>


<?php

include 'footer.php';

?>