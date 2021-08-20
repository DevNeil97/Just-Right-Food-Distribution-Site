<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Welcome to JustRight</title>
<link rel="stylesheet" href="./styles/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assests/css/style.css">
<link rel="stylesheet" href="./styles/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/07aafc1913.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
      <!--NavBar-->
      <nav>
        <div class="logo">
            <a href="index.php"><img src="img/logo.jpg" alt="logo"></a>
        </div>
        <ul class="nav-links">
            <li> 
                <a href="index.php">Home</a>
            </li>
            <li> 
                <a href="products.php">Food</a>
            </li>
            <li> 
                <a href="about.php">About Us</a>
            </li>
            <li> 
                <a href="account.php">My Account</a>
            </li>
            <li> 
                <a href="Cart.php">Cart
                <?php
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo"<span id = 'cart_count'> $count</span>";
                }else{
                    echo"<span id = 'cart_count'> 0 </span>";
                }
                ?>
                </a>
            </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
     <!--NavBar-->'
    <div class="content">
        <div class="signup-form">
            <h2>Welcome to JustRight</h2>
            <form action="includes/login.inc.php" method="post" enctype="multipart/form-data">
                <p class="hint-text">Enter Login Details</p>
                <div class="form-group">
                    <input type="text" class="form-control" name="uid" placeholder="Username/Email..." required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Password..." required="required">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Login</button>
                </div>
                <div class="text-center">Don't have an account? <a href="register.php">Register Here</a></div>
            </form>
            <?php
                if (isset($_GET["error"])) {
                    if($_GET["error"] == "emptyinput") { 
                        echo "<p>Fill in all fields!</p>";
                    }
                    else if ($_GET["error"] == "wronglogin") {
                        echo "<p>Incorrect login information!</p>";
                    }
                }
            ?>
            
    </div>
        <footer class="text-center text-lg-start clearfix fixed-bottom" style="width:100%" >
            <div class="container">
                <div class="row bg-transparent text-center">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0 bg-transparent">
                        <h5 class="text-uppercase bg-transparent text-light">about us</h5>
                        <p class="bg-transparent text-light">We are JustRight, a food delivery service from a product range of burgers to pizzas,
                            here catering to customers where needed and providing a happy service, to learn more please head to the link
                        </p>
                        <a class="text-light bg-transparent" href="about.php">find out more</a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 bg-transparent text-center">
                        <h5 class="text-uppercase mb-0 bg-transparent text-light">Useful Links</h5>
                        <ul class="list-unstyled bg-transparent">
                            <li class="bg-transparent">
                                <a href="404.html" class="text-light bg-transparent">Terms and Privacy</a>
                            </li>
                            <li class="bg-transparent">
                                <a href="contact.html" class="text-light bg-transparent">Contact Us</a>
                            </li>
                            <li class="bg-transparent">
                                <a href="404.html" class="text-light bg-transparent">Legal</a>
                            </li>
                            <li class="bg-transparent">
                                <a href="404.html" class="text-light bg-transparent">Health Warning</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 bg-transparent">
                        <h5 class="text-uppercase mb-0 bg-transparent text-light">Social Media</h5>
                        <ul class="list-unstyled bg-transparent">
                            <li class="bg-transparent">
                                <a href="404.html" role="button" data-mdb-ripple-color="light" class="text-light bg-transparent"><i class="fab fa-facebook bg-transparent"></i></a>
                            </li>
                            <li class="bg-transparent">
                                <a href="404.html" role="button" data-mdb-ripple-color="light" class="text-light bg-transparent"><i class="fab fa-twitter bg-transparent"></i></a>
                            </li>
                            <li class="bg-transparent">
                                <a href="404.html" role="button" data-mdb-ripple-color="light" class="text-light bg-transparent"><i class="fab fa-instagram bg-transparent"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center p-3 text-light" style="background-color: #272729;">
                © 2020 Copyright:
                <a class="text-light bg-transparent" href="#">JustRight</a>
            </div>
        </footer>
    <!--Footer-->
</body>
</html>