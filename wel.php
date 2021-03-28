<?php
session_start();
$shows="";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location:signup.php");
    exit;
 
}
?>


<?php

include 'header.php';

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
    <a class="navbar-brand" href="#">Welcome! <strong><?php  echo $_SESSION['email'] ?></strong></a>
    <span id="space"></span>
    <div class="pull-xs-right">

        <a href="logout.php"><button class="btn btn-outline-success my-2 my-sm-0">Log out</button></a>

    </div>

</nav>
<div class="row mx-5">

    <div class="card" style="width: 18rem;">
        <img src="https://source.unsplash.com/700x500/?coding,java" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title text-primary  ">Card title</h5>
            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of
                the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="mx-3"></div>
    <div class="card" style="width: 18rem;">
        <img src="https://source.unsplash.com/700x500/?html,web design" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title text-primary  ">Card title</h5>
            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of
                the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="mx-3"></div>
    <div class="card" style="width: 18rem;">
        <img src="https://source.unsplash.com/700x500/?css,pc" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title text-primary  ">Card title</h5>
            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of
                the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="mx-3"></div>
    <div class="card" style="width: 18rem;">
        <img src="https://source.unsplash.com/700x500/?php,facebook" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title text-primary  ">Card title</h5>
            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of
                the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

<?php

include 'footer.php';

?>