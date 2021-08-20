<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>About us</title>
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
     <!--NavBar-->
     <div class="about-us">
         <div class="aboutus-top">
             <div class="picture">
                    <img src="img\about-us_v2.jpg" alt="">
             </div>
             <div class="info">
                <h1>Who are we</h1>
                 <p>
                     We are Justright, A locally owned resturant with our locally grown produce from our own local farms, regulary sourced.
                 </p>
                 <p>
                     Here for you to taste the natural taste of your local farms, with our food produced from your local cow's and chicken's.
                 </p>
                 <p>
                    Producing professionally made burgers, delivered straight to your house, so you can have a taste of the high life all within the comfort of your own home.
                </p>
                <p>
                    From the standard American Hamburger to the Mediterranean tang of a grilled chicken burger, from the taste of the west to the exotic from the east.
                </p>
             </div>

         </div>
         <div class="aboutus-bottom">
             <H1>Find us on</H1>
             <div class="icons">
                <a href="#" class="fa fa-facebook fa-4x"></a>
                <a href="#" class="fa fa-twitter fa-4x"></a>
                <a href="#" class="fa fa-instagram fa-4x"></a>
             </div>
         </div>
     </div>
    <!--Footer-->
    <footer class="text-center text-lg-start clearfix" style="width:100%" >
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
    <!--Scripts-->
    <script src="./scripts/navbar.js"></script>
</body>
</html>