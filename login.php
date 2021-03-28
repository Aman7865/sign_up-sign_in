<?php
$salert=false;
$error=false;
$error2=false;
include 'db_conn.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email= $_POST['email'];
    $password= $_POST['password'];
    
      $sql = "SELECT * FROM users WHERE email='$email'";//verify hash password by dynamically
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
    if($num == 1){
        while($row=mysqli_fetch_assoc($result)){               /* while loop and password verify both are used for verify password*/
            if(password_verify($password,$row['password'])){
                 $id= $row['id'];
                 $salert=true;
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;  //we are not used password here bcz privacy reasons
                $_SESSION['id']= $id;
                header("location:wel.php");

            }
            else{
                    $error2=true;
                }
                                              }
        }
        else {
            $error=true;
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
                    email/password not found.
                    </div>';
                    }
                    if($error2){
                        echo '<div class="alert my-3 alert-danger alert-dismissible fade show" role="alert">
                        email and password not matched.
                        </div>';
                        }
            ?>
    <p class="my-3">Interested? Login now.</p>
    <form method="post">
        <div class="form-group">

            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                placeholder="Your Email">
        </div>
        <div class="form-group">

            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Log In</button>
    </form>
    <!-- <a href="index.php" class="btn btn-outline-success ml-2">Sign Up?</a> -->
   <b><a href="index.php" class="ml-2">Sign up?</a></b>
</div>

<?php

include 'footer.php';

?>