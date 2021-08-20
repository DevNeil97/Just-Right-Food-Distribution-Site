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
    <title>Just Right</title>
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
            <?php
                if(isset($_SESSION["cstr_uid"])) {
                	echo "<li><a href='details.php'>My profile</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                    }
                else {
                    echo  "<li><a href='account.php'>My Account</a></li>";
                    }
            ?>
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
     
     <!--Banners-->
        <div class="carousel-container">
        <i class="fas fa-arrow-left" id="prevbtn"></i>
        <i class="fas fa-arrow-right" id="nextbtn"></i>
                <div class="carousel-slide">
                    <img src="img/slide_image1.jpg" id="lastclone" alt="">
                    <img src="img/slide_image2.jpg" alt="">
                    <img src="img/slide_image3.jpg" alt="">
                    <img src="img/slide_image4.jpg" alt="">
                    <img src="img/slide_image5.jpg" alt="">
                    <img src="img/slide_image1.jpg" id="firstclone" alt="">
                </div>
            </div>
    <!--Banners-->

    <!--content-->
    <div class="content">
        <div class="main-text">
            <h2> <span> Popular Deals </span> </h2>
        </div>
        
        <div class="deals">
            <div class="deal">
                <img src="img/deal1.jpg" alt="">
            </div>

            <div class="deal">
                <img src="img/deal2.jpg" alt="">        	
            </div>
        </div>
    </div>
    <!--content-->
    
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
    <script src="./scripts/app.js"></script>
</body>
</html>