<?php
//start session
session_start();
//code to put oder details back to database

//clear cart
unset($_SESSION["cart"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/07aafc1913.js" crossorigin="anonymous"></script>
    <title>transaction-completed</title>
</head>
<body>
<!--NavBar-->
    <nav>
        <div class="logo">
            <a href="../index.php"><img src="../img/logo.jpg" alt="logo"></a>
        </div>
        <ul class="nav-links">
            <li> 
                <a href="../index.php">Home</a>
            </li>
            <li> 
                <a href="../products.php">Food</a>
            </li>
            <li> 
                <a href="../about.php">About Us</a>
            </li>
            <?php
                if(isset($_SESSION["cstr_uid"])) {
                	echo "<li><a href='details.php'>profile</a></li>";
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
    
    <div class="content" class="oders">
        <div class="details">
                <div class="oder-details">
                    <h1>Thank you for shopping with Just Right</h1>
                    <img  src="img/logo.jpg" alt="">
                    <h1>Oder is on the way</h1>
                    <h2>Your oder will be deliverd to you soon<h2>
                    <a href="details.php">My account page</a>
                    </div>
                </div>
        </div>
    </div>
    
    <!--Footer-->
    <footer>            
        <div class="footer-info">
            <h1>Useful links</h1>
            <h3><a href="#">Contact us</a></h3>
            <h3><a href="#">Terms of use</a></h3>
            <h3><a href="#">Privicy policy</a></h3>
        </div>
            <div class="footer-content">
                © Just Right. All rights reserved.
            </div>
    </footer>

<!--Footer-->
<script src=".././scripts/navbar.js"></script>
</body>
</html>